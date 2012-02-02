<?php
require_once 'classes/base/controle/ApplicationManagerAbstract.class.php';
require_once ("classes/base/controle/MapAction.class.php");
require_once ("classes/base/controle/filtros/SQLInjectionFilter.class.php");
require_once ("classes/base/controle/filtros/SessionFilter.class.php");
require_once ("classes/base/controle/filtros/PermissionActionFilter.class.php");
require_once ("classes/base/controle/filtros/UTF8Filter.class.php");
require_once ("classes/base/controle/filtros/HTMLFilter.class.php");

class ApplicationManagerAdmin extends ApplicationManagerAbstract {
    public function initRequestFilters() {
        self::addFilter ( "SQLInjectionFilter", "SQLInjectionFilterException", "MensagemAction" );
        self::addFilter ( "SessionFilter", "SessionFilterException", "MensagemAction" );
        self::addFilter ( "PermissionActionFilter", "PermissionActionFilterException", "MensagemAction" );
        self::addFilter ( "UTF8Filter", "", "" );
        self::addFilter ( "HTMLFilter", "", "" );
    }

    public function initMapActions() {

        MapAction::addAction ( "UploadArquivoAction", "classes/modelo/admin/controle/admin/UploadArquivoAction.class.php" );
        MapAction::addAction ( "RemoveTempFileAction", "classes/modelo/admin/controle/admin/RemoveTempFileAction.class.php" );

        //Controle de Acesso
        MapAction::addAction ( "MensagemAction", "classes/base/controle/MensagemAction.class.php" );
        MapAction::addAction ( "FazerLoginAction", "classes/modelo/admin/controle/controle_acesso/FazerLoginAction.class.php" );
        MapAction::addAction ( "FazerLogoffAction", "classes/modelo/admin/controle/controle_acesso/FazerLogoffAction.class.php" );
        MapAction::addAction ( "InitIndexAction", "classes/modelo/admin/controle/controle_acesso/InitIndexAction.class.php" );
        MapAction::addAction ( "LoadCidadesAction", "classes/modelo/admin/controle/admin/LoadCidadesAction.class.php" );
        MapAction::addAction ( "LoadJuizosAction", "classes/modelo/admin/controle/admin/LoadJuizosAction.class.php" );

        //Gestao de Usuarios
        MapAction::addAction ( "InitCadUsuarioAction", "classes/modelo/admin/controle/usuarios/InitCadUsuarioAction.class.php" );
        MapAction::addAction ( "ExecCadUsuarioAction", "classes/modelo/admin/controle/usuarios/ExecCadUsuarioAction.class.php" );
        MapAction::addAction ( "InitListUsuarioAction", "classes/modelo/admin/controle/usuarios/InitListUsuarioAction.class.php" );
        MapAction::addAction ( "ExecListUsuariosAction", "classes/modelo/admin/controle/usuarios/ExecListUsuariosAction.class.php" );
        MapAction::addAction ( "InitEditUsuarioAction", "classes/modelo/admin/controle/usuarios/InitEditUsuarioAction.class.php" );
        MapAction::addAction ( "ExecEditUsuarioAction", "classes/modelo/admin/controle/usuarios/ExecEditUsuarioAction.class.php" );
        MapAction::addAction ( "MudaStatusUsuarioAction", "classes/modelo/admin/controle/usuarios/MudaStatusUsuarioAction.class.php" );
        MapAction::addAction ( "ExecDelUsuariosAction", "classes/modelo/admin/controle/usuarios/ExecDelUsuariosAction.class.php" );
        MapAction::addAction ( "GerenciarPermissoesUsuarioAction", "classes/modelo/admin/controle/usuarios/GerenciarPermissoesUsuarioAction.class.php" );
        MapAction::addAction ( "UpdateFluxosAction", "classes/modelo/admin/controle/usuarios/UpdateFluxosAction.class.php" );
        MapAction::addAction ( "UpdateGruposAction", "classes/modelo/admin/controle/usuarios/UpdateGruposAction.class.php" );
        MapAction::addAction ( "InitListUsuarioAtualAction", "classes/modelo/admin/controle/usuarios/InitListUsuarioAtualAction.class.php" );
        MapAction::addAction ( "ExecListUsuariosAtualAction", "classes/modelo/admin/controle/usuarios/ExecListUsuariosAtualAction.class.php" );
        MapAction::addAction ( "AutoCompleteUsuariosAction", "classes/modelo/admin/controle/usuarios/AutoCompleteUsuariosAction.class.php" );

//        //Gestao de Impetrados
//        MapAction::addAction ( "InitCadImpetradoAction", "classes/modelo/admin/controle/impetrados/InitCadImpetradoAction.class.php" );
//        MapAction::addAction ( "ExecCadImpetradoAction", "classes/modelo/admin/controle/impetrados/ExecCadImpetradoAction.class.php" );
//        MapAction::addAction ( "InitListImpetradoAction", "classes/modelo/admin/controle/impetrados/InitListImpetradoAction.class.php" );
//        MapAction::addAction ( "ExecListImpetradosAction", "classes/modelo/admin/controle/impetrados/ExecListImpetradosAction.class.php" );
//        MapAction::addAction ( "InitEditImpetradoAction", "classes/modelo/admin/controle/impetrados/InitEditImpetradoAction.class.php" );
//        MapAction::addAction ( "ExecEditImpetradoAction", "classes/modelo/admin/controle/impetrados/ExecEditImpetradoAction.class.php" );
//        MapAction::addAction ( "MudaStatusImpetradoAction", "classes/modelo/admin/controle/impetrados/MudaStatusImpetradoAction.class.php" );
//        MapAction::addAction ( "ExecDelImpetradosAction", "classes/modelo/admin/controle/impetrados/ExecDelImpetradosAction.class.php" );
//        MapAction::addAction ( "AutoCompleteImpetradosAction", "classes/modelo/admin/controle/impetrados/AutoCompleteImpetradosAction.class.php" );
//        MapAction::addAction ( "InitCadCarregamentoAction", "classes/modelo/admin/controle/impetrados/InitCadCarregamentoAction.class.php" );

//        //Gestao de ParteContraria
//        MapAction::addAction ( "InitCadParteContrariaAction", "classes/modelo/admin/controle/parte_contraria/InitCadParteContrariaAction.class.php" );
//        MapAction::addAction ( "ExecCadParteContrariaAction", "classes/modelo/admin/controle/parte_contraria/ExecCadParteContrariaAction.class.php" );
//        MapAction::addAction ( "InitListParteContrariaAction", "classes/modelo/admin/controle/parte_contraria/InitListParteContrariaAction.class.php" );
//        MapAction::addAction ( "ExecListParteContrariaAction", "classes/modelo/admin/controle/parte_contraria/ExecListParteContrariaAction.class.php" );
//        MapAction::addAction ( "InitEditParteContrariaAction", "classes/modelo/admin/controle/parte_contraria/InitEditParteContrariaAction.class.php" );
//        MapAction::addAction ( "ExecEditParteContrariaAction", "classes/modelo/admin/controle/parte_contraria/ExecEditParteContrariaAction.class.php" );
//        MapAction::addAction ( "MudaStatusParteContrariaAction", "classes/modelo/admin/controle/parte_contraria/MudaStatusParteContrariaAction.class.php" );
//        MapAction::addAction ( "ExecDelParteContrariaAction", "classes/modelo/admin/controle/parte_contraria/ExecDelParteContrariaAction.class.php" );
//        MapAction::addAction ( "AutoCompleteParteContrariaAction", "classes/modelo/admin/controle/parte_contraria/AutoCompleteParteContrariaAction.class.php" );
//        MapAction::addAction ( "InitCadCarregamentoAction", "classes/modelo/admin/controle/parte_contraria/InitCadCarregamentoAction.class.php" );

        //Gestao de Movimentacaos
        MapAction::addAction ( "InitCadMovimentacaoAction", "classes/modelo/admin/controle/movimentacoes/InitCadMovimentacaoAction.class.php" );
        MapAction::addAction ( "ExecCadMovimentacaoAction", "classes/modelo/admin/controle/movimentacoes/ExecCadMovimentacaoAction.class.php" );
        MapAction::addAction ( "InitListMovimentacaoAction", "classes/modelo/admin/controle/movimentacoes/InitListMovimentacaoAction.class.php" );
        MapAction::addAction ( "ExecListMovimentacaoAction", "classes/modelo/admin/controle/movimentacoes/ExecListMovimentacaoAction.class.php" );
        MapAction::addAction ( "InitEditMovimentacaoAction", "classes/modelo/admin/controle/movimentacoes/InitEditMovimentacaoAction.class.php" );
        MapAction::addAction ( "ExecEditMovimentacaoAction", "classes/modelo/admin/controle/movimentacoes/ExecEditMovimentacaoAction.class.php" );
        MapAction::addAction ( "ExecDelMovimentacaoAction", "classes/modelo/admin/controle/movimentacoes/ExecDelMovimentacaoAction.class.php" );

        //Gestao de Processos
        MapAction::addAction ( "InitCadProcessoAction", "classes/modelo/admin/controle/processos/InitCadProcessoAction.class.php" );
        MapAction::addAction ( "ExecCadProcessoAction", "classes/modelo/admin/controle/processos/ExecCadProcessoAction.class.php" );
        MapAction::addAction ( "InitListProcessoAction", "classes/modelo/admin/controle/processos/InitListProcessoAction.class.php" );
        MapAction::addAction ( "InitListProcessoSemCienteAction", "classes/modelo/admin/controle/processos/semCiente/InitListProcessoSemCienteAction.class.php" );
        MapAction::addAction ( "InitListProcessoAExecutarAction", "classes/modelo/admin/controle/processos/aExecutar/InitListProcessoAExecutarAction.class.php" );
        MapAction::addAction ( "InitListMeusProcessosAction", "classes/modelo/admin/controle/processos/meusProcessos/InitListMeusProcessosAction.class.php" );
        MapAction::addAction ( "ExecListProcessosAction", "classes/modelo/admin/controle/processos/ExecListProcessosAction.class.php" );
        MapAction::addAction ( "ExecListProcessosSemCienteAction", "classes/modelo/admin/controle/processos/semCiente/ExecListProcessosSemCienteAction.class.php" );
        MapAction::addAction ( "ExecListProcessosAExecutarAction", "classes/modelo/admin/controle/processos/aExecutar/ExecListProcessosAExecutarAction.class.php" );
        MapAction::addAction ( "ExecListMeusProcessosAction", "classes/modelo/admin/controle/processos/meusProcessos/ExecListMeusProcessosAction.class.php" );
        MapAction::addAction ( "InitEditProcessoAction", "classes/modelo/admin/controle/processos/InitEditProcessoAction.class.php" );
        MapAction::addAction ( "InitEditModoDistribuicaoAction", "classes/modelo/admin/controle/processos/distribuicao/InitEditModoDistribuicaoAction.class.php" );
        MapAction::addAction ( "InitOpenProcessoAction", "classes/modelo/admin/controle/processos/InitOpenProcessoAction.class.php" );
        MapAction::addAction ( "ExecEditProcessoAction", "classes/modelo/admin/controle/processos/ExecEditProcessoAction.class.php" );
        MapAction::addAction ( "ExecEditModoDistribuicaoAction", "classes/modelo/admin/controle/processos/distribuicao/ExecEditModoDistribuicaoAction.class.php" );
        MapAction::addAction ( "ExecDelProcessosAction", "classes/modelo/admin/controle/processos/ExecDelProcessosAction.class.php" );
        MapAction::addAction ( "AutoCompletePrimeiraInstanciaAction", "classes/modelo/admin/controle/processos/AutoCompletePrimeiraInstanciaAction.class.php" );
        MapAction::addAction ( "AutoCompleteProcessosAction", "classes/modelo/admin/controle/processos/AutoCompleteProcessosAction.class.php" );

        //Gestao de procuradores
        MapAction::addAction ( "AutoCompleteProcuradorAction", "classes/modelo/admin/controle/procurador/AutoCompleteProcuradorAction.class.php" );
        MapAction::addAction ( "InitCadCarregamentoAction", "classes/modelo/admin/controle/procurador/InitCadCarregamentoAction.class.php" );

        //Gestao de Juizos
        MapAction::addAction ( "InitCadJuizoAction", "classes/modelo/admin/controle/juizos/InitCadJuizoAction.class.php" );
        MapAction::addAction ( "ExecCadJuizoAction", "classes/modelo/admin/controle/juizos/ExecCadJuizoAction.class.php" );
        MapAction::addAction ( "InitListJuizoAction", "classes/modelo/admin/controle/juizos/InitListJuizoAction.class.php" );
        MapAction::addAction ( "ExecListJuizosAction", "classes/modelo/admin/controle/juizos/ExecListJuizosAction.class.php" );
        MapAction::addAction ( "InitEditJuizoAction", "classes/modelo/admin/controle/juizos/InitEditJuizoAction.class.php" );
        MapAction::addAction ( "ExecEditJuizoAction", "classes/modelo/admin/controle/juizos/ExecEditJuizoAction.class.php" );
        MapAction::addAction ( "MudaStatusJuizoAction", "classes/modelo/admin/controle/juizos/MudaStatusJuizoAction.class.php" );
        MapAction::addAction ( "ExecDelJuizosAction", "classes/modelo/admin/controle/juizos/ExecDelJuizosAction.class.php" );
        MapAction::addAction ( "InitCadCarregamentoAction", "classes/modelo/admin/controle/juizos/InitCadCarregamentoAction.class.php" );

        //Gestao de Atividades
        MapAction::addAction ( "InitCadAtividadeAction", "classes/modelo/admin/controle/atividades/InitCadAtividadeAction.class.php" );
        MapAction::addAction ( "ExecCadAtividadeAction", "classes/modelo/admin/controle/atividades/ExecCadAtividadeAction.class.php" );
        MapAction::addAction ( "InitListAtividadeAction", "classes/modelo/admin/controle/atividades/InitListAtividadeAction.class.php" );
        MapAction::addAction ( "InitListEnvAtividadeAction", "classes/modelo/admin/controle/atividades/InitListEnvAtividadeAction.class.php" );
        MapAction::addAction ( "InitListRecAtividadeAction", "classes/modelo/admin/controle/atividades/InitListRecAtividadeAction.class.php" );
        MapAction::addAction ( "ExecListAtividadeAction", "classes/modelo/admin/controle/atividades/ExecListAtividadeAction.class.php" );
        MapAction::addAction ( "ExecListEnvAtividadeAction", "classes/modelo/admin/controle/atividades/ExecListEnvAtividadeAction.class.php" );
        MapAction::addAction ( "ExecListRecAtividadeAction", "classes/modelo/admin/controle/atividades/ExecListRecAtividadeAction.class.php" );
        MapAction::addAction ( "InitEditAtividadeAction", "classes/modelo/admin/controle/atividades/InitEditAtividadeAction.class.php" );
        MapAction::addAction ( "ExecEditAtividadeAction", "classes/modelo/admin/controle/atividades/ExecEditAtividadeAction.class.php" );
        MapAction::addAction ( "ExecDelAtividadeAction", "classes/modelo/admin/controle/atividades/ExecDelAtividadeAction.class.php" );	
		
	//Gestao de Pessoas
        MapAction::addAction ( "InitCadPessoaAction", "classes/modelo/admin/controle/pessoas/InitCadPessoaAction.class.php" );
        MapAction::addAction ( "ExecCadPessoaAction", "classes/modelo/admin/controle/pessoas/ExecCadPessoaAction.class.php" );
        MapAction::addAction ( "InitListPessoaAction", "classes/modelo/admin/controle/pessoas/InitListPessoaAction.class.php" );
        MapAction::addAction ( "ExecListPessoasAction", "classes/modelo/admin/controle/pessoas/ExecListPessoasAction.class.php" );
        MapAction::addAction ( "InitEditPessoaAction", "classes/modelo/admin/controle/pessoas/InitEditPessoaAction.class.php" );
        MapAction::addAction ( "ExecEditPessoaAction", "classes/modelo/admin/controle/pessoas/ExecEditPessoaAction.class.php" );
        MapAction::addAction ( "MudaStatusPessoaAction", "classes/modelo/admin/controle/pessoas/MudaStatusPessoaAction.class.php" );
        MapAction::addAction ( "ExecDelPessoasAction", "classes/modelo/admin/controle/pessoas/ExecDelPessoasAction.class.php" );
        MapAction::addAction ( "AutoCompletePartesAction", "classes/modelo/admin/controle/pessoas/AutoCompletePartesAction.class.php" );
        MapAction::addAction ( "AutoCompletePessoasAction", "classes/modelo/admin/controle/pessoas/AutoCompletePessoasAction.class.php" );
        MapAction::addAction ( "InitCadCarregamentoAction", "classes/modelo/admin/controle/pessoas/InitCadCarregamentoAction.class.php" );

        //Gestao de Cidades
        MapAction::addAction ( "InitCadCidadeAction", "classes/modelo/admin/controle/cidades/InitCadCidadeAction.class.php" );
        MapAction::addAction ( "ExecCadCidadeAction", "classes/modelo/admin/controle/cidades/ExecCadCidadeAction.class.php" );
        MapAction::addAction ( "InitListCidadeAction", "classes/modelo/admin/controle/cidades/InitListCidadeAction.class.php" );
        MapAction::addAction ( "ExecListCidadesAction", "classes/modelo/admin/controle/cidades/ExecListCidadesAction.class.php" );
        MapAction::addAction ( "InitEditCidadeAction", "classes/modelo/admin/controle/cidades/InitEditCidadeAction.class.php" );
        MapAction::addAction ( "ExecEditCidadeAction", "classes/modelo/admin/controle/cidades/ExecEditCidadeAction.class.php" );
        MapAction::addAction ( "ExecDelCidadesAction", "classes/modelo/admin/controle/cidades/ExecDelCidadesAction.class.php" );

        //Gestao de Assuntos
       // MapAction::addAction ( "InitCadCidadeAction", "classes/modelo/admin/controle/cidades/InitCadCidadeAction.class.php" );
       // MapAction::addAction ( "ExecCadCidadeAction", "classes/modelo/admin/controle/cidades/ExecCadCidadeAction.class.php" );
        MapAction::addAction ( "InitListAssuntoAction", "classes/modelo/admin/controle/assunto/InitListAssuntoAction.class.php" );
        MapAction::addAction ( "ExecListAssuntoAction", "classes/modelo/admin/controle/assunto/ExecListAssuntoAction.class.php" );
        //MapAction::addAction ( "InitEditCidadeAction", "classes/modelo/admin/controle/cidades/InitEditCidadeAction.class.php" );
        //MapAction::addAction ( "ExecEditCidadeAction", "classes/modelo/admin/controle/cidades/ExecEditCidadeAction.class.php" );
        MapAction::addAction ( "ExecDelAssuntoAction", "classes/modelo/admin/controle/assunto/ExecDelAssuntoAction.class.php" );
        MapAction::addAction ( "AutoCompleteAssuntoAction", "classes/modelo/admin/controle/assunto/AutoCompleteAssuntoAction.class.php" );
         
       //Gestao de Substituições
        MapAction::addAction ( "InitListSubstituicoesAction", "classes/modelo/admin/controle/substituicoes/InitListSubstituicoesAction.class.php" );
        MapAction::addAction ( "InitEditSubstituicoesAction", "classes/modelo/admin/controle/substituicoes/InitEditSubstituicoesAction.class.php" );
        MapAction::addAction ( "InitCadSubstituicoesAction", "classes/modelo/admin/controle/substituicoes/InitCadSubstituicoesAction.class.php" );
        MapAction::addAction ( "ExecCadSubstituicoesAction", "classes/modelo/admin/controle/substituicoes/ExecCadSubstituicoesAction.class.php" );
        MapAction::addAction ( "ExecEditSubstituicoesAction", "classes/modelo/admin/controle/substituicoes/ExecEditSubstituicoesAction.class.php" );
        MapAction::addAction ( "ExecListSubstituicoesAction", "classes/modelo/admin/controle/substituicoes/ExecListSubstituicoesAction.class.php" );
        MapAction::addAction ( "MudaStatusSubstituicoesAction", "classes/modelo/admin/controle/substituicoes/MudaStatusSubstituicoesAction.class.php" );
        MapAction::addAction ( "ExecDelSubstituicoesAction", "classes/modelo/admin/controle/substituicoes/ExecDelSubstituicoesAction.class.php" );
        MapAction::addAction ( "AutoCompleteSubstituicoessAction", "classes/modelo/admin/controle/substituicoes/AutoCompleteSubstituicoesAction.class.php" );
        MapAction::addAction ( "InitCadCarregamentoAction", "classes/modelo/admin/controle/substituicoes/InitCadCarregamentoAction.class.php" );


        //Gestao de Historico
        ////////MapAction::addAction ( "InitCadCidadeAction", "classes/modelo/admin/controle/cidades/InitCadCidadeAction.class.php" );
        //////MapAction::addAction ( "ExecCadCidadeAction", "classes/modelo/admin/controle/cidades/ExecCadCidadeAction.class.php" );
        MapAction::addAction ( "InitListHistoricoAction", "classes/modelo/admin/controle/historico/InitListHistoricoAction.class.php" );
        MapAction::addAction ( "ExecListHistoricoAction", "classes/modelo/admin/controle/historico/ExecListHistoricoAction.class.php" );
        //////MapAction::addAction ( "InitEditCidadeAction", "classes/modelo/admin/controle/cidades/InitEditCidadeAction.class.php" );
        //////MapAction::addAction ( "ExecEditCidadeAction", "classes/modelo/admin/controle/cidades/ExecEditCidadeAction.class.php" );
        //////MapAction::addAction ( "ExecDelCidadesAction", "classes/modelo/admin/controle/cidades/ExecDelCidadesAction.class.php" );

    }

}

?>