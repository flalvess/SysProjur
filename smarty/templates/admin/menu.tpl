<ul class="menu_body" id="menu" style="display:block;">
  {foreach from=$arrayCasosDeUso item=casoDeUso}
  <li> <span class="select" onclick="js.showMenuLi(this);" title="{$casoDeUso.descricao}">
    {$casoDeUso.nome}
    </span>
    <ul class="menu_drop" style="display:none">
      {foreach from=$casoDeUso.itens item=fluxo}
      <li> <a href="javascript:;" onclick="{$fluxo.linkJS};js.changeMenu(this)" title="{$fluxo.descItem}">-
        {$fluxo.item}
        </a> </li>
      {/foreach}
    </ul>
  </li>
  {/foreach}
</ul>
