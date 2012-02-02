<form action="" method="post" id="formDelAtividade">
    <input type="hidden" name="ACTION" value="ExecDelAtividadeAction" />
    <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
        <thead>
            <tr id="list_fields">
                <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
                <th>N�</th>
                <th>De</th>
                <th>Para</th>
                <th>Data</th>
                <th>Tipo</th>
               <!-- <th>Solicitacao</th> -->
                <th>Status</th>
              <!--  <th>Pend�ncia</th>  -->
                <th style="border-right:none;">Ciente</th>
                <!--<th>A��o</th> -->
            </tr>
        </thead>
        <tbody>
            {foreach from=$arrayItens item=atividade}
            <tr onmouseOver="js.collorTrHover()" class="trTable">
                <td class="lista"><input type="checkbox" name="idAtividade[]" value="{$atividade.idAtividade}" id="item_{$atividade.idAtividade}"/>
                </td>

                <td class="lista"><label>
                        <b>{$atividade.numero}</b>
                </label></td>

                <td class="lista"><label>
                        <b>{$atividade.de}</b>
                    </label></td>

                <td class="lista"><label>
                        <b>{$atividade.para}</b>
                    </label></td>

                <td class="lista"><label>
                        {$atividade.data}
                    </label></td>

                <td class="lista"><label>
                        {$atividade.tipoAtividade}
                    </label></td>

                <td class="lista"><label>
                        {$atividade.status}
                    </label></td>
           
                <td class="lista"><label>
                        {if $atividade.ciente =="Sim"}
                        <a href="javascript:GestaoAtividadeRec.initEdit('{$atividade.idAtividade}');" title="Editar Atividade"><img src="{$smarty.const.HTTP_URL}img/admin/sim.gif" title="ciente"/></a>
                        {else}
                        <a href="javascript:GestaoAtividadeRec.initEdit('{$atividade.idAtividade}');" title="Editar Atividade"><img src="{$smarty.const.HTTP_URL}img/admin/nao.gif" title="sem ciente"/></a>
                        {/if}
                    </label></td>
              
            </tr>
            {/foreach}
        </tbody>
    </table>
</form>
<div class="pagination" id="paginacao_list_atividade">
    {$paginacao}
</div>
<p class="quant"><b>{$retornados}</b> itens encontrados de <b>{$total}</b> no total.</p>
