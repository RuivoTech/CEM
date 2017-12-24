/* Máscaras ER */
function mascara(o,f){
v_obj=o
v_fun=f
setTimeout("execmascara()",1)
}
function execmascara(){
v_obj.value=v_fun(v_obj.value);
}
function mtel(v){
v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
v=v.replace(/^(\d{2})(\d)/g,'($1) $2'); //Coloca parênteses em volta dos dois primeiros dígitos
v=v.replace(/(\d)(\d{4})$/,'$1-$2'); //Coloca hífen entre o quarto e o quinto dígitos
return v;
}
function mcep(v){
v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
v=v.replace(/(\d)(\d{3})$/,'$1-$2'); //Coloca hífen entre o quarto e o quinto dígitos
return v;
}
function mdata(v){
v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
v=v.replace(/(\d{2})(\d{2})(\d{4})$/,'$1/$2/$3'); //Coloca hífen entre o quarto e o quinto dígitos
return v;
}
function mrg(v){
v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
v=v.replace(/(\d{2})(\d{3})(\d{3})(\d{1})$/,'$1.$2.$3-$4'); //Coloca hífen entre o quarto e o quinto dígitos
return v;
}
function id( el ){
return document.getElementById( el );
}

window.onload = function(){
    id('tel1').onkeyup = function(){
        mascara( this, mtel );
    }
    id('tel2').onkeyup = function(){
        mascara( this, mtel );
    }
    id('cep').onkeyup = function (){
        mascara(this, mcep );
    }
    id('data').onkeyup = function (){
        mascara(this, mdata );
    }
    id('data2').onkeyup = function (){
        mascara(this, mdata );
    }
    id('rg').onkeyup = function (){
        mascara(this, mrg );
    }
    id('data3').onkeyup = function (){
        mascara(this, mdata );
    }
    
}