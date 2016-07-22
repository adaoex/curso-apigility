<?php

namespace Orders\V1\Rest\Orders;

use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\ClassMethods;
use Zend\ServiceManager\ServiceLocatorInterface;

class OrderItemTableGatewayFactory
{

    public function __invoke(ServiceLocatorInterface $services)
    {
        $dbAdapter = $services->get('DbAdapter');
        $hydrator = new HydratingResultSet(new ClassMethods(), new OrderItemEntity());
        $tableGateway = new TableGateway('order_items', $dbAdapter, null, $hydrator);
        return $tableGateway;
    }

}
