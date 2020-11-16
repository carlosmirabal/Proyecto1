function validarForm() {
    // alert('hola')
    var inputs = document.getElementsByTagName("input");
    for (let i = 0; i < inputs.length; i++) {
        // console.log(inputs[i].type);
        if (inputs[i].type=='text' && inputs[i].value=='') {
            inputs[i].style.borderColor='red';
        }else if (inputs[i].type=='email' && inputs[i].value=='') {
            inputs[i].style.borderColor='red';
        }else if (inputs[i].type=='date' && inputs[i].value==''){
            inputs[i].style.borderColor='red';
        }else {
            inputs[i].style.borderColor='white';
        }
    }
    validarDNI();
    return false;
}

function validarDNI() {
      // Validar DNI/NIE
    var dniNie = document.getElementById('dni').value;
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    // var let = prompt("Introduce la letra de tu NIE/DNi");
    var semaforoNIE=false;
    // Solución
    //NIE con letra
    //Pregunto si el primer caracter es una letra
    if (isNaN(parseInt(dniNie.substr(0,1)))) {
        if ("XYZ".indexOf(dniNie.substr(0,1))!=-1) {
            //tengo un NIE con inicio valido
            var solonum="XYZ".indexOf(dniNie.substr(0,1))+dniNie.substr(1,7);
            // alert("El NIE es valido");
            // alert(solonum);
            return true
        }else {
            alert("El NIE no es valido");
            document.getElementById("message").innerHTML="El NIE no es valido";
            return false
        }
    }
    //pregunto si el ultimo caracter es una letra
    if (isNaN(parseInt(dniNie.substr(-1,1)))) {
        if (letras[dniNie.substr(0,8)%23] === dniNie.substr(-1,1)) {
            // alert("NIF correcto");
            // document.getElementById("message").innerHTML="NIF Correcto";
            // document.getElementById("form").style.display='none';
            // document.getElementById("form").innerHTML='<p>DATOS CORRECTOS</p>';
            // document.getElementById("form").innerHTML+='<a href="../index.php">';
            return true;
        }else{
            // alert("La letra del NIF está mal")
            document.getElementById("message").innerHTML="La letra del NIF está mal";
            return false
        }
    }else {
        document.getElementById("message").innerHTML="ERROR debe acabar con letra";
        return false
    }
}

