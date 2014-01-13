<?php

/**
 * Скрипт формирует файлы недостающих методов в интерфейсах и реализациях Phalcon
 *
 * php scripts/gen-notimplemented.php
 */

define('ROOT', dirname(__DIR__));

$phalconInterfaces = new \RegexIterator(new \ArrayIterator(get_declared_interfaces()), '/^Phalcon/');

$ignore = ['setDI', 'getDI', 'setEventsManager', 'getEventsManager'];

foreach ($phalconInterfaces as $phalconInterface) {

    //$phalconInterface = 'Phalcon\Mvc\ViewInterface';

    $phalconClass = str_replace('Interface', '', $phalconInterface);

    if (!class_exists($phalconClass)) {

        continue;
    }

    $reflectorClass     = new \ReflectionClass($phalconClass);
    $reflectorInterface = new \ReflectionClass($phalconInterface);

    $interfaceMethods = [];
    foreach ($reflectorInterface->getMethods() as $mi) {

        if ($mi->isPublic() && !in_array($mi->name, $ignore)) {
            $interfaceMethods[$mi->name] = 1;

        }

    }

    $classMethods = [];
    foreach ($reflectorClass->getMethods() as $mc) {

        if ($mc->isPublic() && !in_array($mc->name, $ignore)) {

            $classMethods[$mc->name] = 1;
        }
    }

    // не реализовано в классе
    $classNotImplemented = array_diff_key($interfaceMethods, $classMethods);
    if (count($classNotImplemented) > 0) {

        $fileName = sprintf('/notimplemented/%s.php', $phalconClass);
        $fileName = str_replace('\\', '_', $fileName);

        $fileBody = sprintf("diff: %s > %s(not implemented)\n\n", $phalconInterface, $phalconClass);
        $fileBody .= implode("\n", array_keys($classNotImplemented));

        file_put_contents(ROOT . $fileName, $fileBody);
    }

    // не реализовано в интерфейсе
    $interfaceNotImplemented = array_diff_key($classMethods, $interfaceMethods);
    if (count($interfaceNotImplemented)) {

        $fileName = sprintf('/notimplemented/%s.php', $phalconInterface);
        $fileName = str_replace('\\', '_', $fileName);

        $fileBody = sprintf("diff: %s > %s(not implemented)\n\n", $phalconClass, $phalconInterface);
        $fileBody .= implode("\n", array_keys($interfaceNotImplemented));

        file_put_contents(ROOT . $fileName, $fileBody);
    }
}
