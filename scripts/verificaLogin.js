function validaFormLogin(form) {
    var userEmail = formLogin.userEmail.value.trim();
    var userPass = formLogin.userPass.value.trim();
    var errorMessage = "Erros:";
    var error = false;

    if(userEmail == "" || userEmail == null){
        var errorMessage = errorMessage + ' Nome de usuário vazio.';
        formLogin.userEmail.focus();
        var error = true;
    }

    if(userPass == "" || userPass == null){
        var errorMessage = errorMessage + ' Senha vazia.';
        formLogin.userPass.focus();
        var error = true;
    }

    if(error == true){
        var toBeAppend = document.getElementById("toAppend");

        var containermsg = document.createElement('div');
        containermsg.classList.add('msg-box');
        var containericon = document.createElement('div');
        containericon.classList.add('icon-box');
        containericon.classList.add('error-box');
        var icon = document.createElement('i');
        icon.classList.add('fas');
        icon.classList.add('fa-exclamation-triangle');
        var containertext = document.createElement('div');
        containertext.classList.add('text-box');
        containertext.classList.add('error-box');
        var h1element = document.createElement('h1')
        var h2element = document.createElement('h2')
        var h1text = document.createTextNode('Erro na validação');
        var h2text = document.createTextNode(errorMessage)

        h1element.appendChild(h1text);
        h2element.appendChild(h2text);
        containertext.appendChild(h1element);
        containertext.appendChild(h2element);
        containericon.appendChild(icon);
        containermsg.appendChild(containericon);
        containermsg.appendChild(containertext);

        toBeAppend.appendChild(containermsg);
        return false;
    }else{
        var error = false;
        return true;
    }
}