//arreglo que contiene las respuestas 
let correctas = [3,1,2,2,3];

//arreglo que contiene las respuestas del usuario
let opcion_elegida = [];
    let cantidad_correctas = 0; 

//funcion que toma el num de pregunta y el input elegido de esa
function respuesta(num_pregunta, seleccionada) {
    //guardo la respuesta elegida
    opcion_elegida[num_pregunta] = seleccionada.value;

    //el siguiente codigo es para poner en blaco el fondo de los inputs para cuando elige otra opcion 
    //armo el id para seleccionar el section correspondiente
    id="p" + num_pregunta;

    if(!toggleDarkModeButton()) {
    labels = document.getElementById(id).childNodes;
    labels[3].style.backgroundColor = "white"; 
    labels[5].style.backgroundColor = "white"; 
    labels[7].style.backgroundColor = "white"; 
    }

    //doy el color al label seleccionado 
    seleccionada.parentNode.style.backgroundColor = "#cec0fc";
} 

//funcion que compara los arreglos para saber cuantas estuvieron correctas 
function corregir() {
     cantidad_correctas = 0;
     for(i=0; i < correctas.length; i++){
        if(correctas[i]==opcion_elegida[i]){
            cantidad_correctas++;
        }
     }
     document.getElementById("resultado").innerHTML = cantidad_correctas;
};


/**Temporizador */
document.addEventListener("DOMContentLoaded", function () {
    const timerElement = document.getElementById("timer");
    const modal = document.getElementById("myModal");
    const closeModal = document.getElementsByClassName("close")[0];
    const startButton = document.getElementById("startButton");
    const boton = document.getElementById("btnForm");

    let timeLeft = 30;
    let timerInterval;

    function updateTimer() {
        if (timeLeft > 0) {
            timeLeft--;
            timerElement.textContent = timeLeft;
        } else {
            clearInterval(timerInterval);
            modal.style.display = "block";
        }
    }

    closeModal.onclick = function () {
        modal.style.display = "none";
    };

    startButton.onclick = function () {
        timerInterval = setInterval(updateTimer, 1000);
        startButton.disabled = true;
    };
});


/**Modo oscuro */
document.addEventListener("DOMContentLoaded", function () {
    const toggleDarkModeButton = document.getElementById("toggleDarkMode");
    const body = document.body;
    const timerElement = document.getElementById("timer"); 

    toggleDarkModeButton.addEventListener("click", function () {
        body.classList.toggle("dark-mode");
        timerElement.classList.toggle("timer-dark"); 
    });
});



