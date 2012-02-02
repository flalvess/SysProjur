<?php
include("../../../entidade/conexao_auxiliar/banco.php");

     $idCidade = $_GET['idCidade'];
     $cidade = $_GET['cidade'];
     $estado = $_GET['estado'];
     $consulta_estado = $_GET['consulta_estado'];
     $alteracao = $_GET['alteracao'];

$query_estado = "select nome, sigla from tbestado ";
$resultado_estado = mysql_query($query_estado);

$query_estado2 = "select idEstado, nome, sigla from tbestado ";
$resultado_estado2 = mysql_query($query_estado2);


if($consulta_estado =="yes"){
    $query_cidade_estado = "select tbcidade.nome as cidade, tbcidade.idCidade, tbestado.idEstado, tbestado.nome as estado, sigla from tbestado inner join tbcidade on tbestado.idEstado = tbcidade.fkEstado where tbestado.nome = '".$estado."'order by tbcidade.idCidade desc";
    $resultado_cidade_estado = mysql_query($query_cidade_estado);
}else{

    $query_cidade_estado = "select tbcidade.nome as cidade, tbcidade.idCidade, tbestado.idEstado, tbestado.nome as estado, sigla from tbestado inner join tbcidade on tbestado.idEstado = tbcidade.fkEstado order by tbcidade.idCidade desc";
    $resultado_cidade_estado = mysql_query($query_cidade_estado);
}


if($alteracao == "alterar"){
    $update ="update tbcidade set nome='$cidade', fkEstado=$estado where idCidade = $idCidade";
    mysql_query($update);
    echo "<script>location.href='NovaCidade.php'</script>";
}


?>


