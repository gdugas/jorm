<?php 

class jSelectorOrmDriver extends jSelectorModule {
    protected $_dirname = 'orms';
    protected $_suffix = 'driver.php';
    protected $type = 'ormdriver';
    
    protected function _createCachePath(){
        $this->_cachePath = '';
    }
}
