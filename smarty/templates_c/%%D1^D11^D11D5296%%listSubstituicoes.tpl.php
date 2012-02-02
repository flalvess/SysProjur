<?php /* Smarty version 2.6.12, created on 2011-02-24 22:20:11
         compiled from substituicoes/listSubstituicoes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'substituicoes/listSubstituicoes.tpl', 38, false),)), $this); ?>
<div class="icons">
	<ul>
		<!--<li><span id="add"><a href="javascript:;" onclick="GestaoSubstituicoes.initCad()" title="Incluir Novo Usuário"><img src="<?php echo @HTTP_URL; ?>
img/admin/add_user.png" alt=""/>Incluir Novo</a></span></li>
		<li><span id="delete"><a href="javascript:;" onclick="GestaoSubstituicoes.execDel()" title="Deletar Usuário"><img src="<?php echo @HTTP_URL; ?>
img/admin/delete_user.png" alt=""/>Deletar Seleção</a></span></li>-->
		<li>
		  <span id="busca">
			<a href="javascript:;" onclick="js.showSearchs()" title="Buscar"><img src="<?php echo @HTTP_URL; ?>
img/admin/lupa1.png" alt=""/>Buscar</a>
		  </span>
		</li>
	</ul>
</div>
<div id="search" style="display:none">
  <form action="" method="post" id="formListSubstituicoes" onsubmit="GestaoSubstituicoes.execList(); return false">
    <input type="hidden" name="ACTION" value="ExecListSubstituicoesAction" />
     <input id="formListSubstituicoes_substituicaoId" type="hidden" class="text" name="substituicaoId"/>

    <fieldset>
    <legend>Busca de Substituicoes </legend>
		 <table class="container_busca" align="center">

                <tr>
                    <td><label for="formListSubstituicoes_substituicao">Pesquisar por:</label></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <input id="formListSubstituicoes_substituicao" type="text" class="text" name="substituicao" title="Critérios: teste" style="width: 300px;"/>
                    </td>
                    <td>
                        <input type="submit" value="Buscar" class="submit"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <select size="1" id="formListSubstituicoes_ordem" class="text" name="ordem" title="Representa o critério usado para ordenar os resultados." style="width: 105px;">
                            <!--     <option value="">::Critério::</option> -->
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optionsOrdem']), $this);?>

                        </select>
                        &nbsp;&nbsp;

                        <select size="1" id="formListSubstituicoes_sentido" class="text" name="sentido" title="Trata-se da forma como os resultados serão ordenados.">
                            <option value="">::Sentido::</option>
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optionsSentidoOrdem']), $this);?>

                        </select>
                    </td>
                </tr>
            </table>
    </fieldset>
    </form>
</div>
<div class="clear">
</div>
<div class="container_table" id="lista_substituicoes">
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