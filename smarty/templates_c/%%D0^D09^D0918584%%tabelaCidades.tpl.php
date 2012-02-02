<?php /* Smarty version 2.6.12, created on 2012-01-09 21:37:36
         compiled from cidades/tabelaCidades.tpl */ ?>
<form action="" method="post" id="formDelCidades">
  <input type="hidden" name="ACTION" value="ExecDelCidadesAction" />
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Opção</th>
        
      </tr>
    </thead>
    <tbody>
      <?php $_from = $this->_tpl_vars['arrayItens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cidade']):
?>
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idCidades[]" value="<?php echo $this->_tpl_vars['cidade']['idCidade']; ?>
" id="item_<?php echo $this->_tpl_vars['cidade']['idCidade']; ?>
"/>
        </td>
        <td class="lista left"><label>
          <?php echo $this->_tpl_vars['cidade']['nome']; ?>

          </label>
       
        </td>
        <td class="lista left"><label>
          <?php echo $this->_tpl_vars['cidade']['estado']; ?>

          </label></td>
        <td class="lista"><label>
          <a href="javascript:GestaoCidades.initEdit('<?php echo $this->_tpl_vars['cidade']['idCidade']; ?>
');" title="Editar Usuário"><img src="<?php echo @HTTP_URL; ?>
img/admin/edit1.png" alt=""/></a>
          </label></td>

      </tr>
      <?php endforeach; endif; unset($_from); ?>
    </tbody>
  </table>
</form>
<div class="pagination" id="paginacao_list_cidade">
  <?php echo $this->_tpl_vars['paginacao']; ?>

</div>
<p class="quant"><b><?php echo $this->_tpl_vars['retornados']; ?>
</b> itens encontrados de <b><?php echo $this->_tpl_vars['total']; ?>
</b> no total.</p>