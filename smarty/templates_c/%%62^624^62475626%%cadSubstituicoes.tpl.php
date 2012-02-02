<?php /* Smarty version 2.6.12, created on 2012-01-09 20:29:42
         compiled from substituicoes/cadSubstituicoes.tpl */ ?>
<div class="icons">
    <ul>

        <li><span id="save"><a href="javascript:;" id="formSaveSubstituicoes_submit" onclick="GestaoSubstituicoes.cadSubstituicoes(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoSubstituicoes.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>

    </ul>
</div>
<fieldset class="all">
    <legend>Cadastro de Funcionários</legend>
    <form action="" method="post" id="formSaveSubstituicoes" onsubmit="GestaoSubstituicoes.cadSubstituicoes(); return false">
        <input type="hidden" name="ACTION" value="<?php echo $this->_tpl_vars['actionForm']; ?>
" />
        <input type="hidden" name="formId" value="formSaveSubstituicoes" />
        <input type="hidden" name="idSubstituicoes" value="<?php echo $this->_tpl_vars['substituicoes']['idSubstituicaoProcurador']; ?>
" />
        <input type="hidden" name="fkUsuarioOriginal" value="<?php echo $this->_tpl_vars['fkUsuarioOriginal']; ?>
" />
        <input type="hidden" name="fkUsuario" id="formSaveSubstituicoes_fkUsuario" value="<?php echo $this->_tpl_vars['processo']['fkUsuario']; ?>
" />

        <div class="container_field_new" style=" width: 600px; padding-top:15px;  background-color: white; padding: 5px 5px 5px 5px; margin-left: 20px;">
            <div class="field">
                <label for="formSaveSubstituicoes_temporaria" class="lbl">Processo<?php echo $this->_tpl_vars['substituicoes']['idProcesso']; ?>
</label>
                <?php if ($this->_tpl_vars['substituicoes']['processo'] || $this->_tpl_vars['numero_processo']): ?>
                <select id="formSaveSubstituicoes_processo"  readonly="readonly" class="input_text" title="Escolha se é substituição temporária." onchange="GestaoProcessos.loadProcuradorOriginal(this.value)">
                    <option><?php echo $this->_tpl_vars['numero_processo']; ?>
</option>
                </select>
                <?php if ($this->_tpl_vars['substituicoes']['processo'] == ""): ?> 
                <input name="processo" type="hidden" value="<?php echo $this->_tpl_vars['fkProcesso']; ?>
" />
                <?php else: ?>
                <input name="processo" type="hidden" value="<?php echo $this->_tpl_vars['substituicoes']['processo']; ?>
