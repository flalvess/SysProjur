<div class="icons">
    <ul>
        {if $salvar =="salvar" or ($atividade.ciente =="Não" or $atividade.ciente =="")}
        <li><span id="save"><a href="javascript:;" id="formSaveAtividade_submit" onclick="GestaoAtividade.cadAtividade(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Enviar</a></span></li>
        {if $salvar !=""}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeEnv.initListEnv(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
        {/if}
        {/if}
        {if $nome == $atividade.de }
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeEnv.initListEnv(); return false" title="Cancelar" style="width: 150px;"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar para enviadas</a></span></li>
        {elseif $nome == $atividade.para}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeRec.initListRec(); return false" title="Cancelar" style="width: 150px;"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar para recebidas</a></span></li>
        {elseif $atividade.para =="Apoio"}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeRec.initListRec(); return false" title="Cancelar" style="width: 150px;"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar para recebidas</a></span></li>
        {/if}
    </ul>
</div>
<fieldset class="all" style="background-color: #F8FAFC; margin-bottom: 0px;">
    <legend>Cadastro de Atividade</legend>
    <form action="" method="post" id="formSaveAtividade" onsubmit="GestaoAtividade.cadAtividade(); return false">
        <input type="hidden" name="ACTION" value="{$actionForm}" />
        <input type="hidden" name="formId" value="formSaveAtividade" />
        <input type="hidden" name="idAtividade" value="{$atividade.idAtividade}" />
        <input type="hidden" name="para" id="formSaveAtividade_destinatario" value="{$atividade.para}" />
        <input type="hidden" name="arquivo" value="" id="formSaveAtividade_arquivo" />
        <input type="hidden" name="arquivoAntigo" value="{$atividade.arquivo}" />



        <fieldset >
            <!--  {if $atividade.data !=""}
                <div class="" style="width: 100%;float: right;">
                     <label for="formSaveAtividade_tipoAtividade" class="lbl">Data e Hora:</label>
                     {$atividade.data}
                </div>
                {/if} -->

            <div class="container_field_new" style=" width: 610px; padding-top:0px; background-color: #F8FAFC; margin-left: 0px; margin-left: 20px;">

                {if $atividade.de !=""}
                <div class="field" style="margin-bottom: 4px; width: 600px !important; margin-left: 20px; height: 25px;">
                    <label for="formSaveAtividade_de" class="lbl" style="float: left !important; display: inline !important; width: 30px;  ">De:</label>
                    <input id="formSaveAtividade_de" type="text" class="input_text" value="{$atividade.de}" style="width: 500px; height: 15px;" title="Digite o Nome ao qual vai ser enviado a atividade" />
                </div>
                {/if}

                <div class="field" style="margin-bottom: 4px; width: 600px !important; margin-left: 20px; height: 25px;">
                    <label for="formSaveAtividade_para" class="lbl" style="float: left !important; display: inline !important; width: 30px;  ">Para:</label>
                    <input id="formSaveAtividade_para" name="para" type="text" class="input_text" value="{$atividade.para}" style="width: 500px; height: 15px;" title="Digite o Nome ao qual vai ser enviado a atividade" />
                </div>

                <div class="container_field_aux" style="background-color: #F8FAFC; width: 650px !important;height: 35px !important; border: none;">

                    <div class="field" style="width: 600px !important; ">
                        <label for="formSaveAtividade_tipoAtividade" class="lbl" style="border: none; background: none; float: left !important; display: inline !important; width: 50px;">Assunto:</label>
                        <input id="formSaveAtividade_tipoAtividade" name="tipoAtividade" type="text"  value="{$atividade.tipoAtividade}" class="input_text" style="width: 499px; height: 15px;" title="Digite o Tipo da Atividade"/>
                        {if $atividade.para == ""}
                        <label id="labelArquivo" class="lbl" style="border: none; background: none; width: 250px; height: 15px; margin-left: 55px; margin-top: 20px;"><a href="javascript:;" onclick="GestaoAtividade.uploadAtividade();" style=" font-size: 8pt; color: green; text-decoration: underline;">Anexar um arquivo</a></label>
                        {/if}
                    </div>
                </div>

                {if $atividade.arquivo != ""}
                <fieldset id="uploadAtividade" class="none" style="padding-top:5px; height: 35px; width: 503px; margin-left: 63px;">
            <!--    <fieldset id="uploadAtividade" class="none" style="padding-top:15px; background-color:  #FFFF99; border: 1px solid #1E90FF; height: 50px; width: 503px; margin-left: 63px;"> -->
                  <!--  <div class="" style="border-left: 1px solid #A9D5FB; border-bottom: 1px solid #A9D5FB; background-color: white; float: right; border: 1px solid #1E90FF; border-top: none; border-right: none; margin-top: -15px; padding-right: 5px; padding-left: 5px; padding-bottom: 0px;">
                        <label class="lbl"><b style="color: #333333; font-size: 8pt"><a href="javascript:; " onclick="GestaoAtividade.uploadAtividade();" style="float: right; color: #1E90FF; font-size: 8pt; text-decoration: none !important;">X</a></b></label>

                    </div>  -->

                    <div class="field" style="margin-left: 15px; margin-bottom: 20px; border: none; width: 300px !important; display: inline !important; float:left; margin-top: -7px;">
                        <label for="formSaveAtividade_arquivoUpd" class="lbl">Anexo:</label>
                        <span id="formSaveAtividade_arquivoUpd_parent">
				
                            <a href="{$smarty.const.HTTP_URL}upload/{$atividade.arquivo}" target="_blank"><font style="color: green;"><img src="{$smarty.const.HTTP_URL}img/admin/anexo.gif" style="vertical-align: middle;" alt=""/>&nbsp;<u>Visualizar Arquivo em anexo</u></font></a>
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
               {elseif $atividade.arquivo == "" && $atividade.para =="" }
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
               
               {/if}
               
               <div class="container_field_aux" style="background-color: #F8FAFC; margin-left: 55px; margin-top: 10px;">
                    <div style="width: 503px; height: 20px; background-image: url('http://localhost/sysprojur/img/admin/toolbar.bg.gif'); border: 1px solid #1E90FF; margin-left: 8px; margin-bottom: -2px; padding-top: 5px; color: teal;">
                        {if $atividade.status == "" }
                        <select id="formSaveAtividade_status" name="status" class="input_text" style="height: 20px;;border: none;" title="Informe a situação do processo">
                            <option value="" disabled selected> Status </option>
                            {html_options values=$valueStatus output=$outStatus selected=$atividade.status }

                        </select><br class="none"/>
                        {else}
                        <label style="color: teal; border: none; background: none; float: left; margin-left: 5px;">Status:<font style="color: #000000; margin-left: 5px; font-size: 8pt;">{$atividade.status}</font></label>
                        {/if}
                        <strong style="float: right;">Em {$hoje}{$atividade.data}&nbsp&nbsp&nbsp</strong>
                    </div>
                    <div class="" style="min-height: 200px; width: 600px !important; border: 1px solid #000000; border: none; margin-left: 3px;">
                        <!--  <label for="formSaveAtividade_solicitacao" class="lbl" style="margin-left: 5px; border: none; background: none;">Solicitação:</label> -->
                        <br class="none"/>
                        <textarea id="formSaveAtividade_solicitacao" name="solicitacao" type="text" style="width: 493px !important;height: 180px; border: 1px solid #1E90FF;  border-top: none; margin-left: 5px; padding: 8px 5px 5px 5px;" title="Descreva a Solicitação para a atividade">{$atividade.solicitacao}</textarea>
                        <!-- <span class="aux_field" id="formSaveAtividade_auxField_solicitacao"  style="margin-left: 5px; margin-top: 0px;">Descreva a Solicitação para a atividade</span>  -->
                        <!--   <label for="Pendencia" class="lbl" style="width: 200px; border: none; background: none; text-align: left; margin-left: 5px;"><a href="javascript:; " onclick="GestaoProcessos.addPendencia();" style="color: green; font-size: 8pt; text-decoration: underline;">Incluir Pendência</a></label> -->
                    </div>
                </div>

                <!--   <div class="container_field_aux" >
                         <label for="formSaveAtividade_status" class="lbl"  style="border: none; background: none;">Status:</label>
                         <select id="formSaveAtividade_status" name="status" class="input_text" title="Informe a situação do processo">
                             <option value="" disabled selected> ::Selecione:: </option>
                             {html_options values=$valueStatus output=$outStatus selected=$atividade.status}

                         </select><br class="none"/>
                         <span class="aux_field" id="formSaveAtividade_auxField_status">
				Informe a situacao do processo
                         </span>
                     </div> -->
                <div class="field_textarea" style="height: 83px; margin-left: 53px; ">
                    <label for="formSaveAtividade_pendencia" class="lbl" style="margin-left: 5px; border: none; background: none;">Pendência:</label>
                    <br class="none"/>
                    <textarea id="formSaveAtividade_pendencia" name="pendencia" type="text" class="input_text" style="width: 503px; height: 50px; margin-left: 5px; border: 1px solid #1E90FF;" title="Descreva a Pendência da atividade">{$atividade.pendencia}</textarea>
                    <span class="aux_field" id="formSaveAtividade_auxField_pendencia" style="margin-left: 5px;">Descreva a Pendência da atividade</span>
                </div>

                {if $atividade.ciente != "Sim" and $atividade.ciente != ""}
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
                {/if}

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
        {if $salvar =="salvar" or ($atividade.ciente =="Não" or $atividade.ciente =="")}
        <li><span id="save"><a href="javascript:;" id="formSaveAtividade_submit" onclick="GestaoAtividade.cadAtividade(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Enviar</a></span></li>
        {if $salvar !=""}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeEnv.initListEnv(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
        {/if}
        {/if}
        {if $nome == $atividade.de }
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeEnv.initListEnv(); return false" title="Cancelar" style="width: 150px;"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar para enviadas</a></span></li>
        {elseif $nome == $atividade.para}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeRec.initListRec(); return false" title="Cancelar" style="width: 150px;"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar para recebidas</a></span></li>
        {elseif $atividade.para =="Apoio"}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoAtividadeRec.initListRec(); return false" title="Cancelar" style="width: 150px;"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar para recebidas</a></span></li>
        {/if}
    </ul>

</div>