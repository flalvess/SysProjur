<form action="" method="post" id="formDelMovimentacao">
    <input type="hidden" name="ACTION" value="ExecDelMovimentacaoAction" />
    <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
        <thead>
            <tr id="list_fields">
                <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
                <!-- <th>&nbsp;&nbsp;Nº&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Tipo&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Evento&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Data&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Perfil&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Movimentado Por&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Arquivo&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Observação&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Ciente&nbsp;&nbsp;</th>
                 <th>&nbsp;&nbsp;Ação&nbsp;&nbsp;</th> -->
                <th>Nº</th>
                <th>Tipo</th>
                <th>Evento</th>
                <th>Data</th>
                <th>Perfil</th>
                <th>Movimentado Por</th>
                <th>Arquivo</th>
                <th>Observação</th>
                <th>Ciente</th>
                <th style="border-right:none;">Opção</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$arrayItens item=movimentacao}
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
                        {if $movimentacao.ciente =="Sim"}
                        <!--   <a href="javascript:GestaoMovimentacao.initEdit('{$movimentacao.idMovimentacao}');" title="Editar Atividade"><img src="{$smarty.const.HTTP_URL}img/admin/sim.gif" title="ciente"/></a>   -->
                        <img src="{$smarty.const.HTTP_URL}img/admin/sim.gif" title="ciente"/>
                        {else}
                        <!--   <a href="javascript:GestaoMovimentacao.initEdit('{$movimentacao.idMovimentacao}');" title="Editar Atividade"><img src="{$smarty.const.HTTP_URL}img/admin/nao.gif" title="sem ciente"/></a>   -->
                        <img src="{$smarty.const.HTTP_URL}img/admin/nao.gif" title="sem ciente"/>
                        {/if}
                    </label></td>


                <td class="lista"><label>
                        <a href="javascript:GestaoMovimentacao.initEdit('{$movimentacao.idMovimentacao}');" title="Editar Movimentacao"><img src="{$smarty.const.HTTP_URL}img/admin/edit1.png" alt=""/></a>
                    </label></td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</form>
<div class="pagination" id="paginacao_list_movimentacao">
    {$paginacao}
</div>
<p class="quant"><b>{$retornados}</b> itens encontrados de <b>{$total}</b> no total.</p>
