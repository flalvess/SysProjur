<form action="" method="post" id="formDelAssuntos">
  <input type="hidden" name="ACTION" value="ExecDelAssuntoAction" />
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
        <th>Assunto</th>
        <th>Procurador</th>
      <!--  <th>Opção</th>  -->
        
      </tr>
    </thead>
    <tbody>
      {foreach from=$arrayItens item=assunto}
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idAssuntos[]" value="{$assunto.idAssunto}" id="item_{$assunto.idAssunto}"/>
        </td>
        <td class="lista left"><label>
                {if $assunto.assunto == "Sem Assunto"}
                <b style="color: red"> {$assunto.assunto} </b>
                {else}
                <b> {$assunto.assunto} </b>
                {/if}
          </label>
       
        </td>
        <td class="lista left"><label>
          {$assunto.nome}
          </label></td>
     <!--   <td class="lista"><label>
          <a href="javascript:GestaoAssunto.initEdit('{$assunto.idAssunto}');" title="Editar Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/edit1.png" alt=""/></a>
          </label></td> -->

      </tr>
      {/foreach}
    </tbody>
  </table>
</form>
<div class="pagination" id="paginacao_list_assunto">
  {$paginacao}
</div>
<p class="quant"><b>{$retornados}</b> itens encontrados de <b>{$total}</b> no total.</p>
