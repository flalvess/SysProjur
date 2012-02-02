var GestaoMovimentacao = Class.create(
	{});

//GestaoMovimentacao.arrayCidades = null;

GestaoMovimentacao.initCad = function(id, area)
{
	ajaxOptions =
	{
		parameters :"ACTION=InitCadMovimentacaoAction&idProcesso=" + id + "&area=" + area
	}
       
	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoMovimentacao.cadMovimentacao = function(objLink)
{
	js.btnSubmit('formSaveMovimentacao');

	$('formSaveMovimentacao').action = ConfigAdmin.URL_APP;
	$('formSaveMovimentacao').request();
}

GestaoMovimentacao.initList = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitListMovimentacaoAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoMovimentacao.execList = function()
{
	$('formListMovimentacao').action = ConfigAdmin.URL_APP;
	$('formListMovimentacao').request();
}

GestaoMovimentacao.execListMov = function()
{
	$('formListMovimentacao').action = ConfigAdmin.URL_APP;
	$('formListMovimentacao').request();
}



GestaoMovimentacao.initEdit = function(id)
{
	ajaxOptions =
	{
		parameters :"ACTION=InitEditMovimentacaoAction&idMovimentacao=" + id
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoMovimentacao.openMovimentacao = function(id){
    ajaxOptions =
	{
		parameters :"ACTION=InitCadMovimentacaoAction&idProcesso=" + id

	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoMovimentacao.execDel = function()
{
	if (confirm('Você está certo disso?'))
	{
		$('formDelMovimentacao').action = ConfigAdmin.URL_APP;
		$('formDelMovimentacao').request();
	}
}

GestaoMovimentacao.changeProcessType = function()
{
	var valSelected = jQuery('#formSaveMovimentacao_tipoMovimentacao').val();

	if(valSelected == "a executar"){

		jQuery('#movimentacaoAExecutar').show();
	

	}else if(valSelected == "executada" || valSelected == "" ){

		jQuery('#movimentacaoAExecutar').hide();


	}

}

GestaoMovimentacao.viewMovimentacao = function(idMovimentacao,tipoMovimentacao){

	var tamanho = 450;
	var altura = 300;

	var w = screen.width;
	var h = screen.height;

	var meio_tamanho = tamanho/2;
	var meio_altura = altura/2;

	var meio_w = w/2;
	var meio_h = h/2;

	var diff_w = meio_w - meio_tamanho;
	var diff_h = meio_h - meio_altura;

	window.close();
	window.open('http://localhost/sysprojur/classes/modelo/admin/controle/movimentacoes/visualizarMovimentacaoAExecutar.php?idMovimentacao='+idMovimentacao+'&tipoMovimentacao='+tipoMovimentacao, 'Visualização de Movimentacaos', 'height='+altura+', width='+tamanho+', top='+diff_h+', left='+diff_w+', resizable=no');

}

GestaoMovimentacao.showCalendar = function(id){
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

