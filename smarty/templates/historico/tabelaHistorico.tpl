<form action="" method="post" id="formDelHistoricos">
 <!-- <input type="hidden" name="ACTION" value="ExecDelHistoricosAction" />       -->
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
        <th>Data/Hora</th>
        <th>Nº Processo</th>
        <th style="">Procurador</th>
        <th style="">Tipo</th>
        <th style="">Operacao</th>
        <th style="border-right:none;">Usuário</th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$arrayItens item=Historico}
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idHistoricos[]" value="{$Historico.idHistorico}" id="item_{$Historico.idHistorico}"/>
        </td>
        <td class="lista left"><label>
          {$Historico.dataHora}
          </label>
        </td>
        <td class="lista"><label>
          {$Historico.numeroProcesso}
          </label></td>
        <td class="lista"><label>
          {$Historico.procurador}
          </label></td>
        <td class="lista"><label>
          <b>{$Historico.tipo}</b>
          </label></td>
        <td class="lista"><label>
          {if $Historico.operacao == "Cadastrado"}
          <font style="color: green; font-weight: bold">{$Historico.operacao}</font>
          {elseif $Historico.operacao == "Alterado"}
          <font style="color: orange; font-weight: bold">{$Historico.operacao}</font>
          {elseif $Historico.operacao == "Deletado"}
          <font style="color: red; font-weight: bold">{$Historico.operacao}</font>
          {/if}
          </label></td>
        <td class="lista"><label>
          {$Historico.usuario}
          </label></td>

      </tr>
      {/foreach}
    </tbody>
  </table>
</form>
<div class="pagination" id="paginacao_list_Historico">
  {$paginacao}
</div>
<p class="quant"><b>{$retornados}</b> itens encontrados de <b>{$total}</b> no total.</p>
