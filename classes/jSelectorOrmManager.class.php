<?php 

class jSelectorOrmManager extends jSelectorModule {
    protected $_dirname = 'orms';
    protected $_suffix = 'manager.php';
    protected $type = 'ormmanager';
    
    protected function _createCachePath(){
        $this->_cachePath = '';
    }
}
