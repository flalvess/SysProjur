<?php /* Smarty version 2.6.12, created on 2011-02-10 12:49:21
         compiled from processos/tabelaProcessos.tpl */ ?>
<form action="" method="post" id="formDelProcessos">
    <input type="hidden" name="ACTION" value="ExecDelProcessosAction" />
    <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
        <thead>
            <tr id="list_fields">
                <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
                <th>Processo</th>
                <th>Justiça</th>
                <th>Instancia</th>
                <th>Data</th>
                <th>Parte Adversa</th>
                <!--   <th>&nbsp;Assunto&nbsp;</th> -->
                <!-- <th>&nbsp;&nbsp;Entrada&nbsp;&nbsp;</th> -->
                <!-- <th>&nbsp;&nbsp;Data de saíd&nbsp;&nbsp;</th> -->
                <!--  <th>&nbsp;Tipo/Descrição&nbsp;</th> -->
                <!--    <th>&nbsp;&nbsp;Descrição&nbsp;&nbsp;</th> -->
                <!--  <th>&nbsp;&nbsp;Justiça&nbsp;&nbsp;</th> -->
                <!-- <th>&nbsp;&nbsp;Instância&nbsp;&nbsp;</th> -->
                <!-- <th>&nbsp;&nbsp;Ação&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Litisconsorte&nbsp;&nbsp;</th> -->
              
                <?php if ($this->_tpl_vars['quantidadeSemCiente'][0] != "" || $this->_tpl_vars['quantidadeAExecutar'][0] != ""): ?>
                <th>&nbsp;&nbsp;Movimentações&nbsp;&nbsp;</th>
                <?php else: ?>
                    <th>&nbsp;&nbsp;Procurador&nbsp;&nbsp;</th>
                <?php endif; ?>
                <th style="border-right:none;">&nbsp;&nbsp;Opção&nbsp;&nbsp;</th>

                <!--   <th>&nbsp;&nbsp;Situação&nbsp;&nbsp;</th> -->
            </tr>
        </thead>
        <tbody>

            <?php $_from = $this->_tpl_vars['arrayItens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['indice'] => $this->_tpl_vars['processo']):
?>
            <tr onmouseOver="js.collorTrHover()" class="trTable">
                <td class="lista"><input type="checkbox" name="idProcessos[]" value="<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
" id="item_<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
"/>
                </td>

                <td class="lista left"><label><h3><?php echo $this->_tpl_vars['processo']['numeroProcesso']; ?>
</h3></label></td>
                <td class="lista"><label><?php echo $this->_tpl_vars['processo']['justica']; ?>
</label></td>
                <td class="lista"><label style="color: orange"><?php echo $this->_tpl_vars['processo']['instancia']; ?>
</label></td>
                <td class="lista"><label><?php echo $this->_tpl_vars['processo']['dataEntrada']; ?>
</label></td>
                <!--  <td class="lista left" ><label><?php echo $this->_tpl_vars['processo']['tipoAcao']; ?>
</label></td> -->
                <!-- <td class="lista left" ><label><?php echo $this->_tpl_vars['processo']['litisconsorte']; ?>
</label></td> -->
                <td class="lista left" ><label> <?php echo $this->_tpl_vars['pessoa'][$this->_tpl_vars['indice']]; ?>
 -
                        <a href="javascript:GestaoPessoas.viewPessoas('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
');" title="Visualizar Pessoas do Processo"><u>Exibir todos</u></a>&nbsp;&nbsp;
                        <!--     <?php $_from = $this->_tpl_vars['pessoa']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['nome']):
?>

                                 <?php echo $this->_tpl_vars['nome'][$this->_sections['i']['index']]; ?>


                             <?php endforeach; endif; unset($_from); ?> -->


                    </label></td>

                <?php if ($this->_tpl_vars['processo']['nome'] != ""): ?>
                <td class="lista left" title="<?php echo $this->_tpl_vars['processo']['nome']; ?>
">
                    <!--   <label><img src="<?php echo @HTTP_URL; ?>
img/admin/procurador.png" alt=""/>

                       </label></td> -->
                    <?php echo $this->_tpl_vars['processo']['nome']; ?>

                    <!-- <td class="lista" ><label><?php echo $this->_tpl_vars['processo']['situacaoProcesso']; ?>
</label>-->
                </td>

                <?php endif; ?>
                
                <?php if ($this->_tpl_vars['quantidadeSemCiente'][0] != ""): ?>
                <td class="lista" title="">
                    <!--   <label><img src="<?php echo @HTTP_URL; ?>
img/admin/procurador.png" alt=""/>

                       </label></td> -->
                    <font color="red"><b><?php echo $this->_tpl_vars['quantidadeSemCiente'][$this->_tpl_vars['indice']]; ?>
</b></font><b> Sem ciente</b>
                    <!-- <td class="lista" ><label><?php echo $this->_tpl_vars['processo']['situacaoProcesso']; ?>
</label>-->
                </td>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['quantidadeAExecutar'][0] != ""): ?>
                <td class="lista" title="">
                    <!--   <label><img src="<?php echo @HTTP_URL; ?>
img/admin/procurador.png" alt=""/>

                       </label></td> -->
                    <font color="red"><b><?php echo $this->_tpl_vars['quantidadeAExecutar'][$this->_tpl_vars['indice']]; ?>
</b></font><b> a executar </b>
                    <!-- <td class="lista" ><label><?php echo $this->_tpl_vars['processo']['situacaoProcesso']; ?>
</label>-->
                </td>
                <?php endif; ?>

                <td class="lista" >
                    <label style="text-align: center;">
                        <a href="javascript:GestaoProcessos.initEdit('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
');"  title="Editar Processo" ><img src="<?php echo @HTTP_URL; ?>
img/admin/edit1.png" alt=""/></a>
                        <?php if ($this->_tpl_vars['quantidadeSemCiente'][0] != ""): ?>
                        <a href="javascript:GestaoProcessos.openProcesso('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
', 'semCiente'); " title="Abrir processo" ><img src="<?php echo @HTTP_URL; ?>
img/admin/open.png" alt=""/></a>
                        <?php elseif ($this->_tpl_vars['quantidadeAExecutar'][0] != ""): ?>
                        <a href="javascript:GestaoProcessos.openProcesso('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
', 'aExecutar'); " title="Abrir processo" ><img src="<?php echo @HTTP_URL; ?>
img/admin/open.png" alt=""/></a>
                        <?php elseif ($this->_tpl_vars['meusProcessos'] != ""): ?>
                        <a href="javascript:GestaoProcessos.openProcesso('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
', 'meusProcessos'); " title="Abrir processo" ><img src="<?php echo @HTTP_URL; ?>
img/admin/open.png" alt=""/></a>
                        <?php else: ?>
                        <a href="javascript:GestaoProcessos.openProcesso('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
', ''); " title="Abrir processo" ><img src="<?php echo @HTTP_URL; ?>
img/admin/open.png" alt=""/></a>
                        <?php endif; ?>
                    </label>
                </td>

            </tr>


            <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
</form>
<div class="pagination" id="paginacao_list_processo">
    <?php echo $this->_tpl_vars['paginacao']; ?>

</div>
<p class="quant"><b><?php echo $this->_tpl_vars['retornados']; ?>
</b> itens encontrados de <b><?php echo $this->_tpl_vars['total']; ?>
</b> no total.</p>