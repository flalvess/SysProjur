var GestaoHistorico = Class.create(
{});

/*GestaoHistorico.initCad = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitCadHistoricoAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}*/


/*GestaoHistoricos.cadHistorico = function(objLink)
{
	js.btnSubmit('formSaveHistorico');

	$('formSaveHistorico').action = ConfigAdmin.URL_APP;
	$('formSaveHistorico').request();
}*/

GestaoHistorico.initList = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitListHistoricoAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoHistorico.execList = function()
{
	$('formListHistorico').action = ConfigAdmin.URL_APP;
	$('formListHistorico').request();
}

/*GestaoHistoricos.initEdit = function(id)
{
	ajaxOptions =
	{
		parameters :"ACTION=InitEditHistoricoAction&idHistorico=" + id
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoHistoricos.execDel = function()
{
	if (confirm('Você está certo disso?'))
	{
		$('formDelHistoricos').action = ConfigAdmin.URL_APP;
		$('formDelHistoricos').request();
	}
}

GestaoHistoricos.mudaStatus = function(id, status)
{
	ajaxOptions = {
		parameters :"ACTION=MudaStatusHistoricoAction&idHistorico=" + id + '&status=' + status
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoHistoricos.initAutoCompleteHistoricos = function(id, idField)
{
	//alert(id);
	//alert(idField);
	jQuery(idField).autocomplete(ConfigAdmin.URL_APP + '?ACTION=AutoCompleteHistoricosAction', {
		width: 440,
		scrollHeight: 220,
		selectFirst: true
	});

	jQuery(idField).result(function(event,data,formatted){
		jQuery(id).val(data[0]);
		jQuery("#idHistorico").val(data[1]);
                jQuery("#nome").val(data[0]);
	});
};

GestaoHistoricos.initAutoCompletePartes = function(id, idField)
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
		jQuery("#idHistorico").val(data[1]);
                jQuery("#nome").val(data[0]);
	});
};

GestaoHistoricos.viewHistoricos = function(idProcesso){

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
	window.open('http://localhost/sysprojur/classes/modelo/admin/controle/Historicos/visualizarHistoricos.php?idProcesso='+idProcesso, 'Visualização de Historicos do Processo', 'height='+altura+', width='+tamanho+', top='+diff_h+', left='+diff_w+', resizable=no');

}*/