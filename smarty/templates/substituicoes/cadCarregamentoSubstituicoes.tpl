<div class="icons">
	<ul>
		<li><span id="save"><a href="javascript:;" class="btn" onclick="GestaoConversor.carregarImpetrados('.btn');" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save.png" alt=""/>Salvar</a></span></li>
	</ul>
</div>
<fieldset class="all">
	<legend>Carregar Funcion�rios</legend>
	<form action="{$smarty.const.HTTP_URL}conversor/loadArq.php" method="post" id="formCarregaImpetrados" enctype="multipart/form-data">
		<div class="field" style="padding-bottom: 40px;">
			<label for="arq" class="lbl" style="width: 100%;text-align: left;">Selecione o arquivo .csv com os dados dos servidores:</label><br/><br/>
			<input type="file" name="arq" size="27"/>
			<span class="aux_field" style="margin-left: 0;">Selecione o arquivo de extens�o .csv para poder inserir no sistema os funcion�rios.</span>
		</div>
	</form>
</fieldset>
<div class="icons">
  <span class="hide">
    <a onclick="js.hideMenu();" href="javascript:;" title="Esconder/Mostrar Menu">
    <span style="display:none">
	<<
    </span>
    </a>
  </span>
  <ul>
	<li><span id="save"><a href="javascript:;" class="btn" onclick="GestaoConversor.carregarImpetrados('.btn');" title="Salvar"><img src="{$smarty.const.HTTP_URL}img/admin/save.png" alt=""/>Salvar</a></span></li>
</ul>
</div>