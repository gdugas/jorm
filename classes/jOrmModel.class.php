<?php 

require_once(dirname(__FILE__).'/jOrm.class.php');


class jOrmModel implements Iterator {
    protected $_fields = array();
    protected $_metas = array();
    protected static $_manager = 'jorm~default';

    function __construct() {
        $this->_initFields();
        $this->_initMetas();
    }

    protected function _initFields() {
        // Fields definition
        foreach ($this as $name => $definition) {
            $field = self::getField($definition, $name);
            if (! $field) {
                throw new Exception('Bad field format: ' . $name);
            } else {
                $this->_fields[$name] = $field;
            }
        }
    }

    protected function _initMetas () {
        $defaults = array('db_table' => NULL,
                          'ordering' => NULL,
                          'primary_key' => 'id',
                          'unique_together' => NULL,
                          'verbose_name' => NULL);
        $this->_metas = array_merge($defaults, $this->_metas);
    }

    public function __get($name) {
        return $this->_fields[$name];
    }

    public function __set($name, $value) {
        if (isset($this->_field[$name])) {
            $this->_fields[$name]->setValue($value);
        }
    }
    
    
    /*** Iterator implementation ***/
    public function rewind() {
        reset($this->_fields);
    }
    
    public function current() {
        return current($this->_fields);
    }
    
    public function key() {
        return key($this->_fields);
    }
    
    public function next() {
        return next($this->_fields);
    }
    
    public function valid() {
        return current($this->_fields) != Null;
    }

    /*
     * Return a field object from given definition
     */
    public static function getField(array $definition, $db_column = NULL) {
        if (count($definition) == 0 || ! is_string($definition[0])) {
            return NULL;
        }
        
        $selector = $definition[0];
        if (isset($definition[1]) && is_array($definition[1])) {
            $options = $definition[1];
        } else {
            $options = array();
        }
        
        if ($db_column !== NULL && ! isset($options['db_column'])) {
            $options['db_column'] = $db_column;
        }
        
        return jOrm::getField($selector, $options);
    }
    
    public function getMeta($name, $default=Null) {
        if (! isset($this->_metas[$name])) {
            return $default;
        } else {
            return $this->_metas[$name];
        }
    }
    
    public function getMetas() {
        return $this->_metas;
    }
    
    public static function getManager() {
        return jOrm::getManager(self::$_manager);
    }
    
    // function clean()
    // function clean_fields()
    // function clean_model()
    // function delete()
    // function getPks()
    // function insert()
    // function save()
    // function update()

}
