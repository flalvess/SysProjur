<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
    <head>
        <title>SysProJur - Página Inicial</title>
        <meta name="language" content="pt-br" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="author" content="Edmaycon Torres(edmaycontorres@gmail.com) / Diego Sntiago / Marcos Vinicius" />
        <meta name="title" content="SysProJur - Sistema de Controle de Processos Jurídicos"/>
        <meta name="description" content="Sistema de Controle de Processos Jurídicos" />
        <link rel="stylesheet" type="text/css" href="{$smarty.const.HTTP_URL}css/admin/generic.css"  media="screen"/>
        <link rel="stylesheet" type="text/css" href="{$smarty.const.HTTP_URL}css/admin/estilo.css"  media="screen"/>
        <link rel="stylesheet" type="text/css" href="{$smarty.const.HTTP_URL}css/admin/index.css"  media="screen"/>
        <link rel="stylesheet" type="text/css" href="{$smarty.const.HTTP_URL}css/admin/inserir.css"  media="screen"/>
        <link rel="stylesheet" type="text/css" href="{$smarty.const.HTTP_URL}css/admin/listar.css"  media="screen"/>
        <link rel="stylesheet" type="text/css" href="{$smarty.const.HTTP_URL}css/admin/format_campos.css"  media="screen"/>
        <link rel="stylesheet" type="text/css" href="{$smarty.const.HTTP_URL}css/admin/jquery.autocomplete.css"  media="screen"/>
        <link rel="stylesheet" type="text/css" href="{$smarty.const.HTTP_URL}css/admin/jquery-ui-1.8.4.custom.css"  media="screen"/>

   <!--     <link rel="stylesheet" type="text/css" href="{$smarty.const.HTTP_URL}js/base/ckeditor/_samples/sample.css" />
        <link rel="stylesheet" type="text/css" href="http://localhost/sysprojur/js/base/ckeditor/skins/kama/editor.css" /> -->

        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/jquery.js"></script>
        <script language="javascript" type="text/javascript">jQuery.noConflict();</script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/jquery-impromptu.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/jquery.autocomplete.pack.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/jquery.ui.core.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/jquery.ui.widget.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/jquery.ui.datepicker.js"></script>

       <!--  <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/ckeditor/ckeditor.js"></script>
        <script language="javascript" type="text/javascript" src="http://localhost/sysprojur/js/base/ckeditor/config.js"></script>
        <script language="javascript" type="text/javascript" src="http://localhost/sysprojur/js/base/ckeditor/lang/pt-br.js"></script>
        <script language="javascript" type="text/javascript" src="http://localhost/sysprojur/js/base/ckeditor/plugins/styles/styles/default.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/ckeditor/_samples/sample.js"></script> -->

        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/prototype.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/script.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/AjaxResponders.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/FormUtil.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/upload.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/BaseAdmin.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/ConfigAdmin.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/ControleAcesso.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoUsuarios.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoMovimentacao.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoProcessos.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoProcurador.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoPrimeiraInstancia.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoJuizos.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoAtividade.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoAtividadeEnv.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoAtividadeRec.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoPessoas.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoCidades.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoAssunto.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoSubstituicoes.class.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/Pessoa.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/ParteAdversa.js"></script>
        <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/admin/GestaoHistorico.class.js"></script>
    <!--    <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/fckeditor/fckeditor.js"></script> -->
    <!--    <script language="javascript" type="text/javascript" src="{$smarty.const.HTTP_URL}js/base/ckeditor/ckeditor.js"></script> -->
       

        <script language="javascript" type="text/javascript">
        FormUtil.PREFIX_AUX				= "auxField";
        FormUtil.CSS_FIELD_CLASS_ERROR	= "erro_input";
        FormUtil.CSS_AUX_CLASS_ERROR	= "erro_span";
        FormUtil.CSS_MODE				= "V";
        ControleAcesso.initIndex();
        </script>

        
    </head>
    <body>
        <div id="wrapper">
            <div id="gif_load" style="visibility:hidden">
               <!-- <img src="{$smarty.const.HTTP_URL}img/admin/ajax-loader.gif" title="Carregando..." /> -->
                <img src="{$smarty.const.HTTP_URL}img/admin/25.gif" title="Carregando..." />
            </div>
            <div id="topo">
                <div id="logo">
                    <h1> <a href="javascript:;" onclick="ControleAcesso.initIndex()" title=" SysProJur - Sistema de Controle de Processos Jurídicos">
                            <span class="none">
                                SysProJur - Sistema de Controle de Processos Jurídicos
                            </span>
                        </a> </h1>
                </div>
                <div id="user">
                    <!--	<strong class="saudacao_data" id="saudacaoTemporal">
		</strong> -->
                    <!--	<strong class="saudacao_user">Seja bem-vindo,
			<a href="javascript:;" title="">
				<span id="user_on">
				</span>
			</a>
		</strong> -->

                    <strong class="saudacao_user">
                        usuário:
                       <!-- usuário: -->
                        <a href="javascript:;" title="">
                            <span id="user_on">
                            </span>
                        </a>
                        &nbsp;&nbsp;<font style="color: gray">|</font>&nbsp;&nbsp;perfil:
                        <a href="javascript:;" title="">
                            <span id="group_on">
                            </span>
                        </a>
                        &nbsp;&nbsp;<font style="color: gray">|</font>&nbsp;&nbsp;
                        <span class="logout">
                            <a href="javascript:ControleAcesso.sairSistema();"  title="Sair do sistema">Sair</a>
                        </span>
                    </strong>
                <br>
               

                <strong class="recebida">
                     <a href="javascript:GestaoAtividadeRec.initListRec();" title="Sem ciente!">
                            <span id="recebida_on" class="recebida">
                            </span>
                        </a>
                        
                </strong>
            
              

            <!--    <strong class="espaco">

                </strong> -->

                    <strong class="home" id="home">
 
                       <!-- &nbsp;&nbsp;
                        <a title="Google" href="http://www.google.com.br" target="_blank">
                            <img src="{$smarty.const.HTTP_URL}img/admin/goog.png" alt="" style="vertical-align: sub;"/>
                        </a> -->
                        &nbsp;&nbsp;
                        <a title=" Dícionário Jurídico Online" href="http://www.direitonet.com.br/dicionario" target="_blank">
                            <img src="{$smarty.const.HTTP_URL}img/admin/bookt.gif" alt="" style="vertical-align: sub;"/>
                        </a>
                        &nbsp;&nbsp;
                        <a title=" Ir para o site da UESPI" href="http://www.uespi.br/novosite"  target="_blank">
                            <img src="{$smarty.const.HTTP_URL}img/admin/link.gif" alt="" style="vertical-align: sub;"/>
                        </a>
                        &nbsp;&nbsp;
                        <a title=" Página inicial" onclick="ControleAcesso.initIndex()" href="javascript:;">
                            <img src="{$smarty.const.HTTP_URL}img/admin/homet.gif" alt="" style="vertical-align: sub;"/>
                        </a>
                        &nbsp;&nbsp;
                        <!--&nbsp;&nbsp;<font style="color: gray">|</font>  &nbsp;&nbsp; -->
                        <strong class="saudacao_data" id="saudacaoTemporal">

                        </strong>
                    </strong>
                    <!--	<span class="logout">
			<a href="javascript:ControleAcesso.sairSistema();"  title="Sair do sistema">Sair</a>
		</span> -->
                </div>
            </div>
            <div id="content">
                <div id="topo_interno">
                    <div id="menu_horiz" class="mt-15">
                        <h3>Administrando o Sistema de Controle de Processos Jurídicos</h3>
                    </div>
                    <div id="tree">
                        <strong id="tituloTela">Página Inicial</strong>
                    </div>
                </div>
                <div id="left">
                    {include file="admin/menu.tpl"}
                </div>
                <div id="meio">
                    <div id="tela">
                    </div>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </body>
</html>
