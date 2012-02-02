<form action="" method="post" id="formDelJuizos">
  <input type="hidden" name="ACTION" value="ExecDelJuizosAction" />
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
        <th>Juizo</th>
        <th>Cidade</th>
        <th style="border-right:none;">Opção</th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$arrayItens item=juizo}
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idJuizos[]" value="{$juizo.idJuizo}" id="item_{$juizo.idJuizo}"/>
        </td>
        <td class="lista left"><label>
          {$juizo.nome}
          </label>
         
        </td>
        <td class="lista left"><label>
          {$juizo.cidade}
          </label>
        </td>
        <td class="lista"><label>
          
		  <a href="javascript:GestaoJuizos.initEdit('{$juizo.idJuizo}');" title="Editar Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/edit1.png" alt=""/></a>
          
          </label>
        </td>
       <!-- <td class="lista"><label>
          {$juizo.sigla}
          </label></td> -->
       
      </tr>
      {/foreach}
    </tbody>
  </table>
</form>
<div class="pagination" id="paginacao_list_juizo">
  {$paginacao}
</div>
<p class="quant"><b>{$retornados}</b> itens encontrados de <b>{$total}</b> no total.</p>
