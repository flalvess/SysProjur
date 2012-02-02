<form action="" method="post" id="formDelSubstituicoes">
    <input type="hidden" name="ACTION" value="ExecDelSubstituicoesAction" />
    <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
        <thead>
            <tr id="list_fields">
                <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
                <th>Número Processo</th>
                <th>Procurador Anterior</th>
                <th>Procurador Substituto</th>
                <th style="border-right:none;">Opção</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$arrayItens item=substituicoes}
            <tr onmouseOver="js.collorTrHover()" class="trTable">
                <td class="lista"><input type="checkbox" name="idSubstituicoes[]" value="{$substituicoes.idSubstituicaoProcurador}" id="item_{$substituicoes.idSubstituicaoProcurador}"/>
                </td>
                <td class="lista"><label>
                     <b>{$substituicoes.numeroProcesso} </b>
                    </label>
                </td>
                <td class="lista left"><label>
                        {if  $substituicoes.original == ""}
                            {$substituicoes.origInicial}
                        {else}
                             {$substituicoes.original}
                        {/if} 
                    </label></td>
                <td class="lista"><label>
                        {if $substituicoes.substituto == ""}
                            <font color="red">Sem substituição</font>
                        {else}
                            {$substituicoes.substituto}
                        {/if}
                    </label></td>
		<td class="lista">
                     <label>
                        <a href="javascript:GestaoSubstituicoes.initEdit('{$substituicoes.idProcesso}');" title="Editar Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/edit1.png" alt=""/></a>
                    </label></td>
               </tr>
            {/foreach}
        </tbody>
    </table>
</form>
<div class="pagination" id="paginacao_list_substituicoes">
    {$paginacao}
</div>
<p class="quant"><b>{$retornados}</b> itens encontrados de <b>{$total}</b> no total.</p>
