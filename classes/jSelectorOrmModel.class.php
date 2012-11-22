<?php 

class jSelectorOrmModel extends jSelectorModule {
    protected $_dirname = 'orms';
    protected $_suffix = 'model.php';
    protected $type = 'ormmodel';
    
    protected function _createCachePath(){
        $this->_cachePath = '';
    }
}
