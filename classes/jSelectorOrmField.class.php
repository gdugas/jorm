<?php 

class jSelectorOrmField extends jSelectorModule {
    protected $_dirname = 'orms';
    protected $_suffix = 'field.php';
    protected $type = 'ormfield';
    
    protected function _createCachePath(){
        $this->_cachePath = '';
    }
}
