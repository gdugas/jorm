<?php 

class jOrmFilter {
    
    protected $_logic = Null;
    protected $_clauses = array();
    protected $_joins = array();
    protected $_subFilters = array();
    
    function __clone() {
        $subFilters = array();
        foreach ($this->_subFilters as $filter) {
            $subFilters[] = clone $filter;
        }
        $this->_subFilters = $subFilters;
    }
    
    function __construct ($logic = 'AND') {
        if ($logic != 'OR' && $logic != 'AND') {
            throw new Exception("Bad logic filter: $logic - Must be OR or AND");
        }
        $this->_logic = $logic;
    }
    
    function add($filtering, $value=NULL, $op = 'eq') {
        if ($filtering instanceof jOrmFilter) {
            $this->_subFilters[] = $filtering;
        } else {
            if (count(explode('__', $filtering)) > 1) {
                $this->_joins[$filtering] = array($value, $op);
            } else {
                $this->_clauses[$filtering] = array($value, $op);
            }
        }
        return $this;
    }
    
    public static function create($logic = 'AND') {
        return new jOrmFilter($logic);
    }
    
    function getArrayClauses() {
        return $this->_clauses;
    }
    function getLogic() {
        return $this->_logic;
    }
    function getJoins() {
        return $this->_joins;
    }
    function getSubFilters() {
        return $this->_subFilters;
    }
}
