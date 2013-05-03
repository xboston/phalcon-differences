<?php
/**
 * Class Phalcon\Mvc\Model\Manager
 * Interface Phalcon\Mvc\Model\ManagerInterface
 */

Phalcon\Mvc\Model\ManagerInterface::
	load($modelName);
Phalcon\Mvc\Model\Manager::
	load($modelName, $newInstance = null);


Phalcon\Mvc\Model\ManagerInterface::
	addHasOne($model, $fields, $referenceModel, $referencedFields, $options = null);
Phalcon\Mvc\Model\Manager::
	addHasOne($model, $fields, $referencedModel, $referencedFields, $options = null);


Phalcon\Mvc\Model\ManagerInterface::
	addBelongsTo($model, $fields, $referenceModel, $referencedFields, $options = null);
Phalcon\Mvc\Model\Manager::
	addBelongsTo($model, $fields, $referencedModel, $referencedFields, $options = null);


Phalcon\Mvc\Model\ManagerInterface::
	addHasMany($model, $fields, $referenceModel, $referencedFields, $options = null);
Phalcon\Mvc\Model\Manager::
	addHasMany($model, $fields, $referencedModel, $referencedFields, $options = null);


Phalcon\Mvc\Model\ManagerInterface::
	getRelationsBetween($firstModel, $secondModel);
Phalcon\Mvc\Model\Manager::
	getRelationsBetween($first, $second);


