{literal}
<script language="javascript" type="text/javascript">


</script>
{/literal}
<div class="icons">
    <ul>
        <li><span id="add"><a href="javascript:;" onclick="GestaoMovimentacao.initCad()" title="Incluir Novo Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/add_user.png" alt="" />Incluir Novo</a></span></li>
        <li><span id="delete"><a href="javascript:;" onclick="GestaoMovimentacao.execDel()" title="Deletar Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/delete_user.png" alt=""/>Deletar Seleção</a></span></li>
        <li>
            <span id="busca">
                <a href="javascript:;" onclick="js.showSearchs()" title="Buscar"><img src="{$smarty.const.HTTP_URL}img/admin/lupa1.png" alt=""/>Buscar</a>
            </span>
        </li>
    </ul>
</div>
<div id="search" style="display:none">
    <form action="" method="post" id="formListMovimentacao" onsubmit="GestaoMovimentacao.execList(); return false">
        <input type="hidden" name="ACTION" value="ExecListMovimentacaoAction" />
        <!--	<input type="hidden" name="fkProcesso" id="formListMovimentacao_fkProcesso" value="" /> -->
        <!--     <input type="hidden" name="fkProcesso" id="formListMovimentacao_fkProcesso" value="" /> -->

      <!------  <fieldset>
            <legend>Busca de Movimentacões </legend>
            <table class="container_busca" align="center">

                <tr >
                    <td><label for="formListMovimentacao_movimentacao">Pesquisar por:</label></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <input id="formListMovimentacao_movimentacao" type="text"  class="text" name="movimentacao" title="Critérios: teste" style="width: 300px;"/>
                    </td>
                    <td>
                        <input type="submit" value="Buscar" class="submit"/>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <select size="1" id="formListProcesso_ordem" class="text" name="ordem" title="Representa o critério usado para ordenar os resultados." style="width: 105px;">
                            <option value="">::Critério::</option>
				{html_options options=$optionsOrdem}
                        </select>
                        &nbsp;&nbsp;

                        <select size="1" id="formListProcesso_sentido" class="text" name="sentido" title="Trata-se da forma como os resultados serão ordenados.">
                            <option value="">::Sentido::</option>
				{html_options options=$optionsSentidoOrdem}
                        </select>
                    </td>
                    <!--  <td><input type="submit" value="Buscar" class="submit"/></td> -------->
        <!-------        </tr>

                <tr>
                    <td><br></br> <label for="formListProcesso_data">Data:</label></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <input id="formListProcesso_data" type="text" class="text" name="data" title="Critérios: teste" style="width: 300px;"/>
                    </td>
                    <td>
                        <input type="submit" value="Buscar" class="submit"/>
                    </td>
                </tr>

            </table>
        </fieldset> ------->
            <!--  <fieldset>
              <legend>Busca de Movimentacaos </legend>
	<div class="busca_movimentacoes"> -->
            <!-- <label for="formListMovimentacao_movimentacao">Pesquisar por:</label>
             <input id="formListMovimentacao_movimentacao" type="text" class="text" name="movimentacao"/>
		<select size="1" id="formListMovimentacao_ordem" class="select_busc_movimentacao" name="ordem" title="Representa o critério usado para ordenar os resultados.">
		{html_options options=$optionsOrdem}
		</select><br/>

		<select size="1" id="formListMovimentacao_sentido" class="select_busc_movimentacao" name="sentido" class="field" title="Trata-se da forma como os resultados serão ordenados.">
		{html_options options=$optionsSentidoOrdem}
		</select>&nbsp;&nbsp; -->

            <!--   <fieldset>
                <legend>Busca de Movimentacaos </legend>
              <table class="container_busca" align="center">
                <tr>
                  <td><label for="formListMovimentacao_processo">Pesquisar pelo nº do processo</label></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><input id="formListMovimentacao_processo" type="text" class="text" name="processo" style="width: 250px;"/></td>
                   <td><input type="submit" value="Buscar" class="submit"/></td>
                </tr>
                <tr>
                  <span class="aux_field" id="formListMovimentacao_auxField_processo">Busque todas as movimentações de um processo específico.</span>
                </tr>
              </table>
              </fieldset -->


            <!--      <div class="field" >
                          <label for="formListMovimentacao_processo" class="lbl">Nº do Processo:</label>
                          <input type="text" id="formListMovimentacao_processo" name="processo" title="Informe o Nº do processo de 1º instancia que originou esse processo de 2º instancia" class="text" />
                          <span class="aux_field" id="formListMovimentacao_auxField_processo">Busque o funcionário que está requisitando o processo - Critérios: NOME ou CPF ou MATRÍCULA.</span>
                      </div>

                  <input type="submit" value="Buscar" class="submit"/> -->
            <!--	</div>
                </fieldset> -->
    </form>
</div>
<div class="clear">
</div>
<div class="container_table" id="lista_movimentacoes">
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