" />
                <?php endif; ?>
                <?php else: ?>
                <select id="formSaveSubstituicoes_processo" name="processo" class="input_text" title="Escolha se é substituição temporária." onchange="GestaoProcessos.loadProcuradorOriginal(this.value)">
                    <option value=""> ::Selecione:: </option>
                    <?php $_from = $this->_tpl_vars['processos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                    <option value="<?php echo $this->_tpl_vars['item']['idProcesso']; ?>
"> <?php echo $this->_tpl_vars['item']['numeroProcesso']; ?>
 </option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
                <?php endif; ?><br class="none"/>
                <span class="aux_field" id="formSaveSubstituicoes_auxField_processo">
				Escolha o número do processo
                </span>
            </div>
            <div class="field" id="cont-usuario">
                <label for="formSaveSubsituicaoProcesso_usuario_disabled" class="lbl">Procurador Original:</label>
                <input type="text" value="<?php if ($this->_tpl_vars['procurador_original']): ?> <?php echo $this->_tpl_vars['procurador_original']; ?>
 <?php else: ?> Selecione o processo<?php endif; ?>" readonly="readonly" value="" id="formSaveSubsituicaoProcesso_usuario_disabled" name="usuario" title="Escreva o nome do procurador para buscá-lo" class="input_text" />
                <span class="aux_field" id="formSaveSubstituicoes_auxField_usuario_disabled">Procurador atual</span>
            </div>
        </div>
        <div class="container_field_new" style=" width: 600px; padding-top:15px;  background-color: white; padding: 5px 5px 5px 5px; margin-left: 20px;">

            <div class="field" id="cont-usuario">
                <label for="formSaveSubstituicoes_usuario" class="lbl">Novo Procurador:</label>
                <input type="text" id="formSaveSubstituicoes_usuario" name="usuario" title="Escreva o nome do procurador para buscá-lo" class="input_text" value="<?php echo $this->_tpl_vars['procurador_subbstituto']['nome']; ?>
" />
                <span class="aux_field" id="formSaveSubstituicoes_auxField_usuario">Distribuição de Processo: Informe o procurador que ficará responsável por este processo</span>
            </div>
            
            <div class="field">
                <label for="formSaveSubstituicoes_temporaria" class="lbl">Subst. temporária:</label>
                <select id="formSaveSubstituicoes_temporaria" name="temporaria" class="input_text" title="Escolha se é substituição temporária." onchange="GestaoSubstituicoes.showHide(this.value)">
                    <option value=""> ::Selecione:: </option>
                    <option value="s" <?php if ($this->_tpl_vars['substituicoes']['temporaria'] == 's'): ?> selected <?php endif; ?>> Sim </option>
                    <option value="n" <?php if ($this->_tpl_vars['substituicoes']['temporaria'] == 'n'): ?> selected <?php endif; ?>> Nâo </option>

                </select><br class="none"/>
                <span class="aux_field" id="formSaveSubstituicoes_auxField_temporaria">
				Escolha se é substituição temporária
                </span>
            </div>

            <div id="container_temporaria" <?php if ($this->_tpl_vars['substituicoes']['temporaria'] == 's'): ?> style="display: block;" <?php else: ?> style="display: none;"<?php endif; ?>>
                 <div class="field_textarea" style="height: 75px; margin-bottom: 20px;">
                     <label for="formSaveSubstituicoes_motivo" class="lbl" style="margin-left: 5px;">Motivo da substiuição</label>
                    <textarea id="formSaveSubstituicoes_motivo" name="motivo" class="input_text" style="width: 300px; height: 50px; margin-left: 5px;"  title="Escreva uma motivo para o tipo de processo escolhido"><?php echo $this->_tpl_vars['substituicoes']['motivoSubstituicao']; ?>
</textarea>
                    <span class="aux_field" id="formSaveSubstituicoes_auxField_motivo" style="width: 300px !important; margin-left: 5px;">Diga o motivo da substituição.</span>
                </div>
                <div class="field_textarea" style="height: 75px; margin-bottom: 20px;">
                    <label for="formSaveSubstituicoes_obs" class="lbl" style="margin-left: 5px;">Obs:</label>
                    <textarea id="formSaveSubstituicoes_obs" name="obs" class="input_text" style="width: 300px; height: 50px; margin-left: 5px;"  title="Escreva uma obs para o tipo de processo escolhido"><?php echo $this->_tpl_vars['substituicoes']['observacao']; ?>
</textarea>
                    <span class="aux_field" id="formSaveSubstituicoes_auxField_obs" style="width: 300px !important; margin-left: 5px;">Escreva uma obsercação para esta substituição (opcional).</span>
                </div>
            </div>
        </div>
    </form>
    <script language="javascript" type="text/javascript">
            FormUtil.initForm('formSaveSubstituicoes');
    </script>
</fieldset>
<div class="icons">
    <span class="hide">
        <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">
            <span style="display:none">
                <<
            </span>
        </a>
    </span>
    <ul>
        <li><span id="save"><a href="javascript:;" onclick="GestaoSubstituicoes.cadSubstituicoes(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save1.png" alt=""/>Salvar</a></span></li>

        <!--<li><span id="cancel"><a href="javascript:;" onclick="GestaoSubstituicoes.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>-->
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoSubstituicoes.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>

    </ul>
</div>