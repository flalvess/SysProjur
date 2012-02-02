function scriptJpanel()
{
    this.lastUploads = new Array();
	
    this.gE = function(id)
    {
        return document.getElementById(id);
    }

    this.gEs = function(tag)
    {
        return document.getElementsByTagName(tag);
    }

    this.showMenuLi = function(obj)
    {
        var item = obj.parentNode.getElementsByTagName("ul")[0];

        if (jQuery(item).css("display") == "none")
        {
            jQuery(item).slideDown("fast");
        } else
        {
            jQuery(item).slideUp("fast");
        }
    }

    this.hideMenu = function()
    {
        if (jQuery('#menu').css("display") == "block")
        {
            jQuery('#menu').css( {
                display :"none"
            });
            jQuery('#menu').css( {
                width :"0px"
            });
            jQuery('#left').css( {
                width :"0px"
            });
            jQuery('#meio').css( {
                width :"900px",
                marginLeft :"25px"
            });
            jQuery('#tree').css( {
                marginTop :"25px",
                marginLeft :"25px"
            });
            jQuery('.container_busca').css( {
                marginLeft :"215px"
            });
            jQuery('.aux_field').css( {
                marginLeft :"0px"
            });
            jQuery('.dest-home').css( {
                marginLeft :"18%"
            });
            jQuery('.icons').css( {
                width :"900px"
            });

        } else
        {
            jQuery('#menu').css( {
                display :"block"
            });
            jQuery('#menu').css( {
                width :"180px"
            });
            jQuery('#left').css( {
                width :"180px"
            });
            jQuery('#meio').css( {
                width :"720px",
                marginLeft :"0px"
            });
            jQuery('#tree').css( {
                marginTop :"20px",
                marginLeft :"208px"
            });
            jQuery('.container_busca').css( {
                marginLeft :"145px"
            });
            jQuery('.aux_field').css( {
                marginLeft :"0px"
            });
            jQuery('.dest-home').css( {
                marginLeft :"9%"
            });
            jQuery('.icons').css( {
                width :"720px"
            });
        }
    }


    this.checkAll = function()
    {

        myInput = this.gEs('input');

        for (i = 0; i < myInput.length; i++)
        {
            if (myInput[i].type == "checkbox")
            {
                if (myInput[i].checked == false)
                {
                    myInput[i].checked = true;
                    myInput[i].parentNode.parentNode.className = "colorTr";

                } else
                {
                    myInput[i].checked = false;
                    myInput[i].parentNode.parentNode.className = "";
                }
            }
        }
    }

    this.showSearchs = function()
    {
        var divSearch = this.gE('search');
        if (jQuery(divSearch).css("display") == 'none')
        {
            jQuery(divSearch).slideDown("fast");

        } else
        {
            jQuery(divSearch).slideUp("fast");
        }
    }

    this.collorTrHover = function()
    {
        myInput = this.gEs('input');
        myTr = jQuery('.trTable');

        for (i = 0; i < myTr.length; i++)
        {
            myTr[i].onmouseover = this.mouseOverTr;
            myTr[i].onmouseout = this.mouseOutTr;
        }

        for (i = 0; i < myInput.length; i++)
        {
            if (myInput[i].type == "checkbox")
            {
                myInput[i].onclick = this.colorCheck;
            }
        }
    }

    this.colorCheck = function()
    {
        if (this.checked)
        {
            this.parentNode.parentNode.className = "colorTr";
        } else
        {
            this.parentNode.parentNode.className = "";
        }
    }

    this.mouseOverTr = function()
    {
        if (this.className != "colorTr")
        {
            this.className = "colorTrHover";
        }
    }

    this.mouseOutTr = function()
    {
        if (this.className != "colorTr")
        {
            this.className = "";
        }
    }

    this.changeMenu = function(obj)
    {
        var myul = obj.parentNode.parentNode.parentNode.parentNode;
        var menu = myul.getElementsByTagName("a");
        for ( var i = 0; i < menu.length; i++)
        {
            menu[i].className = "";
        }
        obj.className = "selected";
    }

    this.loading = function()
    {
        $('gif_load').style.visibility = "visible";
    }

    this.loaded = function()
    {
        $('gif_load').style.visibility = "hidden";
    }

    /* Adicionar KeyWords */

    this.addPalavra = function(event, idForm)
    {
        if (event && event.keyCode != 13)
        {
            return;
        }

        this.execAddPalavra($(idForm + '_key').value, idForm);
    }

    this.execAddPalavra = function(key, idForm)
    {
        var idLi = 'li_' + Math.random();
        var strIn = "<li class=\"add_words\" id=\"" + idLi + "\"><input type=\"text\"  name=\"key[]\"  disabled=\"true\" value=\"" + key + "\" /><input type=\"hidden\" name=\"key[]\" value=\"" + key + "\" /> &nbsp; <a href=\"javascript:;\" onclick=\"js.delPalavra('" + idLi + "', '" + idForm + "')\" title=\"Remover Palavra\"><img src=\"../imagem/admin/delete_word.png\" alt=\"\"/></a></li>";

        $(idForm + '_container_key').innerHTML += strIn;
        $(idForm + '_key').value = '';
    }

    this.delPalavra = function(id, idForm)
    {
        $(idForm + '_container_key').removeChild($(id));
    }

    /* Adicionar alternativas na enquete */

    this.addAlternativa = function(event, idForm)
    {
        if (event && event.keyCode != 13)
        {
            return;
        }

        this.execAddAlternativa($(idForm + '_alternativas').value, idForm);
    }

    var i = 1;
    this.execAddAlternativa = function(key, idForm)
    {
        var idLi = 'li_' + Math.random();
        var strIn = "";
        strIn += "<li class=\"add_words\" id=\"" + idLi + "\"><label for=\"" + i + "\">Alternativa " + i + ":</label><br/><input id=\"" + i + "\" type=\"text\" name=\"alternativas[]\" value=\"" + key + "\" /><input type=\"hidden\" name=\"alternativas[]\" value=\"" + key + "\" /></li>";
        $(idForm + '_container_alternativas').innerHTML += strIn;
        $(idForm + '_alternativas').value = '';
        i++;
    }

    this.delAlternativa = function(id, idForm)
    {
        $(idForm + '_container_alternativas').removeChild($(id));
    }

    this.changeTitle = function(myTitle)
    {
        document.title = myTitle;
    }

    this.pagSubmit = function(obj)
    {
        obj.form.action = ConfigAdmin.URL_APP;
        $(obj.form.id).request();// por causa do ie6
    }

    this.pagPrior = function(obj)
    {
        obj.form.pag.value--;
        this.pagSubmit(obj);
    }

    this.pagNext = function(obj)
    {
        obj.form.pag.value++;
        this.pagSubmit(obj);
    }

    this.getEditor = function(idTextarea)
    {
        //var sBasePath = "http://localhost/sysprojur/js/base/fckeditor/";
        //var sBasePath = "js/base/fckeditor/";
        var sBasePath = "js/base/fckeditor/";
        var oFCKeditor = new FCKeditor(idTextarea);
        oFCKeditor.BasePath = sBasePath;
        oFCKeditor.Width = "512";
        oFCKeditor.ToolbarSet = "Basic";
        //oFCKeditor.Create() ;


        oFCKeditor.ReplaceTextarea();

    }

    this.getEditorContent = function(idTextarea)
    {
        var oEditor = FCKeditorAPI.GetInstance(idTextarea);
        return oEditor.GetXHTML();
    }


    this.imgChange = function(obj, funcao, id)
    {
        if (obj.getAttribute("src").indexOf("disable") > 0)
        {
            obj.setAttribute("src", "../imagem/admin/ok.png");
            obj.setAttribute("title", "Já publicada. Remover publicação.");
            obj.parentNode.href = 'javascript:' + funcao + "(" + id + "," + 0 + ")";

        } else
        {
            obj.setAttribute("src", "../imagem/admin/disable.png");
            obj.setAttribute("title", "Não Publicada. Publicar.");
            obj.parentNode.href = 'javascript:' + funcao + "(" + id + "," + 1 + ")";
        }
    }

    this.changeColorLink = function(obj)
    {
        obj.style.backgroundColor = "#FFDFDF";
    }

    this.hideColorLink = function(obj)
    {
        obj.style.backgroundColor = "inherit";
    }

    this.promptMenssage = function(titulo, texto, erro)
    {
        if (erro == false)
        {
            jQuery.prompt('<h3 class="ok_msg">' + titulo + '<h3/>' + '<span class="mt-10">' + texto + '</span>', {
                show :'slideDown'
            }, false);
        } else
        {
            jQuery.prompt('<h3 class="erro_msg">' + titulo + '<h3/>' + '<span class="mt-10">' + texto + '</span>', {
                show :'slideDown'
            }, true);
        }
    }
	
    this.btnReset = function(idForm)
    {
        jQuery('.' + idForm + '_submit').each( function(i)
        {
            this.onclick = this.onclickAntigo;
            this.title = this.titleAntigo;
        });
    }

    this.btnSubmit = function(idForm)
    {
        jQuery('.' + idForm + '_submit').each( function(i)
        {
            this.onclickAntigo = this.onclick;
            this.onclick = null;
            this.titleAntigo = this.title;
            this.title = 'Enviando';
        });
    }

    this.checkUncheckAll = function(el){

        var selected = el.id;
        var idCaso = jQuery("#" + selected).parent().parent().attr("id");
        var elClick = jQuery("#" + idCaso).find(".all_selected").find("input");
        var casos = jQuery("#" + idCaso + " > .format");
        casos.each(function(){
            if(elClick.attr("checked") != false){
                jQuery(this).find("input").attr("checked","checked");
            }else{
                jQuery(this).find("input").removeAttr("checked");
            }
        });
    }

    this.getterReports = function(sql){

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
        window.open('../../classes/modelo/admin/controle/admin/getterReports.php?sql=' + sql, 'Gerar Relatório', 'height='+altura+', width='+tamanho+', top='+diff_h+', left='+diff_w+', resizable=no');

    }

    this.upload = function(id)
    {
        $('formUploadArquivo').action = ConfigAdmin.URL_APP;

        //this.uploadArquivo('formSaveAditivo_arquivoUpd', 'formUploadArquivo');
        this.uploadArquivo(id, 'formUploadArquivo');
    }

    this.confirmUpload = function (params)
    {
        //$(params.idParentInput).innerHTML = "<input type=\"text\" value=\"Upload concluído com sucesso\" class=\"field_g\" readonly=\"true\">";
        //$(params.idParentInput).innerHTML = "<font class=\"field_g\"> Upload concluído com sucesso <img src=\"http://localhost/sysprojur/img/admin/ok2.png\"></font> ";
        $(params.idParentInput).innerHTML = "<font style=\"display: inline;\"> &nbsp;&nbsp;O upload do arquivo foi concluído com sucesso <img src=\"http://localhost/sysprojur/img/admin/ok2.png\"></font>";

        $(params.inputDestArquivo).value = params.nameFile;

        //$('container_legenda_arquivo').innerHTML  = "<strong>Opções:</strong> ";
        //$('container_legenda_arquivo').innerHTML += "<a href=\"#\" class=\"alert\" onClick=\"js.cancelUpload({idFormUpload:'" + params.idFormUpload + "', inputDestArquivo:'" + params.inputDestArquivo + "'});\">[ Apagar Arquivo ]</a>";
        $('container_legenda_arquivo').innerHTML += "<strong><a href=\"#\"  onClick=\"js.cancelUpload({idFormUpload:'" + params.idFormUpload + "', inputDestArquivo:'" + params.inputDestArquivo + "'});\"><font style=\"color: #ff0000;\">[ Cancelar ]</font></a><strong>";
//        $('container_legenda_arquivo').innerHTML += "<a href=\"#\"  onClick=\"js.cancelUpload({idFormUpload:'" + params.idFormUpload + "', inputDestArquivo:'" + params.inputDestArquivo + "'});\"><font style=\"color: #ff0000;\">[ Cancelar ]</font></a>";
    }

    this.cancelUpload = function(params)
    {
        if (this.lastUploads[params.idFormUpload])
        {
            $(params.idFormUpload).reset();
            var objParent = this.lastUploads[params.idFormUpload]['parent'];
            var objInput = this.lastUploads[params.idFormUpload]['input'];

            this.removeTempFile($(params.inputDestArquivo).value);
            $(params.inputDestArquivo).value = '';

            objParent.innerHTML = '';
            objParent.appendChild(objInput);
        }
    }

    this.removeTempFile = function(arquivo)
    {
        if (arquivo.length > 0)
        {
            ajaxOptions = {
                parameters :"ACTION=RemoveTempFileAction&arquivo=" + arquivo
            }
            new Ajax.Request(ConfigAdmin.URL_APP, ajaxOptions);
            $('container_legenda_arquivo').innerHTML  = "";
        }
    }

    this.uploadArquivo = function(idInput, idForm)
    {
        var objFile = $(idInput);
        var objForm = $(idForm);
        var objParent = objFile.parentNode;

        if (objFile.value.length == 0)
        {
            return false;
        }

        var progressBar = document.createElement('img');
        progressBar.src = "http://localhost/sysprojur/img/admin/30.gif";

        objInputs = objForm.getElementsByTagName("input");

        for (i = 0; i < objInputs.length; i++)
        {
            if (objInputs[i].type == 'file')
            {
                objForm.removeChild(objInputs[i]);
            }
        }

        objForm.appendChild(objFile);
        objParent.appendChild(progressBar);

        if (objFile.value.length > 0)
        {
            objForm.submit();
        }

        this.lastUploads[idForm] = new Array();
        this.lastUploads[idForm]['parent'] = objParent;
        this.lastUploads[idForm]['input'] = objFile;
    }

    this.addImpetrados = function()
    {
        var nome = jQuery.trim(jQuery("#nome"));
        var idImpetrado = jQuery("#idImpetrado");

        var nomeImpetrado = jQuery.trim(nome);
        var listaPalavras = jQuery("#idDeTuaUl");
        var flag = false;

        var lista = jQuery(".multipleInput");

        jQuery.each(lista, function(){
            if(jQuery("#formSaveProcesso_impetrado").val().toLowerCase() ==
                jQuery(this).attr("value").toLowerCase()){
                flag = true;
            }
        });

        if ((nome != "") && (flag == false))
        {
            var id = 'p_' + Math.random();
            id = id.replace(/\./, '');

            var html = '<li id="' + id + '" style="display:none">';


            html += '<input name="impetradosList[]" title="" value="' +
                idImpetrado + '" type="hidden"/>';
            html += '<input type="text" id="'+idImpetrado+'"name="impetradosView" value="' + nome + '"class="multipleInput" readonly/>';
            html += '&nbsp;';
            html += '<a href="javascript:;">[ x ]</a>';
            html += '</li>';

            jQuery(listaPalavras).prepend(html);

            jQuery('#' + id + '_value').val(nome);

            jQuery("#formSaveProcesso_impetrado").val('');

            jQuery('#' + id).fadeIn();

            jQuery('#' + id + ' a').click( function()
            {
                jQuery('#' + id).fadeOut(500, function()
                {
                    jQuery('#' + id).remove();
                });
            });
        }
        flag = false;
    }
}

js = new scriptJpanel();