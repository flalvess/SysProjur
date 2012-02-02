{literal}
<script language="javascript" type="text/javascript">


</script>
{/literal}
<div class="icons">
    <ul>
        <li><span id="add"><a href="javascript:;" onclick="GestaoAtividade.initCad()" title="Incluir Novo Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/add_user.png" alt="" />Incluir Novo</a></span></li>
        <li>
            <span id="busca">
                <a href="javascript:;" onclick="js.showSearchs()" title="Buscar"><img src="{$smarty.const.HTTP_URL}img/admin/lupa1.png" alt=""/>Buscar</a>
            </span>
        </li>
    </ul>
</div>
<div id="search" style="display:none">
    <form action="" method="post" id="formListAtividade" onsubmit="GestaoAtividadeEnv.execListEnv(); return false">
        <input type="hidden" name="ACTION" value="ExecListEnvAtividadeAction" />
        <fieldset>
            <legend>Busca de Atividades </legend>
            <table class="container_busca" align="center">

                <tr>
                    <td><label for="formListAtividade_atividade">Pesquisar por:</label></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <input id="formListAtividade_atividade" type="text" class="text" name="atividade" title="Critérios: teste" style="width: 300px;"/>
                    </td>
                    <td>
                        <input type="submit" value="Buscar" class="submit"/>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <select size="1" id="formListAtividade_ordem" class="text" name="ordem" title="Representa o critério usado para ordenar os resultados." style="width: 105px;">
                            <!--  <option value="">::Critério::</option> -->
				{html_options options=$optionsOrdem}
                        </select>
                        &nbsp;&nbsp;

                        <select size="1" id="formListAtividade_sentido" class="text" name="sentido" title="Trata-se da forma como os resultados serão ordenados.">
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
