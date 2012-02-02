
var i = 0;
var c = 0;
var input = 1;

//var cor = new Array('#FFFF99','white');
var cor = new Array('#EEEEEE','white');
var cor2 = new Array('white','white');
var pessoa = new Array();



function reset(){
    pessoa.length = 0;
    i = 0;
    c = 0;
    input = 1;
}

function removeElement(valor) {

    var d = document.getElementById('aqui');
    var olddiv = document.getElementById(valor);
    var flag = 0;

    d.removeChild(olddiv);

    for(var k=0; k < pessoa.length; k++){
           if((valor == pessoa[k]) && (k == pessoa.length - 1)){
                   pessoa.pop();
                   i = k;

           }else if(((valor == pessoa[k]) && (k < pessoa.length - 1)) || (flag == 1)){
                   pessoa[k] = pessoa[k+1];
                   flag = 1;
                   if(k == pessoa.length - 2){
                          pessoa.pop();
                          i = k+1;
                   }

           }
    }

}

function compara(campo){
         if((campo != "") && (pessoa.length == 0)){
            i = 0;
            return true;

         } else if((campo != "") && (pessoa.length > 0)){

            for(var j= 0; j < pessoa.length; j++){
                if(campo == pessoa[j]){
                    window.alert("Esse nome já foi selecionado!");
                    return false;
                }else if(j == pessoa.length - 1 ){
                    return true;
                }
            }

         }
         else if (campo == ""){
              window.alert("Preencha o campo primeiro!");
         }
}

function adiciona(campo)
{

    var nova = document.getElementById("aqui");
    var novadiv = document.createElement("div");

    novadiv.setAttribute('id',campo);

    if(compara(campo) == true){
        
        novadiv.innerHTML = "<div style='background-color:"+cor[c]+";'><input type='text' name='nome[]' value='"+campo+"'style='border: 1px solid #000000; border: none; padding-left: 3px; background-color:"+cor[c]+"; width: 172px;' readonly title='"+campo+"'><a href='javascript:;' onclick=\"removeElement('"+campo+"')\"; style='background-color:"+cor[c]+"; padding-right: 4px; padding-left: 5px;' >remover</a><input type='hidden' name='total[]' value='"+i+"'style='border: none;'></div>";

        if(c==0){
            c=1;
        }else{
            c=0;
        }

        pessoa[i] = campo; i++;

    }

    nova.appendChild(novadiv);
    input++;

}
