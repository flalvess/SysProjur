<?php
require_once 'classes/modelo/admin/controle/processos/GestaoProcessos.class.php';
require_once 'classes/modelo/admin/controle/processos/GestaoPrimeiraInstancia.class.php';
require_once 'classes/modelo/admin/entidade/distribuicao/DAOTipoDistribuicao.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/base/sistema/Data.class.php';
require_once 'classes/base/interface/DataGuiComp.class.php';
require_once 'classes/base/sistema/CidadeEstadoUtil.class.php';
require_once 'classes/base/sistema/JuizoCidadeUtil.class.php';

class TelaCadProcesso extends ObjectGUI {
    private $processo = null;
    private $segundaInstancia = null;
    private $primeiraInstancia = null;


    public function __construct($processo = null) {
        parent::__construct ( "processos/cadProcesso.tpl" );

        $this->processo = $processo;
    }

    public function setDados($processo, $primeiraInstancia, $segundaInstancia) {
        $this->processo = $processo;
        $this->primeiraInstancia = $primeiraInstancia;
        $this->segundaInstancia = $segundaInstancia;

    }

    public function processAssign() {
        if ($this->processo != NULL) {
            $this->assign ( "actionForm", 'ExecEditProcessoAction' );
            $this->assign ( "processo", $this->processo );
            $this->assign ( "primeiraInstancia", $this->primeiraInstancia );
            $this->assign ( "segundaInstancia", $this->segundaInstancia );
            $modo = DAOTipoDistribuicao::verificaModo();
            $this->assign ( "modoDistribuicao", $modo['modo'] );

        } else {
            $this->assign ( "actionForm", 'ExecCadProcessoAction' );

            $modo = DAOTipoDistribuicao::verificaModo();
            $this->assign ( "modoDistribuicao", $modo['modo'] );

        }


        $this->assign ( "titulo", "Inser��o de Processos" );
        $this->assign ( "optionsPrimeira", GestaoProcessos::getMapPrimeira() );
        $this->assign ( "optionsSegunda", GestaoProcessos::getMapSegunda() );
        //$this->assign ( "optionsEstado", CidadeEstadoUtil::getMapEstado () );
        $this->assign ( "optionsCidade", JuizoCidadeUtil::getMapCidade () );
        $this->assign ( "valueTipoProcesso", array('Concurso', 'Outro') );
        $this->assign ( "outTipoProcesso", array('Concurso', 'Outro') );
        $this->assign ( "valueJustica", array('Estadual', 'Federal', 'Trabalho') );
        $this->assign ( "outJustica", array('Estadual', 'Federal', 'Trabalho') );
        $this->assign ( "valueInstancia", array('1� Instancia', '2� Instancia') );
        $this->assign ( "outInstancia", array('1� Instancia', '2� Instancia') );
        $this->assign ( "valueSituacao", array('Normal', 'Urgente') );
        $this->assign ( "outSituacao", array('Normal', 'Urgente') );
        $this->assign ( "valueTipoSegundaInstancia", array('Origin�rio', 'Derivado') );
        $this->assign ( "outTipoSegundaInstancia", array('Origin�rio', 'Derivado') );
        $this->assign ( "disabled", "disabled" );
        $this->assign ( "valueEstado", array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                '21', '22', '23', '24', '25','26', '27') );

        $this->assign ( "outEstado", array('Acre - AC', 'Alagoas - AL', 'Amap� - AP', 'Amazonas - AM', 'Bahia - BA', 'Cear� - CE', 'Distrito Federal - DF', 'Goi�s - GO', 'Esp�rito Santo - ES', 'Maranh�o - MA', 'Mato Grosso - MT', 'Mato Grosso do Sul - MS', 'Minas Gerais - MG', 'Par� - PA', 'Para�ba - PB', 'Paran� - PR', 'Pernambuco - PE', 'Piau� - PI', 'Rio de Janeiro - RJ', 'Rio Grande do Norte - RN',
                'Rio Grande do Sul - RS', 'Rond�nia - RO', 'Roraima - RR', 'S�o Paulo - SP', 'Santa Catarina - SC','Sergipe - SE', 'Tocantins - TO') );
        

    }
}

?>