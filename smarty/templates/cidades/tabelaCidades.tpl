<form action="" method="post" id="formDelCidades">
  <input type="hidden" name="ACTION" value="ExecDelCidadesAction" />
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Opção</th>
        
      </tr>
    </thead>
    <tbody>
      {foreach from=$arrayItens item=cidade}
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idCidades[]" value="{$cidade.idCidade}" id="item_{$cidade.idCidade}"/>
        </td>
        <td class="lista left"><label>
          {$cidade.nome}
          </label>
       
        </td>
        <td class="lista left"><label>
          {$cidade.estado}
          </label></td>
        <td class="lista"><label>
          <a href="javascript:GestaoCidades.initEdit('{$cidade.idCidade}');" title="Editar Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/edit1.png" alt=""/></a>
          </label></td>

      </tr>
      {/foreach}
    </tbody>
  </table>
</form>
<div class="pagination" id="paginacao_list_cidade">
  {$paginacao}
</div>
<p class="quant"><b>{$retornados}</b> itens encontrados de <b>{$total}</b> no total.</p>
