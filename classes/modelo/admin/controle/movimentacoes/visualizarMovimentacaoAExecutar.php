<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<head>
		<title>SysProjur - Visualizar Movimentação a Executar</title>
		<link rel="stylesheet" type="text/css" href="{$smarty.const.HTTP_URL}css/admin/print.css"  media="print"/>
	</head>
	<script type="text/javascript">
		function fechar(){
			window.close();
		}
	</script>
        <body>
		<?php

	   	require_once '../../entidade/conexao_auxiliar/banco.php'; 
		if($_GET) {

			$idMovimentacao = $_GET['idMovimentacao'];
			$idTipoMovimentacao = $_GET['tipoMovimentacao'];
			$join = "";

			$query_movimentacao = mysql_query("select me.*, m.numeroMovimentacao
                                                       from tbmovimentacao_a_executar me inner join tbmovimentacao m on
                                                           me.fkMovimentacao = m.idMovimentacao
                                                       where m.idMovimentacao =".$idMovimentacao);
			while($line = mysql_fetch_array($query_movimentacao)) {
				$numeroMovimentacao = $line['numeroMovimentacao']."<br/>";
				$dataLimite = $line['dataLimite']."<br/>";
				$status = $line['status']."<br/>";
				$pendencia = $line['pendencia'];
			}

                        ?><fieldset style="border-color: green; color: green; background-color: #E1F5D3; "><legend><b>Movimentacao</b></legend> <?php
                        echo "<font style='font-size: 11pt; color: black' ><b>Núm. movimentacao:</b> </font><font style='font-size: 11pt; color: #FF6600'><b>".$numeroMovimentacao."</b></font>";
                        ?></fieldset><?php
			echo "<br>";
			 ?><fieldset style="border-color: green;  color: green; background-color: #E1F5D3;"><legend><b>A Executar</b></legend> <?php
			echo "<font style='font-size: 11pt; color: black' ><b>Data limite:</b></font> <font style='font-size: 11pt; color: #FF6600' ><b>".$dataLimite."</b></font>";
			echo "<font style='font-size: 11pt; color: black' ><b>Status:</b> </font><font style='font-size: 11pt; color: #FF6600' ><b>".$status."</b></font>";
			echo "<font style='font-size: 11pt; color: black' ><b>Pendência</b> </font><textarea colws='50' style='width: 390px; color: #ff6600; font-weight: bold; font-size: 11pt;' readonly=readonly >".$pendencia."</textarea>";
                         ?></fieldset><?php
		}
		?>
            <br>
            <input type="button" class="btn-print" value="Fechar" onclick="fechar()" style="float: right;"/>
	</body>
</html>
