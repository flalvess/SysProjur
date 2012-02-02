<div class="icons">
    <ul>
     <!--   <li><span id="add"><a href="javascript:;" onclick="GestaoHistoricos.initCad()" title="Incluir Novo Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/add_user.png" alt=""/>Incluir Novo</a></span></li>
        <li><span id="delete"><a href="javascript:;" onclick="GestaoHistoricos.execDel()" title="Deletar Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/delete_user.png" alt=""/>Deletar Seleção</a></span></li>  -->
        <li>
            <span id="busca">
                <a href="javascript:;" onclick="js.showSearchs()" title="Buscar"><img src="{$smarty.const.HTTP_URL}img/admin/lupa1.png" alt=""/>Buscar</a>
            </span>
        </li>
    </ul>
</div>
<div id="search" style="display:none">
    <form action="" method="post" id="formListHistorico" onsubmit="GestaoHistorico.execList(); return false">
        <input type="hidden" name="ACTION" value="ExecListHistoricoAction" />
        <fieldset>
            <legend>Busca de Historicos </legend>
            <table class="container_busca" align="center">

                <tr>
                    <td><label for="formListHistorico_Historico">Pesquisar por:</label></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <input id="formListHistorico_Historico" type="text" class="text" name="historico" title="Critérios: teste" style="width: 300px;"/>
                    </td>
                    <td>
                        <input type="submit" value="Buscar" class="submit"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <select size="1" id="formListHistorico_ordem" class="text" name="ordem" title="Representa o critério usado para ordenar os resultados." style="width: 105px;">
                            <!--     <option value="">::Critério::</option> -->
				            {html_options options=$optionsOrdem}
                        </select>
                        &nbsp;&nbsp;

                        <select size="1" id="formListHistorico_sentido" class="text" name="sentido" title="Trata-se da forma como os resultados serão ordenados.">
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
<div class="container_table" id="lista_Historico">
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
