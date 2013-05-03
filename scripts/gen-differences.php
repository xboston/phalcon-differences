<?php

/**
 * Скрипт формирует файлы различий интерфейсов и реализаций внутри Phalcon
 *
 *
 * php scripts/gen-differences.php
 */

define('ROOT' , dirname(__DIR__));

$phalconInterfaces = new \RegexIterator(new \ArrayIterator(get_declared_interfaces()) , '/^Phalcon/');

foreach ( $phalconInterfaces as $phalconInterface ) {


    $phalconClass = str_replace('Interface','',$phalconInterface);
    
    if( !class_exists($phalconClass) ){
        
        continue;
    }
    
    $reflectorClass     = new \ReflectionClass($phalconClass);
    $reflectorInterface = new \ReflectionClass($phalconInterface);
    
    $res           = [ ];
    $interfaceCode = [ ];
    $classCode     = [ ];

    foreach ( $reflectorInterface->getMethods() as $mi ) {

        $parametersClass     = [ ];
        $parametersInterface = [ ];

        $pi = $mi->getParameters();

        foreach ( $pi as $parameter ) {
            if ( $parameter->isOptional() ) {
                if ( $parameter->isDefaultValueAvailable() ) {
                    $parametersInterface[$parameter->name] = '$' . $parameter->name . ' = ' . $parameter->getDefaultValue();
                } else {
                    $parametersInterface[$parameter->name] = '$' . $parameter->name . ' = null';
                }
            } else {
                $parametersInterface[$parameter->name] = '$' . $parameter->name;
            }

        }

        $interfaceCode[$mi->name] = $mi->name . "(" . implode(', ' , $parametersInterface) . ');';

        if( !$reflectorClass->hasMethod($mi->name) ){
            
            continue;
        }
        
        $mc = $reflectorClass->getMethod($mi->name);
        $pc = $mc->getParameters();

        foreach ( $pc as $parameter ) {
            if ( $parameter->isOptional() ) {
                if ( $parameter->isDefaultValueAvailable() ) {
                    $parametersClass[$parameter->name] = '$' . $parameter->name . ' = ' . $parameter->getDefaultValue();
                } else {
                    $parametersClass[$parameter->name] = '$' . $parameter->name . ' = null';
                }
            } else {
                $parametersClass[$parameter->name] = '$' . $parameter->name;
            }


        }

        $classCode[$mi->name] = $mi->name . "(" . implode(', ' , $parametersClass) . ');';

        if ( $classCode[$mi->name] <> $interfaceCode[$mi->name] ) {
            $res[$mi->name] = [
                'interface' => $interfaceCode[$mi->name] ,
                'class'     => $classCode[$mi->name]
            ];
        }
    }

    if( count($res)==0 ){
        
        continue;
    }
    
    $templateBody = file_get_contents(ROOT . "/templates/differences.tmlp");
    $itemBody     = file_get_contents(ROOT . "/templates/item.tmlp");

    $body = [];
    foreach ( $res as $k => $r ) {

        $body[] = strtr(
            $itemBody ,
            [
            ':InterfaceName:'       => $phalconInterface ,
            ':ClassName:'           => $phalconClass ,
            ':InterfaceParameters:' => $r['interface'] ,
            ':ClassParameters:'     => $r['class'] ,
            ]
        );

    }

    $body = implode("\n" , $body);

    $fileBody = strtr($templateBody , [ ':class:' => $phalconClass , ':interface:' => $phalconInterface , ':body:' => $body ]);

    $fileName = sprintf('differences/%s.php' , $phalconInterface);
    $fileName = str_replace('\\' , '_' , $fileName);

    file_put_contents($fileName , $fileBody);
}

