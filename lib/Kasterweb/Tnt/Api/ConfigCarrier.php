<?php

/**
 * Encapsulate all complexity to access the webservice
 *
 * @package     Kasterweb TNT Mercúrio
 * @author      Luan Alves <luan.prog@gmail.com>
 * @copyright   2016 Kasterweb. (http://www.kasterweb.com.br)
 * @license     http://www.kasterweb.com.br  Copyright
 * @link        http://www.kasterweb.com.br
 */
interface Kasterweb_Tnt_Api_ConfigCarrier
{
    public function getCdDivisaoCliente();

    public function getCepDestion();

    public function getCepOrigem();

    public function getLogin();

    public function getNrIdentifClienteDest();

    public function getNrIdentifClienteRem();

    public function getNrInscricaoEstadualDestinatario();

    public function getNrInscricaoEstadualRemetente();

    public function getPesoReal();

    public function getSenha();

    public function getTpFrete();

    public function getTpPessoaDestinatario();

    public function getTpPessoaRemetente();

    public function getTpServico();

    public function getTpSituacaoTributariaDestinoatario();

    public function getTpSituacaoTributariaRemetente();

    public function getVlMercadoria();
}