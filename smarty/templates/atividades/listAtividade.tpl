{literal}
<script language="javascript" type="text/javascript">


</script>
{/literal}
<div class="icons">
	<ul>
            <li><span id="add"><a href="javascript:;" onclick="GestaoAtividade.initCad()" title="Incluir Novo Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/add_user.png" alt="" />Incluir Novo</a></span></li>
		<li><span id="delete"><a href="javascript:;" onclick="GestaoAtividade.execDel()" title="Deletar Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/delete_user.png" alt=""/>Deletar Seleção</a></span></li>
		<li>
		  <span id="busca">
			<a href="javascript:;" onclick="js.showSearchs()" title="Buscar"><img src="{$smarty.const.HTTP_URL}img/admin/lupa.png" alt=""/>Buscar</a>
		  </span>
		</li>
	</ul>
</div>
<div id="search" style="display:none">
  <form action="" method="post" id="formListAtividade" onsubmit="GestaoAtividade.execList(); return false">
    <input type="hidden" name="ACTION" value="ExecListAtividadeAction" />
<!--	<input type="hidden" name="fkProcesso" id="formListAtividade_fkProcesso" value="" /> -->
    <!-- <input type="hidden" name="fkProcesso" id="formListAtividade_fkProcesso" value="" /> -->
  <!--  <fieldset>
    <legend>Busca de Atividades </legend>
	<div class="busca_atividades"> -->
       <!-- <label for="formListAtividade_atividade">Pesquisar por:</label>
        <input id="formListAtividade_atividade" type="text" class="text" name="atividade"/>
		<select size="1" id="formListAtividade_ordem" class="select_busc_atividade" name="ordem" title="Representa o critério usado para ordenar os resultados.">
		{html_options options=$optionsOrdem}
		</select><br/>
	
		<select size="1" id="formListAtividade_sentido" class="select_busc_atividade" name="sentido" class="field" title="Trata-se da forma como os resultados serão ordenados.">
		{html_options options=$optionsSentidoOrdem}
		</select>&nbsp;&nbsp; -->

     <fieldset>
      <legend>Busca de Atividades </legend>
   <!-- <table class="container_busca" align="center">
      <tr>
        <td><label for="formListAtividade_processo">Pesquisar pelo nº do processo</label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
          <td><input id="formListAtividade_processo" type="text" class="text" name="processo" style="width: 250px;"/></td>
         <td><input type="submit" value="Buscar" class="submit"/></td>
      </tr>
      <tr>
        <span class="aux_field" id="formListAtividade_auxField_processo">Busque todas as movimentações de um processo específico.</span>
      </tr>
    </table> -->
    </fieldset>
	

  <!--      <div class="field" >
                <label for="formListAtividade_processo" class="lbl">Nº do Processo:</label>
                <input type="text" id="formListAtividade_processo" name="processo" title="Informe o Nº do processo de 1º instancia que originou esse processo de 2º instancia" class="text" />
                <span class="aux_field" id="formListAtividade_auxField_processo">Busque o funcionário que está requisitando o processo - Critérios: NOME ou CPF ou MATRÍCULA.</span>
            </div>

        <input type="submit" value="Buscar" class="submit"/> -->
<!--	</div>
    </fieldset> -->
    </form>
</div>
<div class="clear">
</div>
<div class="container_table" id="lista_atividades">
</div>
<div class="icons">
  <span class="hide">
    <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">
    <span style="display:none">
      <<
    </span>
    </a>
  </span>
</div>
