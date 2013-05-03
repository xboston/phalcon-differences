<?php
/**
 * Class Phalcon\Mvc\Model
 * Interface Phalcon\Mvc\ModelInterface
 */

Phalcon\Mvc\ModelInterface::
	cloneResultMap($base, $data, $columnMap, $dirtyState = null);
Phalcon\Mvc\Model::
	cloneResultMap($base, $data, $columnMap, $dirtyState = null, $keepSnapshots = null);


Phalcon\Mvc\ModelInterface::
	cloneResult($base, $result);
Phalcon\Mvc\Model::
	cloneResult($base, $data, $dirtyState = null);


Phalcon\Mvc\ModelInterface::
	save($data = null);
Phalcon\Mvc\Model::
	save($data = null, $whiteList = null);


Phalcon\Mvc\ModelInterface::
	create($data = null);
Phalcon\Mvc\Model::
	create($data = null, $whiteList = null);


Phalcon\Mvc\ModelInterface::
	update($data = null);
Phalcon\Mvc\Model::
	update($data = null, $whiteList = null);


Phalcon\Mvc\ModelInterface::
	getRelated($modelName, $arguments = null);
Phalcon\Mvc\Model::
	getRelated($alias, $arguments = null);


