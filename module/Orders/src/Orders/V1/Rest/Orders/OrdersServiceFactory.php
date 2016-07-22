<?php

namespace Orders\V1\Rest\Orders;

use Orders\V1\Rest\Users\UsersRepository;
use Zend\ServiceManager\ServiceLocatorInterface;

class OrdersServiceFactory
{

    public function __invoke(ServiceLocatorInterface $services)
    {
        $repository = $services->get(OrdersRepository::class);
        return new OrdersService($repository);
    }

}
