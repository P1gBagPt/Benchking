function validarEmail(){
    
    var emails;
    var mensagem_erro = document.getElementById("mensagem_erro");

    emails = document.forms["envia-email_form"]["footer-email"].value;
    if (emails == ""){
        mensagem_erro.innerHTML = "Insira um endereço email";
        return false;
    }else{
        var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
        var x = re.test(emails);

        if (x){

        }else{
            mensagem_erro.innerHTML = "O Email n\u00e3o \u00e9 valido";
            return false;
        }

    }

    if(emails.length > 4 || emails.length < 200){
        mensagem_erro.innerHTML = "Registado com sucesso";
    }
    
}