<?php /* Smarty version 2.6.12, created on 2012-01-09 20:29:19
         compiled from juizos/tabelaJuizos.tpl */ ?>
<form action="" method="post" id="formDelJuizos">
  <input type="hidden" name="ACTION" value="ExecDelJuizosAction" />
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
        <th>Juizo</th>
        <th>Cidade</th>
        <th style="border-right:none;">Opção</th>
      </tr>
    </thead>
    <tbody>
      <?php $_from = $this->_tpl_vars['arrayItens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['juizo']):
?>
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idJuizos[]" value="<?php echo $this->_tpl_vars['juizo']['idJuizo']; ?>
" id="item_<?php echo $this->_tpl_vars['juizo']['idJuizo']; ?>
"/>
        </td>
        <td class="lista left"><label>
          <?php echo $this->_tpl_vars['juizo']['nome']; ?>

          </label>
         
        </td>
        <td class="lista left"><label>
          <?php echo $this->_tpl_vars['juizo']['cidade']; ?>

          </label>
        </td>
        <td class="lista"><label>
          
		  <a href="javascript:GestaoJuizos.initEdit('<?php echo $this->_tpl_vars['juizo']['idJuizo']; ?>
');" title="Editar Usuário"><img src="<?php echo @HTTP_URL; ?>
img/admin/edit1.png" alt=""/></a>
          
          </label>
        </td>
       <!-- <td class="lista"><label>
          <?php echo $this->_tpl_vars['juizo']['sigla']; ?>

          </label></td> -->
       
      </tr>
      <?php endforeach; endif; unset($_from); ?>
    </tbody>
  </table>
</form>
<div class="pagination" id="paginacao_list_juizo">
  <?php echo $this->_tpl_vars['paginacao']; ?>

</div>
<p class="quant"><b><?php echo $this->_tpl_vars['retornados']; ?>
</b> itens encontrados de <b><?php echo $this->_tpl_vars['total']; ?>
</b> no total.</p>