<?php /* Smarty version 2.6.12, created on 2011-02-24 22:20:11
         compiled from substituicoes/tabelaSubstituicoes.tpl */ ?>
<form action="" method="post" id="formDelSubstituicoes">
    <input type="hidden" name="ACTION" value="ExecDelSubstituicoesAction" />
    <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
        <thead>
            <tr id="list_fields">
                <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
                <th>Número Processo</th>
                <th>Procurador Anterior</th>
                <th>Procurador Substituto</th>
                <th style="border-right:none;">Opção</th>
            </tr>
        </thead>
        <tbody>
            <?php $_from = $this->_tpl_vars['arrayItens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['substituicoes']):
?>
            <tr onmouseOver="js.collorTrHover()" class="trTable">
                <td class="lista"><input type="checkbox" name="idSubstituicoes[]" value="<?php echo $this->_tpl_vars['substituicoes']['idSubstituicaoProcurador']; ?>
" id="item_<?php echo $this->_tpl_vars['substituicoes']['idSubstituicaoProcurador']; ?>
"/>
                </td>
                <td class="lista"><label>
                     <b><?php echo $this->_tpl_vars['substituicoes']['numeroProcesso']; ?>
 </b>
                    </label>
                </td>
                <td class="lista left"><label>
                        <?php if ($this->_tpl_vars['substituicoes']['original'] == ""): ?>
                            <?php echo $this->_tpl_vars['substituicoes']['origInicial']; ?>

                        <?php else: ?>
                             <?php echo $this->_tpl_vars['substituicoes']['original']; ?>

                        <?php endif; ?> 
                    </label></td>
                <td class="lista"><label>
                        <?php if ($this->_tpl_vars['substituicoes']['substituto'] == ""): ?>
                            <font color="red">Sem substituição</font>
                        <?php else: ?>
                            <?php echo $this->_tpl_vars['substituicoes']['substituto']; ?>

                        <?php endif; ?>
                    </label></td>
		<td class="lista">
                     <label>
                        <a href="javascript:GestaoSubstituicoes.initEdit('<?php echo $this->_tpl_vars['substituicoes']['idProcesso']; ?>
');" title="Editar Usuário"><img src="<?php echo @HTTP_URL; ?>
img/admin/edit1.png" alt=""/></a>
                    </label></td>
               </tr>
            <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
</form>
<div class="pagination" id="paginacao_list_substituicoes">
    <?php echo $this->_tpl_vars['paginacao']; ?>

</div>
<p class="quant"><b><?php echo $this->_tpl_vars['retornados']; ?>
</b> itens encontrados de <b><?php echo $this->_tpl_vars['total']; ?>
</b> no total.</p>