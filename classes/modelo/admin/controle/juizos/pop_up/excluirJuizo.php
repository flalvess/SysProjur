<?php
   include("../../../entidade/conexao_auxiliar/banco.php");

    $idJuizo = $_GET['idJuizo'];

    if (isset($_GET['idJuizo'])) {
	    $consultaSQL = "DELETE FROM tbjuizo WHERE idJuizo = ".$_GET['idJuizo'];
	    $resultado = mysql_query($consultaSQL);
	    //verifica se a consulta gerou um resultado válido
    	if (!$resultado) {
		    $erro = "Não foi possível excluir o compromisso. Motivo: ".mysql_errormsg();
            header("refresh:0;url=NovoJuizo.php");
	    } else {
		    //$msg = "A juizo foi excluido com sucesso!";
                    echo "<script>window.alert('A juizo foi excluída com sucesso!')</script>";
            header("refresh:0;url=NovoJuizo.php");
	    }
    }



?>