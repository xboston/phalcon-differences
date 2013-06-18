<?php
/**
 * Class Phalcon\Db\Adapter
 * Interface Phalcon\Db\AdapterInterface
 */

Phalcon\Db\AdapterInterface::
	__construct($descriptor);
Phalcon\Db\Adapter::
	__construct();


Phalcon\Db\AdapterInterface::
	fetchOne($sqlQuery, $fetchMode = null, $placeholders = null);
Phalcon\Db\Adapter::
	fetchOne($sqlQuery, $fetchMode = null, $bindParams = null, $bindTypes = null);


Phalcon\Db\AdapterInterface::
	fetchAll($sqlQuery, $fetchMode = null, $placeholders = null);
Phalcon\Db\Adapter::
	fetchAll($sqlQuery, $fetchMode = null, $bindParams = null, $bindTypes = null);


