<?php 

class jOrmFilter {
    
    protected $_logic = Null;
    protected $_fields = array();
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
    
    function add($filtering, $value=NULL) {
        if ($filtering instanceof jOrmFilter) {
            $this->_subFilters[] = $filtering;
        } else {
            $this->_fields[$filtering] = $value;
        }
        return $this;
    }
    
    public static function create($logic = 'AND') {
        return new jOrmFilter($logic);
    }
    
    function getFields() {
        return $this->_fields;
    }
    function getLogic() {
        return $this->_logic;
    }
    function getSubFilters() {
        return $this->_subFilters;
    }
}
