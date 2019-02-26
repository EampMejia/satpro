//ENABLE OR DISABLE CABLE INPUTS FOR INTERNET ORDERS
function ordenInternet(){
    var inputsCable = document.getElementsByClassName("cable");
    if (inputsCable[0].disabled == true) {
        document.getElementById("btn-internet").style.color="#333333";
        for (var i = 0; i < inputsCable.length; i++) {
            inputsCable[i].disabled = false;
        }
    }
    else {
        document.getElementById("btn-internet").style.color="#039BE5";
        for (var i = 0; i < inputsCable.length; i++) {
            inputsCable[i].disabled = true;
        }
    }

}

//ENABLE OR DISABLE INTERNET INPUTS FOR CABLE ORDERS
function ordenCable(){
    var inputsInternet = document.getElementsByClassName("internet");
    if (inputsInternet[0].disabled == true) {
        document.getElementById("btn-cable").style.color="#333333";
        for (var i = 0; i < inputsInternet.length; i++) {
            inputsInternet[i].disabled = false;
        }
    }
    else {
        document.getElementById("btn-cable").style.color="#4CAF50";
        for (var i = 0; i < inputsInternet.length; i++) {
            inputsInternet[i].disabled = true;
        }
    }

}

// CHANGE FORM COMPORT
function nuevaOrden(){
    var clearInputs = document.getElementsByClassName("input-sm");
    for (var i = 0; i < clearInputs.length; i++) {
        clearInputs[i].value = "";
        clearInputs[i].readOnly = false;
        clearInputs[i].disabled = false;
    }
    changeAction("nueva");
}
function editarOrden(){
    var editInputs = document.getElementsByClassName("input-sm");
    for (var i = 0; i < editInputs.length; i++) {
        editInputs[i].readOnly = false;
        editInputs[i].disabled = false;
    }
    changeAction("editar");
}

function changeAction(action){
    switch (action) {
        case "nueva":
            document.getElementById("ordenesTrabajo").action = "php/nuevaOrden.php";
            break;
        case "editar":
            document.getElementById("ordenesTrabajo").action = "php/editarOrden.php";
            break;
        default:

    }
}
