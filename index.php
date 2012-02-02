<?php
require_once 'include/initialize.php';
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';

$pagina = new ObjectGUI ( "HTMLogin.tpl" );

	$idUsuario = ControleAcesso::getIdUsuarioOnline ();

	$pagina->assign ( "titulo", "SysProJur - Sistema de Processos Jurídicos" );
	$pagina->assign ( "conteudo", $pagina->fetch ( "admin/login.tpl" ) );

$pagina->toHTML ();
?>
	