<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <title>Pesquisa de cursos - SCA</title>
        <link rel="stylesheet" type="text/css" href="../../../../../../css/admin/inserir.css"  media="screen"/>
        <link rel="stylesheet" type="text/css" href="../../../../../../css/admin/listar.css"  media="screen"/>
        <link rel="stylesheet" type="text/css" href="../../../../../../css/admin/format_campos.css"  media="screen"/>
        <link rel="stylesheet" type="text/css" href="../../../../../../css/admin/listar.css"  media="screen"/>
        <link rel="stylesheet" type="text/css" href="../../../../../../css/admin/generic.css"  media="screen"/>

        <style type="text/css">
            #scrollContainer {width: 602px; height: 268px; overflow: auto;   border:solid 1px #aacfe4; width: 100%; }

            textarea{ background: white; }
        </style>

    </head>
    <body>


        <div  class="field" style="display: block; background-color:#f8fafc; border: 1px solid #AED7FC; height: 28px; width: 100%; font-family: Arial; color: #333333; padding-top: 5px; padding-bottom: 3px;  font-size: 12px; margin-left: -10px; margin-top: -12px;">
            <b style="float: left; margin-left: 10px;">Buscar Cidades &nbsp</b>
            <select name="consulta_estado"  style="width: 265px; margin-left: 8px; height: 25px;" class="input_text" ONCHANGE="location = this.options[this.selectedIndex].value;">
                <option value="0">   - Estado -  </option>
                <option value="NovaCidade.php?consulta_estado=no">Todos</option>
                <?php while($tupla_estado = mysql_fetch_array($resultado_estado)) { ?>

                <option value="NovaCidade.php?estado=<?php echo $tupla_estado['nome'];?>&consulta_estado=yes" ><?php echo $tupla_estado['nome']; ?> - <?php echo $tupla_estado['sigla'];?></option>

                    <?php } ?>
            </select>

        </div>

        <form  method="get" action="AlterarCidade.php">
            <input type="hidden" name="idCidade" value="<?php echo $idCidade; ?>"/>
            <div class="container_field_new" style=" width: 100%;  background-color: white; height: 50px; margin-left: 10px;">

                <div class="field" style="margin-bottom: 7px; width: 250px; padding-right: 5px !important; padding-left: 0px !important">

                    <!--   <b style="float: left; margin-left: 0px;">Nova cidade &nbsp</b> -->

                    <label for="formSaveCidade_nome" class="lbl">Cidade:</label>
                    <input type="text" name="cidade" id="txtNome" size="60" value="<?php echo $cidade; ?>" class="input_text" style="width: 250px; text-align: left; height: 25px;"/>




                </div>

                <div class="field" style=" width: 170px !important;  padding-left: 5px;">
                    <label for="formSaveCidade_estado" class="lbl">Estado:</label>
                    <select name="estado"  style="width: 165px; height: 25px;" class="input_text">
                        <option value="0">   - Estado -  </option>
                        <?php while($tupla_estado2 = mysql_fetch_array($resultado_estado2)) { ?>

                        <option value="<?php echo $tupla_estado2['idEstado']; ?>" <?php if( $tupla_estado2['idEstado'] == $estado){ echo "selected='selected'";}?>><?php echo $tupla_estado2['nome']; ?> - <?php echo $tupla_estado2['sigla']; ?></option>

                            <?php } ?>
                    </select>
                </div>
                <div class="field" style=" width: 90px !important; height: 25px !important; padding-top: 20px !important; padding-left: 0px !important;">
                    <label for="formSaveCidade_estado" class="lbl">      </label>
                    <input type="image" name="alteracao" src="../../../../../../img/admin/up_cidade.png" value="alterar" style=" width:20px; cursor: pointer; color: #333333; " />
                </div>
            </div>

            <div class="container_field_new" id="scrollContainer">



                <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%" style="padding: 0px 0px 0px 0px;">
                    <thead>
                        <tr id="list_fields">

                            <th width="50%">Cidade</th>
                            <th width="50%">Estado</th>
                            <th width="50%">Opção</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while($lista_cidade_estado = mysql_fetch_array($resultado_cidade_estado)) {
                        ?>
                        <tr style="height:25px">

                            <td  class="lista"><label><?php echo $lista_cidade_estado['cidade']; ?></label></td>
                            <td  class="lista"><label><?php echo $lista_cidade_estado['estado']." - ".$lista_cidade_estado['sigla']; ?></label></td>
                            <td  class="lista"><a href="alterarCidade.php?idCidade=<?php echo $lista_cidade_estado['idCidade']; ?>&cidade=<?php echo $lista_cidade_estado['cidade']; ?>&estado=<?php echo $lista_cidade_estado['idEstado']; ?>"><img src="../../../../../../img/admin/edit1.png" title="Alterar dados do curso"/></a>&nbsp;&nbsp;&nbsp;<a href="excluiCurso.php?id_curso=<?= $linhaCurso['id_curso']?>" onClick="return confirm('Nenhum polo tera este curso. Tem certeza que quer EXCLUIR ESTE CURSO?')"><img src="../../../../../../img/admin/delete_user.png" title="Excluir este curso"/></a></td>
                        </tr>


                        <?php } ?>

                    </tbody>


                </table>
            </div>
        </form>






        <br /><br />


        <?php if($msg == "Nao foi possivel excluir o curso. Motivo: Existem alunos matriculados!") { ?>
        <div style="margin-top: -20px;  width:600px; text-align: center; float: left"><font style="margin-left: -200px;"><span id="msg" style="color: #FF0000"><?= $msg?></span></font></div>
            <?php }else if($msg == "Nao foi possivel desvincular o curso. Motivo: Existem alunos matriculados!") { ?>
        <div style="margin-top: -20px;  width:600px; text-align: center; float: left"><font style="margin-left: -200px;"><span id="msg" style="color: #FF0000"><?= $msg?></span></font></div>
            <?php }else { ?>
        <div style="margin-top: -20px;  width:600px; text-align: center; float: left"><font style="margin-left: -200px;"><span id="msg"><?= $msg?></span></font></div>
            <?php } ?>

        <!--<div style="margin-top: -20px;  width:600px; text-align: center; float: left"><font style="margin-left: -200px;"><span id="msg"><?= $msg?></span></font></div>-->
        <br /><br /><br /><br />
        <div class="spacer"></div>
        <br />
    </body>
</html>