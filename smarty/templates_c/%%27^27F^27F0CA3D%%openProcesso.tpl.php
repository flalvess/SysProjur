<?php /* Smarty version 2.6.12, created on 2011-02-11 18:04:25
         compiled from processos/openProcesso.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'processos/openProcesso.tpl', 305, false),array('modifier', 'count', 'processos/openProcesso.tpl', 339, false),)), $this); ?>
<div class="icons">
    <ul>
        <!--   <li><span id="save"><a href="javascript:;" id="formSaveProcesso_submit" onclick="GestaoProcessos.cadProcesso(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save.png" alt=""/>Salvar</a></span></li> -->
        <!-- <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left.png" alt=""/>Voltar</a></span></li> -->
        <?php if ($this->_tpl_vars['area'] == ""): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        <?php elseif ($this->_tpl_vars['area'] == 'semCiente'): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListSemCiente(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        <?php elseif ($this->_tpl_vars['area'] == 'aExecutar'): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListAExecutar(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        <?php elseif ($this->_tpl_vars['area'] == 'meusProcessos'): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListMeusProcessos(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        <?php elseif ($this->_tpl_vars['area'] == 'undefined'): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        <?php endif; ?>
        <!--   <li style="float: right;"><span id="add">
                  <a href="javascript:GestaoProcessos.viewProcesso('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
', '<?php echo $this->_tpl_vars['processo']['numeroProcesso']; ?>
', '<?php echo $this->_tpl_vars['processo']['instancia']; ?>
', '<?php echo $this->_tpl_vars['numeroProcesso']; ?>
', '<?php echo $this->_tpl_vars['primeira']['cidade']; ?>
','<?php echo $this->_tpl_vars['primeira']['juizo']; ?>
');" title="Visualizar dados do processo"><img src="<?php echo @HTTP_URL; ?>
img/admin/excel.png" alt=""/><font style="color: #339900; font-size: 8pt"><b><u>Relatório</u></b></font></a></span>
          </li>    -->
    </ul>

    <span class="hide" >
        <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">

            <span style="display:none">
                <<
            </span>
        </a>
    </span>

    

    <?php $_from = $this->_tpl_vars['segundaInstancia']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['segunda']):
?>


    <?php endforeach; endif; unset($_from); ?>

    <span id="add" style="float: right; padding-right: 5px; padding-left: 5px; border: 1px solid orange; margin-right: 5px; background: #ffff99; padding-bottom: 2px;">
        <a href="javascript:GestaoProcessos.viewProcesso('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
', '<?php echo $this->_tpl_vars['processo']['numeroProcesso']; ?>
', '<?php echo $this->_tpl_vars['processo']['instancia']; ?>
', '<?php echo $this->_tpl_vars['numeroProcesso']; ?>
', '<?php echo $this->_tpl_vars['primeira']['cidade']; ?>
','<?php echo $this->_tpl_vars['primeira']['juizo']; ?>
');" title="Visualizar dados do processo" style="text-decoration: none;"><img src="<?php echo @HTTP_URL; ?>
img/admin/excel.png" style="vertical-align:  middle" alt=""/><b style="color: black; font-size: 8pt; color: green;"><u>Exportar Excel</u></b></a>
    </span>


</div>
<fieldset class="all" style="padding-top: 0px;">
    <legend>Openastro de Processos</legend>
    <form action="" method="post" id="formSaveProcesso" onsubmit="GestaoProcessos.cadProcesso(); return false">
        <input type="hidden" name="ACTION" value="<?php echo $this->_tpl_vars['actionForm']; ?>
" />
        <input type="hidden" name="formId" value="formSaveProcesso" />
        <input type="hidden" name="idProcesso" value="<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
" />
        <!--   <input type="hidden" name="fkProcurador" id="formSaveProcesso_fkProcurador" value="<?php echo $this->_tpl_vars['processo']['fkProcurador']; ?>
" /> -->
        <input type="hidden" name="fkUsuario" id="formSaveProcesso_fkUsuario" value="<?php echo $this->_tpl_vars['processo']['fkUsuario']; ?>
" />
        <input type="hidden" name="fkPrimeiraInstancia" id="formSaveProcesso_fkPrimeiraInstancia" value="<?php echo $this->_tpl_vars['segundaInstanciaDerivado']['fkPrimeiraInstancia']; ?>
" />
        <fieldset>



            <!--    <div class="" style="border-left: 1px solid #A9D5FB; border-bottom: 1px solid #A9D5FB; background-color: white; float: right; margin-top: -20px; padding-right: 5px; padding-left: 5px; padding-bottom: 2px;">
                    <label for="formSaveProcesso_numeroProcesso"><b style="color: #333333; font-size: 8pt">Gerar </b></label>

                    <a href="javascript:GestaoProcessos.viewProcesso('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
', '<?php echo $this->_tpl_vars['processo']['numeroProcesso']; ?>
', '<?php echo $this->_tpl_vars['processo']['instancia']; ?>
', '<?php echo $this->_tpl_vars['numeroProcesso']; ?>
', '<?php echo $this->_tpl_vars['primeira']['cidade']; ?>
','<?php echo $this->_tpl_vars['primeira']['juizo']; ?>
');" title="Visualizar dados do processo"><font style="color: #339900; font-size: 8pt"><b><u>Relatório</u></b></font></a>

                </div> -->

            <div class="container_field_aux">
                <div class="field_aux">

                    <label for="formSaveProcesso_numeroProcesso">Número do Processo:</label>
                    <?php echo $this->_tpl_vars['processo']['numeroProcesso']; ?>


                </div>
                <div class="field_aux" style="width: 407px;">
                    <label for="formSaveProcesso_tipoAcao">Tipo da Ação:</label>
                    <?php echo $this->_tpl_vars['processo']['tipoAcao']; ?>


                </div>

                <div class="field_aux">
                    <label for="formSaveProcesso_dataEntrada">Data de Entrada:</label>
				<?php echo $this->_tpl_vars['processo']['dataEntrada']; ?>
<br class="none"/>

                </div>
            </div>

            <!--   <div class="container_field_aux" style="display: inline;">

                   <div class="field_aux">
                       <label for="formSaveProcesso_assunto">Assunto:</label>
                       <?php echo $this->_tpl_vars['processo']['assunto']; ?>

                   </div>


               </div> -->

            <div class="container_field_aux"  >
                <div class="field_aux" style="width: 250px; min-height: 39px;">
                    <label for="formSaveProcesso_assunto">Assunto:</label>
                    <?php echo $this->_tpl_vars['processo']['assunto']; ?>

                </div>
                <div class="field_aux_grande" style="width: 461px;">
                    <label for="formSaveProcesso_descricao">Descrição:</label>
                    &nbsp;&nbsp;<?php echo $this->_tpl_vars['processo']['descricao']; ?>

                </div>
            </div>

            <div class="container_field_aux" >
                <div class="field_aux_grande" style="width: 561px;">
                    <label for="formSaveProcesso_usuario" >Procurador:</label>
                    <span><?php echo $this->_tpl_vars['procurador']; ?>
</span>
                </div>
                <div class="field_aux" style="min-height: 39px;">
                    <label for="formSaveProcesso_situacaoProcesso">Situacao:</label>
                    <?php echo $this->_tpl_vars['processo']['situacaoProcesso']; ?>

                </div>
            </div>

            <div class="container_field_aux">
                <div class="field_aux" style="width: 98px;">
                    <label for="formSaveProcesso_justica">Justica:</label>
                    <?php echo $this->_tpl_vars['processo']['justica']; ?>

                </div>
                <div class="field_aux" style="width: 98px;">
                    <label for="formSaveProcesso_instancia">Instancia:</label>
                    <?php echo $this->_tpl_vars['processo']['instancia']; ?>

                </div>
                <?php if ($this->_tpl_vars['processo']['instancia'] == '1º Instancia'): ?>

                <!-- <h3 class="title-field">1º Instancia</h3> -->

                <div class="field_aux" style="width: 250px;">
                    <label for="formSaveProcesso_cidade">Cidade:</label>

                    <?php echo $this->_tpl_vars['primeiraInstancia']['cidade']; ?>



                </div>
                <div class="field_aux" style="width: 257px;">
                    <label for="formSaveProcesso_fkJuizo">Juizo:</label>
                    <?php echo $this->_tpl_vars['primeiraInstancia']['juizo']; ?>


                </div>

                <?php elseif ($this->_tpl_vars['processo']['instancia'] == '2º Instancia'): ?>



                <div class="field_aux">
                    <label for="formSaveProcesso_tipoSegundaInstancia">Tipo:</label>

                    <?php echo $this->_tpl_vars['segunda']['tipoSegundaInstancia']; ?>



                </div>

                <?php if ($this->_tpl_vars['segunda']['tipoSegundaInstancia'] == 'Derivado'): ?>

                <div class="field_aux">
                    <label for="formSaveProcesso_primeiraInstancia">1º Instancia:</label>
                    <?php echo $this->_tpl_vars['numeroProcesso']; ?>

                </div>

                <?php endif; ?>
                <?php endif; ?>
                <!--  <div class="field_aux">
                      <label for="formSaveProcesso_tipoProcesso">Tipo processo:</label>
                      <?php echo $this->_tpl_vars['processo']['tipoProcesso']; ?>

                  </div> -->
            </div>




            <div class="container_field_aux">
                <div class="field_aux_grande" style="width: 715px;">
                    <label for="formSaveMovimentacao_assunto">Partes:</label>
                    <?php $_from = $this->_tpl_vars['pessoa']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['indice'] => $this->_tpl_vars['pessoa']):
?>
                    <div class="container_partes">
                        <b><?php echo $this->_tpl_vars['pessoa']['nome']; ?>
</b> &rarr; (<?php echo $this->_tpl_vars['pessoa']['parte']; ?>
)
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
            </div>

        </fieldset>



    </form>
    <script language="javascript" type="text/javascript">
            FormUtil.initForm('formSaveProcesso');
    </script>
    <?php echo '
    <script language="javascript" type="text/javascript">
       //     window.onload = function()
     //   {
            //document.form[\'formListMovimentacao_submit\'].submit();
            //document.getElementById("formListMovimentacao").click();
            //jQuery(\'#formListMovimentacao_submit\').submit();
       // }

      
        function submeter(){
         //   document.forms[\'#formListMovimentacao_submit\'].submit();
        document.teste.submit();
            //setInterval(submeter, 600000);
        }
         setTimeout(\'submeter()\', 1200);
         //window.onload = submeter();

         


    </script>
    '; ?>


    <!-- <div style=" float:right;
          padding:3px 8px;
          background:white;
          color:#003366;
          border-bottom:none;
          font:bold 14px tahoma;"> -->





    <!--        <form action="" method="post" id="formListMovimentacao" onsubmit =" GestaoMovimentacao.execList(); return false" name="teste">
                <input type="hidden" name="ACTION" value="ExecListMovimentacaoAction" /> -->
    <!--	<input type="hidden" name="fkProcesso" id="formListMovimentacao_fkProcesso" value="" /> -->
    <!--      <input type="hidden" name="fkProcesso" id="formListOpenProcesso_fkProcesso" value="<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
" />  -->

    <!--    <span id=""> -->
    <!--   <a href="javascript:;" onclick="GestaoMovimentacao.execList()" title="Buscar"><img src="<?php echo @HTTP_URL; ?>
img/admin/lupa.png" alt=""/>Buscar</a>    -->
    <!--      <strong> <input type="submit"  value="Mostrar Movimentações do Processo" style="margin-right:-5px; cursor:pointer; background-color: white; border: none; font:bold 14px tahoma; color:#003366;" />    </strong>
      </span>

  </form> -->


    <!--   <strong>Movimentações do Processo</strong>    -->
    <!--  </div> -->
    <div class="icons"  style="border-top: 1px solid #A9D5FB;">
        <ul>
            <!--   <li style=""><span id="add"><form action="" method="post"  onsubmit="GestaoMovimentacao.initCad('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
'); return false">
                           <input type="hidden" name="ACTION" value="initCadMovimentacaoAction" />
                           <input type="hidden" name="idProcesso" value="<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
" />


                           <button type="submit" value="novo" style=" margin-top: -4px; background-color: #dff0ff; border: none; cursor: pointer; "><font style="font: bold 11px tahoma; color: #333333;"><img src="<?php echo @HTTP_URL; ?>
img/admin/add_user.png" alt="" style="vertical-align:middle ; margin-top: 0px;"  />&nbsp;Incluir Novo</font></button>
                       </form></span></li> -->
            <!-- <li><span id="add"><a href="javascript:GestaoMovimentacao.openMovimentacao('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
'); " title="Abrir processo" >[Abrir]</a></span></li>  -->

            <!--   <li style="padding-top: 6px;"><span id="add"><a href="javascript:;" onclick="GestaoMovimentacao.initCad('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
')" title="Incluir Novo"><img src="<?php echo @HTTP_URL; ?>
img/admin/add_user.png" alt=""/>Incluir Novo</a></span></li> -->
            <li style="padding-top: 6px;"><span id="add"><a href="javascript:;" onclick="GestaoMovimentacao.initCad('<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
', '<?php echo $this->_tpl_vars['area']; ?>
')" title="Incluir Novo"><img src="<?php echo @HTTP_URL; ?>
img/admin/add_user.png" alt=""/>Incluir Novo</a></span></li>

            <?php if (count ( $this->_tpl_vars['existeMovimentacao'] ) != 0): ?>
            <li style="padding-top: 6px;"><span id="delete"><a href="javascript:;" onclick="GestaoMovimentacao.execDel()" title="Deletar Usuário"><img src="<?php echo @HTTP_URL; ?>
img/admin/delete_user.png" alt=""/>Deletar Seleção</a></span></li>
            <!--  <form action="" method="post" id="formDelMovimentacao" onsubmit="GestaoMovimentacao.execDel(); return false">
                  <input type="hidden" name="ACTION" value="ExecDelMovimentacaoAction" />



                  <button type="submit" value="novo" style=" margin-top: -4px; background-color: #dff0ff; border: none; cursor: pointer; "><font style="font: bold 11px tahoma; color: #333333;"><img src="<?php echo @HTTP_URL; ?>
img/admin/delete_user.png" alt=""/>Deletar Seleção</font></button>
              </form> -->


            <li style="padding-top: 6px;">
                <span id="busca">
                    <a href="javascript:;" onclick="js.showSearchs()" title="Buscar"><img src="<?php echo @HTTP_URL; ?>
img/admin/lupa1.png" alt=""/>Buscar</a>
                </span>
            </li>
            <?php endif; ?>

        </ul>

    </div>
    <div id="search" style="display:none">
        <form action="" method="post" id="formListMovimentacao" onsubmit="GestaoMovimentacao.execList(); return false" >
            <input type="hidden" name="ACTION" value="ExecListMovimentacaoAction" />
            <!--	<input type="hidden" name="fkProcesso" id="formListMovimentacao_fkProcesso" value="" /> -->
            <!--     <input type="hidden" name="fkProcesso" id="formListMovimentacao_fkProcesso" value="" /> -->
            <input type="hidden" name="fkProcesso" id="formListOpenProcesso_fkProcesso" value="<?php echo $this->_tpl_vars['processo']['idProcesso']; ?>
" />


            <fieldset>
                <legend>Busca de Movimentacões </legend>
                <table class="container_busca" align="center">

                    <tr >
                        <td><label for="formListMovimentacao_movimentacao">Pesquisar por:</label></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input id="formListMovimentacao_movimentacao" type="text"  class="text" name="movimentacao" title="Critérios: teste" style="width: 300px;"/>
                        </td>
                        <td>
                            <input type="submit" value="Buscar" class="submit"/>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <select size="1" id="formListMovimentacao_ordem" class="text" name="ordem" title="Representa o critério usado para ordenar os resultados." style="width: 105px;">
                                <option value="">::Critério::</option>
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optionsOrdem']), $this);?>

                            </select>
                            &nbsp;&nbsp;

                            <select size="1" id="formListMovimentacao_sentido" class="text" name="sentido" title="Trata-se da forma como os resultados serão ordenados.">
                                <option value="">::Sentido::</option>
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optionsSentidoOrdem']), $this);?>

                            </select>
                        </td>
                        <!--  <td><input type="submit" value="Buscar" class="submit"/></td> -->
                    </tr>

                    <tr>
                        <td><br></br> <label for="formListMovimentacaoSub_data">Data:</label></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <input id="formListMovimentacao_data" type="text" class="text" name="data" title="Critérios: teste" style="width: 300px;" onclick="GestaoMovimentacao.showCalendar('#formListMovimentacao_data');" />
                        </td>
                        <td>
                            <input type="submit" value="Buscar" class="submit"/>
                        </td>
                    </tr>

                </table>
            </fieldset>
        </form>
    </div>
    <div class="clear">
    </div>
    <div class="container_table" id="lista_movimentacoes">
    </div>
    <!--   <?php $this->assign('qtde', count($this->_tpl_vars['itens'])); ?>
       <?php if ($this->_tpl_vars['qtde'] == 0): ?>
                      <h3 class="no_encontrado">Nenhum resultado foi encontrado!!!</h3>
       <?php else: ?>     -->

    <form action="" method="post" id="formDelMovimentacao">
        <input type="hidden" name="ACTION" value="ExecDelMovimentacaoAction" />


        <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
            <thead>
                <tr id="list_fields">
                    <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>

                    <th>Nº</th>
                    <th>Tipo</th>
                    <th>Evento</th>
                    <th>Data</th>
                    <th>Perfil</th>
                    <th>Movimentado Por</th>
                    <th>Arquivo</th>
                    <th>Observação</th>
                    <th>Ciente</th>
                    <th>Opção</th>
                </tr>
            </thead>
            <tbody>


                <?php $_from = $this->_tpl_vars['itens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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

                        </label></td>
                    <td class="lista"><label>
                            <a href="javascript:GestaoMovimentacao.initEdit('<?php echo $this->_tpl_vars['movimentacao']['idMovimentacao']; ?>
');" title="Editar Movimentacao"><img src="<?php echo @HTTP_URL; ?>
img/admin/edit.png" alt=""/></a>
                        </label></td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
    </form>
    <!--    <div class="pagination" id="paginacao_list_movimentacao">
            <?php echo $this->_tpl_vars['paginacao']; ?>

        </div> -->

    <!--   <?php endif; ?>       -->



</fieldset>
<div class="icons" style="border-top: 1px solid #A9D5FB; margin-top: -9px;">

    <ul>
        <!--   <li><span id="save"><a href="javascript:;" onclick="GestaoProcessos.cadProcesso(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save.png" alt=""/>Salvar</a></span></li> -->
        <?php if ($this->_tpl_vars['area'] == ""): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        <?php elseif ($this->_tpl_vars['area'] == 'semCiente'): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListSemCiente(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        <?php elseif ($this->_tpl_vars['area'] == 'aExecutar'): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListAExecutar(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        <?php elseif ($this->_tpl_vars['area'] == 'meusProcessos'): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListMeusProcessos(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        <?php elseif ($this->_tpl_vars['area'] == 'undefined'): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        <?php endif; ?>
    </ul>

    <span class="hide" >
        <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">

            <span style="display:none">
                <<
            </span>
        </a>
    </span>
</div>