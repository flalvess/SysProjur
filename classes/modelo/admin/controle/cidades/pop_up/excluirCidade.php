<?php
   include("../../../entidade/conexao_auxiliar/banco.php");

    $idCidade = $_GET['idCidade'];

    if (isset($_GET['idCidade'])) {
	    $consultaSQL = "DELETE FROM tbcidade WHERE idCidade = ".$_GET['idCidade'];
	    $resultado = mysql_query($consultaSQL);
	    //verifica se a consulta gerou um resultado v�lido
    	if (!$resultado) {
		    $erro = "N�o foi poss�vel excluir o compromisso. Motivo: ".mysql_errormsg();
            header("refresh:0;url=NovaCidade.php");
	    } else {
		    //$msg = "A cidade foi excluido com sucesso!";
                    echo "<script>window.alert('A cidade foi exclu�da com sucesso!')</script>";
            header("refresh:0;url=NovaCidade.php");
	    }
    }



?>