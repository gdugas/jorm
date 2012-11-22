<?php 

require_once(dirname(__FILE__) . '/jOrmFilter.class.php');
require_once(dirname(__FILE__) . '/jOrmOrder.class.php');


class jOrmQuerySet {
    protected $_filter = Null;
    protected $_order = Null;
    
    function __clone () {
        $this->_filter = clone $this->_filter;
        $this->_order = clone $this->_order;
    }
    
    function __construct() {
        $this->_filter = new jOrmFilter('AND');
        $this->_order = new jOrmOrder();
    }
    
    function all() {
        return $this;
    }
    
    function filter(jOrmFilter $filter) {
        $this->getFilter()->add($filter);
        return $this;
    }
    
    function getFilter() {
        return $this->_filter;
    }
    
    function getOrder() {
        return $this->_filter;
    }
}
