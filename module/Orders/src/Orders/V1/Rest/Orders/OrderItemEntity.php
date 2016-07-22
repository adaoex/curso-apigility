<?php

namespace Orders\V1\Rest\Orders;

class OrderItemEntity
{

    private $id;
    private $order_id;
    private $user_id;
    private $product_id;
    private $quantity;
    private $price;
    private $total;

    public function getId()
    {
        return $this->id;
    }

    public function getOrder_id()
    {
        return $this->order_id;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getProduct_id()
    {
        return $this->product_id;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
        return $this;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;
        return $this;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

}
