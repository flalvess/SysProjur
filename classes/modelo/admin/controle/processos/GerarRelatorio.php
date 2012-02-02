<?php
   //Incluir a classe excelwriter
   //include("excelwriter.inc.php");
   require_once '../../../../base/sistema/excelwriter.inc.php';
   require_once '../../entidade/conexao_auxiliar/banco.php';

   $idProcesso = $_GET['idProcesso'];
   $numeroProcesso = $_GET['numeroProcesso'];
   $instancia = $_GET['instancia'];
   $primeiraInstancia = $_GET['primeiraInstancia'];
   $cidade = $_GET['cidade'];
   $juizo = $_GET['juizo'];

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    //$excel=new ExcelWriter("excel3.xls");
    $excel=new ExcelWriter("../../../../../excel/".$numeroProcesso."_Relatorio.xls");
    //$excel=new ExcelWriter($numeroProcesso."_Relatório.xls");


    if($excel==false){
        echo $excel->error;
   }

   //Escreve o nome dos campos de uma tabela
   if($instancia == "1º Instancia" ){
       $myArr=array('Nº Processo','Tipo Processo','Descrição', 'Justiça', 'Instancia', 'Cidade', 'Juizo', 'Data de Entrada', 'Tipo da Ação', 'Assunto', 'Situação', 'Procurador');

   }
   else{
       $myArr=array('Nº Processo','Tipo Processo','Descrição', 'Justiça', 'Instancia', 'Tipo', '1º Instancia', 'Data de Entrada', 'Tipo da Ação', 'Assunto', 'Situação', 'Procurador');
   }

   $excel->writeLineCabecalho('Sys', 'Projur', '#003366', '#0099cc', 'Arial Rounded MT Bold', 'Franklin Gothic Book', '12', 'center', 'bold', '24pt');
   $excel->writeLineCabecalho('Sistema de Controle de Processos Jurídicos','', 'black', 'black', '', '', '12', 'center','bold', '10pt');
   $excel->writeLineCabecalho('Relatório gerado em ',date("d/m/Y - H:i:s"), 'black', 'black', '', '', '12', 'right','bold', '10pt');
   $excel->writeLinePerson($myArr, '0', '#99ccff','center','bold');


   //Seleciona os campos de uma tabela
	//$conn = mysql_connect("mysql.uespi.kinghost.net", "uespi", "kingdell") or die ('Não foi possivel conectar ao banco de dados! Erro: ' . mysql_error());
