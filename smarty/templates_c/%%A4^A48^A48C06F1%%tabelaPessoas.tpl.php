<?php /* Smarty version 2.6.12, created on 2011-02-19 20:18:44
         compiled from pessoas/tabelaPessoas.tpl */ ?>
<form action="" method="post" id="formDelPessoas">
  <input type="hidden" name="ACTION" value="ExecDelPessoasAction" />
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
        <th>Nome</th>
       <!-- <th>Parte</th> -->
        <th style="">&nbsp;&nbsp;Status&nbsp;&nbsp;</th>
        <th style="border-right:none;">Opção</th>
      </tr>
    </thead>
    <tbody>
      <?php $_from = $this->_tpl_vars['arrayItens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pessoa']):
?>
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idPessoas[]" value="<?php echo $this->_tpl_vars['pessoa']['idPessoa']; ?>
" id="item_<?php echo $this->_tpl_vars['pessoa']['idPessoa']; ?>
"/>
        </td>
        <td class="lista left"><label>
          <?php echo $this->_tpl_vars['pessoa']['nome']; ?>

          </label>
        </td>
     <!--   <td class="lista left"><label>
          <?php echo $this->_tpl_vars['pessoa']['parte']; ?>

          </label></td> -->
        <td class="lista">
	      <?php if ($this->_tpl_vars['pessoa']['status'] == 1): ?>
	         <?php $this->assign('imgStatus', 'ok'); ?>
			 <?php $this->assign('labelStatus', "Ativado --> Desativa-lo"); ?>
	      <?php else: ?>
	         <?php $this->assign('imgStatus', 'disable'); ?>
			 <?php $this->assign('labelStatus', "Desativado --> Ativa-lo"); ?>
            <?php endif; ?>
		<label><a href="javascript:GestaoPessoas.mudaStatus(<?php echo $this->_tpl_vars['pessoa']['idPessoa']; ?>
, <?php echo $this->_tpl_vars['pessoa']['status']; ?>
) " title="<?php echo $this->_tpl_vars['labelStatus']; ?>
"><img onClick="js.imgChange(this, 'GestaoPessoas.mudaStatus', '<?php echo $this->_tpl_vars['pessoa']['idPessoa']; ?>
')" src="<?php echo @HTTP_URL; ?>
img/admin/<?php echo $this->_tpl_vars['imgStatus']; ?>
.png" alt="<?php echo $this->_tpl_vars['labelStatus']; ?>
"/></a></label>
        </td>


        <td class="lista"><label>
		  <a href="javascript:GestaoPessoas.initEdit('<?php echo $this->_tpl_vars['pessoa']['idPessoa']; ?>
');" title="Editar Usuário"><img src="<?php echo @HTTP_URL; ?>
img/admin/edit1.png" alt=""/></a>
          </label></td>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
    </tbody>
  </table>
</form>
<div class="pagination" id="paginacao_list_pessoa">
  <?php echo $this->_tpl_vars['paginacao']; ?>

</div>
<p class="quant"><b><?php echo $this->_tpl_vars['retornados']; ?>
</b> itens encontrados de <b><?php echo $this->_tpl_vars['total']; ?>
</b> no total.</p>