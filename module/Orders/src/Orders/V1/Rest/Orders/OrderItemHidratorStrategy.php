<?php

namespace Orders\V1\Rest\Orders;

use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\Strategy\StrategyInterface;

class OrderItemHidratorStrategy implements StrategyInterface
{
    
    private $hydrator;
    
    public function __construct()
    {
        $this->hydrator = new ClassMethods();
    }

    public function extract($items)
    {
        $data = [];
        foreach ($items as $item) {
            $data[] = $this->hydrator->extract($item);
        }
        return $data;
    }

    public function hydrate($value)
    {
        throw new Exception('Hydrate is not supported');
    }

}
