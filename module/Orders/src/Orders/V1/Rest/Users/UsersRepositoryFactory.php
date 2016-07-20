<?php

namespace Orders\V1\Rest\Users;

use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\ClassMethods;
use Zend\ServiceManager\ServiceLocatorInterface;

class UsersRepositoryFactory
{

    public function __invoke($services)
    {
        $dbAdapter = $services->get('DbAdapter');
        $hydrator = new HydratingResultSet(new ClassMethods(), new UsersEntity());
        $tableGateway = new TableGateway('oauth_users', $dbAdapter, null, $hydrator);
        return new UsersRepository($tableGateway);
    }

}
