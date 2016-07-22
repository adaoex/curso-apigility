<?php

namespace Orders\V1\Rest\Orders;

class OrdersEntity
{

    private $id;
    private $client_id;
    private $user_id;
    private $ptype_id;
    private $total;
    private $status;
    private $created_at;
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getClient_id()
    {
        return $this->client_id;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getPtype_id()
    {
        return $this->ptype_id;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setClient_id($client_id)
    {
        $this->client_id = $client_id;
        return $this;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setPtype_id($ptype_id)
    {
        $this->ptype_id = $ptype_id;
        return $this;
    }

    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    public function addItem($item)
    {
        $this->items[] = $item;
        return $this;
    }

}
