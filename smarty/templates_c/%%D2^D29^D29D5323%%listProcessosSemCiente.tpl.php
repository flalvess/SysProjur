<?php /* Smarty version 2.6.12, created on 2011-10-21 20:59:49
         compiled from processos/listProcessosSemCiente.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'processos/listProcessosSemCiente.tpl', 47, false),)), $this); ?>
<?php echo '
<script language="javascript" type="text/javascript">


</script>
'; ?>

<div class="icons">
    <ul>
        <li><span id="add"><a href="javascript:;" onclick="GestaoProcessos.initCad()" title="Incluir Novo Usuário"><img src="<?php echo @HTTP_URL; ?>
img/admin/add_user.png" alt=""/>Incluir Novo</a></span></li>
        <li><span id="delete"><a href="javascript:;" onclick="GestaoProcessos.execDel()" title="Deletar Usuário"><img src="<?php echo @HTTP_URL; ?>
img/admin/delete_user.png" alt=""/>Deletar Seleção</a></span></li>
        <li>
            <span id="busca">
                <a href="javascript:;" onclick="js.showSearchs()" title="Buscar"><img src="<?php echo @HTTP_URL; ?>
img/admin/lupa1.png" alt=""/>Buscar</a>
            </span>
        </li>
    </ul>
</div>
<div id="search" style="display:none">
    <form action="" method="post" id="formListProcesso" onsubmit="GestaoProcessos.execListSemCiente(); return false">
        <input type="hidden" name="ACTION" value="ExecListProcessosSemCienteAction" />
        <!--<input type="hidden" name="idFuncionario" id="formListProcesso_idFuncionario" value="" /> -->
      <!--  <input type="hidden" name="fkProcurador" id="formListProcesso_fkProcurador" value="" /> -->
        <input type="hidden" name="fkUsuario" id="formListProcesso_fkUsuario" value="" />

        <fieldset>
            <legend>Busca de Processos </legend>
            <table class="container_busca" align="center">

                <tr class="verde" onclick="fundo(cor='#0000ff')" >
                    <td><label for="formListProcesso_processo">Pesquisar por:</label></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <input id="formListProcesso_processo" type="text"  class="text" name="processo" title="Critérios: teste" style="width: 300px;"/>
                    </td>
                    <td>
                        <input type="submit" value="Buscar" class="submit"/>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <select size="1" id="formListProcesso_ordem" class="text" name="ordem" title="Representa o critério usado para ordenar os resultados." style="width: 105px;">
                          <!--  <option value="">::Critério::</option> -->
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optionsOrdem']), $this);?>

                        </select>
                        &nbsp;&nbsp;

                        <select size="1" id="formListProcesso_sentido" class="text" name="sentido" title="Trata-se da forma como os resultados serão ordenados.">
                            <option value="">::Sentido::</option>
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optionsSentidoOrdem']), $this);?>

                        </select>
                    </td>
                    <!--  <td><input type="submit" value="Buscar" class="submit"/></td> -->
                </tr>

                <?php if ($this->_tpl_vars['grupo'] == 'a'): ?>
                <tr >
                    <td><br></br> <label for="formListProcesso_usuario">Procurador:</label></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <input id="formListProcesso_usuario" type="text" class="text" title="Critérios: teste" style="width: 300px;"/>
                        
                    </td>
                    <td>
                        <input type="submit" value="Buscar" class="submit"/>
                    </td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td><br></br> <label for="formListProcesso_dataEntrada">Data de Entrada:</label></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <input id="formListProcesso_dataEntrada" type="text" class="text" name="dataEntrada" title="Critérios: teste" style="width: 300px;"/>
                    </td>
                    <td>
                        <input type="submit" value="Buscar" class="submit"/>
                    </td>
                </tr>
               
            </table>

            <!--<div class="busca_processos">
            <label for="formListProcesso_processo">Item do Processo:</label>
            <input id="formListProcesso_processo" type="text" class="text" name="processo"/>
		<select size="1" id="formListProcesso_ordem" class="select_busc_processo" name="ordem" title="Representa o critério usado para ordenar os resultados.">
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optionsOrdem']), $this);?>

		</select><br/>
	     <select size="1" id="formListProcesso_tipoProcesso" class="select_busc_processo" name="tipoProcesso" title="Representa o critério usado para ordenar os resultados.">
		<option value="">--Selecione--</option>
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optionsTipoProcesso']), $this);?>

		</select><br/> 
		<select size="1" id="formListProcesso_sentido" class="select_busc_processo" name="sentido" class="field" title="Trata-se da forma como os resultados serão ordenados.">
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optionsSentidoOrdem']), $this);?>

		</select>&nbsp;&nbsp;
		<label for="formListProcesso_procurador">Procurador:</label>
            <input id="formListProcesso_procurador" type="text" class="text" name="procurador"/>
		<label for="formListProcesso_dataEntrada">Data de Entrada:</label>
            <input id="formListProcesso_dataEntrada" type="text" class="text" name="dataEntrada"/>
		<label for="formListProcesso_dataFinalRec">Data final de recebimento:</label>
            <input id="formListProcesso_dataFinalRec" type="text" class="text" name="dataFinalRec"/>
		<label for="formListProcesso_dataInicialRec">Data inicial de saída:</label>
            <input id="formListProcesso_dataInicialSai" type="text" class="text" name="dataInicialSai"/>
		<label for="formListProcesso_dataFinalSai">Data final de saída:</label>
            <input id="formListProcesso_dataFinalSai" type="text" class="text" name="dataFinalSai"/>
            <input type="submit" value="Buscar" class="submit"/>
	</div> -->
        </fieldset>
    </form>
</div>
<div class="clear">
</div>
<div class="container_table" id="lista_processos">
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