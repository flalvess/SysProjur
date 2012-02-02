<?php /* Smarty version 2.6.12, created on 2011-02-19 19:21:02
         compiled from movimentacoes/tabelaMovimentacao.tpl */ ?>
<form action="" method="post" id="formDelMovimentacao">
    <input type="hidden" name="ACTION" value="ExecDelMovimentacaoAction" />
    <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
        <thead>
            <tr id="list_fields">
                <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
                <!-- <th>&nbsp;&nbsp;Nº&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Tipo&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Evento&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Data&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Perfil&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Movimentado Por&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Arquivo&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Observação&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Ciente&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Ação&nbsp;&nbsp;</th> -->
                <th>Nº</th>
                <th>Tipo</th>
                <th>Evento</th>
                <th>Data</th>
                <th>Perfil</th>
                <th>Movimentado Por</th>
                <th>Arquivo</th>
                <th>Observação</th>
                <th>Ciente</th>
                <th style="border-right:none;">Opção</th>
            </tr>
        </thead>
        <tbody>
            <?php $_from = $this->_tpl_vars['arrayItens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['movimentacao']):
?>
            <tr onmouseOver="js.collorTrHover()" class="trTable">
                <td class="lista"><input type="checkbox" name="idMovimentacao[]" value="<?php echo $this->_tpl_vars['movimentacao']['idMovimentacao']; ?>
" id="item_<?php echo $this->_tpl_vars['movimentacao']['idMovimentacao']; ?>
"/>
                </td>
                <td class="lista">
                    <label>
                        <b><?php echo $this->_tpl_vars['movimentacao']['numeroMovimentacao']; ?>
</b>
                    </label>
                    <!--   <a href="javascript:GestaoMovimentacao.initEdit('<?php echo $this->_tpl_vars['movimentacao']['idMovimentacao']; ?>
');" title="Editar Movimentacao">[Editar]</a>&nbsp;&nbsp; -->
                    <!--   <a href="javascript:GestaoMovimentacao.viewMovimentacao('<?php echo $this->_tpl_vars['movimentacao']['idMovimentacao']; ?>
','<?php echo $this->_tpl_vars['movimentacao']['idTipoMovimentacao']; ?>
');" title="Visualizar movimentacao">[Visualizar]</a>&nbsp;&nbsp;
		   <?php if ($this->_tpl_vars['movimentacao']['idTipoMovimentacao'] == 2): ?>
		   <a href="javascript:GestaoMovimentacao.viewMovimentacao('<?php echo $this->_tpl_vars['movimentacao']['origem']; ?>
','<?php echo $this->_tpl_vars['movimentacao']['idTipoMovimentacao']; ?>
');" title="Visualizar movimentacao origem">[Movimentacao origem]</a>
		   <?php endif; ?> -->
                </td>
                <td class="lista"><label>
                        <?php if ($this->_tpl_vars['movimentacao']['tipoMovimentacao'] == 'a executar'): ?>
                        <a href="javascript:GestaoMovimentacao.viewMovimentacao('<?php echo $this->_tpl_vars['movimentacao']['idMovimentacao']; ?>
','a executar');" title="Visualizar movimentacão a executar"><u><?php echo $this->_tpl_vars['movimentacao']['tipoMovimentacao']; ?>
</u></a>&nbsp;&nbsp;
                        <?php else: ?>
                        <?php echo $this->_tpl_vars['movimentacao']['tipoMovimentacao']; ?>

                        <?php endif; ?>
                    </label></td>
                <td class="lista"><label>
                        <?php echo $this->_tpl_vars['movimentacao']['evento']; ?>

                    </label></td>
                <td class="lista"><label>
                        <?php echo $this->_tpl_vars['movimentacao']['data']; ?>

                    </label></td>
                <td class="lista"><label>
                        <?php echo $this->_tpl_vars['movimentacao']['perfil']; ?>

                    </label></td>
                <td class="lista"><label>
                        <?php echo $this->_tpl_vars['movimentacao']['movimentadoPor']; ?>

                    </label></td>
                <td class="lista"><label>
                        <?php if ($this->_tpl_vars['movimentacao']['arquivo'] != ""): ?>
                        <a href="<?php echo @HTTP_URL; ?>
upload/<?php echo $this->_tpl_vars['movimentacao']['arquivo']; ?>
" target="_blank"><font style="color: green;">Ver</font></a>
                        <?php else: ?>
                        <font style="color: red;">Vazio</font>
                        <?php endif; ?>
                    </label></td>
                <td class="lista"><label>
                        <?php echo $this->_tpl_vars['movimentacao']['observacao']; ?>

                    </label></td>

                <td class="lista"><label>
                        <?php if ($this->_tpl_vars['movimentacao']['ciente'] == 'Sim'): ?>
                        <!--   <a href="javascript:GestaoMovimentacao.initEdit('<?php echo $this->_tpl_vars['movimentacao']['idMovimentacao']; ?>
');" title="Editar Atividade"><img src="<?php echo @HTTP_URL; ?>
img/admin/sim.gif" title="ciente"/></a>   -->
                        <img src="<?php echo @HTTP_URL; ?>
img/admin/sim.gif" title="ciente"/>
                        <?php else: ?>
                        <!--   <a href="javascript:GestaoMovimentacao.initEdit('<?php echo $this->_tpl_vars['movimentacao']['idMovimentacao']; ?>
');" title="Editar Atividade"><img src="<?php echo @HTTP_URL; ?>
img/admin/nao.gif" title="sem ciente"/></a>   -->
                        <img src="<?php echo @HTTP_URL; ?>
img/admin/nao.gif" title="sem ciente"/>
                        <?php endif; ?>
                    </label></td>


                <td class="lista"><label>
                        <a href="javascript:GestaoMovimentacao.initEdit('<?php echo $this->_tpl_vars['movimentacao']['idMovimentacao']; ?>
');" title="Editar Movimentacao"><img src="<?php echo @HTTP_URL; ?>
img/admin/edit1.png" alt=""/></a>
                    </label></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
</form>
<div class="pagination" id="paginacao_list_movimentacao">
    <?php echo $this->_tpl_vars['paginacao']; ?>

</div>
<p class="quant"><b><?php echo $this->_tpl_vars['retornados']; ?>
</b> itens encontrados de <b><?php echo $this->_tpl_vars['total']; ?>
</b> no total.</p>