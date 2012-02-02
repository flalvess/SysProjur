var GestaoAtividade = Class.create(
	{});

arquivo = "n�o";



GestaoAtividade.reset = function(){
    arquivo = "n�o";
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
	if (confirm('Voc� est� certo disso?'))
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
	window.open('../../classes/modelo/admin/controle/funcionarios/visualizarAtividade.php?idAtividade='+idAtividade+'&idTipoAtividade='+idTipoAtividade, 'Visualiza��o de Atividades', 'height='+altura+', width='+tamanho+', top='+diff_h+', left='+diff_w+', resizable=no');

}

GestaoAtividade.showCalendar = function(id){
	jQuery(id).datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: [
		'Domingo','Segunda','Ter�a','Quarta','Quinta','Sexta','S�bado','Domingo'
		],
		dayNamesMin: [
		'D','S','T','Q','Q','S','S','D'
		],
		dayNamesShort: [
		'Dom','Seg','Ter','Qua','Qui','Sex','S�b','Dom'
		],
		monthNames: [
		'Janeiro','Fevereiro','Mar�o','Abril','Maio','Junho','Julho','Agosto','Setembro',
		'Outubro','Novembro','Dezembro'
		],
		monthNamesShort: [
		'Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set',
		'Out','Nov','Dez'
		],
		nextText: 'Pr�ximo',
		prevText: 'Anterior'

	});
}

GestaoAtividade.uploadAtividade = function()
{
    if(arquivo == "sim"){
       jQuery('#labelArquivo').show();
        jQuery('#uploadAtividade').hide();
        arquivo = "n�o";
    }
    else{
        //jQuery('#parte').show();
        jQuery('#labelArquivo').hide();
        jQuery('#uploadAtividade').slideDown("fast");

        //jQuery('#labelParte').slideDown("fast");
       arquivo = "sim";
    }


}