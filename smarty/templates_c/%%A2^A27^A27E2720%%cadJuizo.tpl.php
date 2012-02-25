<?php /* Smarty version 2.6.12, created on 2012-02-23 11:26:11
         compiled from juizos/cadJuizo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'juizos/cadJuizo.tpl', 32, false),)), $this); ?>
<div class="icons">
    <ul>

        <li><span id="save"><a href="javascript:;" id="formSaveJuizo_submit" onclick="GestaoJuizos.cadJuizo(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoJuizos.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>

    </ul>
</div>
<fieldset class="all">
    <legend>Cadastro de Funcionários</legend>
    <form action="" method="post" id="formSaveJuizo" onsubmit="GestaoJuizos.cadJuizo(); return false">
        <input type="hidden" name="ACTION" value="<?php echo $this->_tpl_vars['actionForm']; ?>
" />
        <input type="hidden" name="formId" value="formSaveJuizo" />
        <input type="hidden" name="idJuizo" value="<?php echo $this->_tpl_vars['juizo']['idJuizo']; ?>
" />

        <div class="container_field_new" style=" width: 600px; padding-top:15px;  background-color: white; padding: 5px 5px 5px 5px; margin-left: 20px;">
        <div class="field" style="margin-bottom: 20px; margin-left: 10px;">
            <label for="formSaveJuizo_nome" class="lbl">Juizo:</label>
            <input id="formSaveJuizo_nome" name="nome" type="text" class="input_text" value="<?php echo $this->_tpl_vars['juizo']['nome']; ?>
" title="Digite um Nome para o funcionário"/>
            <span class="aux_field" id="formSaveJuizo_auxField_nome">Digite um Nome para o funcionário</span>
        </div>
        <!-- <div class="field">
             <label for="formSaveJuizo_sigla" class="lbl">Cidade:</label>
             <input id="formSaveJuizo_sigla" name="sigla" type="text" class="input_text" title="Digite a Matrícula do funcionário" value="<?php echo $this->_tpl_vars['juizo']['sigla']; ?>
"/>
             <span class="aux_field" id="formSaveJuizo_auxField_sigla">Escolha a cidade onde o Juízo está</span>
         </div> -->

        <div class="field" style="margin-bottom: 20px; margin-left: 10px;">
            <label for="formSaveJuizo_fkCidade" class="lbl">Cidade:</label>
            <select id="formSaveJuizo_fkCidade" class="input_text" name="fkCidade" title="Escolha a cidade">
                <option value="0">:: Selecione ::</option>
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optionsCidade'],'selected' => $this->_tpl_vars['juizo']['fkCidade']), $this);?>

            </select>
            <span class="aux_field" id="formSaveJuizo_auxField_fkCidade">
				 Escolha a cidade do Juízo
            </span>
        </div>

</div>
    </form>
    <script language="javascript" type="text/javascript">
            FormUtil.initForm('formSaveJuizo');
    </script>
</fieldset>
<div class="icons">
    <span class="hide" style="float: right;">
        <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">
            <span style="display:none">
                <<
            </span>
        </a>
    </span>
    <ul>
        <li><span id="save"><a href="javascript:;" onclick="GestaoJuizos.cadJuizo(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save1.png" alt=""/>Salvar</a></span></li>

        <!--<li><span id="cancel"><a href="javascript:;" onclick="GestaoJuizos.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel.png" alt=""/>Cancelar</a></span></li>-->
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoJuizos.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>

    </ul>
</div>