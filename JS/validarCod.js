function validarCod(){

    var cod;

    mensagem_erro.style.padding = "10px";

    cod = document.forms["form-inserirCod"]["inputCodigo"].value;
    if (cod == ""){
        mensagem_erro.innerHTML = "Insira o codigo de verificaç\u00e3o";
        return false;
    }

    if(cod.length < 6 || cod.length > 6 ){
        mensagem_erro.innerHTML = "O código só pode ter 6 numeros";
        return false;
    }

}