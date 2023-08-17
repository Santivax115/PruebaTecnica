<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuestionario </title>
    <!--CSS-->
    <link rel="stylesheet" href="CSS/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header class="header">
        <h1>¿Que Tanto Sabes?</h1>
    </header>

    <!--temporizador-->
    <div style="<?php if (isset($_SESSION['answer'])) {echo 'display: none;'; } ?>" class="timer-container">
        <center>
            <h2>Cuentas con 30 segundos para demostrar todo lo que sabes, ¡Vamos!</h2>
            <div class="timer" id="timer">30</div>
            <button class="button-start" id="startButton">Empecemos</button>
        </center>
    </div>
    <!--MODAL-->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>¡El Tiempo a Finalizado!</p>
        </div>
    </div>


    <!--Formulario-->
    <form action="./index.php" method="post">
        <div class="container">
            <section id="p0">
                <h3> 1- ¿cuál es la capital de Italia?</h3>
                <label>
                    <input type="radio" value="1" name="p0" onclick="respuesta(0,this)"> Turín<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][0] == 1) {echo validateAnswer(1); } ?>
                </label>
                <label>
                    <input type="radio" value="2" name="p0" onclick="respuesta(0,this)"> Nápoles<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][0] == 2) {echo validateAnswer(1); } ?>
                </label>
                <label style="<?php if (isset($_SESSION['answer'])) {echo 'background: rgb(104, 175, 104, 0.4);';} ?>">
                    <input type="radio" value="3" name="p0" onclick="respuesta(0,this)"> Roma <?php if (isset($_SESSION['answer']) && $_SESSION['answer'][0] == 3) {echo validateAnswer(1); } ?>
                </label>
            </section>
            <section id="p1">
                <h3> 2- ¿Cuál es la capital de Noruega?</h3>
                <label style="<?php if (isset($_SESSION['answer'])) {echo 'background: rgb(104, 175, 104, 0.4);';} ?>">
                    <input type="radio" value="1" name="p1" onclick="respuesta(1,this)"> Oslo<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][1] == 1) {echo validateAnswer(2); } ?>
                </label>
                <label>
                    <input type="radio" value="2" name="p1" onclick="respuesta(1,this)"> Bucarest<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][1] == 2) {echo validateAnswer(2); } ?>
                </label>
                <label>
                    <input type="radio" value="3" name="p1" onclick="respuesta(1,this)"> Madrid <?php if (isset($_SESSION['answer']) && $_SESSION['answer'][1] == 3) {echo validateAnswer(2); } ?>
                </label>
            </section>
            <section id="p2">
                <h3> 3- ¿cuál es la capital de Perú? </h3>
                <label>
                    <input type="radio" value="1" name="p2" onclick="respuesta(2,this)"> La Paz<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][2] == 1) {echo validateAnswer(3); } ?>
                </label>
                <label style="<?php if (isset($_SESSION['answer'])) {echo 'background: rgb(104, 175, 104, 0.4);';} ?>">
                    <input type="radio" value="2" name="p2" onclick="respuesta(2,this)"> Ciudad de Perú<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][2] == 2) {echo validateAnswer(3); } ?>
                </label>
                <label>
                    <input type="radio" value="3" name="p2" onclick="respuesta(2,this)"> Lima<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][2] == 3) {echo validateAnswer(3); } ?>
                </label>
            </section>
            <section id="p3">
                <h3> 4- ¿cuál es la capital de Suecia?</h3>
                <label>
                    <input type="radio" value="1" name="p3" onclick="respuesta(3,this)"> Gotemburgo<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][3] == 1) {echo validateAnswer(4); } ?>
                </label>
                <label style="<?php if (isset($_SESSION['answer'])) {echo 'background: rgb(104, 175, 104, 0.4);';} ?>">
                    <input type="radio" value="2" name="p3" onclick="respuesta(3,this)"> Estocolmo<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][3] == 2) {echo validateAnswer(4); } ?>
                </label>
                <label>
                    <input type="radio" value="3" name="p3" onclick="respuesta(3,this)"> Lund<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][3] == 3) {echo validateAnswer(4); } ?>
                </label>
            </section>
            <section id="p4">
                <h3> 5- ¿cuál es la capital de Canadá? </h3>
                <label>
                    <input type="radio" value="1" name="p4" onclick="respuesta(4,this)"> Canberra<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][4] == 1) {echo validateAnswer(5); } ?>
                </label>
                <label>
                    <input type="radio" value="2" name="p4" onclick="respuesta(4,this)"> Toronto<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][4] == 2) {echo validateAnswer(5); } ?>
                </label>
                <label style="<?php if (isset($_SESSION['answer'])) {echo 'background: rgb(104, 175, 104, 0.4);';} ?>">
                    <input type="radio" value="3" name="p4" onclick="respuesta(4,this)"> Ottawa<?php if (isset($_SESSION['answer']) && $_SESSION['answer'][4] == 3) {echo validateAnswer(5); } ?>
                </label>
            </section>

            <button  id="btnForm" <?php if (isset($_SESSION['answer'])) {echo 'disabled';} ?>>VERIFICAR</button>
            <?php if (isset($_SESSION['answer'])) {echo contAnswer();}else{echo $retorno;} ?>

            <!-- <button id="toggleDarkMode">Toggle Dark Mode</button> -->
        </div>
    </form>
    <button id="toggleDarkMode" class="dark-mode-button">
        <i class="fas fa-moon"></i> <!-- Icono de luna de Font Awesome -->
    </button>

    <button id="btnRetry"  style="<?php if (isset($_SESSION['answer'])) {echo 'display: block;'; } ?>">
        <a href="?destroy=true">Reintentar</a> <!-- Icono de luna de Font Awesome -->
    </button>

    <!--JS-->
    <script src="JS/app.js"></script>
</body>

</html>