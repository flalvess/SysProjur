var GestaoProcessos = Class.create(
    {});

GestaoProcessos.arrayCidades = null;
GestaoProcessos.arrayJuizos = null;
ocultarProcesso = "sim";
ocultarJustica = "sim";
ocultarParte = "sim";
ocultarNovaCidade = "não";
ocultarNovoJuizo = "não";
trocaPolo = "sim";



GestaoProcessos.initCad = function()
{
    reset();
    resetAdversa();
    ajaxOptions =
    {
        parameters :"ACTION=InitCadProcessoAction"
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoProcessos.cadProcesso = function(objLink)
{
    js.btnSubmit('formSaveProcesso');

    $('formSaveProcesso').action = ConfigAdmin.URL_APP;
    $('formSaveProcesso').request();
}

GestaoProcessos.cadDistribuicao = function(objLink)
{
    js.btnSubmit('formSaveTipoDistribuicao');

    $('formSaveTipoDistribuicao').action = ConfigAdmin.URL_APP;
    $('formSaveTipoDistribuicao').request();
}

GestaoProcessos.initList = function()
{
    ajaxOptions =
    {
        parameters :"ACTION=InitListProcessoAction"
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoProcessos.initListSemCiente = function()
{
    ajaxOptions =
    {
        parameters :"ACTION=InitListProcessoSemCienteAction"
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoProcessos.initListAExecutar = function()
{
    ajaxOptions =
    {
        parameters :"ACTION=InitListProcessoAExecutarAction"
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoProcessos.initListMeusProcessos = function()
{
    ajaxOptions =
    {
        parameters :"ACTION=InitListMeusProcessosAction"
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoProcessos.execList = function()
{
    $('formListProcesso').action = ConfigAdmin.URL_APP;
    $('formListProcesso').request();
}

GestaoProcessos.execListSemCiente = function()
{
    $('formListProcesso').action = ConfigAdmin.URL_APP;
    $('formListProcesso').request();
}

GestaoProcessos.execListAExecutar = function()
{
    $('formListProcesso').action = ConfigAdmin.URL_APP;
    $('formListProcesso').request();
}

GestaoProcessos.execListMeusProcessos = function()
{
    $('formListProcesso').action = ConfigAdmin.URL_APP;
    $('formListProcesso').request();
}

GestaoProcessos.initEdit = function(id)
{
    ajaxOptions =
    {
        parameters :"ACTION=InitEditProcessoAction&idProcesso=" + id
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoProcessos.initEditModoDistribuicao = function()
{
    ajaxOptions =
    {
        parameters :"ACTION=InitEditModoDistribuicaoAction&idTipoDistribuicao=1"
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}



GestaoProcessos.openProcesso = function(id, area)
{
    ajaxOptions =
    {
        parameters :"ACTION=InitOpenProcessoAction&idProcesso=" + id + "&area=" + area
                
    }


    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);

}

GestaoProcessos.execDel = function()
{
    if (confirm('Você está certo disso?'))
    {
        $('formDelProcessos').action = ConfigAdmin.URL_APP;
        $('formDelProcessos').request();
    }
}

GestaoProcessos.changeProcessType = function()
{
    var valSelected = jQuery('#formSaveProcesso_instancia').val();

    if(valSelected == "1º Instancia"){

        jQuery('#segundaInstancia').hide();
        jQuery('#segundaInstanciaDerivado').hide();
        jQuery('#primeiraInstancia').show();

    }else if(valSelected == "2º Instancia"){

        jQuery('#primeiraInstancia').hide();
        jQuery('#NovaCidade').hide();
        jQuery('#segundaInstancia').show();

    }
    else {
        jQuery('#primeiraInstancia').hide();
        jQuery('#segundaInstancia').hide();
    }
}

GestaoProcessos.changeProcessTypeModo = function()
{
    var valSelected = jQuery('#formSaveTipoDistribuicao_modo').val();

    if(valSelected == "A"){

        jQuery('#criterio').show();

    }
    else if(valSelected == "M"){

        jQuery('#criterio').hide();
        jQuery('#assunto').hide();

    }

    else {
        jQuery('#criterio').hide();
        jQuery('#assunto').hide();

    }
}

GestaoProcessos.changeProcessTypeAssunto = function()
{
    var valSelected = jQuery('#formSaveTipoDistribuicao_criterio').val();

    if(valSelected == "Por Assunto"){

        jQuery('#assunto').show();

    }
    else {
        jQuery('#assunto').hide();

    }
}

GestaoProcessos.changePrimeiraInstancia = function()
{
    var valSelected = jQuery('#formSaveProcesso_tipoSegundaInstancia').val();

    if(valSelected == "Derivado"){

        jQuery('#segundaInstanciaDerivado').show();

    }
    else {
	
        jQuery('#segundaInstanciaDerivado').hide();

    }
}

GestaoProcessos.ocultarProcesso = function()
{
 
    if(ocultarProcesso == "sim"){
        jQuery('#processo').hide();
        jQuery('#labelProcesso').hide();
        ocultarProcesso = "não";
    }
    else{
        //jQuery('#processo').show();
        jQuery('#labelProcesso').show();
        jQuery('#processo').slideDown("fast");
        ocultarProcesso = "sim";
    }


}

GestaoProcessos.ocultarJustica = function()
{
    if(ocultarJustica == "sim"){
        jQuery('#justica').hide();
        jQuery('#labelJustica').hide();
        ocultarJustica = "não";
    }
    else{
        //jQuery('#justica').show();
        jQuery('#labelJustica').show();
        jQuery('#justica').slideDown("fast");
        
        ocultarJustica = "sim";
    }
   

}

GestaoProcessos.ocultarParte = function()
{
    if(ocultarParte == "sim"){
        jQuery('#parte').hide();
        jQuery('#labelParte').hide();
        ocultarParte = "não";
    }
    else{
        //jQuery('#parte').show();
        jQuery('#labelParte').show();
        jQuery('#parte').slideDown("fast");
        
        //jQuery('#labelParte').slideDown("fast");
        ocultarParte = "sim";
    }


}

GestaoProcessos.NovaCidade = function()
{
    if(ocultarNovaCidade == "sim"){
        jQuery('#NovaCidade').hide();
        // jQuery('#primeiraInstancia').show();

        jQuery("#formSaveProcesso_cidade").removeAttr("disabled");
        jQuery("#formSaveProcesso_fkJuizo").removeAttr("disabled");

        jQuery("#formSaveProcesso_novaCidade").attr("disabled","disabled"); // Primeiro desabilita o campo
        jQuery("#formSaveProcesso_novaCidade").val("");
        jQuery("#formSaveProcesso_fkEstado").attr("disabled","disabled"); // Primeiro desabilita o campo
        jQuery("#formSaveProcesso_fkEstado").val("");
        jQuery("#formSaveProcesso_novoJuizo").attr("disabled","disabled"); // Primeiro desabilita o campo
        jQuery("#formSaveProcesso_novoJuizo").val("");
        
        ocultarNovaCidade = "não";
    }
    else{
        //jQuery('#NovaCidade').show();
        //jQuery('#primeiraInstancia').hide();
        jQuery('#NovoJuizo').hide();
        jQuery('#NovaCidade').slideDown("fast");
        jQuery("#formSaveProcesso_novaCidade").removeAttr("disabled");
        jQuery("#formSaveProcesso_fkEstado").removeAttr("disabled");
        jQuery("#formSaveProcesso_novoJuizo").removeAttr("disabled");
    
        
        jQuery("#formSaveProcesso_novoJuizo2").attr("disabled","disabled"); // Primeiro desabilita o campo
        jQuery("#formSaveProcesso_novoJuizo2").val("");
        jQuery("#formSaveProcesso_cidade").attr("disabled","disabled"); // Primeiro desabilita o campo
        jQuery("#formSaveProcesso_cidade").val("");
        jQuery("#formSaveProcesso_fkJuizo").attr("disabled","disabled"); // Primeiro desabilita o campo
        jQuery("#formSaveProcesso_fkJuizo").val("");
         
        ocultarNovaCidade = "sim";
    }
}

GestaoProcessos.NovoJuizo = function()
{
    if(ocultarNovoJuizo == "sim"){
        jQuery('#NovoJuizo').hide();
        //jQuery('#InicioJuizo').slideDown("fast");
        jQuery("#formSaveProcesso_fkJuizo").removeAttr("disabled");
        jQuery("#formSaveProcesso_novoJuizo2").attr("disabled","disabled"); // Primeiro desabilita o campo
        jQuery("#formSaveProcesso_novoJuizo2").val("");

        ocultarNovoJuizo = "não";
    }
    else{
        //jQuery('#NovaCidade').show();
        //jQuery('#InicioJuizo').hide();
        jQuery('#NovaCidade').hide();
        jQuery('#NovoJuizo').slideDown("fast");

        jQuery("#formSaveProcesso_novoJuizo2").removeAttr("disabled");
        jQuery("#formSaveProcesso_cidade").removeAttr("disabled");
        jQuery("#formSaveProcesso_fkJuizo").attr("disabled","disabled"); // Primeiro desabilita o campo
        jQuery("#formSaveProcesso_fkJuizo").val("");

        jQuery("#formSaveProcesso_novaCidade").attr("disabled","disabled"); // Primeiro desabilita o campo
        jQuery("#formSaveProcesso_novaCidade").val("");
        jQuery("#formSaveProcesso_fkEstado").attr("disabled","disabled"); // Primeiro desabilita o campo
        jQuery("#formSaveProcesso_fkEstado").val("");
        jQuery("#formSaveProcesso_novoJuizo").attr("disabled","disabled"); // Primeiro desabilita o campo
        jQuery("#formSaveProcesso_novoJuizo").val("");

        ocultarNovoJuizo = "sim";
    }


}

GestaoProcessos.mudaPolo = function(tipo)
{
    var valSelected = jQuery('#ativoRepresentada').val();

    //if(valSelected == "ativoRepresentada"){
    //if(jQuery('#ativoRepresentada').val() == "ativoRepresentada"){
    if(tipo == "ativoR"){


        jQuery('#passivoRepresentada').removeAttr("checked");
        //jQuery('#passivoRepresentada').val("");
        jQuery('#ativoAdversa').removeAttr("checked");
        //jQuery('#ativoAdversa').val("");
        jQuery('#ativoAdversa').attr("disabled","disabled");
        jQuery('#passivoAdversa').removeAttr("disabled");
        jQuery('#passivoAdversa').attr("checked","checked");
    }
    else if(tipo == "passivoR") {

       // jQuery('#ativoRepresentada').removeAttr("disabled");
        jQuery('#ativoRepresentada').removeAttr("checked");
       // jQuery('#ativoRepresentada').val("");
        jQuery('#passivoAdversa').removeAttr("checked");
       // jQuery('#passivoAdversa').val("");
        jQuery('#passivoAdversa').attr("disabled","disabled");
        jQuery('#ativoAdversa').removeAttr("disabled");
        jQuery('#ativoAdversa').attr("checked","checked");
    }
}



GestaoProcessos.loadCidades = function(estado)
{
    ajaxOptions = {
        parameters :"ACTION=LoadCidadesAction&idEstado=" + estado + "&idSelect=formSaveProcesso_idCidade&arrayName=GestaoProcessos.arrayCidades"
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoProcessos.loadJuizos = function(cidade)
{
    ajaxOptions = {
        parameters :"ACTION=LoadJuizosAction&idCidade=" + cidade + "&idSelect=formSaveProcesso_fkJuizo&arrayName=GestaoProcessos.arrayJuizos"
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoProcessos.viewProcesso = function(idProcesso, numeroProcesso,instancia, primeiraInstancia, cidade, juizo){

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
    //window.open('../../classes/modelo/admin/controle/funcionarios/visualizarProcesso.php?idProcesso='+idProcesso+'&idTipoProcesso='+idTipoProcesso, 'Visualização de processos', 'height='+altura+', width='+tamanho+', top='+diff_h+', left='+diff_w+', resizable=no');
    window.open('http://localhost/sysprojur/classes/modelo/admin/controle/processos/GerarRelatorio.php?idProcesso='+idProcesso+'&numeroProcesso='+numeroProcesso+'&instancia='+instancia+"&primeiraInstancia="+primeiraInstancia+"&cidade="+cidade+"&juizo="+juizo, 'Exportar dados do processo para o excel', 'height='+altura+', width='+tamanho+', top='+diff_h+', left='+diff_w+', resizable=no');


}

GestaoProcessos.showCalendar = function(id){
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

GestaoProcessos.initAutoCompleteProcessos = function(id, idField)
{
    //alert(id);
    //alert(idField);
    jQuery(idField).autocomplete(ConfigAdmin.URL_APP + '?ACTION=AutoCompleteProcessosAction', {
        width: 440,
        scrollHeight: 220,
        selectFirst: true
    });

    jQuery(idField).result(function(event,data,formatted){
        jQuery(id).val(data[1]);
    });
};