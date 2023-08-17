<?php
session_start();

$retorno = null;
$correctas = array(3,1,2,2,3);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(!isset($_POST["p0"]) || !isset($_POST["p1"]) || !isset($_POST["p2"]) || !isset($_POST["p3"]) || !isset($_POST["p4"])){
        $retorno = '<h2>Rellenar todos los campos</h2>';
    }else{
        
        $questions = array(
            $_POST["p0"],
            $_POST["p1"],
            $_POST["p2"],
            $_POST["p3"],
            $_POST["p4"]
        );

        $_SESSION["answer"] = $questions;  

    }
}

function validateAnswer($x) {
    $value = null;
    if($_SESSION["answer"][$x-1] == $GLOBALS['correctas'][$x-1]){
        $value = '<span style="color: green;">Correcto</span>';
    }else{
        $value = '<span style="color: red;">Incorrecto</span>';
    }
    
    return $value;
}

function contAnswer() {
    $answerCorrect = 0;
    $retorno = '<h2>Cantidad Acertada: <span id="resultado">' . $answerCorrect . ' / 5</span></h2>';
    for ($x = 0; $x < count($_SESSION["answer"]); $x++) {
        if($_SESSION["answer"][$x] == $GLOBALS['correctas'][$x]){
            $answerCorrect = $answerCorrect + 1;
            $retorno = '<h2>Cantidad Acertada: <span id="resultado">' . $answerCorrect . ' / 5</span></h2>';
        }
    }

    return $retorno;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["destroy"]) && $_GET["destroy"] == "true") {
    session_destroy();
    header("Location: ./index.php");
    die();
}

    require './view/home.php';
?>