//	if($conn)
//	{
//	mysql_select_db("uespi", $conn);
//	}
   $consulta = "select tbprocesso.*, stbusuario.*, stbusuarioinfo.*, tbprimeira_instancia.*, tbsegunda_instancia.*
                from tbprocesso inner join stbusuario on tbprocesso.fkUsuario = stbusuario.idUsuario
                                inner join stbusuarioinfo on stbusuarioinfo.idUsuario = stbusuario.idUsuario
							    LEFT OUTER JOIN tbprimeira_instancia ON tbprimeira_instancia.fkProcesso = tbprocesso.idProcesso
                                LEFT OUTER JOIN tbsegunda_instancia ON tbsegunda_instancia.fkProcesso = tbprocesso.idProcesso
                where tbprocesso.idProcesso =".$idProcesso;

   $resultado = mysql_query($consulta);
   if($resultado==true){
     if($instancia == "2º Instancia"){
       while($linha = mysql_fetch_array($resultado)){
          $myArr1=array($linha['numeroProcesso'],$linha['tipoProcesso'],$linha['descricao'], $linha['justica'], $linha['instancia'], $linha['tipoSegundaInstancia'], $primeiraInstancia, $linha['dataEntrada'], $linha['tipoAcao'], $linha['assunto'], $linha['situacaoProcesso'], $linha['nome']);
          $excel->writeLine($myArr1);
         // $excel->writeLine($myArr1);
       }
     }
     else{
          while($linha = mysql_fetch_array($resultado)){
          $myArr1=array($linha['numeroProcesso'],$linha['tipoProcesso'],$linha['descricao'], $linha['justica'], $linha['instancia'], $cidade, $juizo, $linha['dataEntrada'], $linha['tipoAcao'], $linha['assunto'], $linha['situacaoProcesso'], $linha['nome']);
          $excel->writeLine($myArr1);
         // $excel->writeLine($myArr1);
       }

     }
   }

   $excel->writeLine(array());
   $excel->writeLine(array());
   $excel->writeLinePerson(array('Partes do Processo'), '3', '#ffff00','left','bold');
   $myArr4=array('Ordem','Nome','Parte');
   $excel->writeLinePerson($myArr4, '0', '#99ccff','center','bold');

   $consulta = "SELECT pe.nome, pe.parte
                FROM tbprocesso po inner join tbprocesso_pessoa pp on po.idProcesso = pp.fkProcesso
                                   inner join tbpessoa pe on pp.fkPessoa = pe.idPessoa
                WHERE po.idProcesso =".$idProcesso;

   $resultado = mysql_query($consulta);
   if($resultado==true){
       $i=1;
       while($linha = mysql_fetch_array($resultado)){
          $myArr5=array($i, $linha['nome'],$linha['parte']);
          $excel->writeLine($myArr5);
          $i++;
       }
       $i=0;
   }

   $excel->writeLine(array());
   $excel->writeLine(array());
  
   $excel->writeLineCabecalhoMovimentacao('Movimentações do Processo','Movimentação a Executar', 'black', 'black', '', '', '8', 'left','bold', '10pt','#00ff66', '#ff6600');
   $myArr2=array('Nº','Tipo','Evento', 'Data Entrada', 'Perfil', 'Movimentado Por', 'Observação ', 'Ciente', 'Data Limite','Status','Pendencia');
   $excel->writeLinePerson($myArr2, '0', '#99ccff','center','bold');

   $consulta = "select tbmovimentacao.*, tbmovimentacao_a_executar.*
                from tbmovimentacao inner join tbprocesso on tbprocesso.idProcesso = tbmovimentacao.fkProcesso
		        LEFT OUTER JOIN tbmovimentacao_a_executar ON tbmovimentacao_a_executar.fkMovimentacao = tbmovimentacao.idMovimentacao

                where tbprocesso.idProcesso =".$idProcesso."   order by tbmovimentacao.numeroMovimentacao desc";

   $resultado = mysql_query($consulta);
   if($resultado==true){
       while($linha = mysql_fetch_array($resultado)){
          $myArr3=array($linha['numeroMovimentacao'],$linha['tipoMovimentacao'],$linha['evento'], $linha['data'], $linha['perfil'], $linha['movimentadoPor'], $linha['observacao'], $linha['ciente'], $linha['dataLimite'],$linha['status'],$linha['pendencia']);
          $excel->writeLine($myArr3);
  
       }
   }


    $excel->close();
    echo "<div style='background-color: #99FF66; padding-left: 5px; padding-right: 5px; border: 1px solid green;'><b>O relatório foi gerado  com sucesso </b><img src='http://localhost/sysprojur/img/admin/ok2.png'></div><br/><br/>";
    echo "<font style='font-size: 11pt;'><b>Nome do arquivo: </b> <a href='http://localhost/sysprojur/excel/".$numeroProcesso."_Relatorio.xls' style='text-decoration: none; color: green;'>".$numeroProcesso."_Relatório.xls, <font style='color: #ff6600;'><b>Abrir</b></font></a></font><br/>";
    echo "<font style='font-size: 11pt;'><b>Data: </b>".date("d/m/Y")." </font><br/>";
    echo "<font style='font-size: 11pt;'><b>Hora: </b>".date("H:i:s")." </font><br/><br/>";
    //echo "<div style='float: right;'><img src='http://localhost/sysprojur/img/admin/ico_excel.png'></div><br/><br/>";
    echo "<div style='float: right;'><a href='http://localhost/sysprojur/excel/".$numeroProcesso."_Relatorio.xls' style='text-decoration: none; color: #ffffe8;'><img src='http://localhost/sysprojur/img/admin/xls.png'></a></div><br/><br/>";
    echo"<script type='text/javascript'>
		function fechar(){
			window.close();
		}
	</script>";

  // echo '<script>location.href="http://localhost/sysprojur/excel/".$numeroProcesso."_Relatório.xls"</script>';

   //echo" <input type='button' class='btn-print' value='Fechar' onclick='fechar()' style='float: right'/> ";

?>

<html>
    <head>
    <title>Relatório</title>
    </head>
    <body bgcolor="#ffffe8">

    </body>
</html>