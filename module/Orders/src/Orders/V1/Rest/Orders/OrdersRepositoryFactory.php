<?php

namespace Orders\V1\Rest\Orders;

use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\ClassMethods;
use Zend\ServiceManager\ServiceLocatorInterface;

class OrdersRepositoryFactory
{

    public function __invoke(ServiceLocatorInterface $services)
    {
        $dbAdapter = $services->get('DbAdapter');
        $hydrator = new HydratingResultSet(new ClassMethods(), new OrdersEntity());
        $tableGateway = new TableGateway('orders', $dbAdapter, null, $hydrator);
        $orderItemTableGateway = $services->get('Orders\\V1\\Rest\\Orders\\OrderItemTableGateway');
        return new OrdersRepository($tableGateway, $orderItemTableGateway);
    }

}
