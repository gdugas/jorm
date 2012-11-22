<?php 

require_once(dirname(__FILE__) . '/jOrmQuerySet.class.php');

abstract class jOrmManager {
    
    protected $_queryset = Null;
    
    function __construct($queryset) {
        $this->_queryset = new jOrmQuerySet();
    }
    
    function all() {
        $man = clone $this;
        $man->getQuerySet()->all();
        return $man;
    }
    
    function filter(jOrmFilter $filter) {
        $man = clone $this;
        $man->_queryset->filter($filter);
        return $man;
    }
    
    function getQuerySet() {
        return $this->_queryset;
    }
}
