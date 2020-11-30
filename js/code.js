window.onload = function() {
    document.getElementById('dni').addEventListener("focusout", validarDNI);
    document.getElementById('fecha').addEventListener("focusout", categoria);
    document.getElementById('form').addEventListener('submit', validarForm)
        //document.getElementById('form').addEventListener('submit', validarForm);
}

function validarForm(event) {
    // alert('hola')
    var inputs = document.getElementsByTagName("input");
    var vali = true;
    for (let i = 0; i < inputs.length; i++) {
        // console.log(inputs[i].type);
        if (inputs[i].type == 'text' && inputs[i].value == '') {
            inputs[i].style.border = 'solid red 3px';
            document.getElementById("message").innerHTML = "Rellene los campos vacios";
            document.getElementById("message").style.color = "red";
            vali = false;
        } else if (inputs[i].type == 'email' && inputs[i].value == '') {
            inputs[i].style.border = 'solid red 3px';
            document.getElementById("message").innerHTML = "Rellene los campos vacios";
            document.getElementById("message").style.color = "red";
            vali = false;
        } else if (inputs[i].type == 'date' && inputs[i].value == '') {
            inputs[i].style.border = 'solid red 3px';
            document.getElementById("message").innerHTML = "Rellene los campos vacios";

            vali = false;
        } else {
            inputs[i].style.borderColor = 'white';
            document.getElementById("message").innerHTML = "";
            // vali=true;
        }
    }
    // validarDNI();
    // event.preventDefault()
    if (!validarDNI() || !vali) {
        event.preventDefault()
    }
    //     if (vali==true) {
    //         validarDNI();
    //         // alert('Es verdadero');
    //         return true;
    //     }else{
    //         validarDNI();
    //         // alert('Es falso');
    //         return false;
    //     }
}

function validarDNI() {
    // Validar DNI/NIE
    var vali = true;
    var dniNie = document.getElementById('dni').value;
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    // var let = prompt("Introduce la letra de tu NIE/DNi");
    var semaforoNIE = false;
    // Solución
    //NIE con letra
    //Pregunto si el primer caracter es una letra
    if (isNaN(parseInt(dniNie.substr(0, 1)))) {
        if ("XYZ".indexOf(dniNie.substr(0, 1)) != -1) {
            //tengo un NIE con inicio valido
            var solonum = "XYZ".indexOf(dniNie.substr(0, 1)) + dniNie.substr(1, 7);
            // alert("El NIE es valido");
            // alert(solonum);
            return true
        } else {
            // alert("El NIE no es valido");
            // document.getElementById("message").innerHTML="El NIE no es valido";
            // document.getElementById("message").style.color="red";
            dni.style.border = "solid red 3px";
            return false
        }
    }
    //pregunto si el ultimo caracter es una letra
    if (isNaN(parseInt(dniNie.substr(-1, 1)))) {
        if (letras[dniNie.substr(0, 8) % 23] === dniNie.substr(-1, 1)) {
            // alert("NIF correcto");
            // document.getElementById("message").innerHTML="NIF Correcto";    
            document.getElementById("message2").innerHTML = "";
            dni.style.border = "solid green 3px";
            // return true;

        } else {
            // alert("La letra del NIF está mal")
            document.getElementById("message2").innerHTML = "La letra del NIF está mal";
            document.getElementById("message2").style.color = "red";
            dni.style.border = "solid red 3px";
            // return false;
            vali = false;
        }
    } else {
        document.getElementById("message2").innerHTML = "ERROR el NIF debe acabar con letra";
        document.getElementById("message2").style.color = "red";
        dni.style.border = "solid red 3px";
        // return false;
        vali = false;
    }
    return vali;
}

function categoria(event) {
    var nacimiento = document.getElementById('fecha').value;
    var nac = new Date(nacimiento);
    // var msg = document.getElementById('nac');
    var fecha = new Date();

    var actual = fecha.getFullYear();
    var fechaAct = nac.getFullYear();

    var result = actual - fechaAct;

    if (result >= 8 && result <= 12) {
        document.getElementById("nac").innerHTML = "Categoria INFANTIL";
        document.getElementById("nac").style.color = "blue";
    } else if (result >= 13 && result <= 17) {
        document.getElementById("nac").innerHTML = "Categoria JUNIOR";
        document.getElementById("nac").style.color = "blue";
    } else if (result >= 18 && result <= 35) {
        document.getElementById("nac").innerHTML = "Categoria SENIOR";
        document.getElementById("nac").style.color = "blue";
    } else if (result >= 36) {
        document.getElementById("nac").innerHTML = "Categoria VETERANO";
        document.getElementById("nac").style.color = "blue";
    } else if (result < 8) {
        document.getElementById("nac").innerHTML = "No tiene edad para participar en ninguna categoria";
        document.getElementById("nac").style.color = "red";
        // event.preventDefault();
        // return false;
    }
    // si la fecha de nacimiento es inferior a 30 de nov. 2020 va a indicarnos que somos viejos


}