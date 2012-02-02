<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<head>
		<title>SysProjur - Visualizar Movimentação a Executar</title>
		<link rel="stylesheet" type="text/css" href="{$smarty.const.HTTP_URL}css/admin/print.css"  media="print"/>
                <style type="text/css">

                    #scrollContainer {width: 404px; height: 200px; overflow: auto; margin-top:10px;  border:solid 1px #aacfe4;}

                </style>
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

			$idProcesso = $_GET['idProcesso'];
			//$idTipoMovimentacao = $_GET['tipoMovimentacao'];
			$join = "";

			$query_processo = mysql_query("SELECT pe.nome, pe.parte, po.numeroProcesso
                                                           FROM tbprocesso po inner join tbprocesso_pessoa pp on po.idProcesso = pp.fkProcesso
                                                                              inner join tbpessoa pe on pp.fkPessoa = pe.idPessoa
                                                           WHERE po.idProcesso = '{$idProcesso}'");


                        
                        $cor = array('#f2f0fd','white');
                        $c = 0;
                        $i = 1;
                        while($line = mysql_fetch_array($query_processo)) {


				$pessoa[] = "<div style='background-color:".$cor[$c]." ; display: block; padding-left: 5px;'>".$i." - <font color='black'><b>".$line['nome']."</b></font>( ".$line['parte']." )</div>";
				//$parte = $line['parte']."<br/>";
				$numeroProcesso = $line['numeroProcesso']."<br/>";
//				$pendencia = $line['pendencia'];
                                $i++;
                                if($c == 0){
                                    $c = 1;
                                }
                                else{
                                    $c = 0;
                                }
			}

                        ?><fieldset style="border-color: #dff0ff; color: green; background-color: #E1F5D3;"><legend><b>Processo</b></legend> <?php
                        echo "<font style='font-size: 11pt; color: black' >Núm. processo: <b>".$numeroProcesso."</b></font>";
                        ?></fieldset><?php

			echo "<br>";

                        ?><fieldset style="border-color: #dff0ff;  color: green; background-color: #E1F5D3;"><legend><b>Partes do Processo</b></legend><div id="scrollContainer" style="background-color: white;"><?php

                        $i = 0;
                        while($i < count($pessoa)) {
                                   echo $pessoa[$i];
                                        //$pessoa[$i];
                                        $i++;
                        }



                        ?></div></fieldset><?php
                       
                         
		}
		?>
            <br>
            <input type="button" class="btn-print" value="Fechar" onclick="fechar()" style="float: right"/>
	</body>
</html>
