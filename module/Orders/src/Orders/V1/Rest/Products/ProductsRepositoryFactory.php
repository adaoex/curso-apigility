<?php

namespace Orders\V1\Rest\Products;

use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\ClassMethods;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProductsRepositoryFactory
{

    public function __invoke(ServiceLocatorInterface $services)
    {
        $dbAdapter = $services->get('DbAdapter');
        $hydrator = new HydratingResultSet(new ClassMethods(), new ProductsEntity());
        $tableGateway = new TableGateway('products', $dbAdapter, null, $hydrator);
        return new ProductsRepository($tableGateway);
    }

}
