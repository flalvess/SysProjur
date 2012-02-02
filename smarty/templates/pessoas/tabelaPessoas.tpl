<form action="" method="post" id="formDelPessoas">
  <input type="hidden" name="ACTION" value="ExecDelPessoasAction" />
  <table id="tablelist" summary="Listagem" class="tablelist" border="0" cellpadding="0" cellspacing="0" width="99%">
    <thead>
      <tr id="list_fields">
        <th class="check" style="width:40px;"> <input id="checkall" title="Clique aqui para selecionar todos os itens" type="checkbox" onchange="js.checkAll()"/></th>
        <th>Nome</th>
       <!-- <th>Parte</th> -->
        <th style="">&nbsp;&nbsp;Status&nbsp;&nbsp;</th>
        <th style="border-right:none;">Opção</th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$arrayItens item=pessoa}
      <tr onmouseOver="js.collorTrHover()" class="trTable">
        <td class="lista"><input type="checkbox" name="idPessoas[]" value="{$pessoa.idPessoa}" id="item_{$pessoa.idPessoa}"/>
        </td>
        <td class="lista left"><label>
          {$pessoa.nome}
          </label>
        </td>
     <!--   <td class="lista left"><label>
          {$pessoa.parte}
          </label></td> -->
        <td class="lista">
	      {if $pessoa.status == 1}
	         {assign var="imgStatus" value="ok"}
			 {assign var="labelStatus" value="Ativado --> Desativa-lo"}
	      {else}
	         {assign var="imgStatus" value="disable"}
			 {assign var="labelStatus" value="Desativado --> Ativa-lo"}
            {/if}
		<label><a href="javascript:GestaoPessoas.mudaStatus({$pessoa.idPessoa}, {$pessoa.status}) " title="{$labelStatus}"><img onClick="js.imgChange(this, 'GestaoPessoas.mudaStatus', '{$pessoa.idPessoa}')" src="{$smarty.const.HTTP_URL}img/admin/{$imgStatus}.png" alt="{$labelStatus}"/></a></label>
        </td>


        <td class="lista"><label>
		  <a href="javascript:GestaoPessoas.initEdit('{$pessoa.idPessoa}');" title="Editar Usuário"><img src="{$smarty.const.HTTP_URL}img/admin/edit1.png" alt=""/></a>
          </label></td>
      </tr>
      {/foreach}
    </tbody>
  </table>
</form>
<div class="pagination" id="paginacao_list_pessoa">
  {$paginacao}
</div>
<p class="quant"><b>{$retornados}</b> itens encontrados de <b>{$total}</b> no total.</p>
