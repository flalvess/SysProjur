var GestaoCidades = Class.create(
{});

GestaoCidades.initCad = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitCadCidadeAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoCidades.cadCidade = function(objLink)
{
	js.btnSubmit('formSaveCidade');

	$('formSaveCidade').action = ConfigAdmin.URL_APP;
	$('formSaveCidade').request();
}

GestaoCidades.initList = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitListCidadeAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoCidades.execList = function()
{
	$('formListCidade').action = ConfigAdmin.URL_APP;
	$('formListCidade').request();
}

GestaoCidades.initEdit = function(id)
{
	ajaxOptions =
	{
		parameters :"ACTION=InitEditCidadeAction&idCidade=" + id
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoCidades.execDel = function()
{
	if (confirm('Você está certo disso?'))
	{
		$('formDelCidades').action = ConfigAdmin.URL_APP;
		$('formDelCidades').request();
	}
}

GestaoCidades.mudaStatus = function(id, status)
{
	ajaxOptions = {
		parameters :"ACTION=MudaStatusCidadeAction&idCidade=" + id + '&status=' + status
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoCidades.NovaCidade = function(){

	var tamanho = 650;
	var altura = 380;

	var w = screen.width;
	var h = screen.height;

	var meio_tamanho = tamanho/2;
	var meio_altura = altura/2;

	var meio_w = w/2;
	var meio_h = h/2;

	var diff_w = meio_w - meio_tamanho;
	var diff_h = meio_h - meio_altura;

	window.close();
	window.open('http://localhost/sysprojur/classes/modelo/admin/controle/cidades/pop_up/NovaCidade.php', 'Cadastrar Nova Cidade', 'height='+altura+', width='+tamanho+', top='+diff_h+', left='+diff_w+', resizable=no');

}



GestaoCidades.initAutoCompleteCidades = function(id, idField)
{
	//alert(id);
	//alert(idField);
	jQuery(idField).autocomplete(ConfigAdmin.URL_APP + '?ACTION=AutoCompleteCidadesAction', {
		width: 440,
		scrollHeight: 220,
		selectFirst: true
	});

	jQuery(idField).result(function(event,data,formatted){
		jQuery(id).val(data[0]);
		jQuery("#idCidade").val(data[1]);
                jQuery("#nome").val(data[0]);
	});
};