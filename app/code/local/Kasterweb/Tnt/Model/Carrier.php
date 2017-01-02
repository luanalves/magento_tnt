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
class Kasterweb_Tnt_Model_Carrier extends Mage_Shipping_Model_Carrier_Abstract implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'kasterweb_tnt';

    public function getAllowedMethods()
    {
        return array(
            $this->_code => $this->getConfigData('name'),
        );
    }

    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        $cep = preg_replace("/[^0-9]/", "", $request->getDestPostcode());
        $peso = $request->getPackageWeight();
        $valor = $request->getPackageValue();


        //$this->_inicialCheck($request);
        $this->_getconfig()->setCepDestino($cep);
        $this->_getconfig()->setPesoReal($peso);
        $this->_getconfig()->setValorMercadoria($valor);

        $result = Mage::getModel('shipping/rate_result');
        $result->append($this->_getDefaultRate());
        return $result;
    }


    protected function _getDefaultRate()
    {
        $consulta = Mage::getModel('kasterweb_tnt/api')->getShipping();
        if (property_exists($consulta->out->errorList, "string") == false) {

            $custo = $consulta->out->vlTotalFrete;
            $prazo = $consulta->out->prazoEntrega;
            $cidade_destino = $consulta->out->nmMunicipioDestino;
            $text = " Prazo de Entrega para " . $cidade_destino . ": " . $prazo . " Dias.";
            $price = $custo;
            $cost = $custo;
        } else {
            $text = $consulta->out->errorList->string;
            $price = '';
            $cost = '';
        }


        // exit;
        $rate = Mage::getModel('shipping/rate_result_method');
        //$api_tnt = Mage::getModel('kasterweb_tnt/api')
        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod($this->_code);
        $rate->setMethodTitle($text);
        $rate->setPrice($price);
        $rate->setCost($cost);
        $rate->setErrorMessage('teste');

        return $rate;
    }

    protected function _inicialCheck(Mage_Shipping_Model_Rate_Request $request)
    {

        $origCountry = Mage::getStoreConfig('shipping/origin/country_id', $this->getStore());
        $destCountry = $request->getDestCountryId();
        if ($origCountry != 'BR' || $destCountry != 'BR') {
            $this->_getconfig()->setLog('Fora da área de entrega');
            return false;
        }

        echo ' <br /> de: ' . str_replace(array('-', '.'), '', trim(Mage::getStoreConfig('shipping/origin/postcode', $this->getStore())));
        echo '<br /> para: ' . str_replace(array('-', '.'), '', trim($request->getDestPostcode()));


        echo '<br />' . number_format($request->getPackageWeight(), 2, '.', '');
        echo '<br />' . number_format($request->getFreeMethodWeight(), 2, '.', '');
        echo '<br />' . number_format($this->_packageValue, 2, ',', '');


        $request->getBaseCurrency()->convert(
            $request->getPackageValue(),
            $request->getPackageCurrency()
        );
    }

    /**
     * Throw error
     *
     * @param string $message Message placeholder
     * @param string $log Message
     * @param string|int $line Line of log
     * @param string $custom Custom variables for placeholder
     *
     * @return void
     */
    protected function _throwError($message, $log = null, $line = 'NO LINE', $custom = null)
    {
        $this->_result = null;
        $this->_result = Mage::getModel('shipping/rate_result');

        $error = Mage::getModel('shipping/rate_result_error');
        $error->setCarrier($this->_code);
        $error->setCarrierTitle($this->getConfigData('title'));

        if (is_null($custom) || $this->getConfigData($message) == '') {
            $this->_getconfig()->setLog($this->_code . ' [' . $line . ']: ' . $log);
            $error->setErrorMessage($this->getConfigData($message));
        } else {
            $this->_getconfig()->setLog($this->_code . ' [' . $line . ']: ' . $log);
            $error->setErrorMessage(sprintf($this->getConfigData($message), $custom));
        }

        $this->_result->append($error);
    }

    protected function _getconfig()
    {
        return Mage::getSingleton('kasterweb_tnt/config');
    }
}
