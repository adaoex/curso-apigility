<?php

namespace Orders\V1\Rest\Products;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Hydrator\ObjectProperty;
use Zend\Paginator\Adapter\DbTableGateway;

class ProductsRepository
{

    /** @var TableGatewayInterface  */
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function findAll()
    {
        $tableGateway = $this->tableGateway;
        $paginatorAdapter = new DbTableGateway($tableGateway);
        return new ProductsCollection($paginatorAdapter);
    }

    public function find($id)
    {
        $rowset  = $this->tableGateway->select(['id' => $id]);
        return $rowset->current();
    }

    public function insert($data)
    {
        $set = (new ObjectProperty())->extract($data);
        return $this->tableGateway->insert($set);
    }
    
    public function update($id, $data)
    {
        $set = (new ObjectProperty())->extract($data);
        return $this->tableGateway->update($set, array("id" => $id));
    }
    
    public function delete($id)
    {
        return $this->tableGateway->delete(array("id" => $id));
    }
}
