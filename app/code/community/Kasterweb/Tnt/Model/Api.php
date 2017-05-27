<?php

/**
 * Class Description
 *
 * @package     Kasterweb_Tnt
 * @author      Luan Alves <luan.prog@gmail.com>
 * @copyright   2016 Kasterweb. (http://www.kasterweb.com.br)
 * @license     http://www.kasterweb.com.br  Copyright
 * @link        http://www.kasterweb.com.br
 */
class Kasterweb_Tnt_Model_Api extends Kasterweb_Tnt_Api
{
    function __construct()
    {
        // Mage::log($this->_getconfig()->getUrlWebservice(),null,'info.log');
        $this->setLinkWebservice($this->_getconfig()->getUrlWebservice());
        $this->setConfig($this->_getconfig());
        $this->setDataCarrier($this->getLibConfigCarrier());
    }

    protected function getLibConfigCarrier()
    {
        return Mage::getSingleton('kasterweb_tnt/api_config_carrier');
    }

    protected function getLibConfigUriGeraToken()
    {
        return Mage::getSingleton('kasterweb_tnt/api_config_tokenuri');
    }

    protected function _getconfig()
    {
        return Mage::getSingleton('kasterweb_tnt/config');
    }
}