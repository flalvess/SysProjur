<div class="icons">
    <ul>

        <li><span id="save"><a href="javascript:;" id="formSaveSubstituicoes_submit" onclick="GestaoSubstituicoes.cadSubstituicoes(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoSubstituicoes.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>

    </ul>
</div>
<fieldset class="all">
    <legend>Cadastro de Funcionários</legend>
    <form action="" method="post" id="formSaveSubstituicoes" onsubmit="GestaoSubstituicoes.cadSubstituicoes(); return false">
        <input type="hidden" name="ACTION" value="{$actionForm}" />
        <input type="hidden" name="formId" value="formSaveSubstituicoes" />
        <input type="hidden" name="idSubstituicoes" value="{$substituicoes.idSubstituicaoProcurador}" />
        <input type="hidden" name="fkUsuarioOriginal" value="{$fkUsuarioOriginal}" />
        <input type="hidden" name="fkUsuario" id="formSaveSubstituicoes_fkUsuario" value="{$processo.fkUsuario}" />

        <div class="container_field_new" style=" width: 600px; padding-top:15px;  background-color: white; padding: 5px 5px 5px 5px; margin-left: 20px;">
            <div class="field">
                <label for="formSaveSubstituicoes_temporaria" class="lbl">Processo{$substituicoes.idProcesso}</label>
                {if $substituicoes.processo || $numero_processo}
                <select id="formSaveSubstituicoes_processo"  readonly="readonly" class="input_text" title="Escolha se é substituição temporária." onchange="GestaoProcessos.loadProcuradorOriginal(this.value)">
                    <option>{$numero_processo}</option>
                </select>
                {if $substituicoes.processo == ""} 
                <input name="processo" type="hidden" value="{$fkProcesso}" />
                {else}
                <input name="processo" type="hidden" value="{$substituicoes.processo}" />
                {/if}
                {else}
                <select id="formSaveSubstituicoes_processo" name="processo" class="input_text" title="Escolha se é substituição temporária." onchange="GestaoProcessos.loadProcuradorOriginal(this.value)">
                    <option value=""> ::Selecione:: </option>
                    {foreach from=$processos item="item"}
                    <option value="{$item.idProcesso}"> {$item.numeroProcesso} </option>
                    {/foreach}
                </select>
                {/if}<br class="none"/>
                <span class="aux_field" id="formSaveSubstituicoes_auxField_processo">
				Escolha o número do processo
                </span>
            </div>
            <div class="field" id="cont-usuario">
                <label for="formSaveSubsituicaoProcesso_usuario_disabled" class="lbl">Procurador Original:</label>
                <input type="text" value="{if $procurador_original} {$procurador_original} {else} Selecione o processo{/if}" readonly="readonly" value="" id="formSaveSubsituicaoProcesso_usuario_disabled" name="usuario" title="Escreva o nome do procurador para buscá-lo" class="input_text" />
                <span class="aux_field" id="formSaveSubstituicoes_auxField_usuario_disabled">Procurador atual</span>
            </div>
        </div>
        <div class="container_field_new" style=" width: 600px; padding-top:15px;  background-color: white; padding: 5px 5px 5px 5px; margin-left: 20px;">

            <div class="field" id="cont-usuario">
                <label for="formSaveSubstituicoes_usuario" class="lbl">Novo Procurador:</label>
                <input type="text" id="formSaveSubstituicoes_usuario" name="usuario" title="Escreva o nome do procurador para buscá-lo" class="input_text" value="{$procurador_subbstituto.nome}" />
                <span class="aux_field" id="formSaveSubstituicoes_auxField_usuario">Distribuição de Processo: Informe o procurador que ficará responsável por este processo</span>
            </div>
            
            <div class="field">
                <label for="formSaveSubstituicoes_temporaria" class="lbl">Subst. temporária:</label>
                <select id="formSaveSubstituicoes_temporaria" name="temporaria" class="input_text" title="Escolha se é substituição temporária." onchange="GestaoSubstituicoes.showHide(this.value)">
                    <option value=""> ::Selecione:: </option>
                    <option value="s" {if $substituicoes.temporaria=='s'} selected {/if}> Sim </option>
                    <option value="n" {if $substituicoes.temporaria=='n'} selected {/if}> Nâo </option>

                </select><br class="none"/>
                <span class="aux_field" id="formSaveSubstituicoes_auxField_temporaria">
				Escolha se é substituição temporária
                </span>
            </div>

            <div id="container_temporaria" {if $substituicoes.temporaria=='s'} style="display: block;" {else} style="display: none;"{/if}>
                 <div class="field_textarea" style="height: 75px; margin-bottom: 20px;">
                     <label for="formSaveSubstituicoes_motivo" class="lbl" style="margin-left: 5px;">Motivo da substiuição</label>
                    <textarea id="formSaveSubstituicoes_motivo" name="motivo" class="input_text" style="width: 300px; height: 50px; margin-left: 5px;"  title="Escreva uma motivo para o tipo de processo escolhido">{$substituicoes.motivoSubstituicao}</textarea>
                    <span class="aux_field" id="formSaveSubstituicoes_auxField_motivo" style="width: 300px !important; margin-left: 5px;">Diga o motivo da substituição.</span>
                </div>
                <div class="field_textarea" style="height: 75px; margin-bottom: 20px;">
                    <label for="formSaveSubstituicoes_obs" class="lbl" style="margin-left: 5px;">Obs:</label>
                    <textarea id="formSaveSubstituicoes_obs" name="obs" class="input_text" style="width: 300px; height: 50px; margin-left: 5px;"  title="Escreva uma obs para o tipo de processo escolhido">{$substituicoes.observacao}</textarea>
                    <span class="aux_field" id="formSaveSubstituicoes_auxField_obs" style="width: 300px !important; margin-left: 5px;">Escreva uma obsercação para esta substituição (opcional).</span>
                </div>
            </div>
        </div>
    </form>
    <script language="javascript" type="text/javascript">
            FormUtil.initForm('formSaveSubstituicoes');
    </script>
</fieldset>
<div class="icons">
    <span class="hide">
        <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">
            <span style="display:none">
                <<
            </span>
        </a>
    </span>
    <ul>
        <li><span id="save"><a href="javascript:;" onclick="GestaoSubstituicoes.cadSubstituicoes(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Salvar</a></span></li>

        <!--<li><span id="cancel"><a href="javascript:;" onclick="GestaoSubstituicoes.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>-->
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoSubstituicoes.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>

    </ul>
</div>