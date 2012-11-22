<?php 

jClasses::inc('jorm~jOrmFilter');

class jOrmFilterTest extends PHPUnit_Framework_TestCase {
    
    public function testFilterClone() {
        
        $filter1 = jOrmFilter::create()->add('field1__eq', 'one')->add('field2__eq', 'two');
        
        $filter2 = clone $filter1;
        $filter2->add('field3__le', 'three');
        
        $this->assertNotEquals($filter1, $filter2);
    }

}