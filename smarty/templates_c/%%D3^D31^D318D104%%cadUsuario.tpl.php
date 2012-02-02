<?php /* Smarty version 2.6.12, created on 2012-01-09 21:37:30
         compiled from usuarios/cadUsuario.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'usuarios/cadUsuario.tpl', 50, false),)), $this); ?>
<div class="icons">
    <ul>
        <li><span id="save"><a href="javascript:;" id="formSaveUsuario_submit" onclick="GestaoUsuarios.cadUsuario(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoUsuarios.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
    </ul>
</div>
<fieldset class="all">
    <legend>Cadastro de Usuários</legend>
    <form action="" method="post" id="formSaveUsuario" onsubmit="GestaoUsuarios.cadUsuario(); return false">
        <input type="hidden" name="ACTION" value="<?php echo $this->_tpl_vars['actionForm']; ?>
" />
        <input type="hidden" name="formId" value="formSaveUsuario" />
        <input type="hidden" name="idUsuario" value="<?php echo $this->_tpl_vars['usuario']['idUsuario']; ?>
" />
        <input type="hidden" name="loginAntigo" value="<?php echo $this->_tpl_vars['usuario']['login']; ?>
" />

        <div class="container_field_new" style=" width: 600px; padding-top:15px;  background-color: white; padding: 5px 5px 5px 5px; margin-left: 20px;">

            <div class="field" style="margin-bottom: 20px; width: 450px !important;">
                <label for="formSaveUsuario_nome" class="lbl">Nome:</label>
                <input id="formSaveUsuario_nome" name="nome" type="text" class="input_text" style="width: 450px;" value="<?php echo $this->_tpl_vars['usuarioInfo']['nome']; ?>
" title="Digite seu Nome"/>
                <span class="aux_field" id="formSaveUsuario_auxField_nome">Nome do Usuário</span>
            </div>
            <div class="field" style="margin-bottom: 20px;">
                <label for="formSaveUsuario_email" class="lbl" >Email:</label>
                <input id="formSaveUsuario_email" name="email" type="text" class="input_text" value="<?php echo $this->_tpl_vars['usuarioInfo']['email']; ?>
" title="Digite um Email para ter acesso ao Admin"/>
                <span class="aux_field" id="formSaveUsuario_auxField_email">Digite um Email para ter acesso ao Admin</span>
            </div>

            <div class="field" style="margin-bottom: 20px;  width: 320px !important;">
                <label for="formSaveUsuario_login" class="lbl" >Login:</label>
                <input id="formSaveUsuario_login" name="login" type="text" class="input_text" value="<?php echo $this->_tpl_vars['usuario']['login']; ?>
" title="Digite um Login para ter acesso ao Admin"/>
                <span class="aux_field" id="formSaveUsuario_auxField_login" style="width: 250px !important;">Digite um Login para ter acesso ao Admin</span>
            </div>
            
            <div class="field" style="margin-bottom: 20px;">
                <label for="formSaveUsuario_senha" class="lbl">Senha:</label>
                <input id="formSaveUsuario_senha" name="senha" type="password" class="input_text" title="Digite uma Senha para ter acesso ao Admin"/>
                <span class="aux_field" id="formSaveUsuario_auxField_senha">Digite uma Senha para ter acesso ao Admin</span>
            </div>
            <div class="field" style="margin-bottom: 20px;" >
                <label for="formSaveUsuario_confSenha" class="lbl">Repetir Senha:</label>
                <input id="formSaveUsuario_confSenha" name="confSenha" type="password" class="input_text" title="Confirme sua Senha"/>
                <span class="aux_field" id="formSaveUsuario_auxField_confSenha" >Repita sua Senha</span>
            </div>
            <?php if ($this->_tpl_vars['usuarioInfo']['nome'] != ""): ?>
            <div class="field" style="margin-bottom: 20px;">
                <label for="formSaveUsuario_afastamento" class="lbl" >Afastamento:</label>
                <select id="formSaveUsuario_afastamento" name="afastamento" class="input_text" title="Informe se o procurador está afastado temporariamente.">
                    <option value=""> ::Selecione:: </option>

                    <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['valueAfastamento'],'output' => $this->_tpl_vars['outAfastamento'],'selected' => $this->_tpl_vars['usuario']['afastamento']), $this);?>


                </select><br class="none"/>
                <span class="aux_field" id="formSaveUsuario_auxField_afastamento">
				Informe se o procurador está afastado temporariamente
                </span>
            </div>
            <?php endif; ?>
        </div>

    </form>
    <script language="javascript" type="text/javascript">
            FormUtil.initForm('formSaveUsuario');
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
        <li><span id="save"><a href="javascript:;" onclick="GestaoUsuarios.cadUsuario(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoUsuarios.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
    </ul>
</div>