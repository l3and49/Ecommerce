function ValidarSenhaForca(){
    const form = document.getElementById('form-id');
    //debugger;
    var senha = document.getElementById('senha').value;
    var tamanho = "";
    var tamanhoCheck = false;
    var letra = "";
    var letraCheck = false;
    var letraMa = "";
    var letraMaCheck = false;
    var esp = "";
    var espCheck = false;
    var num = "";
    var numCheck = false;
    // document.getElementById("impSenha").innerHTML = "Senha " + senha;

    if (senha.length >=8){
        tamanho = "☑ 8 ou mais caracteres";
        document.getElementById("VerificaTamanho").style.color="#13950a";
        tamanhoCheck = true;
    }
    else{
        tamanho = "☒ 8 ou mais caracteres";
        document.getElementById("VerificaTamanho").style.color="#FF0000";
    }
    mostrarTamanho(tamanho);

    if(senha.match(/[a-z]+/)){
        letra = "☑ Letra";
        document.getElementById("VerificaLetra").style.color="#13950a";
        letraCheck = true;
    }
    else {
        letra = "☒ Letra";
        document.getElementById("VerificaLetra").style.color="#FF0000";
    }

    mostrarLetra(letra);

    if(senha.match(/[A-Z]+/)){
        letraMa = "☑ Letra Maiúscula";
        document.getElementById("VerificaLetraMaiuscula").style.color="#13950a";
        letraMaCheck = true;
    }
    else {
        letraMa = "☒ Letra Maiúscula";
        document.getElementById("VerificaLetraMaiuscula").style.color="#FF0000";
    }

    mostrarLetraMaiuscula(letraMa);

    if(senha.match(/[!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~]/)){
        esp = "☑ Caracter Especial";
        document.getElementById("VerificaLetraEspecial").style.color="#13950a";
        espCheck = true;
    }
    else {
        esp = "☒ Caracter Especial";
        document.getElementById("VerificaLetraEspecial").style.color="#FF0000";
    }
    // document.getElementById("bemvinde").style.marginBottom="-35px";
    mostraEspecial(esp);

    if(senha.match(/[0-9]+/)){
        num = "☑ Número";
        document.getElementById("VerificaNumero").style.color="#13950a";
        numCheck = true;
    }
    else {
        num = "☒ Número";
        document.getElementById("VerificaNumero").style.color="#FF0000";
    }
    // document.getElementById("bemvinde").style.marginBottom="-35px";
    mostraNumero(num);

    if (tamanhoCheck && letraCheck  && letraMaCheck && espCheck && numCheck)
    {
        form.addEventListener('submit', event => {
            document.getElementById("form-id").submit();
        });
    }
    else {
        form.addEventListener('submit', event => {
            event.preventDefault();
            //alert('ERRADO');
        });
    }

}

function mostrarTamanho(tamanho){
    document.getElementById("VerificaTamanho").innerHTML = tamanho;
}

function mostrarLetra(letra){
    document.getElementById("VerificaLetra").innerHTML = letra;
}

function mostrarLetraMaiuscula(letraMa){
    document.getElementById("VerificaLetraMaiuscula").innerHTML = letraMa;
}
function mostraEspecial(esp){
    document.getElementById("VerificaLetraEspecial").innerHTML = esp;
}

function mostraNumero(num){
    document.getElementById("VerificaNumero").innerHTML = num;
}
