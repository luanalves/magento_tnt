<?php

class Kasterweb_Tnt_Helper_Data extends Mage_Core_Helper_Abstract {

    public function optionsTaxSituation(){
       return Mage::getSingleton('kasterweb_tnt/config')->getOptionsTaxSituation();
    }

    public function optionsTipoPessoa(){
        return Mage::getSingleton('kasterweb_tnt/config')->getOptionsTipoPessoa();
    }

    public function optionsSendertype(){
        return Mage::getSingleton('kasterweb_tnt/config')->getSendertype();
    }

    public function optionsTipoFrete(){
        return Mage::getSingleton('kasterweb_tnt/config')->getOptionsTipoFrete();
    }

    public function optionsTpServico(){
        return Mage::getSingleton('kasterweb_tnt/config')->getOptionsTipoServico();
    }
}