function verifyInputs() {

    let inputNome = document.getElementById("nome");
    let inputSenha = document.getElementById("senha");
    let isValid = false;

    //Nome
    if ( inputNome.value.length == "" ) {

        isValid = false;
        inputNome.classList.add("inputError");

    } else {

        isValid = true;
        inputNome.classList.remove("inputError");
    };
    //Senha
    if ( inputSenha.value.length == "" ) {

        isValid = false;
        inputSenha.classList.add("inputError");

    } else {

        isValid = true;
        inputSenha.classList.remove("inputError");
    };

    if ( !isValid ) {

        event.preventDefault();
        return;
    };

    return isValid;

};
