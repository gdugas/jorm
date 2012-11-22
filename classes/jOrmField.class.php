<?php 

class jOrmFieldException extends Exception {}

abstract class jOrmField {
    
    protected $_value = NULL;
    
    protected $_mandatory = array();
    protected $_options = array();
    
    function __construct(array $options = array()) {
        $this->_initOptions($options);
        $this->_initMandatory($options);
        $this->setValue($this->_options['default']);
    }
    
    protected function _initOptions ($options) {
        $this->_options = array_merge(array('default' => NULL,
                                            'null' => False,
                                            'primary_key' => False,
                                            'unique' => False,
                                            'verbose_name' => NULL),
                                            $this->_options, $options);
    }
    
    protected function _initMandatories () {
        $this->_mandatory = array_merge(array('db_column'), $this->_mandatory);
        foreach ($this->_mandatory as $option) {
            if (! isset($this->_options[$option])) {
                throw new jOrmFieldException('Missing mandatory options: ' . $option);
            }
        }
    }
    
    function clean() {
    }
    
    function getValue() {
        return $this->_value;
    }
    
    function setValue($value) {
        if ($value === Null && ! $this->_options['null']) {
            throw new jOrmFieldException('Field value could not be null');
        }
        $this->_value = $value;
    }
    
    function __toString() {
        return $this->_value;
    }
}
