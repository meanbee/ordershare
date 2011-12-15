<?php
class Meanbee_OrderShare_Block_OrderShare extends Mage_Checkout_Block_Onepage_Success {
    public function getOrder() {
        return Mage::getModel('sales/order')->loadByIncrementId($this->getOrderId());    
    }

    public function getOrderedProduct($ordered_product) {
        return Mage::getModel('catalog/product')->load($ordered_product->getProductId());
    }

    public function getTwitterUser() {
        return trim(Mage::getStoreConfig('ordershare/twitter/username'));
    }

    public function getTwitterUrl($_twitter_text, $_product) {
        $_twitter_user = $this->getTwitterUser();
        $_twitter_url = "http://twitter.com/share?text=" .  urlencode ( $_twitter_text .  " from " . Mage::getStoreConfig('general/store_information/name')) . "&url=" . $_product->getProductUrl();
        if ($_twitter_user != "") {
            $_twitter_url .=  "&via=" . $_twitter_user;
        }

        return $_twitter_url;
    }

    public function getFacebookUrl($_product) {
        return "http://facebook.com/sharer.php?u=" .  rawurlencode($_product->getProductUrl()) . '&t=' .  rawurlencode(Mage::getStoreConfig('general/store_information/name') .  ' | ' . $_product->getName());
    }

    public function isUsingCSS3Icons() { 
        return Mage::getStoreConfig('ordershare/design/style');
    }

    public function getStoreName() {
        return Mage::getStoreConfig('general/store_information/name');
    }
}
