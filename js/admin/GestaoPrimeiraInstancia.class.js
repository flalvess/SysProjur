var GestaoPrimeiraInstancia = Class.create(
{});

GestaoPrimeiraInstancia.initCad = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitCadPrimeiraInstanciaAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoPrimeiraInstancia.cadPrimeiraInstancia = function(objLink)
{
	js.btnSubmit('formSavePrimeiraInstancia');

	$('formSavePrimeiraInstancia').action = ConfigAdmin.URL_APP;
	$('formSavePrimeiraInstancia').request();
}

GestaoPrimeiraInstancia.initList = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitListPrimeiraInstanciaAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoPrimeiraInstancia.execList = function()
{
	$('formListPrimeiraInstancia').action = ConfigAdmin.URL_APP;
	$('formListPrimeiraInstancia').request();
}

GestaoPrimeiraInstancia.initEdit = function(id)
{
	ajaxOptions =
	{
		parameters :"ACTION=InitEditPrimeiraInstanciaAction&idPrimeiraInstancia=" + id
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoPrimeiraInstancia.execDel = function()
{
	if (confirm('Você está certo disso?'))
	{
		$('formDelPrimeiraInstancia').action = ConfigAdmin.URL_APP;
		$('formDelPrimeiraInstancia').request();
	}
}

GestaoPrimeiraInstancia.mudaStatus = function(id, status)
{
	ajaxOptions = {
		parameters :"ACTION=MudaStatusPrimeiraInstanciaAction&idPrimeiraInstancia=" + id + '&status=' + status
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoPrimeiraInstancia.initAutoCompletePrimeiraInstancia = function(id, idField)
{
	//alert(id);
	//alert(idField);
	jQuery(idField).autocomplete(ConfigAdmin.URL_APP + '?ACTION=AutoCompletePrimeiraInstanciaAction', {
		width: 440,
		scrollHeight: 220,
		selectFirst: true
	});

	jQuery(idField).result(function(event,data,formatted){
		jQuery(id).val(data[1]);
	});
};