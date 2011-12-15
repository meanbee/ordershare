<?php
class Meanbee_OrderShare_Model_Share
{
  public function toOptionArray()
  {
    return array(
      array('value'=>1, 'label'=>Mage::helper('ordershare')->__('CSS 3 Buttons')),
      array('value'=>2, 'label'=>Mage::helper('ordershare')->__('Standard Icons'))
    );
  }
}
