<div class="icons">
    <ul>
        <!--   <li><span id="save"><a href="javascript:;" id="formSaveProcesso_submit" onclick="GestaoProcessos.cadProcesso(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save.png" alt=""/>Salvar</a></span></li> -->
        <!-- <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left.png" alt=""/>Voltar</a></span></li> -->
        {if $area == ""}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        {elseif $area =="semCiente"}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListSemCiente(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        {elseif $area =="aExecutar"}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListAExecutar(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        {elseif $area =="meusProcessos"}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListMeusProcessos(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        {elseif $area =="undefined"}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        {/if}
    </ul>

    <span class="hide" >
        <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">

            <span style="display:none">
                <<
            </span>
        </a>
    </span>

</div>
<fieldset class="all">
    <legend>Openastro de Processos</legend>
    <form action="" method="post" id="formSaveProcesso" onsubmit="GestaoProcessos.cadProcesso(); return false">
        <input type="hidden" name="ACTION" value="{$actionForm}" />
        <input type="hidden" name="formId" value="formSaveProcesso" />
        <input type="hidden" name="idProcesso" value="{$processo.idProcesso}" />
        <!--   <input type="hidden" name="fkProcurador" id="formSaveProcesso_fkProcurador" value="{$processo.fkProcurador}" /> -->
        <input type="hidden" name="fkUsuario" id="formSaveProcesso_fkUsuario" value="{$processo.fkUsuario}" />
        <input type="hidden" name="fkPrimeiraInstancia" id="formSaveProcesso_fkPrimeiraInstancia" value="{$segundaInstanciaDerivado.fkPrimeiraInstancia}" />
        <fieldset>

            {foreach from=$primeiraInstancia item=primeira}


            {/foreach}

            {foreach from=$segundaInstancia item=segunda}


            {/foreach}

            <div class="" style="border-left: 1px solid #A9D5FB; border-bottom: 1px solid #A9D5FB; background-color: white; float: right; margin-top: -20px; padding-right: 5px; padding-left: 5px; padding-bottom: 2px;">
                <label for="formSaveProcesso_numeroProcesso"><b style="color: #333333; font-size: 8pt">Gerar </b></label>

                <a href="javascript:GestaoProcessos.viewProcesso('{$processo.idProcesso}', '{$processo.numeroProcesso}', '{$processo.instancia}', '{$numeroProcesso}', '{$primeira.cidade}','{$primeira.juizo}');" title="Visualizar dados do processo"><font style="color: #339900; font-size: 8pt"><b><u>Relatório</u></b></font></a>

            </div>

            <div class="container_field_aux">
                <div class="field_aux">

                    <label for="formSaveProcesso_numeroProcesso">Número do Processo:</label>
                    {$processo.numeroProcesso}

                </div>
                <div class="field_aux">
                    <label for="formSaveProcesso_situacaoProcesso">Situacao:</label>
                    {$processo.situacaoProcesso}
                </div>
                <div class="field_aux">
                    <label for="formSaveProcesso_justica">Justica:</label>
                    {$processo.justica}
                </div>
                <div class="field_aux">
                    <label for="formSaveProcesso_dataEntrada">Data de Entrada:</label>
				{$processo.dataEntrada}<br class="none"/>

                </div>
            </div>
            <div class="container_field_aux">
                <div class="field_aux">
                    <label for="formSaveProcesso_instancia">Instancia:</label>
                    {$processo.instancia}
                </div>
                {if $processo.instancia =="1º Instancia" }

                <!-- <h3 class="title-field">1º Instancia</h3> -->

                <div class="field_aux">
                    <label for="formSaveProcesso_cidade">Cidade:</label>

                    {$primeira.cidade}


                </div>
                <div class="field_aux">
                    <label for="formSaveProcesso_fkJuizo">Juizo:</label>
                    {$primeira.juizo}

                </div>

                {elseif $processo.instancia=="2º Instancia"}



                <div class="field_aux">
                    <label for="formSaveProcesso_tipoSegundaInstancia">Tipo:</label>

                    {$segunda.tipoSegundaInstancia}


                </div>

                {if $segunda.tipoSegundaInstancia =="Derivado" }

                <div class="field_aux">
                    <label for="formSaveProcesso_primeiraInstancia">1º Instancia:</label>
                    {$numeroProcesso}
                </div>

                {/if}
                {/if}
                <div class="field_aux">
                    <label for="formSaveProcesso_tipoProcesso">Tipo processo:</label>
                    {$processo.tipoProcesso}
                </div>
            </div>
            <div class="container_field_aux" >
                <div class="field_aux_grande">
                    <label for="formSaveProcesso_descricao">Descrição:</label>
                    <span>{$processo.descricao}</span>
                </div>
            </div>

            <div class="container_field_aux">
                <div class="field_aux">
                    <label for="formSaveProcesso_tipoAcao">Tipo da Ação:</label>
                    {$processo.tipoAcao}

                </div>
                <div class="field_aux">
                    <label for="formSaveProcesso_assunto">Assunto:</label>
                    {$processo.assunto}
                </div>
            </div>


            <div class="container_field_aux">
                <div class="field_aux_grande">
                    <label for="formSaveMovimentacao_assunto">Partes:</label>
                    {foreach from=$pessoa key=indice item=pessoa}
                    <div class="container_partes">
                        <b>{$pessoa.nome}</b> &rarr; ({$pessoa.parte})
                    </div>
                    {/foreach}
                </div>
            </div>
            <div class="container_field_aux" >
                <div class="field_aux_grande">
                    <label for="formSaveProcesso_usuario" >Procurador:</label>
                    <span>{$procurador}</span>
                </div>
            </div>
        </fieldset>



    </form>
    <script language="javascript" type="text/javascript">
            FormUtil.initForm('formSaveProcesso');
    </script>
    {literal}
    <script language="javascript" type="text/javascript">
       //     window.onload = function()
     //   {
            //document.form['formListMovimentacao_submit'].submit();
            //document.getElementById("formListMovimentacao").click();
            //jQuery('#formListMovimentacao_submit').submit();
       // }

      
        function submeter(){
         //   document.forms['#formListMovimentacao_submit'].submit();
        document.teste.submit();
            //setInterval(submeter, 600000);
        }
         setTimeout('submeter()', 1200);
         //window.onload = submeter();

         


    </script>
    {/literal}

    <div style=" float:right;
         padding:3px 8px;
         background:white;
         color:#003366;
         border-bottom:none;
         font:bold 14px tahoma;">





        <!--        <form action="" method="post" id="formListMovimentacao" onsubmit =" GestaoMovimentacao.execList(); return false" name="teste">
                    <input type="hidden" name="ACTION" value="ExecListMovimentacaoAction" /> -->
        <!--	<input type="hidden" name="fkProcesso" id="formListMovimentacao_fkProcesso" value="" /> -->
        <!--      <input type="hidden" name="fkProcesso" id="formListOpenProcesso_fkProcesso" value="{$processo.idProcesso}" />  -->

        <!--    <span id=""> -->
        <!--   <a href="javascript:;" onclick="GestaoMovimentacao.execList()" title="Buscar"><img src="{$smarty.const.HTTP_URL}img/admin/lupa.png" alt=""/>Buscar</a>    -->
        <!--      <strong> <input type="submit"  value="Mostrar Movimentações do Processo" style="margin-right:-5px; cursor:pointer; background-color: white; border: none; font:bold 14px tahoma; color:#003366;" />    </strong>
          </span>

      </form> -->


        <!--   <strong>Movimentações do Processo</strong>    -->
    </div>
    <div class="icons"  style="border-top: 1px solid #A9D5FB;">
        <ul>
            <!--   <li style=""><span id="add"><form action="" method="post"  onsubmit="GestaoMovimentacao.initCad('{$processo.idProcesso}'); return false">
                           <input type="hidden" name="ACTION" value="initCadMovimentacaoAction" />
                           <input type="hidden" name="idProcesso" value="{$processo.idProcesso}" />


                           <button type="submit" value="novo" style=" margin-top: -4px; background-color: #dff0ff; border: none; cursor: pointer; "><font style="font: bold 11px tahoma; color: #333333;"><img src="{$smarty.const.HTTP_URL}img/admin/add_user.png" alt="" style="vertical-align:middle ; margin-top: 0px;"  />&nbsp;Incluir Novo</font></button>
                       </form></span></li> -->
            <!-- <li><span id="add"><a href="javascript:GestaoMovimentacao.openMovimentacao('{$processo.idProcesso}'); " title="Abrir processo" >[Abrir]</a></span></li>  -->

            <!--   <li style="padding-top: 6px;"><span id="add"><a href="javascript:;" onclick="GestaoMovimentacao.initCad('{$processo.idProcesso}')" title="Incluir Novo"><img src="{$smarty.const.HTTP_URL}img/admin/add_user.png" alt=""/>Incluir Novo</a></span></li> -->
            <li style="padding-top: 6px;"><span id="add"><a href="javascript:;" onclick="GestaoMovimentacao.initCad('{$processo.idProcesso}', '{$area}')" title="Incluir Novo"><img src="{$smarty.const.HTTP_URL}img/admin/add_user.png" alt=""/>Incluir Novo</a></span></li>

            {if count($existeMovimentacao) != 0}
            <li style="padding-top: 6px;"><span id="delete"><a href="javascript:;" onclick="GestaoMovimentacao.execDel()" title="Deletar Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/delete_user.png" alt=""/>Deletar Seleção</a></span></li>
            <!--  <form action="" method="post" id="formDelMovimentacao" onsubmit="GestaoMovimentacao.execDel(); return false">
                  <input type="hidden" name="ACTION" value="ExecDelMovimentacaoAction" />



                  <button type="submit" value="novo" style=" margin-top: -4px; background-color: #dff0ff; border: none; cursor: pointer; "><font style="font: bold 11px tahoma; color: #333333;"><img src="{$smarty.const.HTTP_URL}img/admin/delete_user.png" alt=""/>Deletar Seleção</font></button>
              </form> -->


            <li style="padding-top: 6px;">
                <span id="busca">
                    <a href="javascript:;" onclick="js.showSearchs()" title="Buscar"><img src="{$smarty.const.HTTP_URL}img/admin/lupa1.png" alt=""/>Buscar</a>
                </span>
            </li>
            {/if}

        </ul>

    </div>
    <div id="search" style="display:none">
        <form action="" method="post" id="formListMovimentacao" onsubmit="GestaoMovimentacao.execList(); return false" >
            <input type="hidden" name="ACTION" value="ExecListMovimentacaoAction" />
            <!--	<input type="hidden" name="fkProcesso" id="formListMovimentacao_fkProcesso" value="" /> -->
            <!--     <input type="hidden" name="fkProcesso" id="formListMovimentacao_fkProcesso" value="" /> -->
            <input type="hidden" name="fkProcesso" id="formListOpenProcesso_fkProcesso" value="{$processo.idProcesso}" />


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
				{html_options options=$optionsOrdem}
                            </select>
                            &nbsp;&nbsp;

                            <select size="1" id="formListMovimentacao_sentido" class="text" name="sentido" title="Trata-se da forma como os resultados serão ordenados.">
                                <option value="">::Sentido::</option>
				{html_options options=$optionsSentidoOrdem}
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
    <!--   {assign var="qtde" value=$itens|@count}
       {if $qtde == 0 }
                      <h3 class="no_encontrado">Nenhum resultado foi encontrado!!!</h3>
       {else}     -->

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


                {foreach from=$itens item=movimentacao}
                <tr onmouseOver="js.collorTrHover()" class="trTable">
                    <td class="lista"><input type="checkbox" name="idMovimentacao[]" value="{$movimentacao.idMovimentacao}" id="item_{$movimentacao.idMovimentacao}"/>
                    </td>
                    <td class="lista">
                        <label>
                            <b>{$movimentacao.numeroMovimentacao}</b>
                        </label>
                        <!--   <a href="javascript:GestaoMovimentacao.initEdit('{$movimentacao.idMovimentacao}');" title="Editar Movimentacao">[Editar]</a>&nbsp;&nbsp; -->
                        <!--   <a href="javascript:GestaoMovimentacao.viewMovimentacao('{$movimentacao.idMovimentacao}','{$movimentacao.idTipoMovimentacao}');" title="Visualizar movimentacao">[Visualizar]</a>&nbsp;&nbsp;
		   {if $movimentacao.idTipoMovimentacao == 2}
		   <a href="javascript:GestaoMovimentacao.viewMovimentacao('{$movimentacao.origem}','{$movimentacao.idTipoMovimentacao}');" title="Visualizar movimentacao origem">[Movimentacao origem]</a>
		   {/if} -->
                    </td>
                    <td class="lista"><label>
                            {if $movimentacao.tipoMovimentacao == "a executar"}
                            <a href="javascript:GestaoMovimentacao.viewMovimentacao('{$movimentacao.idMovimentacao}','a executar');" title="Visualizar movimentacão a executar"><u>{$movimentacao.tipoMovimentacao}</u></a>&nbsp;&nbsp;
                            {else}
                            {$movimentacao.tipoMovimentacao}
                            {/if}
                        </label></td>
                    <td class="lista"><label>
                            {$movimentacao.evento}
                        </label></td>
                    <td class="lista"><label>
                            {$movimentacao.data}
                        </label></td>
                    <td class="lista"><label>
                            {$movimentacao.perfil}
                        </label></td>
                    <td class="lista"><label>
                            {$movimentacao.movimentadoPor}
                        </label></td>
                    <td class="lista"><label>
                            {if $movimentacao.arquivo != ""}
                            <a href="{$smarty.const.HTTP_URL}upload/{$movimentacao.arquivo}" target="_blank"><font style="color: green;">Ver</font></a>
                            {else}
                            <font style="color: red;">Vazio</font>
                            {/if}
                        </label></td>
                    <td class="lista"><label>
                            {$movimentacao.observacao}
                        </label></td>
                    <td class="lista"><label>

                        </label></td>
                    <td class="lista"><label>
                            <a href="javascript:GestaoMovimentacao.initEdit('{$movimentacao.idMovimentacao}');" title="Editar Movimentacao"><img src="{$smarty.const.HTTP_URL}img/admin/edit.png" alt=""/></a>
                        </label></td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </form>
    <!--    <div class="pagination" id="paginacao_list_movimentacao">
            {$paginacao}
        </div> -->

    <!--   {/if}       -->



</fieldset>
<div class="icons" style="border-top: 1px solid #A9D5FB; margin-top: -9px;">

    <ul>
        <!--   <li><span id="save"><a href="javascript:;" onclick="GestaoProcessos.cadProcesso(); return false" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save.png" alt=""/>Salvar</a></span></li> -->
        {if $area == ""}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        {elseif $area =="semCiente"}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListSemCiente(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        {elseif $area =="aExecutar"}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListAExecutar(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        {elseif $area =="meusProcessos"}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initListMeusProcessos(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        {elseif $area =="undefined"}
        <li><span id="cancel"><a href="javascript:;" onclick="GestaoProcessos.initList(); return false" title="Cancelar"><img src="{$smarty.const.HTTP_URL}img/admin/arrow_left1.png" alt=""/>Voltar</a></span></li>
        {/if}
    </ul>

    <span class="hide" >
        <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">

            <span style="display:none">
                <<
            </span>
        </a>
    </span>
</div>