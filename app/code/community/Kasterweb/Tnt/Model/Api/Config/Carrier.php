<?php

/**
 *
 * @package     Kasterweb_Tnt
 * @author      Luan Alves <luan.prog@gmail.com>
 * @copyright   2016 Kasterweb (http://www.kasterweb.com.br)
 * @license     http://www.kasterweb.com.br  Copyright
 * @link        http://www.kasterweb.com.br
 */
class Kasterweb_Tnt_Model_Api_Config_Carrier implements Kasterweb_Tnt_Api_ConfigCarrier
{

    public function getCdDivisaoCliente()
    {
        return $this->_getconfig()->getDivisaoCliente();
    }

    public function getCepDestion()
    {
        return $this->_getconfig()->getCepDestino();
    }

    public function getCepOrigem()
    {
        return $this->_getconfig()->getStorePoscode();
    }

    public function getLogin()
    {
        return $this->_getconfig()->getLoginEmpresa();
    }

    public function getNrIdentifClienteDest()
    {
        return '0';
    }

    public function getNrIdentifClienteRem()
    {
        return $this->_getconfig()->getIdentificadorRemetente();
    }

    public function getNrInscricaoEstadualDestinatario()
    {
        return '';
    }

    public function getNrInscricaoEstadualRemetente()
    {
        return $this->_getconfig()->getInscricaoEstadualRemetente();
    }

    public function getPesoReal()
    {
        return $this->_getconfig()->getPesoReal();
    }

    public function getSenha()
    {
        return '';
    }

    public function getTpFrete()
    {
        return $this->_getconfig()->getTipoFrete();
    }

    public function getTpPessoaDestinatario()
    {
        return 'F';
    }

    public function getTpPessoaRemetente()
    {
        return $this->_getconfig()->getTipoPessoaRemetente();
    }

    public function getTpServico()
    {
        return $this->_getconfig()->getTipoServico();
    }

    public function getTpSituacaoTributariaDestinoatario()
    {
        return '';
    }

    public function getTpSituacaoTributariaRemetente()
    {
       return $this->_getconfig()->getModuleSituacaoTributariaRemetente();
    }

    public function getVlMercadoria()
    {
        return $this->_getconfig()->getValorMercadoria();
    }

    protected function _getconfig()
    {
        return Mage::getSingleton('kasterweb_tnt/config');
    }
}