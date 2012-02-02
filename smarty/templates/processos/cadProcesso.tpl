<div class="icons">
    <ul>
        <li><span id="save"><a href="javascript:;" id="formSaveProcesso_submit" onclick="GestaoProcessos.cadProcesso(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
    </ul>
</div>
<fieldset class="all">
    <legend>Cadastro de Processos</legend>
    <form action="" method="post" id="formSaveProcesso" onsubmit="GestaoProcessos.cadProcesso(); return false">
        <input type="hidden" name="ACTION" value="{$actionForm}" />
        <input type="hidden" name="formId" value="formSaveProcesso" />
        <input type="hidden" name="idProcesso" value="{$processo.idProcesso}" />
        <input type="hidden" name="fkUsuario" id="formSaveProcesso_fkUsuario" value="{$processo.fkUsuario}" />
        <input type="hidden" name="fkPrimeiraInstancia" id="formSaveProcesso_fkPrimeiraInstancia" value="" />

        <fieldset>

            {foreach from=$primeiraInstancia item=primeira}
            {/foreach}

            {foreach from=$segundaInstancia item=segunda}
            {/foreach}

            <input type="hidden" name="fkSegundaInstancia" value="{$segunda.idSegundaInstancia}" />

            <div class="" style="border-left: 1px solid #A9D5FB; border-bottom: 1px solid #A9D5FB; background-color: white; float: right; margin-top: -20px; padding-right: 5px; padding-left: 5px; padding-bottom: 2px;">
                <label for="formSaveProcesso_numeroProcesso" class="lbl"><b style="color: #333333; font-size: 8pt">Distribuição: </b></label>
                {if $modoDistribuicao == "M"}
                <font style="color: #339900; font-size: 8pt"><b><u>Manual</u></b></font>
                {else}
                <font style="color: green; font-size: 8pt"><b><u>Automático</u></b></font>
                {/if}
            </div>

            <div class="container_field_new">
                <label for="Processo" style="font-weight: bold; margin-left: 20px; font: bold 14px arial">Processo<a href="javascript:;" onclick="GestaoProcessos.ocultarProcesso();" title="Ocultar/Mostrar formulário"><img src="{$smarty.const.HTTP_URL}img/admin/seta1.png" alt=""/></a><label id="labelProcesso" style="font-size: 8pt; color: #999999"><i> Passe o mouse em cima dos campos para obter uma descrição</i></label></label>
            </div>

            <div class="container_field_new" id="processo" style="padding-top:15px;  background-color: #f8fafc; border: 1px solid #AED7FC; padding: 5px 5px 5px 5px; width: 670px; margin-left: 20px;">

                <div class="field">
                    <label for="formSaveProcesso_numeroProcesso" class="lbl">Número do Processo:</label>
                    <input id="formSaveProcesso_numeroProcesso" name="numeroProcesso" type="text" maxlength="14" class="input_text" value="{$processo.numeroProcesso}" title="Digite no máx. 14 dígitos"/>
                    <span class="aux_field" id="formSaveProcesso_auxField_numeroProcesso">Digite no máx. 14 dígitos</span>
                </div>

                <div class="field">
                    <label for="formSaveProcesso_tipoAcao" class="lbl">Tipo da Ação:</label>
                    <input id="formSaveProcesso_tipoAcao" name="tipoAcao" type="text" class="input_text" value="{$processo.tipoAcao}" title="Escreva o tipo da acao. Ex.: carta precatória"/>
                    <span class="aux_field" id="formSaveProcesso_auxField_tipoAcao">Escreva o tipo da acao. Ex.: carta precatória.</span>
                </div>

                <div class="field" style="width: 500px !important;">
                    <label for="formSaveProcesso_assunto" class="lbl" >Assunto:</label>
                    <!--  <textarea id="formSaveProcesso_assunto" name="assunto" class="input_text" style="width: 300px; height: 50px; margin-left: 5px;"  title="Escreva o assunto do processo">{$processo.assunto}</textarea> -->
                    <input id="formSaveProcesso_assunto" name="assunto" type="text" class="input_text" style="width: 500px !important;" value="{$processo.assunto}" title="Digite o assunto do processo"/>
                    <span class="aux_field" id="formSaveProcesso_auxField_assunto">Escreva o assunto do processo</span>
                </div>

                <div class="field_textarea" style="height: 75px; margin-bottom: 20px;">
                    <label for="formSaveProcesso_descricao" class="lbl" style="margin-left: 5px;">Descrição:</label>
                    <textarea id="formSaveProcesso_descricao" name="descricao" class="input_text" style="width: 300px; height: 50px; margin-left: 5px;"  title="Escreva uma descriçao/observaçao">{$processo.descricao}</textarea>
                    <span class="aux_field" id="formSaveProcesso_auxField_descricao" style="margin-left: 5px;">Escreva uma descriçao/observaçao</span>
                </div>

                <div class="field" style="width: 100px !important;">
                    <label for="formSaveProcesso_situacaoProcesso" class="lbl">Situacao:</label>
                    <select id="formSaveProcesso_situacaoProcesso" name="situacaoProcesso" class="input_text" style="width: 200px;" title="Informe a situação do processo">
                        <option value=""> ::Selecione:: </option>

                        {html_options values=$valueSituacao output=$outSituacao selected=$processo.situacaoProcesso}

                    </select><br class="none"/>
                    <span class="aux_field" id="formSaveProcesso_auxField_situacaoProcesso">Informe a situacao do processo</span>
                </div>

                {if $modoDistribuicao == "M"}
                <div class="field" id="cont-usuario"  style="width: 400px;">
                    <label for="formSaveProcesso_usuario" class="lbl">Procurador:</label>
                    <input type="text" id="formSaveProcesso_usuario" name="usuario" title="Escreva o nome do procurador para sistema buscá-lo automaticamente" class="input_text" style="width: 420px !important;"/>
                    <span class="aux_field" id="formSaveProcesso_auxField_usuario" style="width: 350px !important;" >Escreva o nome do procurador para sistema buscá-lo automaticamente</span>
                </div>
                {/if}

            </div>

            <div class="container_field_new" style="margin-top:15px;">
                <label for="Processo" style="top:5px; font-weight: bold; margin-left: 20px; font: bold 14px arial">Justiça<a href="javascript:;" onclick="GestaoProcessos.ocultarJustica();" title="Ocultar/Mostrar formulário"><img src="{$smarty.const.HTTP_URL}img/admin/seta1.png" alt=""/></a><label id="labelJustica" style="font-size: 8pt; color: #999999"><i> Passe o mouse em cima dos campos para obter uma descrição</i></label></label>
            </div>

            <div class="container_field_new" id="justica" style="padding-top:15px;  background-color: #f8fafc; border: 1px solid #AED7FC; padding: 5px 5px 5px 5px; width: 670px; margin-left: 20px;">
                <div class="field">
                    <label for="formSaveProcesso_justica" class="lbl">Justica:</label>
                    <select id="formSaveProcesso_justica" name="justica" class="input_text" style="width: 200px;" title="Escolha a Justiça.">
                        <option value=""> ::Selecione:: </option>
                        {html_options values=$valueJustica output=$outJustica selected=$processo.justica}
                    </select><br class="none"/>
                    <span class="aux_field" id="formSaveProcesso_auxField_justica">Escolha a justiça</span>
                </div>

                {if $processo.instancia =="" }
                <div class="field field_new_right">
                    <label for="formSaveProcesso_instancia" class="lbl">Instancia:</label>
                    <select id="formSaveProcesso_instancia" name="instancia" class="input_text"  style="width: 200px;" title="Informe a instância do processo" onchange="GestaoProcessos.changeProcessType();">
                        <option value=""> ::Selecione:: </option>
                        {html_options values=$valueInstancia output=$outInstancia selected=$processo.instancia}
                    </select><br class="none"/>
                    <span class="aux_field" id="formSaveProcesso_auxField_instancia" style="margin-left: 0px !important;">
				Informe a instância do processo
                    </span>
                </div>
                {else}
                <div class="field field_new_right">
                    <label for="formSaveProcesso_instancia" class="lbl">Instancia:</label>
                    <select id="formSaveProcesso_instancia" name="instancia" class="input_text" style="width: 200px;"  title="Informe a instância do processo" onchange="GestaoProcessos.changeProcessType();">
                        <option value="{$processo.instancia}" selected > {$processo.instancia} </option>
                    </select><br class="none"/>
                    <span class="aux_field" id="formSaveProcesso_auxField_instancia">
				Informe a instância do processo
                    </span>
                </div>
                {/if}

                <fieldset id="primeiraInstancia" class="none" style="padding-top:15px; background-color:  #f8fafc;">
                    <div class="field" >
                        <!--  <label for="formSaveProcesso_cidade" class="lbl" style="width: 200px;">Cidade:<a href="javascript:GestaoCidades.NovaCidade(); " style="float: right; color: green; font-size: 8pt; text-decoration: underline;">Incluir</a></label> -->
                        <label for="formSaveProcesso_cidade" class="lbl" style="width: 200px;">Cidade:<a href="javascript:; " onclick="GestaoProcessos.NovaCidade();" style="float: right; color: green; font-size: 8pt; text-decoration: underline;">Incluir</a></label>
                        <select id="formSaveProcesso_cidade" class="input_text" style="width: 200px;" name="cidade" onchange="GestaoProcessos.loadJuizos(this.value)" title="Escolha a cidade">
                            <option value="0">:: Selecione ::</option>
                            {html_options options=$optionsCidade selected=$primeira.idCidade }
                        </select>
                        <span class="aux_field" id="formSaveProcesso_auxField_cidade">
				 Digite a cidade de origem
                        </span>
                    </div>
                    <div class="field field_new_right" id="InicioJuizo">
                      <!--  <label for="formSaveProcesso_fkJuizo" class="lbl" style="width: 200px !important;">Juizo:<a href="javascript:;" onclick="GestaoJuizos.NovoJuizo();" style="float: right; color: green; font-size: 8pt; text-decoration: underline;">Incluir</a></label> -->
                        <label for="formSaveProcesso_fkJuizo" class="lbl" style="width: 200px !important;">Juizo:<a href="javascript:;" onclick="GestaoProcessos.NovoJuizo();" style="float: right; color: green; font-size: 8pt; text-decoration: underline;">Incluir</a></label>
                        <select id="formSaveProcesso_fkJuizo" class="input_text" style="width: 200px;" name="fkJuizo" title="Escolha o Juizo da cidade escolhida">
                            <option value="0">:: Selecione ::</option>
                        </select>
                        <span class="aux_field" id="formSaveProcesso_auxField_fkJuizo" style="margin-left: 0px !important;">
				 Esolha o Juizo da cidade escolhida
                        </span>
                    </div>
                    <fieldset id="NovoJuizo" class="none" style="padding-top:15px; background-color:  #AED7FC; border: 1px solid #1E90FF; height: 80px; width: 200px; margin-left: 260px;">
                        <div class="" style="border-left: 1px solid #A9D5FB; border-bottom: 1px solid #A9D5FB; background-color: white; float: right; border: 1px solid #1E90FF; border-top: none; border-right: none; margin-top: -15px; padding-right: 5px; padding-left: 5px; padding-bottom: 2px;">
                            <label class="lbl"><b style="color: #333333; font-size: 8pt"><a href="javascript:; " onclick="GestaoProcessos.NovoJuizo();" style="float: right; color: #1E90FF; font-size: 8pt; text-decoration: underline;">X</a></b></label>

                        </div>

                        <div class="field field_new_right" >
                            <label for="formSaveProcesso_novoJuizo2" class="lbl" style="width: 200px !important;">Novo Juizo:</label>
                            <input type="text" id="formSaveProcesso_novoJuizo2" name="novoJuizo2" title="Escreva o nome do juizo" class="input_text" style="width: 195px !important;"/>

                            <span class="aux_field" id="formSaveProcesso_auxField_novoJuizo2" style="margin-left: 0px !important;">
				 Escreva o nome do juizo
                            </span>
                        </div>
                    </fieldset>
                </fieldset>

                <!--   <fieldset id="NovaCidade" class="none" style="padding-top:15px; background-color:  #00ff7f;"> -->
                <fieldset id="NovaCidade" class="none" style="padding-top:15px; background-color:  #AED7FC; border: 1px solid #1E90FF; height: 80px;">
                    <div class="" style="border-left: 1px solid #A9D5FB; border-bottom: 1px solid #A9D5FB; background-color: white; float: right; border: 1px solid #1E90FF; border-top: none; border-right: none; margin-top: -15px; padding-right: 5px; padding-left: 5px; padding-bottom: 2px;">
                        <label for="formSaveProcesso_numeroProcesso" class="lbl"><b style="color: #333333; font-size: 8pt"><a href="javascript:; " onclick="GestaoProcessos.NovaCidade();" style="float: right; color: #1E90FF; font-size: 8pt; text-decoration: underline;">X</a></b></label>

                    </div>
                    <div class="field" >
                        <label for="formSaveProcesso_novaCidade" class="lbl" style="width: 200px;">Nova Cidade:</label>
                        <input type="text" id="formSaveProcesso_novaCidade" name="novaCidade" title="Escreva o nome da cidade" class="input_text" style="width: 195px !important; height: 19px;"/>
                        <span class="aux_field" id="formSaveProcesso_auxField_novaCidade" style="margin-left: 0px !important;">
				 Escreva o nome da cidade
                        </span>
                    </div>
                    <div class="field" style="margin-bottom: 20px; border: none; width: 130px !important; ">
                        <label for="formSaveProcesso_fkEstado" class="lbl">Estado</label>
                        <select id="formSaveProcesso_fkEstado" class="input_text" name="fkEstado" title="Selecione o estado" style=" width: 106px;">
                            <option value="" > ::Selecione:: </option>

                            {html_options values=$valueEstado output=$outEstado selected=$cidade.fkEstado}

                        </select><br class="none"/>
                        <span class="aux_field" id="formSaveProcesso_auxField_fkEstado">
				Selecione o estado
                        </span>
                    </div>
                    <div class="field field_new_right">
                        <label for="formSaveProcesso_novoJuizo" class="lbl" style="width: 200px !important;">Novo Juizo:</label>
                        <input type="text" id="formSaveProcesso_novoJuizo" name="novoJuizo" title="Escreva o nome do juizo" class="input_text" style="width: 195px !important;"/>

                        <span class="aux_field" id="formSaveProcesso_auxField_novoJuizo" style="margin-left: 0px !important;">
				 Escreva o nome do juizo
                        </span>
                    </div>
                </fieldset>



                <div class="container_field_new" style="padding-top:15px;" >
                    {if $segunda.tipoSegundaInstancia =="" }
                    <div id="segundaInstancia" class="field none">
                        <label for="formSaveProcesso_tipoSegundaInstancia" class="lbl">Tipo:</label>
                        <select id="formSaveProcesso_tipoSegundaInstancia" name="tipoSegundaInstancia" class="input_text" style="width: 200px;" title="Selecione o tipo do processo da 2º Intancia" onchange="GestaoProcessos.changePrimeiraInstancia();" >
                            <option value=""> ::Selecione:: </option>
                            {html_options values=$valueTipoSegundaInstancia output=$outTipoSegundaInstancia selected=$segunda.tipoSegundaInstancia}
                        </select><br class="none"/>
                        <span class="aux_field" id="formSaveProcesso_auxField_tipoSegundaInstancia">
				Selecione o tipo do processo da 2º Intancia
                        </span>
                    </div>
                    {else}
                    <div class="field" id="segundaInstancia">
                        <label for="formSaveProcesso_tipoSegundaInstancia" class="lbl">Tipo:</label>
                        <select id="formSaveProcesso_tipoSegundaInstancia" name="tipoSegundaInstancia" class="input_text" style="width: 200px;" title="Selecione o tipo do processo da 2º Intancia" onchange="GestaoProcessos.changePrimeiraInstancia();" >
                            <option value="{$segunda.tipoSegundaInstancia}" selected > {$segunda.tipoSegundaInstancia} </option>
                        </select><br class="none"/>
                        <span class="aux_field" id="formSaveProcesso_auxField_tipoSegundaInstancia">
				Selecione o tipo do processo da 2º Intancia
                        </span>
                    </div>
                    {/if}

                    <div id="segundaInstanciaDerivado" class="field field_new_right none" style="width: 400px !important;">
                        <label for="formSaveProcesso_primeiraInstancia" class="lbl">1º Instancia:</label>
                        <input type="text" id="formSaveProcesso_primeiraInstancia" name="primeiraInstancia" title="Informe o Nº do processo de 1º instancia que originou esse processo de 2º instancia" class="input_text" />
                        <span class="aux_field" id="formSaveProcesso_auxField_primeiraInstancia" style="margin-left: 0px !important; width: 400px !important;">Informe o Nº do processo de 1º instancia que originou esse processo de 2º instancia </span>
                    </div>

                </div>

            </div>


            <div class="container_field_new" style="margin-top:15px;">
                <label for="Processo" style="top:5px; font-weight: bold; margin-left: 20px; font: bold 14px arial"> Partes <a href="javascript:;" onclick="GestaoProcessos.ocultarParte();" title="Ocultar/Mostrar formulário"><img src="{$smarty.const.HTTP_URL}img/admin/seta1.png" alt=""/></a><label id="labelParte" style="font-size: 8pt; color: #999999"><i> Passe o mouse em cima dos campos para obter uma descrição</i></label></label>
            </div>

            <div class="container_field_new" id="parte" style="padding-top:15px; background-color: #f8fafc; border: 1px solid #AED7FC; padding: 5px 5px 5px 5px; width: 670px; margin-left: 20px;">
                <div class="field" style="height: auto; border: none; margin-right: 20px;">
                    <label for="formSaveProcesso_pessoa" class="lbl">Parte Representada:</label>
                    <input id="formSaveProcesso_pessoa" type="text" name="pessoa" value="" class="input_text"  title="Escreva o nome da parte representada"/><a href="javascript:;" onclick="adiciona(document.getElementById('formSaveProcesso_pessoa').value)" id="formSaveProcesso_teste"><img src="{$smarty.const.HTTP_URL}img/admin/add_u.png" style="margin-left: 5px;"/></a>

                    <div id="aqui" style="border: solid 2px #1E90FF; width: 231px; margin-left: 0px; min-height: 55px ; background-color: white;">

                    </div>
                    <span class="aux_field" id="formSaveProcesso_auxField_pessoa">Escreva o nome da parte representada </span>
                    <div>
                        <input id="ativoRepresentada" type="radio" value="ativoRepresentada" name="representada" onclick="GestaoProcessos.mudaPolo('ativoR');"/> Polo ativo
                        <input id="passivoRepresentada" type="radio" value="passivoRepresentada" name="representada" onclick="GestaoProcessos.mudaPolo('passivoR');"/> Polo passivo
                    </div>
                </div>
                <div class="field" style=" width: 1px !important; height: 120px; margin-top: 10px; background-color: #AED7FC; padding: 0px !important; ">

                </div>
                <div class="field" style="height: auto; border: none; margin-left: 20px;">
                    <label for="formSaveProcesso_parteAdversa" class="lbl">Parte Adversa:</label>
                    <input id="formSaveProcesso_parteAdversa" type="text" name="parteAdversa" value="" class="input_text"  title="Escreva o nome da parte adversa"/><a href="javascript:;" onclick="adicionaAdversa(document.getElementById('formSaveProcesso_parteAdversa').value)" ><img src="{$smarty.const.HTTP_URL}img/admin/add_u.png" style="margin-left: 5px;"/></a>

                    <div id="aqui2" style="border: solid 2px #1E90FF; width: 231px; margin-left: 0px; min-height: 55px ; background-color: white;">

                    </div>
                    <span class="aux_field" id="formSaveProcesso_auxField_parteAdversa">Escreva o nome da parte adversa </span>
                    <div>
                        <input id="ativoAdversa" type="radio" value="ativoAdversa" name="adversa" onclick="GestaoProcessos.mudaPolo('ativoA');"/> Polo ativo
                        <input id="passivoAdversa" type="radio" value="passivoAdversa" name="adversa" onclick="GestaoProcessos.mudaPolo('passivoA');"/> Polo passivo
                    </div>
                </div>
            </div>

        </fieldset>

    </form>
    <script language="javascript" type="text/javascript">
            FormUtil.initForm('formSaveProcesso');
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
        <li><span id="save"><a href="javascript:;" onclick="GestaoProcessos.cadProcesso(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>
    </ul>
</div>