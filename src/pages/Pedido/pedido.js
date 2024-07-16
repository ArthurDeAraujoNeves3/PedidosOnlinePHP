const button = document.getElementById("buttonForm");

function verifyInputs() {

    const inputName = document.getElementById("nome");
    const inputAddress = document.getElementById("endereco");
    const inputPhone = document.getElementById("numero");
    const inputOrder = document.getElementById("pedido");
    let isValid = false;

    //Name
    if ( inputName.value === "" ) {

        inputName.classList.add("inputError");
        isValid = false;
        
    } else if ( inputName.value.length >= 45 ) {

        inputName.classList.add("inputError");
        isValid = false;
    } else {

        inputName.classList.remove("inputError");
        isValid = true;

    };

    //Address
    if ( inputAddress.value === "" ) {

        inputAddress.classList.add("inputError");
        isValid = false;
    } else if ( inputAddress.value.length >= 110 ) {

        inputAddress.classList.add("inputError");
        isValid = false;
    } else {

        inputAddress.classList.remove("inputError");
        isValid = true;

    };

    //Phone
    if ( inputPhone.value === "" ) {

        inputPhone.classList.add("inputError");
        isValid = false;
    } else if ( inputPhone.value.length >= 110 ) {

        inputPhone.classList.add("inputError");
        isValid = false;
    } else {

        inputPhone.classList.remove("inputError");
        isValid = true;

    };

    //Order
    if ( inputOrder.value === "Escolha o seu pedido" ) {

        inputOrder.classList.add("selectError");
        isValid = false;
    } else if ( inputOrder.value.length >= 110 ) {

        inputOrder.classList.add("selectError");
        isValid = false;
    } else {

        inputOrder.classList.remove("selectError");
        isValid = true;

    };

    //Se retornar como false, o submit não é enviado, e o php não irá rodar
    if ( !isValid ) {

        event.preventDefault();
        return;
    } 
    
    return false; 

};
