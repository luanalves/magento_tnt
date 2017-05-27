<?php

class Kasterweb_Tnt_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction()
    {
        var_dump($this->_getConfig()->getUrlWebservice());

    }

    protected function _getConfig()
    {
        return Mage::getSingleton('kasterweb_tnt/config');
    }

}