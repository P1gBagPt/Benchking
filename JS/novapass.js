function validarPass(){

    var password1, password2;

    mensagem_erro.style.padding = "10px";

    password1 = document.forms["form-newpassword"]["inputPassword1"].value;
    if(password1 == ""){

        mensagem_erro.innerHTML= "Insira uma password";
        return false;
    }

    if(password1.length > 55){

        mensagem_erro.innerHTML="A password n\u00e3o pode ter mais que 55 caracteres";
        return false;
    }

    if(password1.length < 6){

        mensagem_erro.innerHTML="A password n\u00e3o pode ter menos de 6 caracteres";
        return false;
    }



    password2 = document.forms["form-newpassword"]["inputPassword2"].value;
    if(password2 != password1){

        mensagem_erro.innerHTML="As passwords t\u00eam que ser iguais!";
        return false;
    }





}