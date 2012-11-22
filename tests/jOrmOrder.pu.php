<?php 

jClasses::inc('jorm~jOrmOrder');

class jOrmOrderTest extends PHPUnit_Framework_TestCase {
    
    public function testOrderClone() {
        
        $order1 = jOrmOrder::create()
                    ->add('field1')
                    ->add('field2', 'DESC')
                    ->add('field3', 'ASC');
        
        $order2 = clone $order1;
        $order2->add('field4');
        $this->assertNotEquals($order1, $order2);
    }

}