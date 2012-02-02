var GestaoAssunto = Class.create(
{});

GestaoAssunto.initList = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitListAssuntoAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoAssunto.execList = function()
{
	$('formListAssunto').action = ConfigAdmin.URL_APP;
	$('formListAssunto').request();
}

GestaoAssunto.execDel = function()
{
	if (confirm('Você está certo disso?'))
	{
		$('formDelAssuntos').action = ConfigAdmin.URL_APP;
		$('formDelAssuntos').request();
	}
}

GestaoAssunto.initAutoCompleteAssunto = function(id, idField)
{
	jQuery(idField).autocomplete(ConfigAdmin.URL_APP + '?ACTION=AutoCompleteAssuntoAction', {
		width: 440,
		scrollHeight: 220,
		selectFirst: true
	});

	jQuery(idField).result(function(event,data,formatted){
		jQuery(id).val(data[0]);
		jQuery("#nome").val(data[1]);
                jQuery("#nome").val(data[0]);
	});
};