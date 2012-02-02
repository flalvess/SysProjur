<?php /* Smarty version 2.6.12, created on 2012-01-09 20:29:03
         compiled from usuarios/tabelaUsuarios.tpl */ ?>
<form action="" method="post" id="formDelUsuarios">
  <input type="hidden" name="ACTION" value="ExecDelUsuariosAction" />
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
        <th>Nome</th>
        <th>Email</th>
        <th>Login</th>
        <th>Perfil</th>
        <th>&nbsp;&nbsp;Status&nbsp;&nbsp;</th>
        <th style="border-right:none;">&nbsp;&nbsp;Op��es&nbsp;&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php $_from = $this->_tpl_vars['arrayItens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['usuario']):
?>
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idUsuarios[]" value="<?php echo $this->_tpl_vars['usuario']['idUsuario']; ?>
" id="item_<?php echo $this->_tpl_vars['usuario']['idUsuario']; ?>
"/>
        </td>
        <td class="lista left"><label>
                <b> <?php echo $this->_tpl_vars['usuario']['nome']; ?>
 </b>
          </label>
		
		</td>
        <td class="lista left"><label>
          <?php echo $this->_tpl_vars['usuario']['email']; ?>

          </label></td>
        <td class="lista"><label>
                <?php echo $this->_tpl_vars['usuario']['login']; ?>

          </label></td>
        <td class="lista"><label>
          <?php if ($this->_tpl_vars['usuario']['grupo'] == ""): ?>
          <font style="color: red">Sem perfil</font>
          <?php else: ?>
            <?php echo $this->_tpl_vars['usuario']['grupo']; ?>

          <?php endif; ?>
        </label></td>

        <td class="lista">
	      <?php if ($this->_tpl_vars['usuario']['status'] == 1): ?>
	         <?php $this->assign('imgStatus', 'ok'); ?>
			 <?php $this->assign('labelStatus', "Ativado --> Desativa-lo"); ?>
	      <?php else: ?>
	         <?php $this->assign('imgStatus', 'disable'); ?>
			 <?php $this->assign('labelStatus', "Desativado --> Ativa-lo"); ?>
            <?php endif; ?>
		<label><a onClick="" href="javascript:GestaoUsuarios.mudaStatus('<?php echo $this->_tpl_vars['usuario']['idUsuario']; ?>
', '<?php echo $this->_tpl_vars['usuario']['status']; ?>
')" title="<?php echo $this->_tpl_vars['labelStatus']; ?>
"><img onClick="js.imgChange(this, 'GestaoUsuarios.mudaStatus', '<?php echo $this->_tpl_vars['usuario']['idUsuario']; ?>
')" src="<?php echo @HTTP_URL; ?>
img/admin/<?php echo $this->_tpl_vars['imgStatus']; ?>
.png" alt="<?php echo $this->_tpl_vars['labelStatus']; ?>
"/></a></label></td>
          
        <td class="lista"><label>
               <!-- <a href="javascript:GestaoUsuarios.initEdit('<?php echo $this->_tpl_vars['usuario']['idUsuario']; ?>
');" title="Editar Usu�rio">[Editar]</a>&nbsp; -->
		  <a href="javascript:GestaoUsuarios.initEdit('<?php echo $this->_tpl_vars['usuario']['idUsuario']; ?>
');" title="Editar os dados desse usu�rio"><img src="<?php echo @HTTP_URL; ?>
img/admin/edit1.png" alt=""/></a>&nbsp;
		<!--  <a href="javascript:GestaoUsuarios.gerenciaPermissoes('<?php echo $this->_tpl_vars['usuario']['idUsuario']; ?>
');" title="Editar Usu�rio">[Permiss�es]</a> -->
                <a href="javascript:GestaoUsuarios.gerenciaPermissoes('<?php echo $this->_tpl_vars['usuario']['idUsuario']; ?>
');" title="Editar permiss�es  desse usu�rio"><img src="<?php echo @HTTP_URL; ?>
img/admin/group.png" alt=""/></a>
         </label></td>

      </tr>
      <?php endforeach; endif; unset($_from); ?>
    </tbody>
  </table>
</form>
<div class="pagination" id="paginacao_list_usuario">
  <?php echo $this->_tpl_vars['paginacao']; ?>

</div>
<p class="quant"><b><?php echo $this->_tpl_vars['retornados']; ?>
</b> itens encontrados de <b><?php echo $this->_tpl_vars['total']; ?>
</b> no total.</p>