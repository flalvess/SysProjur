var GestaoPessoas = Class.create(
{});

GestaoPessoas.initCad = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitCadPessoaAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoPessoas.cadPessoa = function(objLink)
{
	js.btnSubmit('formSavePessoa');

	$('formSavePessoa').action = ConfigAdmin.URL_APP;
	$('formSavePessoa').request();
}

GestaoPessoas.initList = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitListPessoaAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoPessoas.execList = function()
{
	$('formListPessoa').action = ConfigAdmin.URL_APP;
	$('formListPessoa').request();
}

GestaoPessoas.initEdit = function(id)
{
	ajaxOptions =
	{
		parameters :"ACTION=InitEditPessoaAction&idPessoa=" + id
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoPessoas.execDel = function()
{
	if (confirm('Você está certo disso?'))
	{
		$('formDelPessoas').action = ConfigAdmin.URL_APP;
		$('formDelPessoas').request();
	}
}

GestaoPessoas.mudaStatus = function(id, status)
{
	ajaxOptions = {
		parameters :"ACTION=MudaStatusPessoaAction&idPessoa=" + id + '&status=' + status
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoPessoas.initAutoCompletePessoas = function(id, idField)
{
	//alert(id);
	//alert(idField);
	jQuery(idField).autocomplete(ConfigAdmin.URL_APP + '?ACTION=AutoCompletePessoasAction', {
		width: 440,
		scrollHeight: 220,
		selectFirst: true
	});

	jQuery(idField).result(function(event,data,formatted){
		jQuery(id).val(data[0]);
		jQuery("#idPessoa").val(data[1]);
                jQuery("#nome").val(data[0]);
	});
};

GestaoPessoas.initAutoCompletePartes = function(id, idField)
{
	//alert(id);
	//alert(idField);
	jQuery(idField).autocomplete(ConfigAdmin.URL_APP + '?ACTION=AutoCompletePartesAction', {
		width: 440,
		scrollHeight: 220,
		selectFirst: true
	});

	jQuery(idField).result(function(event,data,formatted){
		jQuery(id).val(data[0]);
		jQuery("#idPessoa").val(data[1]);
                jQuery("#nome").val(data[0]);
	});
};

GestaoPessoas.viewPessoas = function(idProcesso){

	var tamanho = 450;
	var altura = 340;

	var w = screen.width;
	var h = screen.height;

	var meio_tamanho = tamanho/2;
	var meio_altura = altura/2;

	var meio_w = w/2;
	var meio_h = h/2;

	var diff_w = meio_w - meio_tamanho;
	var diff_h = meio_h - meio_altura;

	window.close();
	window.open('http://localhost/sysprojur/classes/modelo/admin/controle/pessoas/visualizarPessoas.php?idProcesso='+idProcesso, 'Visualização de Pessoas do Processo', 'height='+altura+', width='+tamanho+', top='+diff_h+', left='+diff_w+', resizable=no');

}