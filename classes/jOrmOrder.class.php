<?php 


class jOrmOrder {
    
    protected $_orders = array();
    
    function add($field, $order = 'asc') {
        $order = strtolower($order);
        if ($order != 'asc' && $order != 'desc') {
            throw new Exception("Invalid order: $order - Must be asc or desc");
        }
        
        $this->_orders[$field] = $order;
        return $this;
    }
    
    public static function create() {
        return new jOrmOrder();
    }
    
    function getOrders() {
        return $this->_orders;
    }
}