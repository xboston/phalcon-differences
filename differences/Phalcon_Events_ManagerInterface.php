<?php
/**
 * Class Phalcon\Events\Manager
 * Interface Phalcon\Events\ManagerInterface
 */

Phalcon\Events\ManagerInterface::
	attach($eventType, $handler);
Phalcon\Events\Manager::
	attach($eventType, $handler, $priority = null);


Phalcon\Events\ManagerInterface::
	fire($eventType, $source, $data = null);
Phalcon\Events\Manager::
	fire($eventType, $source, $data = null, $cancelable = null);


