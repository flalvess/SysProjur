var GestaoAtividade = Class.create(
	{});

arquivo = "não";



GestaoAtividade.reset = function(){
    arquivo = "não";
}
GestaoAtividade.initCad = function()
{
       
        ajaxOptions =
	{
		parameters :"ACTION=InitCadAtividadeAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoAtividade.cadAtividade = function(objLink)
{
	js.btnSubmit('formSaveAtividade');

	$('formSaveAtividade').action = ConfigAdmin.URL_APP;
	$('formSaveAtividade').request();
}

GestaoAtividade.initList = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitListAtividadeAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoAtividade.execList = function()
{
	$('formListAtividade').action = ConfigAdmin.URL_APP;
	$('formListAtividade').request();
}

GestaoAtividade.initEdit = function(id)
{
	ajaxOptions =
	{
		parameters :"ACTION=InitEditAtividadeAction&idAtividade=" + id
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoAtividade.execDel = function()
{
	if (confirm('Você está certo disso?'))
	{
		$('formDelAtividade').action = ConfigAdmin.URL_APP;
		$('formDelAtividade').request();
	}
}

GestaoAtividade.viewAtividade = function(idAtividade,TipoAtividade){

	var tamanho = 900;
	var altura = 600;

	var w = screen.width;
	var h = screen.height;

	var meio_tamanho = tamanho/2;
	var meio_altura = altura/2;

	var meio_w = w/2;
	var meio_h = h/2;

	var diff_w = meio_w - meio_tamanho;
	var diff_h = meio_h - meio_altura;

	window.close();
	window.open('../../classes/modelo/admin/controle/funcionarios/visualizarAtividade.php?idAtividade='+idAtividade+'&idTipoAtividade='+idTipoAtividade, 'Visualização de Atividades', 'height='+altura+', width='+tamanho+', top='+diff_h+', left='+diff_w+', resizable=no');

}

GestaoAtividade.showCalendar = function(id){
	jQuery(id).datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: [
		'Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'
		],
		dayNamesMin: [
		'D','S','T','Q','Q','S','S','D'
		],
		dayNamesShort: [
		'Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'
		],
		monthNames: [
		'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro',
		'Outubro','Novembro','Dezembro'
		],
		monthNamesShort: [
		'Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set',
		'Out','Nov','Dez'
		],
		nextText: 'Próximo',
		prevText: 'Anterior'

	});
}

GestaoAtividade.uploadAtividade = function()
{
    if(arquivo == "sim"){
       jQuery('#labelArquivo').show();
        jQuery('#uploadAtividade').hide();
        arquivo = "não";
    }
    else{
        //jQuery('#parte').show();
        jQuery('#labelArquivo').hide();
        jQuery('#uploadAtividade').slideDown("fast");

        //jQuery('#labelParte').slideDown("fast");
       arquivo = "sim";
    }


}