<div class="icons">
	<ul>
	<!--	<li><span id="add"><a href="javascript:;" onclick="GestaoAssunto.initCad()" title="Incluir Novo Usu�rio"><img src="{$smarty.const.HTTP_URL}img/admin/add_user.png" alt=""/>Incluir Novo</a></span></li> -->
		<li><span id="delete"><a href="javascript:;" onclick="GestaoAssunto.execDel()" title="Deletar Usu�rio"><img src="{$smarty.const.HTTP_URL}img/admin/delete_user.png" alt=""/>Deletar Sele��o</a></span></li>
		<li>
		  <span id="busca">
			<a href="javascript:;" onclick="js.showSearchs()" title="Buscar"><img src="{$smarty.const.HTTP_URL}img/admin/lupa1.png" alt=""/>Buscar</a>
		  </span>
		</li>
	</ul>
</div>
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
                        <input id="formListAssunto_assunto" type="text" class="text" name="assunto" title="Crit�rios" style="width: 300px;"/>
                    </td>
                    <td>
                    <input type="submit" value="Buscar" class="submit"/>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <select size="1" id="formListAssunto_ordem" class="text" name="ordem" title="Representa o crit�rio usado para ordenar os resultados." style="width: 105px;">
                            <option value="">::Crit�rio::</option>
				{html_options options=$optionsOrdem}
                        </select>
                        &nbsp;&nbsp;

                        <select size="1" id="formListAssunto_sentido" class="text" name="sentido" title="Trata-se da forma como os resultados ser�o ordenados.">
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
<div class="icons">
  <span class="hide">
    <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">
    <span style="display:none">
      <<
    </span>
    </a>
  </span>
</div>
