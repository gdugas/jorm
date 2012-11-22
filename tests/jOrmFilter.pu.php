<?php 

jClasses::inc('jorm~jOrmFilter');

class jOrmFilterTest extends PHPUnit_Framework_TestCase {
    
    public function testFilterClone() {
        
        $filter1 = jOrmFilter::create()->add('field1', 'one')->add('field2', 'two');
        
        $filter2 = clone $filter1;
        $filter2->add('field3', 'three', 'le');
        
        $this->assertNotEquals($filter1, $filter2);
    }

}