<?php /* Smarty version 2.6.12, created on 2011-02-10 10:37:07
         compiled from admin/menu.tpl */ ?>
<ul class="menu_body" id="menu" style="display:block;">
  <?php $_from = $this->_tpl_vars['arrayCasosDeUso']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['casoDeUso']):
?>
  <li> <span class="select" onclick="js.showMenuLi(this);" title="<?php echo $this->_tpl_vars['casoDeUso']['descricao']; ?>
">
    <?php echo $this->_tpl_vars['casoDeUso']['nome']; ?>

    </span>
    <ul class="menu_drop" style="display:none">
      <?php $_from = $this->_tpl_vars['casoDeUso']['itens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fluxo']):
?>
      <li> <a href="javascript:;" onclick="<?php echo $this->_tpl_vars['fluxo']['linkJS']; ?>
;js.changeMenu(this)" title="<?php echo $this->_tpl_vars['fluxo']['descItem']; ?>
">-
        <?php echo $this->_tpl_vars['fluxo']['item']; ?>

        </a> </li>
      <?php endforeach; endif; unset($_from); ?>
    </ul>
  </li>
  <?php endforeach; endif; unset($_from); ?>
</ul>