window.onload = function() {
    document.getElementById('add-input').addEventListener("click", addInput);
    document.getElementById('del-input').addEventListener("click", delInput);
    document.getElementById('dni').addEventListener("focusout", validarDNI);
    document.getElementById('nac').addEventListener("focusout", categoria)
        //document.getElementById('form').addEventListener('submit', validarForm);
}

/* addInput */
function addInput(event) {

    if (document.getElementsByClassName('num').length != 10) {
        var numAux = 'valor-' + (document.getElementsByClassName('num').length + 1);
        var div = document.createElement('div');
        var label = document.createElement('label');
        var input = document.createElement('input');

        div.setAttribute('class', 'input')

        /* label */
        label.setAttribute('for', numAux)
        label.innerHTML = 'Valor ' + (document.getElementsByClassName('num').length + 1) + ': ';

        /* input */
        input.setAttribute('type', 'number');
        input.setAttribute('name', numAux);
        input.setAttribute('id', numAux);
        input.setAttribute('class', 'num');

        /* anidamos etiquetas */
        div.appendChild(label)
        div.appendChild(input)

        //div.innerHTML = '<label for="">Valor ' + inputs + ':</label> <input type="number" name="valor-' + inputs + '" id="valor-' + inputs + '" class="num">';
        document.getElementById('values').appendChild(div);
    }
    event.preventDefault();
}


/* delInput 
var x = document.getElementById("myList").lastChild.innerHTML;*/
function delInput(event) {
    if (document.getElementsByClassName('num').length != 2) {
        var inputList = document.getElementsByClassName('input');
        console.log('tamaño del vector: ' + inputList.length);
        // inputList=[0, 1, 2] tamaño 3
        // inputList[2]
        inputList[(inputList.length - 1)].remove();
    }
    event.preventDefault();
}

/* validarForm: mirar si hay campos vacios */

/* validarDNI */
function validarDNI() {

    var dni = document.getElementById('dni');
    if (dni.value.length == 9) {
        //console.log('DNI válido');
        dni.style.border = "solid green 5px";
    } else {
        dni.style.border = "solid red 5px";
    }

}
/* Mostrar categoría a partir de la fecha de nacimiento */
// function categoria() {
//     var nacimiento = document.getElementById('nac').value;
//     var nac = new Date(nacimiento);
//     var msg = document.getElementById('msg');
//     var fecha = new Date();

//     console.log(nac);
//     console.log(fecha);

//     // si la fecha de nacimiento es inferior a 30 de nov. 2020 va a indicarnos que somos viejos
//     if (nac < fecha) {
//         msg.innerHTML = 'somos viejos';
//     }

// }