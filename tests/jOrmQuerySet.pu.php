<?php 

jClasses::inc('jorm~jOrmFilter');
jClasses::inc('jorm~jOrmQuerySet');

class jOrmQuerSetTest extends PHPUnit_Framework_TestCase {
    
    public function testQuerySet() {
        $f = new jOrmFilter();
        $q = new jOrmQuerySet();
        
        $q->all();
        $this->assertEquals($f, $q->getFilter());
        
        $q->filter(jOrmFilter::create()->add('field1', 'one'));
        $this->assertNotEquals($f, $q->getFilter());
    }

    public function testQuerySetClone() {
        $q1 = new jOrmQuerySet();
        $q1->all();
        
        $q2 = clone $q1;
        $q2->filter(jOrmFilter::create()->add('field1', 'one'));
        $this->assertNotEquals($q1, $q2);
    }
}
