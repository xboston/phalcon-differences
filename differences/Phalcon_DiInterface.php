<?php
/**
 * Class Phalcon\Di
 * Interface Phalcon\DiInterface
 */

Phalcon\DiInterface::
	set($alias, $definition, $shared = null);
Phalcon\Di::
	set($name, $definition, $shared = null);


Phalcon\DiInterface::
	remove($alias);
Phalcon\Di::
	remove($name);


Phalcon\DiInterface::
	attempt($alias, $definition, $shared = null);
Phalcon\Di::
	attempt($name, $definition, $shared = null);


Phalcon\DiInterface::
	get($alias, $parameters = null);
Phalcon\Di::
	get($name, $parameters = null);


Phalcon\DiInterface::
	getShared($alias, $parameters = null);
Phalcon\Di::
	getShared($name, $parameters = null);


Phalcon\DiInterface::
	has($alias);
Phalcon\Di::
	has($name);


Phalcon\DiInterface::
	offsetExists($offset);
Phalcon\Di::
	offsetExists($alias);


Phalcon\DiInterface::
	offsetGet($offset);
Phalcon\Di::
	offsetGet($alias);


Phalcon\DiInterface::
	offsetSet($offset, $value);
Phalcon\Di::
	offsetSet($alias, $definition);


Phalcon\DiInterface::
	offsetUnset($offset);
Phalcon\Di::
	offsetUnset($alias);


