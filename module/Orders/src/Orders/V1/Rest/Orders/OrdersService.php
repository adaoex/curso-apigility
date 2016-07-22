<?php

namespace Orders\V1\Rest\Orders;

use Zend\Stdlib\Hydrator\ObjectProperty;

class OrdersService
{

    private $repository;

    public function __construct(OrdersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert($data)
    {
        $set = (new ObjectProperty())->extract($data);
        $items = $set['items'];
        unset($set['items']);
        
        $tableGateway = $this->repository->getTableGateway();
        
        try{
            $tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();
            $orderId = $this->repository->insert($set);

            foreach ($items as $item) {
                $item['order_id'] = $orderId;
                $this->repository->insertItem($item);
            }
            $tableGateway->getAdapter()->getDriver()->getConnection()->commit();
            
            return ['order_id' => $orderId];
            
        } catch ( \Exception $exc ){
             $tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
            return 'error';
        }
        
    }
    
    public function update($id, $data)
    {
       
        $set = (new ObjectProperty())->extract($data);
        $items = $set['items'];
        unset($set['items']);
        
        $tableGateway = $this->repository->getTableGateway();
        
        try{
            $tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();
            $this->repository->update($id, $set);
            
            if (count($items) > 0 ){
                $this->repository->deleteItems($id);
                foreach ($items as $item) {
                    $item['order_id'] = $id;
                    $this->repository->insertItem($item);
                }
            }
            $tableGateway->getAdapter()->getDriver()->getConnection()->commit();
            
            return ['order_id' => $id];
            
        } catch ( \Exception $exc ){
            $tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
            echo $exc->getMessage(); die;
            return 'error';
        }
        
    }
    
    public function delete($id)
    {
        $tableGateway = $this->repository->getTableGateway();
        
        try{
            $tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();
            
            $this->repository->deleteItems($id);
            $ret = $this->repository->delete($id);
            
            $tableGateway->getAdapter()->getDriver()->getConnection()->commit();
            return ['deleted' => $ret];
        } catch ( \Exception $exc ){
             $tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
            return 'error';
        }
        
    }

}
