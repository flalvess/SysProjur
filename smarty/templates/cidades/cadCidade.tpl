<div class="icons">
    <ul>

        <li><span id="save"><a href="javascript:;" id="formSaveCidade_submit" onclick="GestaoCidades.cadCidade(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Salvar</a></span></li>
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoCidades.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>

    </ul>
</div>
<fieldset class="all">
    <legend>Cadastro de Funcionários</legend>
    <form action="" method="post" id="formSaveCidade" onsubmit="GestaoCidades.cadCidade(); return false">
        <input type="hidden" name="ACTION" value="{$actionForm}" />
        <input type="hidden" name="formId" value="formSaveCidade" />
        <input type="hidden" name="idCidade" value="{$cidade.idCidade}" />

<div class="container_field_new" style=" width: 600px; padding-top:15px;  background-color: white; padding: 5px 5px 5px 5px; margin-left: 20px;">
        <div class="field" style="margin-bottom: 20px; margin-left: 10px;">
            <label for="formSaveCidade_nome" class="lbl">Cidade:</label>
            <input id="formSaveCidade_nome" name="nome" type="text" class="input_text" value="{$cidade.nome}" title="Digite o nome da cidade"/>
            <span class="aux_field" id="formSaveCidade_auxField_nome">Digite o nome da cidade</span>
        </div>
        <div class="field" style="margin-bottom: 20px; margin-left: 10px;">
            <label for="formSaveCidade_fkEstado" class="lbl">Estado</label>
            <select id="formSaveCidade_fkEstado" class="input_text" name="fkEstado" title="Selecione o estado" style=" width: 206px;">
                <option value="" > ::Selecione:: </option>

                {html_options values=$valueEstado output=$outEstado selected=$cidade.fkEstado}

            </select><br class="none"/>
            <span class="aux_field" id="formSaveCidade_auxField_fkEstado">
				Selecione o estado
            </span>
        </div>
</div>
        
    </form>
    <script language="javascript" type="text/javascript">
            FormUtil.initForm('formSaveCidade');
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
        <li><span id="save"><a href="javascript:;" onclick="GestaoCidades.cadCidade(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save1.png" alt=""/>Salvar</a></span></li>

        <!--<li><span id="cancel"><a href="javascript:;" onclick="GestaoCidades.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel.png" alt=""/>Cancelar</a></span></li>-->
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoCidades.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/cancel1.png" alt=""/>Cancelar</a></span></li>

    </ul>
</div>