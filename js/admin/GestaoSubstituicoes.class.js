var GestaoSubstituicoes = Class.create(
{});

GestaoSubstituicoes.initCad = function()
{
    ajaxOptions =
        {
        parameters :"ACTION=InitCadSubstituicoesAction"
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}


GestaoSubstituicoes.cadSubstituicoes = function(objLink)
{
    js.btnSubmit('formSaveSubstituicoes');

    $('formSaveSubstituicoes').action = ConfigAdmin.URL_APP;
    $('formSaveSubstituicoes').request();
}

GestaoSubstituicoes.initList = function()
{
    ajaxOptions =
        {
        parameters :"ACTION=InitListSubstituicoesAction"
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoSubstituicoes.execList = function()
{
    $('formListSubstituicoes').action = ConfigAdmin.URL_APP;
    $('formListSubstituicoes').request();
}

GestaoSubstituicoes.initEdit = function(id)
{
    ajaxOptions =
        {
        parameters :"ACTION=InitEditSubstituicoesAction&idProcesso=" + id
    }
    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}
GestaoSubstituicoes.moveToList = function(objSource,objTarget,listResult,objResult) {

    jQuery("#"+objSource+" :selected").each(function(i) {
        jQuery("#"+objTarget).append(new Option(jQuery(this).text(),jQuery(this).val()));
    }).remove();
    jQuery("#"+objResult).empty();
    jQuery("#"+listResult+" option").each(function(i) {
        jQuery("#"+objResult).append("<input type='hidden' name='" + objResult + "[]' value='" + jQuery(this).val() + "'");
    });

}
GestaoSubstituicoes.execDel = function()
{
    if (confirm('Você está certo disso?'))
    {
        $('formDelSubstituicoes').action = ConfigAdmin.URL_APP;
        $('formDelSubstituicoes').request();
    }
}

GestaoSubstituicoes.mudaStatus = function(id, status)
{
    ajaxOptions = {
        parameters :"ACTION=MudaStatusSubstituicoesAction&idSubstituicoes=" + id + '&status=' + status
    }

    new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
}

GestaoSubstituicoes.initAutoCompleteSubstituicoes = function(id, idField)
{
    //alert(id);
    //alert(idField);
    jQuery(idField).autocomplete(ConfigAdmin.URL_APP + '?ACTION=AutoCompleteSubstituicoesAction', {
        width: 440,
        scrollHeight: 220,
        selectFirst: true
    });

    jQuery(idField).result(function(event,data,formatted){
        jQuery(id).val(data[0]);
        jQuery("#idSubstituicoes").val(data[1]);
        jQuery("#nome").val(data[0]);
    });
};
GestaoSubstituicoes.showHide = function(flag)
{
    if(flag=='s') {
        jQuery("#container_temporaria").show();
    }
    else if(flag=='n') {
        jQuery("#container_temporaria").hide();
    }
}

