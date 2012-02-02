<?php /* Smarty version 2.6.12, created on 2011-02-19 20:21:57
         compiled from pessoas/cadPessoa.tpl */ ?>
<div class="icons">
	<ul>

            <li><span id="save"><a href="javascript:;" id="formSavePessoa_submit" onclick="GestaoPessoas.cadPessoa(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save1.png" alt=""/>Salvar</a></span></li>
            <li><span id="cancel"><a href="javascript:;" onclick="GestaoPessoas.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
 
	</ul>
</div>
<fieldset class="all">
	<legend>Cadastro de Funcionários</legend>
	<form action="" method="post" id="formSavePessoa" onsubmit="GestaoPessoas.cadPessoa(); return false">
	      <input type="hidden" name="ACTION" value="<?php echo $this->_tpl_vars['actionForm']; ?>
" />
	      <input type="hidden" name="formId" value="formSavePessoa" />
		  <input type="hidden" name="idPessoa" value="<?php echo $this->_tpl_vars['pessoa']['idPessoa']; ?>
" />
                  <input type="hidden" name="parte" id="formSavePessoa_pessoa" value="<?php echo $this->_tpl_vars['pessoa']['parte']; ?>
" />

           <div class="container_field_new" style=" width: 600px; padding-top:15px;  background-color: white; padding: 5px 5px 5px 5px; margin-left: 20px;">
                <div class="field" style="margin-bottom: 20px; margin-left: 10px; width: 300px">
			<label for="formSavePessoa_nome" class="lbl">Nome:</label>
                        <input id="formSavePessoa_nome" name="nome" type="text" class="input_text" style="width: 250px;" value="<?php echo $this->_tpl_vars['pessoa']['nome']; ?>
" title="Digite um Nome da parte"/>
			<span class="aux_field" id="formSavePessoa_auxField_nome">Digite um Nome da parte</span>
		</div>
	    
           <!--    <div class="field" style="margin-bottom: 20px; margin-left: 10px;">
			<label for="formSavePessoa_parte" class="lbl">Parte:</label>
                        <input id="formSavePessoa_parte" name="parte" type="text" class="input_text" value="<?php echo $this->_tpl_vars['pessoa']['parte']; ?>
" title="Digite o tipo da parte. Ex.: impetrado" value="<?php echo $this->_tpl_vars['pessoa']['parte']; ?>
"/>
			<span class="aux_field" id="formSavePessoa_auxField_parte">Digite o tipo da parte. Ex.: impetrado</span>
		</div> -->
            </div>
	</form>	
	<script language="javascript" type="text/javascript">
		FormUtil.initForm('formSavePessoa');
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
	<li><span id="save"><a href="javascript:;" onclick="GestaoPessoas.cadPessoa(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save1.png" alt=""/>Salvar</a></span></li>
   
    <li><span id="cancel"><a href="javascript:;" onclick="GestaoPessoas.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>

</ul>
</div>