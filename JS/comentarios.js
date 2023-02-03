function validarComentario(){
    
    var textarea;
    var mensagem_erro = document.getElementById("mensagem_erro");

    mensagem_erro.style.padding = "10px";

    textarea = document.forms["form-comentarios"]["textarea"].value;
    if (textarea == ""){
        mensagem_erro.innerHTML = "Não pode fazer comentários em branco";
        return false;
    }

    
}
