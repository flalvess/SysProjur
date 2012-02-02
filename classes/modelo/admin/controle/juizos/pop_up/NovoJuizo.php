<?php
include("../../../entidade/conexao_auxiliar/banco.php");


     $juizo = $_GET['juizo'];
     $cidade = $_GET['cidade'];
     $consulta_cidade = $_GET['consulta_cidade'];
     $cadastro = $_GET['cadastro'];

$query_cidade = "select nome from tbcidade ";
$resultado_cidade = mysql_query($query_cidade);

$query_cidade2 = "select idCidade, nome from tbcidade ";
$resultado_cidade2 = mysql_query($query_cidade2);


if($consulta_cidade =="yes"){
    $query_juizo_cidade = "select tbjuizo.nome as juizo, tbjuizo.idJuizo, tbCidade.idCidade, tbcidade.nome as cidade from tbcidade inner join tbjuizo on tbcidade.idCidade = tbjuizo.fkCidade where tbcidade.nome = '".$cidade."'order by tbjuizo.idJuizo desc";
    $resultado_juizo_cidade = mysql_query($query_juizo_cidade);
}else{

    $query_cidade_estado = "select tbjuizo.nome as juizo, tbjuizo.idJuizo, tbcidade.idCidade, tbcidade.nome as cidade from tbcidade inner join tbjuizo on tbcidade.idCidade = tbjuizo.fkCidade order by tbjuizo.idJuizo desc";
    $resultado_juizo_cidade = mysql_query($query_cidade_estado);
}


if($cadastro == "cadastrar"){
    $insert ="insert into tbjuizo values(null, '$juizo', $cidade)";
    mysql_query($insert);
     //echo "<script>window.opener.document.getElementById('formSaveProcesso_cidade').value = 'PHP';</script>";
    echo "<script>location.href='NovoJuizo.php'</script>";

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
            <b style="float: left; margin-left: 10px;">Buscar Juizos &nbsp</b>
            <select name="consulta_cidade"  style="width: 265px; margin-left: 8px; height: 25px;" class="input_text" ONCHANGE="location = this.options[this.selectedIndex].value;">
                <option value="0">   - Cidade -  </option>
                <option value="NovoJuizo.php?consulta_cidade=no">Todos</option>
                <?php while($tupla_cidade = mysql_fetch_array($resultado_cidade)) { ?>

                <option value="NovoJuizo.php?cidade=<?=$tupla_cidade['nome']?>&consulta_cidade=yes" ><?=$tupla_cidade['nome']?></option>

                    <?php } ?>
            </select>

        </div>

        <form  method="get" action="NovoJuizo.php">
            <div class="container_field_new" style=" width: 100%;  background-color: white; height: 50px; margin-left: 10px;">

                <div class="field" style="margin-bottom: 7px; width: 250px; padding-right: 5px !important; padding-left: 0px !important">

                    <!--   <b style="float: left; margin-left: 0px;">Nova cidade &nbsp</b> -->

                    <label for="formSaveJuizo_nome" class="lbl">Juizo:</label>
                    <input type="text" name="juizo" id="txtNome" size="60" class="input_text" style="width: 250px; text-align: left; height: 25px;"/>




                </div>

                <div class="field" style=" width: 170px !important;  padding-left: 5px;">
                    <label for="formSaveJuizo_cidade" class="lbl">Cidade:</label>
                    <select name="cidade"  style="width: 165px; height: 25px;" class="input_text">
                        <option value="0">   - Cidade -  </option>
                        <?php while($tupla_cidade2 = mysql_fetch_array($resultado_cidade2)) { ?>

                        <option value="<?php echo $tupla_cidade2['idCidade']; ?>"><?php echo $tupla_cidade2['nome']; ?></option>

                            <?php } ?>
                    </select>
                </div>
                <div class="field" style=" width: 50px !important; height: 25px !important; padding-top: 20px !important; padding-left: 0px !important;">
                    <label for="formSaveJuizo_cidade" class="lbl">      </label>
                    <input type="image" name="cadastro" src="../../../../../../img/admin/add_cidade.gif" value="cadastrar" style=" width:20px; cursor: pointer; color: #333333; " />
                </div>
            </div>

            <div class="container_field_new" id="scrollContainer">



                <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%" style="padding: 0px 0px 0px 0px;">
                    <thead>
                        <tr id="list_fields">

                            <th width="50%">Juizo</th>
                            <th width="50%">Cidade</th>
                            <th width="50%">Opção</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while($lista_juizo_cidade = mysql_fetch_array($resultado_juizo_cidade)) {
                        ?>
                        <tr style="height:25px">

                            <td  class="lista"><label><?php echo $lista_juizo_cidade['juizo']; ?></label></td>
                            <td  class="lista"><label><?php echo $lista_juizo_cidade['cidade']; ?></label></td>
                            <td  class="lista"><a href="alterarJuizo.php?idJuizo=<?php echo $lista_juizo_cidade['idJuizo']; ?>&juizo=<?php echo $lista_juizo_cidade['juizo']; ?>&cidade=<?php echo $lista_juizo_cidade['idCidade']; ?>"><img src="../../../../../../img/admin/edit1.png" title="Alterar dados do juizo"/></a>&nbsp;&nbsp;&nbsp;<a href="excluirJuizo.php?idJuizo=<?php echo $lista_juizo_cidade['idJuizo']; ?>" onClick="return confirm('Tem certeza que quer EXCLUIR ESTE JUIZO?')"><img src="../../../../../../img/admin/delete_user.png" title="Excluir este juizo"/></a></td>

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