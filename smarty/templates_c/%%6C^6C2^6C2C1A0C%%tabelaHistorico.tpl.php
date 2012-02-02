<?php /* Smarty version 2.6.12, created on 2011-02-19 19:06:24
         compiled from historico/tabelaHistorico.tpl */ ?>
<form action="" method="post" id="formDelHistoricos">
 <!-- <input type="hidden" name="ACTION" value="ExecDelHistoricosAction" />       -->
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
        <th>Data/Hora</th>
        <th>Nº Processo</th>
        <th style="">Procurador</th>
        <th style="">Tipo</th>
        <th style="">Operacao</th>
        <th style="border-right:none;">Usuário</th>
      </tr>
    </thead>
    <tbody>
      <?php $_from = $this->_tpl_vars['arrayItens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Historico']):
?>
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idHistoricos[]" value="<?php echo $this->_tpl_vars['Historico']['idHistorico']; ?>
" id="item_<?php echo $this->_tpl_vars['Historico']['idHistorico']; ?>
"/>
        </td>
        <td class="lista left"><label>
          <?php echo $this->_tpl_vars['Historico']['dataHora']; ?>

          </label>
        </td>
        <td class="lista"><label>
          <?php echo $this->_tpl_vars['Historico']['numeroProcesso']; ?>

          </label></td>
        <td class="lista"><label>
          <?php echo $this->_tpl_vars['Historico']['procurador']; ?>

          </label></td>
        <td class="lista"><label>
          <b><?php echo $this->_tpl_vars['Historico']['tipo']; ?>
</b>
          </label></td>
        <td class="lista"><label>
          <?php if ($this->_tpl_vars['Historico']['operacao'] == 'Cadastrado'): ?>
          <font style="color: green; font-weight: bold"><?php echo $this->_tpl_vars['Historico']['operacao']; ?>
</font>
          <?php elseif ($this->_tpl_vars['Historico']['operacao'] == 'Alterado'): ?>
          <font style="color: orange; font-weight: bold"><?php echo $this->_tpl_vars['Historico']['operacao']; ?>
</font>
          <?php elseif ($this->_tpl_vars['Historico']['operacao'] == 'Deletado'): ?>
          <font style="color: red; font-weight: bold"><?php echo $this->_tpl_vars['Historico']['operacao']; ?>
</font>
          <?php endif; ?>
          </label></td>
        <td class="lista"><label>
          <?php echo $this->_tpl_vars['Historico']['usuario']; ?>

          </label></td>

      </tr>
      <?php endforeach; endif; unset($_from); ?>
    </tbody>
  </table>
</form>
<div class="pagination" id="paginacao_list_Historico">
  <?php echo $this->_tpl_vars['paginacao']; ?>

</div>
<p class="quant"><b><?php echo $this->_tpl_vars['retornados']; ?>
</b> itens encontrados de <b><?php echo $this->_tpl_vars['total']; ?>
</b> no total.</p>