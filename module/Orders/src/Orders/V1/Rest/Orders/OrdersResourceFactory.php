<?php

namespace Orders\V1\Rest\Orders;

class OrdersResourceFactory
{

    public function __invoke($services)
    {
        $repository = $services->get(OrdersRepository::class);
        $repositoryUsers = $services->get('Orders\\V1\\Rest\\Users\\UsersRepository');
        $service = $services->get('Orders\\V1\\Rest\\Orders\\OrderService');
        return new OrdersResource($repository, $repositoryUsers, $service);
    }

}
