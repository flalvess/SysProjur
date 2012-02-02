<form action="" method="post" id="formDelAtividade">
  <input type="hidden" name="ACTION" value="ExecDelAtividadeAction" />
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
       <!-- <th>&nbsp;&nbsp;De&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Para&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Evento&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Data&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Perfil&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Movimentado Por&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Arquivo&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Observação&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Ciente&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Ação&nbsp;&nbsp;</th> -->
        <th>De</th>
        <th>Para</th>
        <th>Tipo de Atividade</th>
        <th>Solicitacao</th>
        <th>Status</th>
        <th>Pendência</th>
        <th>Ciente</th>
       <!-- <th>Observação</th>
        <th>Ciente</th> -->
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$arrayItens item=atividade}
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idAtividade[]" value="{$atividade.idAtividade}" id="item_{$atividade.idAtividade}"/>
        </td>
        <td class="lista"><label>
               <b>{$atividade.de}</b>
        </label></td>

        <td class="lista"><label>
               <b>{$atividade.para}</b>
        </label></td>

        <td class="lista"><label>
          {$atividade.tipoAtividade}
          </label></td>
          <td class="lista"><label>
          {$atividade.solicitacao}
          </label></td>
		<!--<td class="lista"><label>
          {$atividade.data}
          </label></td> -->
          <td class="lista"><label>
          {$atividade.status}
          </label></td>
          <td class="lista"><label>
          {$atividade.pendencia}
          </label></td>
         <!-- <td class="lista"><label>
          <a href="{$smarty.const.HTTP_URL}upload/{$atividade.arquivo}" target="_blank">Ver</a>
          </label></td> -->
          <td class="lista"><label>
          {$atividade.ciente}
          </label></td>
       <!--   <td class="lista"><label>

          </label></td> -->
          <td class="lista"><label>
          <a href="javascript:GestaoAtividade.initEdit('{$atividade.idAtividade}');" title="Editar Atividade"><img src="{$smarty.const.HTTP_URL}img/admin/edit.png" alt=""/></a>
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
