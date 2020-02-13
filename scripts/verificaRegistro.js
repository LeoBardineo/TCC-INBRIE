function validaFormRegistro(form){
    var userName = formRegistro.userName.value.trim();
    var userEmail = formRegistro.userEmail.value.trim();
    var userPass = formRegistro.userPass.value.trim();
    var confirmPass = formRegistro.confirmPass.value.trim();
    var errorMessage = 'Erros:';
    var error = false;

    if(userName == "" || userName == null){
        var errorMessage = errorMessage + ' Nome de usuário vazio.';
        formRegistro.userName.focus();
        var error = true;
    }
    
    if(userName.length < 4){
        var errorMessage = errorMessage + ' Nome de usuário muito pequeno.';
        formRegistro.userName.focus();
        var error = true;
    }

    if(userName.length > 32){
        var errorMessage = errorMessage + ' Nome de usuário muito grande.';
        formRegistro.userName.focus();
        var error = true;
    }

    if(userEmail == "" || userEmail == null || userEmail.indexOf("@") == -1 || userEmail.indexOf(".") == -1){
        var errorMessage = errorMessage + ' Email vazio ou inválido.';
        formRegistro.userEmail.focus();
        var error = true;
    }
    
    if(userEmail.length < 8){
        var errorMessage = errorMessage + ' Email muito pequeno.';
        formRegistro.userEmail.focus();
        var error = true;
    }

    if(userEmail.length > 64){
        var errorMessage = errorMessage + ' Email muito grande.';
        formRegistro.userEmail.focus();
        var error = true;
    }

    if(userPass == "" || userPass == null){
        var errorMessage = errorMessage + ' Senha vazia.';
        formRegistro.userPass.focus();
        var error = true;
    }

    if(userPass.length < 4){
        var errorMessage = errorMessage + ' Senha muito pequena.';
        formRegistro.userPass.focus();
        var error = true;
    }

    if(userPass.length > 32){
        var errorMessage = errorMessage + ' Senha muito grande.';
        formRegistro.userPass.focus();
        var error = true;
    }

    if(confirmPass != userPass){
        var errorMessage = errorMessage + ' Senhas não compatíveis.';
        formRegistro.confirmPass.focus();
        var error = true;
    }

    if(error == true){

        var toBeAppend = document.getElementById("toAppend");

        var template = `
        <div class="msg-box">
            <div class="icon-box error-box">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="text-box error-box">
                <h1>Erro na validação</h1>
                <h2>${errorMessage}</h2>
            </div>
        </div>
        `;
        toBeAppend.innerHTML = template;

        return false;
    }else{
        var error = false;
        return true;
    }
}