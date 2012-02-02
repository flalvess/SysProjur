var GestaoProcurador = Class.create(
{});

GestaoProcurador.initCad = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitCadProcuradorAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoProcurador.cadProcurador = function(objLink)
{
	js.btnSubmit('formSaveProcurador');

	$('formSaveProcurador').action = ConfigAdmin.URL_APP;
	$('formSaveProcurador').request();
}

GestaoProcurador.initList = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitListProcuradorAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoProcurador.execList = function()
{
	$('formListProcurador').action = ConfigAdmin.URL_APP;
	$('formListProcurador').request();
}

GestaoProcurador.initEdit = function(id)
{
	ajaxOptions =
	{
		parameters :"ACTION=InitEditProcuradorAction&idProcurador=" + id
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoProcurador.execDel = function()
{
	if (confirm('Você está certo disso?'))
	{
		$('formDelProcurador').action = ConfigAdmin.URL_APP;
		$('formDelProcurador').request();
	}
}

GestaoProcurador.mudaStatus = function(id, status)
{
	ajaxOptions = {
		parameters :"ACTION=MudaStatusProcuradorAction&idProcurador=" + id + '&status=' + status
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoProcurador.initAutoCompleteProcurador = function(id, idField)
{
	//alert(id);
	//alert(idField);
	jQuery(idField).autocomplete(ConfigAdmin.URL_APP + '?ACTION=AutoCompleteProcuradorAction', {
		width: 440,
		scrollHeight: 220,
		selectFirst: true
	});

	jQuery(idField).result(function(event,data,formatted){
		jQuery(id).val(data[1]);
	});
};