<?php
/**
 * Class Phalcon\Http\Request
 * Interface Phalcon\Http\RequestInterface
 */

Phalcon\Http\RequestInterface::
	get($name, $filters = null, $defaultValue = null);
Phalcon\Http\Request::
	get($name = null, $filters = null, $defaultValue = null);


Phalcon\Http\RequestInterface::
	getPost($name, $filters = null, $defaultValue = null);
Phalcon\Http\Request::
	getPost($name = null, $filters = null, $defaultValue = null);


Phalcon\Http\RequestInterface::
	getQuery($name, $filters = null, $defaultValue = null);
Phalcon\Http\Request::
	getQuery($name = null, $filters = null, $defaultValue = null);


Phalcon\Http\RequestInterface::
	hasFiles();
Phalcon\Http\Request::
	hasFiles($notErrored = null);


Phalcon\Http\RequestInterface::
	getUploadedFiles();
Phalcon\Http\Request::
	getUploadedFiles($notErrored = null);


