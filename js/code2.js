function validacionForm() {
    // variables 
    var email=document.getElementById('email').value;
    // alert(email);
    var nombre=document.getElementById('nombre').value;
    var dni=document.getElementById('dni').value;
    // alert(dni);
    var apellido=document.getElementById('apellido').value;
    var apellido2=document.getElementById('apellido2').value;
    var fecha=document.getElementById('fecha').value;
    if (dni=='') {
        document.getElementById("dni").style.border = "thick solid #FF0000";
    }
    if (nombre=='') {
        document.getElementById("nombre").style.border = "thick solid #FF0000";
    }
    if (apellido=='') {
        document.getElementById("apellido").style.border = "thick solid #FF0000";
    }
    if (apellido2=='') {
        document.getElementById("apellido2").style.border = "thick solid #FF0000";
    }
    if (email=='') {
        document.getElementById("email").style.border = "thick solid #FF0000";
    }
    if (fecha=='') {
        document.getElementById("fecha").style.border = "thick solid #FF0000";
    }

    if (dni!='') {
        document.getElementById("dni").style.border = "white";
    }
    if (nombre!='') {
        document.getElementById("nombre").style.border = "white";
    }
    if (apellido!='') {
        document.getElementById("apellido").style.border = "white";
    }
    if (apellido2!='') {
        document.getElementById("apellido2").style.border = "white";
    }
    if (email!='') {
        document.getElementById("email").style.border = "white";
    }
    if (fecha!='') {
        document.getElementById("fecha").style.border = "white";
    }

    if (dni=='' || nombre=='' || apellido=='' || apellido2=='' || email=='' || fecha=='') {
        document.getElementById('message').innerHTML='<p style="color:red">Rellene los campos obligatorios.</p>';
        return false
    }else {
        validarDNI();
        // var contenido = document.getElementById('form');
        // var enlace = document.getElementById('ins');

        // if (contenido.style.display=="" || contenido.style.display=="block" ) {
        //     contenido.style.display="none";
        //     // enlace.innerHTML="Mostrar Contenido";
        //     document.getElementById("resultado").innerHTML="Datos Correcto";
        //     // document.getElementById("form").style.display='none';
        //     // document.getElementById("form").innerHTML='<p>DATOS CORRECTOS</p>';
        //     document.getElementById("result2").innerHTML+='<a class="btn btn-primary" href="../index.php">Inicio</a>';
        //     return true;

        // }else {
        //     contenido.style.display="block";
        //     // enlace.innerHTML="Ocultar Contenido";
        // }
        
        return true;
    }

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
            document.getElementById("message").style.color="red"
            document.getElementById("message").innerHTML="La letra del NIF está mal";
            return false
        }
    }else {
        document.getElementById("message").style.color="red";
        document.getElementById("message").innerHTML="ERROR el DNI debe acabar con letra";
        return false
    }
}
