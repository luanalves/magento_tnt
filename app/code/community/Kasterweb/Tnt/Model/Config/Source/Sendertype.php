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

class Kasterweb_Tnt_Model_Config_Source_Sendertype
{
    protected $_options;

    public function toOptionArray()
    {
        $options = Mage::helper('kasterweb_tnt')->optionsSendertype();
        return $options;
    }
}
