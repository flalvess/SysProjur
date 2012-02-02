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
              
                {if $quantidadeSemCiente[0] != "" or $quantidadeAExecutar[0] != ""}
                <th>&nbsp;&nbsp;Movimentações&nbsp;&nbsp;</th>
                {else}
                    <th>&nbsp;&nbsp;Procurador&nbsp;&nbsp;</th>
                {/if}
                <th style="border-right:none;">&nbsp;&nbsp;Opção&nbsp;&nbsp;</th>

                <!--   <th>&nbsp;&nbsp;Situação&nbsp;&nbsp;</th> -->
            </tr>
        </thead>
        <tbody>

            {foreach from=$arrayItens key=indice item=processo}
            <tr onmouseOver="js.collorTrHover()" class="trTable">
                <td class="lista"><input type="checkbox" name="idProcessos[]" value="{$processo.idProcesso}" id="item_{$processo.idProcesso}"/>
                </td>

                <td class="lista left"><label><h3>{$processo.numeroProcesso}</h3></label></td>
                <td class="lista"><label>{$processo.justica}</label></td>
                <td class="lista"><label style="color: orange">{$processo.instancia}</label></td>
                <td class="lista"><label>{$processo.dataEntrada}</label></td>
                <!--  <td class="lista left" ><label>{$processo.tipoAcao}</label></td> -->
                <!-- <td class="lista left" ><label>{$processo.litisconsorte}</label></td> -->
                <td class="lista left" ><label> {$pessoa[$indice]} -
                        <a href="javascript:GestaoPessoas.viewPessoas('{$processo.idProcesso}');" title="Visualizar Pessoas do Processo"><u>Exibir todos</u></a>&nbsp;&nbsp;
                        <!--     {foreach from=$pessoa key=i item=nome}

                                 {$nome[i]}

                             {/foreach} -->


                    </label></td>

                {if $processo.nome != "" }
                <td class="lista left" title="{$processo.nome}">
                    <!--   <label><img src="{$smarty.const.HTTP_URL}img/admin/procurador.png" alt=""/>

                       </label></td> -->
                    {$processo.nome}
                    <!-- <td class="lista" ><label>{$processo.situacaoProcesso}</label>-->
                </td>

                {/if}
                
                {if $quantidadeSemCiente[0] != ""}
                <td class="lista" title="">
                    <!--   <label><img src="{$smarty.const.HTTP_URL}img/admin/procurador.png" alt=""/>

                       </label></td> -->
                    <font color="red"><b>{$quantidadeSemCiente[$indice]}</b></font><b> Sem ciente</b>
                    <!-- <td class="lista" ><label>{$processo.situacaoProcesso}</label>-->
                </td>
                {/if}

                {if $quantidadeAExecutar[0] != ""}
                <td class="lista" title="">
                    <!--   <label><img src="{$smarty.const.HTTP_URL}img/admin/procurador.png" alt=""/>

                       </label></td> -->
                    <font color="red"><b>{$quantidadeAExecutar[$indice]}</b></font><b> a executar </b>
                    <!-- <td class="lista" ><label>{$processo.situacaoProcesso}</label>-->
                </td>
                {/if}

                <td class="lista" >
                    <label style="text-align: center;">
                        <a href="javascript:GestaoProcessos.initEdit('{$processo.idProcesso}');"  title="Editar Processo" ><img src="{$smarty.const.HTTP_URL}img/admin/edit1.png" alt=""/></a>
                        {if $quantidadeSemCiente[0] != "" }
                        <a href="javascript:GestaoProcessos.openProcesso('{$processo.idProcesso}', 'semCiente'); " title="Abrir processo" ><img src="{$smarty.const.HTTP_URL}img/admin/open.png" alt=""/></a>
                        {elseif $quantidadeAExecutar[0] != ""}
                        <a href="javascript:GestaoProcessos.openProcesso('{$processo.idProcesso}', 'aExecutar'); " title="Abrir processo" ><img src="{$smarty.const.HTTP_URL}img/admin/open.png" alt=""/></a>
                        {elseif $meusProcessos != ""}
                        <a href="javascript:GestaoProcessos.openProcesso('{$processo.idProcesso}', 'meusProcessos'); " title="Abrir processo" ><img src="{$smarty.const.HTTP_URL}img/admin/open.png" alt=""/></a>
                        {else}
                        <a href="javascript:GestaoProcessos.openProcesso('{$processo.idProcesso}', ''); " title="Abrir processo" ><img src="{$smarty.const.HTTP_URL}img/admin/open.png" alt=""/></a>
                        {/if}
                    </label>
                </td>

            </tr>


            {/foreach}
        </tbody>
    </table>
</form>
<div class="pagination" id="paginacao_list_processo">
    {$paginacao}
</div>
<p class="quant"><b>{$retornados}</b> itens encontrados de <b>{$total}</b> no total.</p>
