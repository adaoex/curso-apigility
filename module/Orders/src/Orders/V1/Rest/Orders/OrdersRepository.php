<?php

namespace Orders\V1\Rest\Orders;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\ObjectProperty;
use Zend\Paginator\Adapter\ArrayAdapter;

class OrdersRepository
{

    /** @var TableGatewayInterface  */
    private $tableGateway;
    private $orderItemTableGateway;

    public function __construct(
        TableGatewayInterface $tableGateway, 
        TableGatewayInterface $orderItemTableGateway
    ){
        $this->tableGateway = $tableGateway;
        $this->orderItemTableGateway = $orderItemTableGateway;
    }

    public function findAll()
    {
        $hydrator = new ClassMethods();
        $hydrator->addStrategy('items', new OrderItemHidratorStrategy());
        $result = [];
        $rows = $this->tableGateway->select();
        foreach ($rows as $order) {
            $items = $this->orderItemTableGateway->select(['order_id' => $order->getId()]);
            foreach ($items as $item) {
                $order->addItem($item);
            }
            $result[] = $hydrator->extract($order);
        }

        $arrayAdapter = new ArrayAdapter($result);
        $collection = new OrdersCollection($arrayAdapter);

        #$tableGateway = $this->tableGateway;
        #$paginatorAdapter = new DbTableGateway($tableGateway);
        #return new OrdersCollection($paginatorAdapter);

        return $collection;
    }
    
    public function findByUser($user_id)
    {
        $hydrator = new ClassMethods();
        $hydrator->addStrategy('items', new OrderItemHidratorStrategy());
        $result = [];
        $rows = $this->tableGateway->select(['user_id' => $user_id]);
        foreach ($rows as $order) {
            $items = $this->orderItemTableGateway->select(['order_id' => $order->getId()]);
            foreach ($items as $item) {
                $order->addItem($item);
            }
            $result[] = $hydrator->extract($order);
        }

        $arrayAdapter = new ArrayAdapter($result);
        $collection = new OrdersCollection($arrayAdapter);

        return $collection;
    }

    public function find($id)
    {
        $rowset = $this->tableGateway->select(['id' => $id]);
        return $rowset->current();
    }
    
    public function findOneByUser($id, $user_id)
    {
        $rowset = $this->tableGateway->select(['id' => $id, 'user_id' => $user_id]);
        return $rowset->current();
    }

    public function insert($data)
    {
        #$set = (new ObjectProperty())->extract($data);
        #return $this->tableGateway->insert($set);

        $this->tableGateway->insert($data);
        return $this->tableGateway->getLastInsertValue();
    }

    public function insertItem($data)
    {
        $this->orderItemTableGateway->insert($data);
        return $this->orderItemTableGateway->getLastInsertValue();
    }

    public function update($id, $data)
    {
        return $this->tableGateway->update($data, array("id" => $id));
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(array("id" => $id));
    }
    
    public function deleteItems($order_id)
    {
        return $this->orderItemTableGateway->delete(array('order_id' => $order_id));
    }

    public function getTableGateway()
    {
        return $this->tableGateway;
    }

}
