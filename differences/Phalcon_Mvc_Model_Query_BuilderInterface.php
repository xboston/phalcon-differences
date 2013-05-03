<?php
/**
 * Class Phalcon\Mvc\Model\Query\Builder
 * Interface Phalcon\Mvc\Model\Query\BuilderInterface
 */

Phalcon\Mvc\Model\Query\BuilderInterface::
	join($model, $conditions = null, $alias = null);
Phalcon\Mvc\Model\Query\Builder::
	join($model, $conditions = null, $alias = null, $type = null);


Phalcon\Mvc\Model\Query\BuilderInterface::
	where($conditions);
Phalcon\Mvc\Model\Query\Builder::
	where($conditions, $bindParams = null, $bindTypes = null);


Phalcon\Mvc\Model\Query\BuilderInterface::
	andWhere($conditions);
Phalcon\Mvc\Model\Query\Builder::
	andWhere($conditions, $bindParams = null, $bindTypes = null);


Phalcon\Mvc\Model\Query\BuilderInterface::
	orWhere($conditions);
Phalcon\Mvc\Model\Query\Builder::
	orWhere($conditions, $bindParams = null, $bindTypes = null);


