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

        <fieldset >


            <div class="container_field_new" style=" width: 610px; padding-top:0px; background-color: #F8FAFC; margin-left: 0px; margin-left: 20px;">

                {if $atividade.para ==""}
                <div class="field" style="margin-bottom: 4px; width: 600px !important; margin-left: 20px; height: 25px;">
                    <label for="formSaveAtividade_para" class="lbl" style="float: left !important; display: inline !important; width: 30px;  ">Para:</label>
                    <input id="formSaveAtividade_para" name="para" type="text" class="input_text" style="width: 500px; height: 15px;" title="Digite o Nome ao qual vai ser enviado a atividade" />
                    <!--  <span class="aux_field" id="formSaveAtividade_auxField_para">Digite o Nome ao qual vai ser enviado a atividade</span> -->
                </div>
                {else}

                <div class="container_field_aux" >
                    <div class="field_aux" style="width: 500px; text-align: left; ">
                        <label for="formSaveAtividade_para" class="lbl" style=" text-align: left;">&nbsp;&nbsp;De:</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$atividade.de}
                    </div>
                </div>
                <div class="container_field_aux" >

                    <div class="field_aux" style="width: 500px; text-align: left;">
                        <label for="formSaveAtividade_de" class="lbl" style=" text-align: left;">&nbsp;&nbsp;Para:</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$atividade.para}
                    </div>
                </div>

                {/if}

                <div class="container_field_aux" style="background-color: #F8FAFC; width: 650px !important; height: 25px; border: none;">

                    {if $atividade.tipoAtividade ==""}
                    <div class="field" style="width: 600px !important; ">
                        <label for="formSaveAtividade_tipoAtividade" class="lbl" style="border: none; background: none; float: left !important; display: inline !important; width: 50px;">Assunto:</label>
                        <input id="formSaveAtividade_tipoAtividade" name="tipoAtividade" type="text" class="input_text" style="width: 499px; height: 15px;" title="Digite o Tipo da Atividade"/>
                        <!-- <span class="aux_field" id="formSaveAtividade_auxField_tipoAtividade">Escreva o Digite o Tipo da Atividade.</span> -->
                    </div>
                    {else}

                    <div class="field_aux" style="width: 345px; text-align: left;">
                        <label for="formSaveAtividade_tipoAtividade" class="lbl" style=" text-align: left;"> &nbsp;&nbsp;Assunto:</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$atividade.tipoAtividade}
                    </div>

                    {/if}

                    {if $atividade.data !=""}
                    <div class="field_aux">
                        <label for="formSaveAtividade_tipoAtividade" class="lbl">Data e Hora:</label>
                        {$atividade.data}

                    </div>
                    {/if}
                </div>
                <div class="container_field_aux" style="background-color: #F8FAFC; margin-left: 55px;">


                    {if $atividade.solicitacao ==""}
                    <div class="field_textarea" style="min-height: 200px; width: 600px !important; border: 1px solid #000000; border: none; margin-left: 3px;">

                        <!--  <label for="formSaveAtividade_solicitacao" class="lbl" style="margin-left: 5px; border: none; background: none;">Solicitação:</label> -->
                        <br class="none"/>
                        <textarea id="formSaveAtividade_solicitacao" name="solicitacao" type="text" style="width: 503px !important;" title="Descreva a Solicitação para a atividade"></textarea>
                        <!--    <textarea id="editor1" name="editor1"  style="visibility: visible !important;" title="Descreva a Solicitação para a atividade"></textarea> -->


                        <span class="aux_field" id="formSaveAtividade_auxField_solicitacao"  style="margin-left: 5px; margin-top: 0px;">Descreva a Solicitação para a atividade</span>
                    </div> 


                    {else}
                    <div class="field_aux" style="width: 500px; text-align: left; min-height: 70px;">
                        <label for="formSaveAtividade_solicitacao" class="lbl" style="text-align: left; margin-bottom: 5px;"> &nbsp;&nbsp;Solicitação:</label>
                        <br class="none"/>
                        {$atividade.solicitacao}

                    </div>
                </div>
                {/if}

                {if $atividade.status ==""}

                <div class="field" >
                    <label for="formSaveAtividade_status" class="lbl"  style="border: none; background: none;">Status:</label>
                    <select id="formSaveAtividade_status" name="status" class="input_text" title="Informe a situação do processo">
                        <option value="" disabled selected> ::Selecione:: </option>
                        {html_options values=$valueStatus output=$outStatus}
                        <!--    <option value="Normal"> Normal </option>
                            <option value="Urgente"> Urgente </option> -->
                    </select><br class="none"/>
                    <span class="aux_field" id="formSaveAtividade_auxField_status">
				Informe a situacao do processo
                    </span>
                </div>
                {else}
                <div class="container_field_aux" >
                    <div class="field_aux" style="  min-height:  70px !important; ">
                        <label for="formSaveAtividade_status" class="lbl">Status:</label>
                        {$atividade.status}

                    </div>

                    {/if}

                    {if $atividade.pendencia ==""}

                    <div class="field_textarea" style="height: 83px;">
                        <label for="formSaveAtividade_pendencia" class="lbl" style="margin-left: 5px; border: none; background: none;">Pendência:</label>
                        <br class="none"/>
                        <textarea id="formSaveAtividade_pendencia" name="pendencia" type="text" class="input_text" style="width: 300px; height: 50px; margin-left: 5px" title="Descreva a Pendência da atividade"></textarea>
                        <span class="aux_field" id="formSaveAtividade_auxField_pendencia" style="margin-left: 5px;">Descreva a Pendência da atividade</span>
                    </div>
                    {else}
                    <div class="field_aux" style=" width: 346px; text-align: left;  min-height: 70px;" >
                        <label for="formSaveAtividade_pendencia" class="lbl" >Pendência:</label>
                        <br class="none"/>
                        {$atividade.pendencia}

                    </div>
                </div>

                {/if}

                {if $atividade.ciente != "Sim" and $atividade.ciente != ""}
                <div class="container_field_aux" style="width: 400px; margin-top: 10px;">
                    <div class="field_aux">
                        <label for="formSaveAtividade_ciente" class="lbl" style="text-align: left; background: #ffff99; border: 1px solid orange;"> &nbsp;&nbsp;Ciente:</label>
                        <select id="formSaveAtividade_ciente" name="ciente" class="input_text" title="Informe a situação do processo" style="width: 150px;">
                            <option value="" disabled> ::Selecione:: </option>
                            <option value="" disabled selected> Não </option>
                            <option value="Sim"> Sim </option>
                            <!--  {html_options values=$valueCiente output=$outCiente selected=$atividade.ciente} -->
                            <!--    <option value="Normal"> Normal </option>
                                <option value="Urgente"> Urgente </option> -->
                        </select><br class="none"/>
                        <span class="aux_field" id="formSaveAtividade_auxField_ciente" style="text-align: left;">
				Informe a situacao do processo
                        </span>
                    </div>
                </div>

                {/if}

            </div>

        </fieldset>

    </form>

    <!--  <form action="" method="post" enctype="multipart/form-data" id="formUploadArquivo" target="frameRPC" class="hidden">
          <input type="hidden" name="ACTION" value="UploadArquivoAction" />
          <input type="hidden" name="tipo" value="" id="formUploadArquivo_tipo" />
          <input type="hidden" name="idParentInput" value="formSaveAtividade_arquivoUpd_parent" />
          <input type="hidden" name="idFormUpload" value="formUploadArquivo" />
          <input type="hidden" name="inputDestArquivo" value="formSaveAtividade_arquivo" />
      </form>
      <iframe name="frameRPC" id="frameRPC" frameborder="0" style="height: 20px;"></iframe> -->

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