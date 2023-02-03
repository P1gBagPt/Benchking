function validar() {

    

    var emails, usernames, password1, password2;
    var mensagem_erro = document.getElementById("mensagem_erro");

    mensagem_erro.style.padding = "10px";

    emails = document.forms["form-signup"]["inputEmail"].value;
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

    usernames = document.forms["form-signup"]["inputUsername"].value;
    if (usernames == ""){

        mensagem_erro.innerHTML="Insira um username";
        return false;
    }else{
        if(usernames.indexOf(" ") >= 0){

            mensagem_erro.innerHTML="O username n\u00e3o pode ter espaços";
            return false;
        }

    }

    if(usernames.length < 6){

        mensagem_erro.innerHTML="O username n\u00e3o pode ter menos de 6 caracteres";
        return false;
    }else{
        if(usernames.length > 25){

        mensagem_erro.innerHTML="O username n\u00e3o pode exceder os 25 caracteres";
        return false;
        }
    }

    password1 = document.forms["form-signup"]["inputPassword"].value;
    if(password1 == ""){

        mensagem_erro.innerHTML= "Insira uma password";
        return false;
    }

    /*if(password1.length > 55){

        mensagem_erro.innerHTML="A password n\u00e3o pode ter mais que 55 caracteres";
        return false;
    }*/

    if(password1.length < 6){

        mensagem_erro.innerHTML="A password n\u00e3o pode ter menos de 6 caracteres";
        return false;
    }



    password2 = document.forms["form-signup"]["inputPassword2"].value;
    if(password2 != password1){

        mensagem_erro.innerHTML="As passwords t\u00eam que ser iguais!";
        return false;
    }

  }
  
  function trigger(){
    const indicador = document.querySelector(".indicador_forca");
    const input = document.querySelector('input[name="password_1"]');
    const fraco = document.querySelector(".fraco");
    const medio = document.querySelector(".medio");
    const forte = document.querySelector(".forte");
    const text = document.querySelector(".text");
    
    let mFraco = /[a-z]/;
    let mMedio = /\d+/;
    let mForte = /.*[!@#$%^&*()?_~-]/;
    let nivel = 0;

      if(input.value != ""){
          indicador.style.display = "block";
          indicador.style.display = "flex";
  
          if(input.value.match(mFraco) || 
             input.value.match(mMedio) || 
             input.value.match(mForte))
              nivel =1;
  
          if( ((input.value.match(mFraco) && input.value.match(mMedio)) || 
              (input.value.match(mMedio) && input.value.match(mForte))|| 
              (input.value.match(mFraco) && input.value.match(mForte))))
              nivel =2;
  
          if( input.value.match(mFraco) &&
              input.value.match(mMedio) &&
              input.value.match(mFraco))
              nivel =3;
  
          if(nivel ==1){
              fraco.classList.add("active");
              text.style.display = "block";
              text.textContent = "A password é muito fraca";
              text.classList.add("fraco");
          }
  
          if(nivel ==2){
              medio.classList.add("active");
              text.textContent = "A password é media";
              text.classList.add("medio");
          }else{
              medio.classList.remove("active");
              text.classList.remove("medio");
          }
  
          if(nivel ==3){
              medio.classList.add("active");
              forte.classList.add("active");
              text.textContent = "A password é forte";
              text.classList.add("forte");
          }else{
              forte.classList.remove("active");
              text.classList.remove("forte");
          }
  
      } else {
          indicador.style.display = "none";
          text.style.display = "none";
      }
  }