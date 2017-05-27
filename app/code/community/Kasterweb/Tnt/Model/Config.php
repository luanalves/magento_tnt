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
class Kasterweb_Tnt_Model_Config
{
    protected $cepdestino;
    protected $pesoreal;
    protected $valormercadoria;


    //default config.xml
    const XML_FILE_LOG = 'kasterweb_tnt/general/file_log';

    //core_config_data
    const PATH_MODULE_LOGIN_EMPRESA = 'carriers/kasterweb_tnt/login_empresa';
    const PATH_MODULE_LINKWEBSERVICE = 'carriers/kasterweb_tnt/link_webservice';
    const PATH_MODULE_TIPOPESSOA = 'carriers/kasterweb_tnt/tipo_pessoa';
    const PATH_MODULE_DIVISAOCLIENTE = 'carriers/kasterweb_tnt/divisao_cliente';
    const STORE_POSTCODE = 'shipping/origin/postcode';
    const PATH_MODULE_TIPOFRETE = 'carriers/kasterweb_tnt/tipo_frete';
    const PATH_MODULE_SITUACAOTRIBUTARIA = 'carriers/kasterweb_tnt/situacaotributaria';
    const PATH_MODULE_INSCESTADUAL = 'carriers/kasterweb_tnt/insc_estadual';
    const PATH_MODULE_TPSERVICO = 'carriers/kasterweb_tnt/tp_servico';
    const PATH_IDENT_CLIENTE = 'carriers/kasterweb_tnt/ident_cliente';

    public function getOptionsTaxSituation()
    {
        return $options = array(
            array('value' => 'CO', 'label' => 'Contribuinte'),
            array('value' => 'NC', 'label' => 'Não Contribuinte'),
            array('value' => 'CI', 'label' => 'Contrib Incentivado'),
            // array('value' => 'CM', 'label' => 'Contrib Incentivado'),
            array('value' => 'CN', 'label' => 'Cia Mista Não Contribuinte'),
            array('value' => 'ME', 'label' => 'ME / EPP / Simples Nacional Contribuinte'),
            array('value' => 'MN', 'label' => 'ME / EPP / Simples Nacional Não Contribuinte'),
            array('value' => 'PR', 'label' => 'Produtor Rural Contribuinte'),
            array('value' => 'PN', 'label' => 'Produtor Rural Não Contribuinte'),
            array('value' => 'OP', 'label' => 'Órgão Público Contribuinte'),
            array('value' => 'ON', 'label' => 'Órgão Público Não Contribuinte'),
            array('value' => 'OF', 'label' => 'Órgão Público - Programas de fortalecimento e modernização Estadual')
        );
    }

    public function getOptionsTipoPessoa()
    {
        return $options = array(
            array('value' => 'F', 'label' => 'Física'),
            array('value' => 'J', 'label' => 'Jurídica'),
        );
    }

    public function getOptionsTipoFrete()
    {
        return $options = array(
            array('value' => 'C', 'label' => 'CIF'),
            array('value' => 'F', 'label' => 'FOB'),
        );
    }

    public function getOptionsTipoServico()
    {
        return $options = array(
            array('value' => 'RNC', 'label' => 'Rodoviário Nacional'),
            array('value' => 'ANC', 'label' => 'Aéreo Nacional'),
        );
    }

    public function getSendertype()
    {
        return $options = array(
            array('value' => 'CGC', 'label' => 'CGC'),
            array('value' => 'CPF', 'label' => 'CPF'),
        );
    }

    public function getCnpjEmpresa()
    {
        return preg_replace('/[^0-9\s]/', '', Mage::getStoreConfig(self::PATH_MODULE_CNPJ, Mage::app()->getStore()->getStoreId()));
    }

    public function getUrlWebservice()
    {
        return Mage::getStoreConfig(self::PATH_MODULE_LINKWEBSERVICE, Mage::app()->getStore()->getStoreId());
    }

    public function getLoginEmpresa()
    {
        return Mage::getStoreConfig(self::PATH_MODULE_LOGIN_EMPRESA, Mage::app()->getStore()->getStoreId());
    }

    public function getIdentificadorRemetente()
    {
        return Mage::getStoreConfig(self::PATH_IDENT_CLIENTE, Mage::app()->getStore()->getStoreId());
    }

    public function getTipoServico()
    {
        return Mage::getStoreConfig(self::PATH_MODULE_TPSERVICO, Mage::app()->getStore()->getStoreId());
    }

    public function getInscricaoEstadualRemetente()
    {
        return Mage::getStoreConfig(self::PATH_MODULE_INSCESTADUAL, Mage::app()->getStore()->getStoreId());
    }

    public function getModuleSituacaoTributariaRemetente()
    {
        return Mage::getStoreConfig(self::PATH_MODULE_SITUACAOTRIBUTARIA, Mage::app()->getStore()->getStoreId());
    }

    public function getTipoFrete()
    {
        return Mage::getStoreConfig(self::PATH_MODULE_TIPOFRETE, Mage::app()->getStore()->getStoreId());
    }

    public function getStorePoscode()
    {
        return Mage::getStoreConfig(self::STORE_POSTCODE, Mage::app()->getStore()->getStoreId());
    }

    public function getTipoPessoaRemetente()
    {
        return Mage::getStoreConfig(self::PATH_MODULE_TIPOPESSOA, Mage::app()->getStore()->getStoreId());
    }

    public function getDivisaoCliente()
    {
        return Mage::getStoreConfig(self::PATH_MODULE_DIVISAOCLIENTE, Mage::app()->getStore()->getStoreId());
    }

    public function setCepDestino($cep)
    {
        $this->cepdestino = $cep;
    }

    public function getCepDestino()
    {
        return $this->cepdestino;
    }

    public function setPesoReal($peso)
    {
        $this->pesoreal = $peso;
    }

    public function getPesoReal()
    {
        return $this->pesoreal;
    }

    public function setValorMercadoria($valor)
    {
        $this->valormercadoria = $valor;
    }

    public function getValorMercadoria()
    {
        return $this->valormercadoria;
    }

    public function setLog($message)
    {
        $data = array('memory usage' => round(memory_get_usage() / 1048576, 2) . '' . ' MB', 'time' => date('d/m/Y H:m:s'));

        if (is_array($message)) {
            $message = array_merge($data, $message);
        } else {
            $message = array_merge($data, array($message));
        }
        Mage::log(print_r($message, 1), null, $this->_getFileLog(self::XML_FILE_LOG));
    }

    public function getModelCatalogProduct()
    {
        return Mage::getModel('catalog/product');
    }

    public function setSessionError($log)
    {
        $this->_getSessionLog()->addError($log);
    }

    public function setSessionSuccess($log)
    {
        $this->_getSessionLog()->addSuccess($log);
    }

    protected function _getSessionLog()
    {
        return Mage::getSingleton('core/session');
    }

    protected function _getFileLog($path)
    {
        return Mage::getStoreConfig($path);
    }
}