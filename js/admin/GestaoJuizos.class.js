var GestaoJuizos = Class.create(
{});

GestaoJuizos.initCad = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitCadJuizoAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoJuizos.cadJuizo = function(objLink)
{
	js.btnSubmit('formSaveJuizo');

	$('formSaveJuizo').action = ConfigAdmin.URL_APP;
	$('formSaveJuizo').request();
}

GestaoJuizos.initList = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitListJuizoAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoJuizos.execList = function()
{
	$('formListJuizo').action = ConfigAdmin.URL_APP;
	$('formListJuizo').request();
}

GestaoJuizos.initEdit = function(id)
{
	ajaxOptions =
	{
		parameters :"ACTION=InitEditJuizoAction&idJuizo=" + id
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoJuizos.execDel = function()
{
	if (confirm('Você está certo disso?'))
	{
		$('formDelJuizos').action = ConfigAdmin.URL_APP;
		$('formDelJuizos').request();
	}
}

GestaoJuizos.mudaStatus = function(id, status)
{
	ajaxOptions = {
		parameters :"ACTION=MudaStatusJuizoAction&idJuizo=" + id + '&status=' + status
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoJuizos.NovoJuizo = function(){

	var tamanho = 490;
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
	window.open('http://localhost/sysprojur/classes/modelo/admin/controle/juizos/pop_up/NovoJuizo.php', 'Cadastrar Novo Juizo', 'height='+altura+', width='+tamanho+', top='+diff_h+', left='+diff_w+', resizable=no');

}


GestaoJuizos.initAutoCompleteJuizos = function(id, idField)
{
	//alert(id);
	//alert(idField);
	jQuery(idField).autocomplete(ConfigAdmin.URL_APP + '?ACTION=AutoCompleteJuizosAction', {
		width: 440,
		scrollHeight: 220,
		selectFirst: true
	});

	jQuery(idField).result(function(event,data,formatted){
		jQuery(id).val(data[0]);
		jQuery("#idJuizo").val(data[1]);
                jQuery("#nome").val(data[0]);
	});
};