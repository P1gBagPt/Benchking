function validar(){

    var username, passwords;
    var mensagem_erro = document.getElementById("mensagem_erro");
  
    mensagem_erro.style.padding = "10px";
    
    username = document.forms["form-signin"]["inputEmail"].value;
  
    if (username == ""){
  
      mensagem_erro.innerHTML = "Insira o username";
      return false;
    }
  
    passwords = document.forms["form-signin"]["inputPassword"].value;
  
    if(passwords == ""){
  
      mensagem_erro.innerHTML = "Insira um password";
      return false;
    }
  
  }