<?php /* Smarty version 2.6.12, created on 2011-02-20 13:14:56
         compiled from atividades/tabelaAtividadeEnv.tpl */ ?>
<form action="" method="post" id="formDelAtividade">
  <input type="hidden" name="ACTION" value="ExecDelAtividadeAction" />
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
    
        <th>N�</th>
  
        <th>Para</th>
        <th>Enviada</th>
        <th>Lido</th>
        <th>Tipo</th>

        <th>Status</th>

        <th style="border-right:none;">Ciente</th>
      
      </tr>
    </thead>
    <tbody>
      <?php $_from = $this->_tpl_vars['arrayItens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['atividade']):
?>
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idAtividade[]" value="<?php echo $this->_tpl_vars['atividade']['idAtividade']; ?>
" id="item_<?php echo $this->_tpl_vars['atividade']['idAtividade']; ?>
"/>
        </td>

        <td class="lista"><label>
               <b><?php echo $this->_tpl_vars['atividade']['numero']; ?>
</b>
        </label></td>

        <td class="lista"><label>
               <b><?php echo $this->_tpl_vars['atividade']['para']; ?>
</b>
        </label></td>

        <td class="lista"><label>
               <?php echo $this->_tpl_vars['atividade']['data']; ?>

        </label></td>
        <td class="lista"><label>
                <?php if ($this->_tpl_vars['atividade']['dataCiente'] != ""): ?>
                    <?php echo $this->_tpl_vars['atividade']['dataCiente']; ?>

                <?php else: ?>
                    <img src="<?php echo @HTTP_URL; ?>
img/admin/clock.png" title="Aguardando ciente"/>
                <?php endif; ?>
        </label></td>

        <td class="lista"><label>
          <?php echo $this->_tpl_vars['atividade']['tipoAtividade']; ?>

          </label></td>

          <td class="lista"><label>
          <?php echo $this->_tpl_vars['atividade']['status']; ?>

          </label></td>

          <td class="lista"><label>
          <?php if ($this->_tpl_vars['atividade']['ciente'] == 'Sim'): ?>
                <a href="javascript:GestaoAtividadeRec.initEdit('<?php echo $this->_tpl_vars['atividade']['idAtividade']; ?>
');" title="Editar Atividade"><img src="<?php echo @HTTP_URL; ?>
img/admin/sim.gif" title="ciente"/></a>
          <?php else: ?>
          <img src="<?php echo @HTTP_URL; ?>
img/admin/nao.gif" title="sem ciente" style="vertical-align: middle"/>
          <?php endif; ?>
          </label></td> 
          
      </tr>
      <?php endforeach; endif; unset($_from); ?>
    </tbody>
  </table>
</form>
<div class="pagination" id="paginacao_list_atividade">
  <?php echo $this->_tpl_vars['paginacao']; ?>

</div>
<p class="quant"><b><?php echo $this->_tpl_vars['retornados']; ?>
</b> itens encontrados de <b><?php echo $this->_tpl_vars['total']; ?>
</b> no total.</p>