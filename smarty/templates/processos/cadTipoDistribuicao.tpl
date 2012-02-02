<div class="icons">
    <ul>
        <li><span id="save"><a href="javascript:;" id="formSaveTipoDistribuicao_submit" onclick="GestaoProcessos.cadDistribuicao(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
    </ul>
</div>
<fieldset class="all">
    <legend>Cadastro de Processos</legend>
    <form action="" method="post" id="formSaveTipoDistribuicao" onsubmit="GestaoProcessos.cadDistribuicao(); return false">
        <input type="hidden" name="ACTION" value="{$actionForm}" />
        <input type="hidden" name="formId" value="formSaveTipoDistribuicao" />
        <input type="hidden" name="idTipoDistribuicao" value="{$distribuicao.idTipoDistribuicao}" />
        <input type="hidden" name="fkUsuario" id="formSaveTipoDistribuicao_fkUsuario" value="{$assunto.fkProcurador}" />

        <div class="container_field_new" style=" width: 600px; padding-top:15px;  background-color: white; padding: 5px 5px 5px 5px; margin-left: 20px;">

            <div class="field">
                <label for="formSaveTipoDistribuicao_modo" class="lbl">Modo da Distribuicao:</label>
                <select id="formSaveTipoDistribuicao_modo" name="modo" class="input_text" title="Escolha o tipo do processo." onchange="GestaoProcessos.changeProcessTypeModo();">
                    <option value=""> ::Selecione:: </option>

                    {html_options values=$valueModo output=$outModo selected=$distribuicao.modo}

                </select><br class="none"/>
                <span class="aux_field" id="formSaveTipoDistribuicao_auxField_modo">
				Escolha o tipo do processo
                </span>
            </div>

            <div id="criterio" class="field">
                <label for="formSaveTipoDistribuicao_criterio" class="lbl">Critério:</label>
                <select id="formSaveTipoDistribuicao_criterio" name="criterio" class="input_text" title="Escolha o tipo do processo." onchange="GestaoProcessos.changeProcessTypeAssunto();">
                    <option value=""> ::Selecione:: </option>

                    {html_options values=$valueDistribuicao output=$outDistribuicao selected=$distribuicao.criterio}

                </select><br class="none"/>
                <span class="aux_field" id="formSaveTipoDistribuicao_auxField_criterio">
				Escolha o tipo do processo
                </span>
            </div>
        </div>

        <div class="container_field_new" style=" width: 600px; padding-top:15px;  background-color: white; padding: 5px 5px 5px 5px; margin-left: 20px;">

            <div id="assunto" class="none">
                <div class="field">
                    <label for="formSaveTipoDistribuicao_assunto" class="lbl">Assunto:</label>
                    <select id="formSaveTipoDistribuicao_assunto" name="assunto" class="input_text" title="Escolha o tipo do processo.">
                        <option value=""> ::Selecione:: </option>
                        <option value="Sem Assunto"> Sem Assunto </option>

                        <!--    {html_options values=$valueDistribuicao output=$outDistribuicao selected=$distribuicao.criterio} -->
                        {html_options options=$optionsAssunto }

                    </select><br class="none"/>
                    <span class="aux_field" id="formSaveTipoDistribuicao_auxField_assunto">
				Escolha o tipo do processo
                    </span>
                </div>

                <div class="field" id="cont-usuario">
                    <label for="formSaveTipoDistribuicao_usuario" class="lbl">Procurador:</label>
                    <input type="text" id="formSaveTipoDistribuicao_usuario" name="usuario" title="Escreva o nome do procurador para buscá-lo" class="input_text" />
                    <span class="aux_field" id="formSaveTipoDistribuicao_auxField_usuario">Distribuição de Processo: Informe o procurador que ficará responsável por este processo</span>
                </div>

            </div>

        </div>

    </form> 
    <script language="javascript" type="text/javascript">
            FormUtil.initForm('formSaveProcesso');
            //FormUtil.initForm('formSaveTipoDistribuicao');

    </script>

    {if $distribuicao.criterio == "Por Assunto"}
    <div id="icons" class="icons" style="border-top: 1px solid #A9D5FB">
        <ul>
            <!--	<li><span id="add"><a href="javascript:;" onclick="GestaoAssunto.initCad()" title="Incluir Novo Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/add_user.png" alt=""/>Incluir Novo</a></span></li> -->
            <!--   <li><span id="delete"><a href="javascript:;" onclick="GestaoAssunto.execDel()" title="Deletar Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/delete_user.png" alt=""/>Deletar Seleção</a></span></li> -->
            <li>
                <span id="busca">
                    <a href="javascript:;" onclick="js.showSearchs()" title="Buscar"><img src="{$smarty.const.HTTP_URL}img/admin/lupa1.png" alt=""/>Buscar</a>
                </span>
            </li>
        </ul>
    </div>
    {/if}
    <div id="search" style="display:none">
        <form action="" method="post" id="formListAssunto" onsubmit="GestaoAssunto.execList(); return false">
            <input type="hidden" name="ACTION" value="ExecListAssuntoAction" />
            <fieldset>

                <legend>Busca de Assuntos </legend>
                <table class="container_busca" align="center">

                    <tr>
                        <td><label for="formListAssunto_assunto">Pesquisar por:</label></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input id="formListAssunto_assunto" type="text" class="text" name="assunto" title="Critérios" style="width: 300px;"/>
                        </td>
                        <td>
                            <input type="submit" value="Buscar" class="submit"/>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <select size="1" id="formListAssunto_ordem" class="text" name="ordem" title="Representa o critério usado para ordenar os resultados." style="width: 105px;">
                                <!--   <option value="">::Critério::</option>  -->
				{html_options options=$optionsOrdem}
                            </select>
                            &nbsp;&nbsp;

                            <select size="1" id="formListAssunto_sentido" class="text" name="sentido" title="Trata-se da forma como os resultados serão ordenados.">
                                <option value="">::Sentido::</option>
				{html_options options=$optionsSentidoOrdem}
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
    <div class="clear">
    </div>
    <div class="container_table" id="lista_assunto">
    </div>


</fieldset>
<div class="icons" style="border-top: 1px solid #A9D5FB; margin-top: -9px;">
    <span class="hide">
        <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">
            <span style="display:none">
                <<
            </span>
        </a>
    </span>
    <ul>
        <li><span id="save"><a href="javascript:;" onclick="GestaoProcessos.cadDistribuicao(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
    </ul>
</div>