<?php 

class jOrm {
    
    public static function getDriver($selector) {
        if (is_string($selector)) {
            $selector = new jSelectorOrmDriver($selector);
        }
        require_once($selector->getPath());
        
        $classname = $selector->resource . 'OrmDriver';
        return new $classname();
    }
    
    public static function getField($selector, array $options = array()) {
        if (is_string($selector)) {
            $selector = new jSelectorOrmField($selector);
        }
        require_once($selector->getPath());
        
        $classname = $selector->resource . 'OrmField';
        return new $classname($options);
    }
    
    public static function getManager($selector) {
        if (is_string($selector)) {
            $selector = new jSelectorOrmManager($selector);
        }
        require_once($selector->getPath());
        
        $classname = $selector->resource . 'OrmManager';
        return new $classname();
    }
    
    public static function getModel($selector, array $fields = array()) {
        if (is_string($selector)) {
            $selector = new jSelectorOrmModel($selector);
        }
        require_once($selector->getPath());
        
        $classname = $selector->resource . 'OrmModel';
        return new $classname($fields);
    }
}
