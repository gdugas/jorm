<?php 

require_once (dirname(__FILE__) . '/jOrmModel.class.php');
require_once (dirname(__FILE__) . '/jOrmFilter.class.php');
require_once (dirname(__FILE__) . '/jOrmQueryset.class.php');

abstract class jOrmDriver {
    /*
     * format: field lookup => db operator
     * interpreted with sprintf
     */
    protected $operators = array('eq'=> Null,
                                 'ieq'=> Null,
                                 'contains'=> Null,
                                 'icontains'=> Null,
                                 'regex'=> Null,
                                 'iregex'=> Null,
                                 'gt'=> Null,
                                 'gte'=> Null,
                                 'lt'=> Null,
                                 'lte'=> Null,
                                 'startswith'=> Null,
                                 'endswith'=> Null,
                                 'istartswith'=> Null,
                                 'iendswith'=> Null);
    
    protected $_dataTypes = array('jorm~char' => Null,
                                  'jorm~integer' => Null);
    
    function __construct($profile='') {
        $this->_cnx = jDb::getConnection($profile);
    }
    
    function getWhereClause(jOrmModel $model, jOrmFilter $filter = Null) {
        if ($filter === Null) {
            return Null;
        }
        
        // Build subclauses
        $subclause = array();
        foreach ($filter->getSubFilters() as $subfilter) {
            $subclause[] = $this->getWhereClause($subfilter);
        }
        if (count($subclause) > 0) {
            $subclause = '(' . explode($filter->getLogic(), $clause) . ')';
        }
        
        // Build clause
        $clause = array();
        foreach ($filter->getArrayClauses() as $field => $conditions) {
            $field = explode('__', $field);
            $value = $conditions[0];
            $op = $conditions[1];
            
            // TODO: complete (foreignkey, etc ...)
        }
    }
    
    abstract function getSqlDelete(jOrmModel $model);
    abstract function getSqlInsert(jOrmModel $model);
    abstract function getSqlSelect(jOrmModel $model, jOrmQueryset $queryset);
    abstract function getSqlUpdate(jOrmModel $model);
}
