<div class="icons">
    <ul>
        <li><span id="save"><a href="javascript:;" id="formSaveMovimentacao_submit" onclick="GestaoMovimentacao.cadMovimentacao(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <!--<li><span id="cancel"><a href="javascript:;" onclick="GestaoMovimentacao.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel.png" alt=""/>Cancelar</a></span></li> -->
        {if $movimentacao.fkProcesso == "" }
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.openProcesso('{$idProcesso}', '{$area}'); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
        {else}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.openProcesso('{$movimentacao.fkProcesso}', '{$area}'); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
        {/if}
    </ul>
</div>
<fieldset class="all">
    <legend>Cadastro de Movimentacao</legend>
    <form action="" method="post" id="formSaveMovimentacao" onsubmit="GestaoMovimentacao.cadMovimentacao(); return false">
        <input type="hidden" name="ACTION" value="{$actionForm}" />
        <input type="hidden" name="formId" value="formSaveMovimentacao" />
        <input type="hidden" name="idMovimentacao" value="{$movimentacao.idMovimentacao}" />
        <!--   <input type="hidden" name="evento" value="{$movimentacao.evento}" /> -->
        <input type="hidden" name="arquivo" value="" id="formSaveMovimentacao_arquivo" />
        <input type="hidden" name="arquivoAntigo" value="{$movimentacao.arquivo}" />

        {if $idProcesso == ""}
        <input type="hidden" name="fkProcesso" id="formSaveMovimentacao_fkProcesso" value="{$movimentacao.fkProcesso}" />
        {else}
        <input type="hidden" name="fkProcesso" id="formSaveMovimentacao_fkProcesso" value="{$idProcesso}" />
        {/if}
        <fieldset>

            {foreach from=$movimentacaoAExecutar item=move}


            {/foreach}
           <div class="container_field_new" style=" width: 600px; padding-top:15px;  background-color: white; padding: 5px 5px 5px 5px; margin-left: 20px;">

            <div class="field" >
                <label for="formSaveMovimentacao_processo" class="lbl">Processo:</label>
                <input type="text" id="formSaveMovimentacao_processo" name="processo" title="Nº do processo" class="input_text" />
                <span class="aux_field" id="formSaveMovimentacao_auxField_processo">Nº do processo</span>
            </div>



            {if $perfil != "Apoio" and $movimentacao.tipoMovimentacao != ""}
            <div class="field" style=" margin-bottom: 20px;">
                <label for="formSaveMovimentacao_tipoMovimentacao" class="lbl">Tipo:</label>
                <select id="formSaveMovimentacao_tipoMovimentacao" name="tipoMovimentacao" class="input_text" title="É o tipo da movimentacao." onchange="GestaoMovimentacao.changeProcessType();" style=" width: 205px;">
                    <option value="{$movimentacao.tipoMovimentacao}" selected> ::Selecione:: </option>
                    <!--     <option value="executada"> executada </option>
                         <option value="a executar"> a executar </option> -->

                    {if  $perfil == "Apoio"}

                    {html_options values=$valueTipoExecutada output=$outTipoExecutada selected=$movimentacao.tipoMovimentacao}

                    {else}

                    {html_options values=$valueTipoMovimentacao output=$outTipoMovimentacao selected=$movimentacao.tipoMovimentacao}


                    {/if}
                </select><br class="none"/>
                <span class="aux_field" id="formSaveMovimentacao_auxField_tipoMovimentacao">
				Selecione o tipo do movimentacao
                </span>
            </div>

            {elseif $movimentacao.tipoMovimentacao == "" }
            <div class="field" style=" margin-bottom: 20px;">
                <label for="formSaveMovimentacao_tipoMovimentacao" class="lbl">Tipo:</label>
                <select id="formSaveMovimentacao_tipoMovimentacao" name="tipoMovimentacao" class="input_text" title="É o tipo da movimentacao." onchange="GestaoMovimentacao.changeProcessType();" style=" width: 205px;">
                    <option value="{$movimentacao.tipoMovimentacao}" selected> ::Selecione:: </option>
                    <!--     <option value="executada"> executada </option>
                         <option value="a executar"> a executar </option> -->

                    {if  $perfil == "Apoio"}

                    {html_options values=$valueTipoExecutada output=$outTipoExecutada selected=$movimentacao.tipoMovimentacao}

                    {else}

                    {html_options values=$valueTipoMovimentacao output=$outTipoMovimentacao selected=$movimentacao.tipoMovimentacao}


                    {/if}
                </select><br class="none"/>
                <span class="aux_field" id="formSaveMovimentacao_auxField_tipoMovimentacao">
				Selecione o tipo do movimentacao
                </span>
            </div>

            {else}

             <input type="hidden" name="tipoMovimentacao" value="{$movimentacao.tipoMovimentacao}" />
            
            {/if}


            <fieldset id="movimentacaoAExecutar" class="none" style=" margin-bottom: 20px;">

                <div class="field" style=" margin-bottom: 20px;">
                    <label for="formSaveMovimentacao_dataLimite" class="lbl">Data Limite:</label>
                    <input id="formSaveMovimentacao_dataLimite" name="dataLimite" type="text" class="input_text" value="{$move.dataLimite}" title="Digite a data limite"/>
                    <span class="aux_field" id="formSaveMovimentacao_auxField_dataLimite">Digite a data limite</span>
                </div>
                <div class="field" style=" margin-bottom: 20px;">
                    <label for="formSaveMovimentacao_status" class="lbl">Status</label>
                    <select id="formSaveMovimentacao_status" class="input_text" name="status" title="Selecione o status" style=" width: 206px;">
                        <option value="" > ::Selecione:: </option>
                        {html_options values=$valueStatus output=$outStatus selected=$move.status}
                        <!--  <option value="Normal"> Normal </option>
                          <option value="Urgente"> Urgente </option>
                          <option value="Com pendência"> Com pendência </option>
                          <option value="Perda de prazo"> Perda de prazo </option>
                          <option value="Concluído"> Concluído </option> -->
                    </select><br class="none"/>
                    <span class="aux_field" id="formSaveMovimentacao_auxField_status">
				Selecione o status
                    </span>
                </div>
                <div class="field_textarea" style="height: 50px;  margin-bottom: 20px;">
                    <label for="formSaveMovimentacao_pendencia" class="lbl" style="margin-left: 5px;">Pendencia:</label>

                    <textarea id="formSaveMovimentacao_pendencia" name="pendencia" style="width: 300px; height: 50px; margin-left: 5px;" class="input_text" title="Escreva a descrião da pendencia">{$move.pendencia}</textarea>
                    <span class="aux_field" id="formSaveMovimentacao_auxField_pendencia" style="margin-left: 5px;">Escreva a descrição da pendencia</span>
                </div>
            </fieldset>
           </div>

            <div class="field_textarea" style="height: 80px;  margin-bottom: 20px; margin-left: 25px;">
                <label for="formSaveMovimentacao_evento" class="lbl" style="margin-left: 5px;">Evento do Processo:</label>
                <textarea id="formSaveMovimentacao_evento" name="evento" class="input_text" style="width: 300px; height: 50px; margin-left: 5px;" title="Digite o evento da movimentacao">{$movimentacao.evento}</textarea>
                <span class="aux_field" id="formSaveMovimentacao_auxField_evento" style="margin-left: 5px;">Digite o evento da movimentacao</span>
            </div> 

            <div class="field_textarea" style="height: 80px;  margin-bottom: 20px; margin-left: 25px;">
                <label for="formSaveMovimentacao_observacao" class="lbl" style="margin-left: 5px;">Observacao:</label>
                <br class="none"/>
                <textarea id="formSaveMovimentacao_observacao" name="observacao" type="text" class="input_text" style="width: 300px; height: 50px; margin-left: 5px;" title="Digite uma observação para a movimentacao">{$movimentacao.observacao}</textarea>
                <span class="aux_field" id="formSaveMovimentacao_auxField_observacao" style="margin-left: 5px;">Digite uma observacao para a movimentacao</span>
            </div>

        </fieldset>

        <div class="field" style="margin-left: 25px; margin-bottom: 20px;">
            <label for="formSaveMovimentacao_arquivoUpd" class="lbl">Arquivo:</label>
            <span id="formSaveMovimentacao_arquivoUpd_parent">
				{if $movimentacao.arquivo}
                <a href="{$smarty.const.HTTP_URL}upload/{$movimentacao.arquivo}" target="_blank"><font style="color: green;">&nbsp;[Visualizar Arquivo]</font></a>
                <!-- <strong>Opções:</strong>-->
					 {literal}
             <!--   <a href="#" class="alert" onClick="js.cancelUpload({idFormUpload:'formUploadArquivo', inputDestArquivo:'formSaveMovimentacao_arquivo'});"><font style="color: red;">&nbsp;[ Apagar Arquivo ]</font></a> -->
                <a href="javascript:;" class="alert" onClick="js.cancelUpload({idFormUpload:'formSaveMovimentacao_arquivoUpd', inputDestArquivo:'formSaveMovimentacao_arquivo'});"><font style="color: red;">&nbsp;[ Apagar Arquivo ]</font></a>
					 {/literal} 
				{else}
                <input type="file" id="formSaveMovimentacao_arquivoUpd"   class="input_text" name="arquivo" title="É o arquivo do contrato" onchange="js.upload('formSaveMovimentacao_arquivoUpd')" />
				{/if}
            </span>
            <span class="aux_field" id="formSaveMovimentacao_auxField_arquivoUpd">
            </span>
            <div class="container_legenda_arquivo" id="container_legenda_arquivo" style="margin-left: 195px; width: 70px ;">
            </div>
        </div>
  

         {if $movimentacao.ciente != "Sim" and $movimentacao.ciente != "" and $perfil != "Apoio"}
        <div class="field" style="width: 400px; margin-left: 25px;">
            <label for="formSaveMovimentacao_ciente" class="lbl">Ciente:</label>
            <select id="formSaveMovimentacao_ciente" name="ciente" class="input_text" title="Informe a situação do processo">
                <option value="Não" disabled> ::Selecione:: </option>
                <option value="Não" disabled selected> Não </option>
                <option value="Sim"> Sim </option>
            </select><br class="none"/>
            <span class="aux_field" id="formSaveMovimentacao_auxField_ciente">
				Informe a situacao do processo
            </span>
        </div>

        {else}
              <input type="hidden" name="ciente" value="Sim" />
        {/if}



    </form>

    <form action="" method="post" enctype="multipart/form-data" id="formUploadArquivo" target="frameRPC" class="hidden">
        <input type="hidden" name="ACTION" value="UploadArquivoAction" />
        <input type="hidden" name="tipo" value="" id="formUploadArquivo_tipo" />
        <input type="hidden" name="idParentInput" value="formSaveMovimentacao_arquivoUpd_parent" />
        <input type="hidden" name="idFormUpload" value="formUploadArquivo" />
        <input type="hidden" name="inputDestArquivo" value="formSaveMovimentacao_arquivo" />
    </form>
    <iframe name="frameRPC" id="frameRPC" frameborder="0" style="height: 20px;"></iframe>

    <script language="javascript" type="text/javascript">
            FormUtil.initForm('formSaveMovimentacao');
    </script>
</fieldset>
<div class="icons">
    <span class="hide" style="float: right;">
        <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">
            <span style="display:none">
                <<
            </span>
        </a>
    </span>
    <ul>
        <!-- <li><span id="save"><a href="javascript:;" onclick="GestaoMovimentacao.cadMovimentacao(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save.png" alt=""/>Salvar</a></span></li>
         <li><span id="cancel"><a href="javascript:;" onclick="GestaoMovimentacao.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel.png" alt=""/>Cancelar</a></span></li> -->
        <li><span id="save"><a href="javascript:;" id="formSaveMovimentacao_submit" onclick="GestaoMovimentacao.cadMovimentacao(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <!--<li><span id="cancel"><a href="javascript:;" onclick="GestaoMovimentacao.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel.png" alt=""/>Cancelar</a></span></li> -->
        {if $movimentacao.fkProcesso == "" }
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.openProcesso('{$idProcesso}', '{$area}'); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
        {else}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.openProcesso('{$movimentacao.fkProcesso}', '{$area}'); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
        {/if}

    </ul>
</div>