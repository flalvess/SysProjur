var GestaoAtividadeEnv = Class.create(
	{});


GestaoAtividadeEnv.initListEnv = function()
{
	ajaxOptions =
	{
		parameters :"ACTION=InitListEnvAtividadeAction"
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoAtividadeEnv.execListEnv = function()
{
	$('formListAtividade').action = ConfigAdmin.URL_APP;
	$('formListAtividade').request();
}

GestaoAtividadeEnv.initEdit = function(id)
{
	ajaxOptions =
	{
		parameters :"ACTION=InitEditAtividadeAction&idAtividade=" + id
	}

	new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoAtividadeEnv.viewAtividade = function(idAtividade,TipoAtividade){

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

GestaoAtividadeEnv.showCalendar = function(id){
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