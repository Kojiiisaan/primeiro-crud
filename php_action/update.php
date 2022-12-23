<?php
session_start();
require_once 'db_connect.php';

function clear($input) { // clear
    global $connect;
    // sql injection
    $var = mysqli_escape_string($connect, $input);
    // xss
    $var = htmlspecialchars($var);
    return $var;
}

$filtro = "/^[a-záàâãéèêíïóôõöúçñ]+( [a-záàâãéèêíïóôõöúçñ]+)*+$/i";

if(isset($_POST['btn-edit'])){
    $nome = clear($_POST['nome']);
    $idade = clear($_POST['idade']);
    $comida = clear($_POST['comida']);
    $sexo = clear($_POST['sexo']);

    $nomeFiltro = preg_match($filtro, $nome);
    $comidaFiltro = preg_match($filtro, $comida);
    $sexoFiltro = filter_input(INPUT_POST, 'sexo', FILTER_VALIDATE_INT);
    $id = mysqli_escape_string($connect, $_POST['id']);

    $year = intval(date('Y'));
    $idadeAno = intval($idade);
    $calcAno = $year - $idadeAno;

    if($nomeFiltro == 1 && $comidaFiltro == 1 && $calcAno >= 0){

        $sql = "UPDATE tb_crud SET nome = '$nome', sexo = '$sexo', idade = '$idade', comida = '$comida' WHERE id = '$id'";

        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = "Editado com Sucesso!"; 
            header('Location: ../index.php');
        } else {
            $_SESSION['mensagem'] = "Erro no Insert :(";
            header('Location: ../edit.php');
        }

    } else {
        $_SESSION['mensagem'] = "Erro no Update :(";
        header('Location: ../index.php');
    }
}