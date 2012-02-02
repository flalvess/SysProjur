<form action="" method="post" id="formDelAtividade">
  <input type="hidden" name="ACTION" value="ExecDelAtividadeAction" />
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
    
        <th>Nº</th>
  
        <th>Para</th>
        <th>Enviada</th>
        <th>Lido</th>
        <th>Tipo</th>

        <th>Status</th>

        <th style="border-right:none;">Ciente</th>
      
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
               <b>{$atividade.para}</b>
        </label></td>

        <td class="lista"><label>
               {$atividade.data}
        </label></td>
        <td class="lista"><label>
                {if $atividade.dataCiente != "" }
                    {$atividade.dataCiente}
                {else}
                    <img src="{$smarty.const.HTTP_URL}img/admin/clock.png" title="Aguardando ciente"/>
                {/if}
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
          <img src="{$smarty.const.HTTP_URL}img/admin/nao.gif" title="sem ciente" style="vertical-align: middle"/>
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
