<?php
require_once 'classes/modelo/admin/controle/processos/GestaoProcessos.class.php';
require_once 'classes/modelo/admin/controle/processos/GestaoPrimeiraInstancia.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/base/sistema/Data.class.php';
require_once 'classes/base/interface/DataGuiComp.class.php';
require_once 'classes/base/sistema/CidadeEstadoUtil.class.php';
require_once 'classes/base/sistema/JuizoCidadeUtil.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/modelo/admin/controle/movimentacoes/GestaoMovimentacao.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/UsuarioInfo.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/ProcessoPessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOProcessoPessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/Pessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';


class TelaOpenProcesso extends ObjectGUI {
    private $processo = null;
    private $segundaInstancia = null;
    private $primeiraInstancia = null;
    private $area = null;
    private $numero = null;

    public function __construct($processo = null) {
        parent::__construct ( "processos/openProcesso.tpl" );

        $this->processo = $processo;
    }

    public function setDados($processo, $primeiraInstancia, $segundaInstancia) {
        $this->processo = $processo;
        $this->primeiraInstancia = $primeiraInstancia;
        $this->segundaInstancia = $segundaInstancia;

    }

    public function setArea($area) {
        $this->area = $area;

    }



    public function processAssign() {

        $procurador = DAOProcesso::nomeProcurador($this->processo['fkUsuario']);
        if (count ( $procurador ) > 0) {
            foreach ( $procurador as $nome ) {
                $name = $nome['nome'];
            }
        }

        $numeroProcesso = DAOProcesso::numeroProcesso($this->processo['idProcesso']);

        $pessoas = DAOProcesso::buscarPessoas($this->processo['idProcesso'], 'Representada');

        $checkMovimentacao = DAOProcesso::buscaMovimentacaoProcesso($this->processo['idProcesso']);

        if ($this->processo != NULL) {
            $this->assign ( "actionForm", 'ExecEditProcessoAction' );
            $this->assign ( "processo", $this->processo );
            $this->assign ( "primeiraInstancia", $this->primeiraInstancia );
            $this->assign ( "segundaInstancia", $this->segundaInstancia );
            $this->assign ( "procurador", $name);
            $this->assign ( "existeMovimentacao", $checkMovimentacao);
            $this->assign ( "area", $this->area);
            $this->assign ( "numeroProcesso", $numeroProcesso['numeroProcesso']);
            //$this->assign ( "pessoa", $individuo);
            $this->assign ( "pessoa", $pessoas);
            $this->assign ( "cor", array('#f2f0fd','white'));

            $this->assign ( "optionsOrdem", GestaoMovimentacao::getCamposOrdemLista ( TRUE ) );
            $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );

        }


        $this->assign ( "titulo", "Inserчуo de Processos" );

        $this->assign ( "optionsPrimeira", GestaoProcessos::getMapPrimeira() );
        $this->assign ( "optionsSegunda", GestaoProcessos::getMapSegunda() );
        $this->assign ( "optionsCidade", JuizoCidadeUtil::getMapCidade () );
        $this->assign ( "valueTipoProcesso", array('Concurso', 'Outro') );
        $this->assign ( "outTipoProcesso", array('Concurso', 'Outro') );
        $this->assign ( "valueJustica", array('Estadual', 'Federal', 'Trabalho') );
        $this->assign ( "outJustica", array('Estadual', 'Federal', 'Trabalho') );
        $this->assign ( "valueInstancia", array('1К Instancia', '2К Instancia') );
        $this->assign ( "outInstancia", array('1К Instancia', '2К Instancia') );
        $this->assign ( "valueSituacao", array('Normal', 'Urgente') );
        $this->assign ( "outSituacao", array('Normal', 'Urgente') );
        $this->assign ( "valueTipoSegundaInstancia", array('Originсrio', 'Derivado') );
        $this->assign ( "outTipoSegundaInstancia", array('Originсrio', 'Derivado') );

    }
}

?>