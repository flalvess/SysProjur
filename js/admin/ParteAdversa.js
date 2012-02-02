
var i = 0;
var c = 0;
var input = 1;

//var cor = new Array('#FFFF99','white');
var cor = new Array('#EEEEEE','white');
var cor2 = new Array('white','white');
var parteAdversa = new Array();



function resetAdversa(){
    parteAdversa.length = 0;
    i = 0;
    c = 0;
    input = 1;
}

function removeElementAdversa(valor) {

    var d = document.getElementById('aqui2');
    var olddiv = document.getElementById(valor);
    var flag = 0;

    d.removeChild(olddiv);

    for(var k=0; k < parteAdversa.length; k++){
           if((valor == parteAdversa[k]) && (k == parteAdversa.length - 1)){
                   parteAdversa.pop();
                   i = k;

           }else if(((valor == parteAdversa[k]) && (k < parteAdversa.length - 1)) || (flag == 1)){
                   parteAdversa[k] = parteAdversa[k+1];
                   flag = 1;
                   if(k == parteAdversa.length - 2){
                          parteAdversa.pop();
                          i = k+1;
                   }

           }
    }

}

function comparaAdversa(campo){
         if((campo != "") && (parteAdversa.length == 0)){
            i = 0;
            return true;

         } else if((campo != "") && (parteAdversa.length > 0)){

            for(var j= 0; j < parteAdversa.length; j++){
                if(campo == parteAdversa[j]){
                    window.alert("Esse nome já foi selecionado!");
                    return false;
                }else if(j == parteAdversa.length - 1 ){
                    return true;
                }
            }

         }
         else if (campo == ""){
              window.alert("Preencha o campo primeiro!");
         }
}

function adicionaAdversa(campo)
{

    var nova = document.getElementById("aqui2");
    var novadiv = document.createElement("div");

    novadiv.setAttribute('id',campo);

    if(comparaAdversa(campo) == true){
        
        novadiv.innerHTML = "<div style='background-color:"+cor[c]+";'><input type='text' name='nomeAdversa[]' value='"+campo+"'style='border: 1px solid #000000; border: none; padding-left: 3px; background-color:"+cor[c]+"; width: 172px;' readonly title='"+campo+"'><a href='javascript:;' onclick=\"removeElementAdversa('"+campo+"')\"; style='background-color:"+cor[c]+"; padding-right: 4px; padding-left: 5px;' >remover</a><input type='hidden' name='totalAdversa[]' value='"+i+"'style='border: none;'></div>";

        if(c==0){
            c=1;
        }else{
            c=0;
        }

        parteAdversa[i] = campo;i++;

    }

    nova.appendChild(novadiv);
    input++;

}
