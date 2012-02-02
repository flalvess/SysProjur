<?php /* Smarty version 2.6.12, created on 2011-02-24 22:02:13
         compiled from atividades/cadAtividade.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'atividades/cadAtividade.tpl', 121, false),)), $this); ?>
<div class="icons">
    <ul>
        <?php if ($this->_tpl_vars['salvar'] == 'salvar' || ( $this->_tpl_vars['atividade']['ciente'] == 'Não' || $this->_tpl_vars['atividade']['ciente'] == "" )): ?>
        <li><span id="save"><a href="javascript:;" id="formSaveAtividade_submit" onclick="GestaoAtividade.cadAtividade(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save1.png" alt=""/>Enviar</a></span></li>
        <?php if ($this->_tpl_vars['salvar'] != ""): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeEnv.initListEnv(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
        <?php endif; ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['nome'] == $this->_tpl_vars['atividade']['de']): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeEnv.initListEnv(); return false" title="Cancelar" style="width: 150px;"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar para enviadas</a></span></li>
        <?php elseif ($this->_tpl_vars['nome'] == $this->_tpl_vars['atividade']['para']): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeRec.initListRec(); return false" title="Cancelar" style="width: 150px;"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar para recebidas</a></span></li>
        <?php elseif ($this->_tpl_vars['atividade']['para'] == 'Apoio'): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeRec.initListRec(); return false" title="Cancelar" style="width: 150px;"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar para recebidas</a></span></li>
        <?php endif; ?>
    </ul>
</div>
<fieldset class="all" style="background-color: #F8FAFC; margin-bottom: 0px;">
    <legend>Cadastro de Atividade</legend>
    <form action="" method="post" id="formSaveAtividade" onsubmit="GestaoAtividade.cadAtividade(); return false">
        <input type="hidden" name="ACTION" value="<?php echo $this->_tpl_vars['actionForm']; ?>
" />
        <input type="hidden" name="formId" value="formSaveAtividade" />
        <input type="hidden" name="idAtividade" value="<?php echo $this->_tpl_vars['atividade']['idAtividade']; ?>
" />
        <input type="hidden" name="para" id="formSaveAtividade_destinatario" value="<?php echo $this->_tpl_vars['atividade']['para']; ?>
" />
        <input type="hidden" name="arquivo" value="" id="formSaveAtividade_arquivo" />
        <input type="hidden" name="arquivoAntigo" value="<?php echo $this->_tpl_vars['atividade']['arquivo']; ?>
" />



        <fieldset >
            <!--  <?php if ($this->_tpl_vars['atividade']['data'] != ""): ?>
                <div class="" style="width: 100%;float: right;">
                     <label for="formSaveAtividade_tipoAtividade" class="lbl">Data e Hora:</label>
                     <?php echo $this->_tpl_vars['atividade']['data']; ?>

                </div>
                <?php endif; ?> -->

            <div class="container_field_new" style=" width: 610px; padding-top:0px; background-color: #F8FAFC; margin-left: 0px; margin-left: 20px;">

                <?php if ($this->_tpl_vars['atividade']['de'] != ""): ?>
                <div class="field" style="margin-bottom: 4px; width: 600px !important; margin-left: 20px; height: 25px;">
                    <label for="formSaveAtividade_de" class="lbl" style="float: left !important; display: inline !important; width: 30px;  ">De:</label>
                    <input id="formSaveAtividade_de" type="text" class="input_text" value="<?php echo $this->_tpl_vars['atividade']['de']; ?>
" style="width: 500px; height: 15px;" title="Digite o Nome ao qual vai ser enviado a atividade" />
                </div>
                <?php endif; ?>

                <div class="field" style="margin-bottom: 4px; width: 600px !important; margin-left: 20px; height: 25px;">
                    <label for="formSaveAtividade_para" class="lbl" style="float: left !important; display: inline !important; width: 30px;  ">Para:</label>
                    <input id="formSaveAtividade_para" name="para" type="text" class="input_text" value="<?php echo $this->_tpl_vars['atividade']['para']; ?>
" style="width: 500px; height: 15px;" title="Digite o Nome ao qual vai ser enviado a atividade" />
                </div>

                <div class="container_field_aux" style="background-color: #F8FAFC; width: 650px !important;height: 35px !important; border: none;">

                    <div class="field" style="width: 600px !important; ">
                        <label for="formSaveAtividade_tipoAtividade" class="lbl" style="border: none; background: none; float: left !important; display: inline !important; width: 50px;">Assunto:</label>
                        <input id="formSaveAtividade_tipoAtividade" name="tipoAtividade" type="text"  value="<?php echo $this->_tpl_vars['atividade']['tipoAtividade']; ?>
" class="input_text" style="width: 499px; height: 15px;" title="Digite o Tipo da Atividade"/>
                        <?php if ($this->_tpl_vars['atividade']['para'] == ""): ?>
                        <label id="labelArquivo" class="lbl" style="border: none; background: none; width: 250px; height: 15px; margin-left: 55px; margin-top: 20px;"><a href="javascript:;" onclick="GestaoAtividade.uploadAtividade();" style=" font-size: 8pt; color: green; text-decoration: underline;">Anexar um arquivo</a></label>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ($this->_tpl_vars['atividade']['arquivo'] != ""): ?>
                <fieldset id="uploadAtividade" class="none" style="padding-top:5px; height: 35px; width: 503px; margin-left: 63px;">
            <!--    <fieldset id="uploadAtividade" class="none" style="padding-top:15px; background-color:  #FFFF99; border: 1px solid #1E90FF; height: 50px; width: 503px; margin-left: 63px;"> -->
                  <!--  <div class="" style="border-left: 1px solid #A9D5FB; border-bottom: 1px solid #A9D5FB; background-color: white; float: right; border: 1px solid #1E90FF; border-top: none; border-right: none; margin-top: -15px; padding-right: 5px; padding-left: 5px; padding-bottom: 0px;">
                        <label class="lbl"><b style="color: #333333; font-size: 8pt"><a href="javascript:; " onclick="GestaoAtividade.uploadAtividade();" style="float: right; color: #1E90FF; font-size: 8pt; text-decoration: none !important;">X</a></b></label>

                    </div>  -->

                    <div class="field" style="margin-left: 15px; margin-bottom: 20px; border: none; width: 300px !important; display: inline !important; float:left; margin-top: -7px;">
                        <label for="formSaveAtividade_arquivoUpd" class="lbl">Anexo:</label>
                        <span id="formSaveAtividade_arquivoUpd_parent">
				
                            <a href="<?php echo @HTTP_URL; ?>
upload/<?php echo $this->_tpl_vars['atividade']['arquivo']; ?>
" target="_blank"><font style="color: green;"><img src="<?php echo @HTTP_URL; ?>
img/admin/anexo.gif" style="vertical-align: middle;" alt=""/>&nbsp;<u>Visualizar Arquivo em anexo</u></font></a>
                        </span>
                        <span class="aux_field" id="formSaveAtividade_auxField_arquivoUpd">
                        </span>
                        
                    </div>
                     <div class="" id="container_legenda_arquivo" style="margin-left: 337px; width: 70px ; border: none; height: 25px !important; margin-top: 13px;">
                     </div>
                    <!--  <div class="field field_new_right" >
                          <label for="formSaveAtividade_arquivo" class="lbl" style="width: 200px !important;">Novo Juizo:</label>
                          <input type="text" id="formSaveAtividade_arquivo" name="arquivo" title="Escreva o nome do juizo" class="input_text" style="width: 195px !important;"/>

                          <span class="aux_field" id="formSaveAtividade_auxField_arquivo" style="margin-left: 0px !important;">
				 Escreva o nome do juizo
                          </span>
                      </div> -->
                </fieldset>
               <?php elseif ($this->_tpl_vars['atividade']['arquivo'] == "" && $this->_tpl_vars['atividade']['para'] == ""): ?>
                    <fieldset id="uploadAtividade" class="none" style="padding-top:15px; background-color:  #FFFF99; border: 1px solid #1E90FF; height: 50px; width: 503px; margin-left: 63px;">
                    <div class="" style="border-left: 1px solid #A9D5FB; border-bottom: 1px solid #A9D5FB; background-color: white; float: right; border: 1px solid #1E90FF; border-top: none; border-right: none; margin-top: -15px; padding-right: 5px; padding-left: 5px; padding-bottom: 0px;">
                        <label class="lbl"><b style="color: #333333; font-size: 8pt"><a href="javascript:; " onclick="GestaoAtividade.uploadAtividade();" style="float: right; color: #1E90FF; font-size: 8pt; text-decoration: none !important;">X</a></b></label>

                    </div>

                    <div class="field" style="margin-left: 25px; margin-bottom: 20px; border: none; width: 300px !important; display: inline !important; float:left; margin-top: -7px;">
                        <label for="formSaveAtividade_arquivoUpd" class="lbl">Anexo:</label>
                        <span id="formSaveAtividade_arquivoUpd_parent">
	
                            <input type="file" id="formSaveAtividade_arquivoUpd"   class="input_text" name="arquivo" title="É o arquivo do contrato" onchange="js.upload('formSaveAtividade_arquivoUpd')" />
				
                        </span>
                        <span class="aux_field" id="formSaveAtividade_auxField_arquivoUpd">
                        </span>

                    </div>
                     <div class="" id="container_legenda_arquivo" style="margin-left: 337px; width: 70px ; border: none; height: 25px !important; margin-top: 13px;">
                     </div>
                </fieldset>
               
               <?php endif; ?>
               
               <div class="container_field_aux" style="background-color: #F8FAFC; margin-left: 55px; margin-top: 10px;">
                    <div style="width: 503px; height: 20px; background-image: url('http://localhost/sysprojur/img/admin/toolbar.bg.gif'); border: 1px solid #1E90FF; margin-left: 8px; margin-bottom: -2px; padding-top: 5px; color: teal;">
                        <?php if ($this->_tpl_vars['atividade']['status'] == ""): ?>
                        <select id="formSaveAtividade_status" name="status" class="input_text" style="height: 20px;;border: none;" title="Informe a situação do processo">
                            <option value="" disabled selected> Status </option>
                            <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['valueStatus'],'output' => $this->_tpl_vars['outStatus'],'selected' => $this->_tpl_vars['atividade']['status']), $this);?>


                        </select><br class="none"/>
                        <?php else: ?>
                        <label style="color: teal; border: none; background: none; float: left; margin-left: 5px;">Status:<font style="color: #000000; margin-left: 5px; font-size: 8pt;"><?php echo $this->_tpl_vars['atividade']['status']; ?>
</font></label>
                        <?php endif; ?>
                        <strong style="float: right;">Em <?php echo $this->_tpl_vars['hoje'];  echo $this->_tpl_vars['atividade']['data']; ?>
&nbsp&nbsp&nbsp</strong>
                    </div>
                    <div class="" style="min-height: 200px; width: 600px !important; border: 1px solid #000000; border: none; margin-left: 3px;">
                        <!--  <label for="formSaveAtividade_solicitacao" class="lbl" style="margin-left: 5px; border: none; background: none;">Solicitação:</label> -->
                        <br class="none"/>
                        <textarea id="formSaveAtividade_solicitacao" name="solicitacao" type="text" style="width: 493px !important;height: 180px; border: 1px solid #1E90FF;  border-top: none; margin-left: 5px; padding: 8px 5px 5px 5px;" title="Descreva a Solicitação para a atividade"><?php echo $this->_tpl_vars['atividade']['solicitacao']; ?>
</textarea>
                        <!-- <span class="aux_field" id="formSaveAtividade_auxField_solicitacao"  style="margin-left: 5px; margin-top: 0px;">Descreva a Solicitação para a atividade</span>  -->
                        <!--   <label for="Pendencia" class="lbl" style="width: 200px; border: none; background: none; text-align: left; margin-left: 5px;"><a href="javascript:; " onclick="GestaoProcessos.addPendencia();" style="color: green; font-size: 8pt; text-decoration: underline;">Incluir Pendência</a></label> -->
                    </div>
                </div>

                <!--   <div class="container_field_aux" >
                         <label for="formSaveAtividade_status" class="lbl"  style="border: none; background: none;">Status:</label>
                         <select id="formSaveAtividade_status" name="status" class="input_text" title="Informe a situação do processo">
                             <option value="" disabled selected> ::Selecione:: </option>
                             <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['valueStatus'],'output' => $this->_tpl_vars['outStatus'],'selected' => $this->_tpl_vars['atividade']['status']), $this);?>


                         </select><br class="none"/>
                         <span class="aux_field" id="formSaveAtividade_auxField_status">
				Informe a situacao do processo
                         </span>
                     </div> -->
                <div class="field_textarea" style="height: 83px; margin-left: 53px; ">
                    <label for="formSaveAtividade_pendencia" class="lbl" style="margin-left: 5px; border: none; background: none;">Pendência:</label>
                    <br class="none"/>
                    <textarea id="formSaveAtividade_pendencia" name="pendencia" type="text" class="input_text" style="width: 503px; height: 50px; margin-left: 5px; border: 1px solid #1E90FF;" title="Descreva a Pendência da atividade"><?php echo $this->_tpl_vars['atividade']['pendencia']; ?>
</textarea>
                    <span class="aux_field" id="formSaveAtividade_auxField_pendencia" style="margin-left: 5px;">Descreva a Pendência da atividade</span>
                </div>

                <?php if ($this->_tpl_vars['atividade']['ciente'] != 'Sim' && $this->_tpl_vars['atividade']['ciente'] != ""): ?>
                <div class="field" style="margin-left: 48px;">
                    <input  id="formSaveAtividade_ciente"  type="checkbox" name="ciente" value="Sim"  style="float: left !important; display: inline !important;"/>
                    <label for="formSaveAtividade_ciente" class="lbl" style=" float: none !important;">Estou ciente</label>

                    <!--   <select id="formSaveAtividade_ciente" name="ciente" class="input_text" title="Informe a situação do processo" style="width: 150px;">
                           <option value="" disabled> ::Selecione:: </option>
                           <option value="" disabled selected> Não </option>
                           <option value="Sim"> Sim </option>
                       </select><br class="none"/> -->
                    <span class="aux_field" id="formSaveAtividade_auxField_ciente" style="text-align: left;">
				Informe a situacao do processo
                    </span>
                </div>
                <?php endif; ?>

            </div>


        </fieldset>

    </form>

  <form action="" method="post" enctype="multipart/form-data" id="formUploadArquivo" target="frameRPC" class="hidden">
          <input type="hidden" name="ACTION" value="UploadArquivoAction" />
          <input type="hidden" name="tipo" value="" id="formUploadArquivo_tipo" />
          <input type="hidden" name="idParentInput" value="formSaveAtividade_arquivoUpd_parent" />
          <input type="hidden" name="idFormUpload" value="formUploadArquivo" />
          <input type="hidden" name="inputDestArquivo" value="formSaveAtividade_arquivo" />
      </form>
      <iframe name="frameRPC" id="frameRPC" frameborder="0" style="height: 20px;"></iframe> 

    <script language="javascript" type="text/javascript">
            FormUtil.initForm('formSaveAtividade');
    </script>



</fieldset>
<div class="icons" style="border-top: 1px solid #A9D5FB;">
    <span class="hide" style="float: right;">
        <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">
            <span style="display:none">
                <<
            </span>
        </a>    
    </span>

    <ul>
        <?php if ($this->_tpl_vars['salvar'] == 'salvar' || ( $this->_tpl_vars['atividade']['ciente'] == 'Não' || $this->_tpl_vars['atividade']['ciente'] == "" )): ?>
        <li><span id="save"><a href="javascript:;" id="formSaveAtividade_submit" onclick="GestaoAtividade.cadAtividade(); return false" title="Salvar"><img src="<?php echo @HTTP_URL; ?>
img/admin/save1.png" alt=""/>Enviar</a></span></li>
        <?php if ($this->_tpl_vars['salvar'] != ""): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeEnv.initListEnv(); return false" title="Cancelar"><img src="<?php echo @HTTP_URL; ?>
img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
        <?php endif; ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['nome'] == $this->_tpl_vars['atividade']['de']): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeEnv.initListEnv(); return false" title="Cancelar" style="width: 150px;"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar para enviadas</a></span></li>
        <?php elseif ($this->_tpl_vars['nome'] == $this->_tpl_vars['atividade']['para']): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeRec.initListRec(); return false" title="Cancelar" style="width: 150px;"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar para recebidas</a></span></li>
        <?php elseif ($this->_tpl_vars['atividade']['para'] == 'Apoio'): ?>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeRec.initListRec(); return false" title="Cancelar" style="width: 150px;"><img src="<?php echo @HTTP_URL; ?>
img/admin/arrow_left1.png" alt=""/>Voltar para recebidas</a></span></li>
        <?php endif; ?>
    </ul>

</div>