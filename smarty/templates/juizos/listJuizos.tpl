<div class="icons">
    <ul>
        <li><span id="add"><a href="javascript:;" onclick="GestaoJuizos.initCad()" title="Incluir Novo Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/add_user.png" alt=""/>Incluir Novo</a></span></li>
        <li><span id="delete"><a href="javascript:;" onclick="GestaoJuizos.execDel()" title="Deletar Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/delete_user.png" alt=""/>Deletar Seleção</a></span></li>
        <li>
            <span id="busca">
                <a href="javascript:;" onclick="js.showSearchs()" title="Buscar"><img src="{$smarty.const.HTTP_URL}img/admin/lupa1.png" alt=""/>Buscar</a>
            </span>
        </li>
    </ul>
</div>
<div id="search" style="display:none">
    <form action="" method="post" id="formListJuizo" onsubmit="GestaoJuizos.execList(); return false">
        <input type="hidden" name="ACTION" value="ExecListJuizosAction" />
        <fieldset>
            <legend>Busca de Juizos </legend>
            <table class="container_busca" align="center">

                <tr>
                    <td><label for="formListJuizo_juizo">Pesquisar por:</label></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <input id="formListJuizo_juizo" type="text" class="text" name="juizo" title="Critérios" style="width: 300px;"/>
                    </td>
                    <td>
                    <input type="submit" value="Buscar" class="submit"/>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <select size="1" id="formListJuizo_ordem" class="text" name="ordem" title="Representa o critério usado para ordenar os resultados." style="width: 105px;">
                         <!--   <option value="">::Critério::</option> -->
				{html_options options=$optionsOrdem}
                        </select>
                        &nbsp;&nbsp;

                        <select size="1" id="formListJuizo_sentido" class="text" name="sentido" title="Trata-se da forma como os resultados serão ordenados.">
                            <option value="">::Sentido::</option>
				{html_options options=$optionsSentidoOrdem}
                        </select>
                    </td>
                    <!--  <td><input type="submit" value="Buscar" class="submit"/></td> -->
                </tr>

                <!-- <tr>
                   <td><label for="formListJuizo_juizo">Pesquisar por:</label><font style="color: green"> Nome ou Cidade</font></td>
                   <td>&nbsp;</td>
                 </tr>
                 <tr>
                   <td><input id="formListJuizo_juizo" type="text" class="text" name="nome" /></td>
                   <td><input type="submit" value="Buscar" class="submit"/></td>
                 </tr> -->
            </table>
        </fieldset>
    </form>
</div>
<div class="clear">
</div>
<div class="container_table" id="lista_juizos">
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
