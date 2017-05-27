<?php

/**
 * Encapsulate all complexity to access the webservice
 *
 * @package     Kasterweb_Tnt
 * @author      Luan Alves <luan.prog@gmail.com>
 * @copyright   2016 Kasterweb. (http://www.kasterweb.com.br)
 * @license     http://www.kasterweb.com.br  Copyright
 * @link        http://www.kasterweb.com.br
 */
class Kasterweb_Tnt_Api
{
    protected $_config;
    protected $linkWebservice;
    protected $dataCarrier;

    public function getShipping()
    {
        $options = array(
            'soap_version' => SOAP_1_1,
            'exceptions' => true,
            'trace' => 1,
        );
        $client = new SoapClient($this->_getLinkWebservice(), $options);
        try {
            $response = $client->calculaFrete($this->_getData());
            $log = ['Request' => $client->__getLastRequest(), 'Response' => $response];
            $this->_getConfig()->setLog($log);
            return $response;
        } catch (SoapFault $fault) {
            $log = ['Request' => $client->__getLastRequest(), 'Error Message' => $fault->getMessage()];
            $this->_getConfig()->setLog($log);
            return $fault->getMessage();
        }
    }

    protected function _getData()
    {
        return ['in0' => array(
            'cdDivisaoCliente' => $this->dataCarrier->getCdDivisaoCliente(),
            'cepDestino' => $this->dataCarrier->getCepDestion(),
            'cepOrigem' => $this->dataCarrier->getCepOrigem(),
            'login' => $this->dataCarrier->getLogin(),
            'nrIdentifClienteDest' => $this->dataCarrier->getNrIdentifClienteDest(),
            'nrIdentifClienteRem' => $this->dataCarrier->getNrIdentifClienteRem(),
            'nrInscricaoEstadualDestinatario' => $this->dataCarrier->getNrInscricaoEstadualDestinatario(),
            'nrInscricaoEstadualRemetente' => $this->dataCarrier->getNrInscricaoEstadualRemetente(),
            'psReal' => $this->dataCarrier->getPesoReal(),
            'senha' => $this->dataCarrier->getSenha(),
            'tpFrete' => $this->dataCarrier->getTpFrete(),
            'tpPessoaDestinatario' => $this->dataCarrier->getTpPessoaDestinatario(),
            'tpPessoaRemetente' => $this->dataCarrier->getTpPessoaRemetente(),
            'tpServico' => $this->dataCarrier->getTpServico(),
            'tpSituacaoTributariaDestinatario' => $this->dataCarrier->getTpSituacaoTributariaDestinoatario(),
            'tpSituacaoTributariaRemetente' => $this->dataCarrier->getTpSituacaoTributariaRemetente(),
            'vlMercadoria' => $this->dataCarrier->getVlMercadoria()
        )];
    }

    public function setLinkWebservice($link)
    {
        $this->linkWebservice = $link;
    }

    protected function _getLinkWebservice()
    {
        return $this->linkWebservice;
    }

    public function setDataCarrier(Kasterweb_Tnt_Api_ConfigCarrier $data)
    {
        $this->dataCarrier = $data;
    }

    protected function _getDataCarrier()
    {
        return $this->dataCarrier;
    }

    public function setConfig($config)
    {
        $this->_config = $config;
    }

    protected function _getConfig()
    {
        return $this->_config;

    }
}
