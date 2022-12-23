<?php

require_once 'php_action/db_connect.php';

function clear($input) {
    global $connect;
    // sql injection
    $var = mysqli_escape_string($connect, $input);
    // xss
    $var = htmlspecialchars($var);
    return $var;
}

    $nome = "abc";

    // echo clear($nome);

    clear($nome);

    $nomeFil = preg_match('/^[a-zA-Záàâãéèêíïóôõöúçñ]*$/', $nome);

    var_dump($nomeFil);
    var_dump($nome);

    if($nomeFil == 1) {
        echo $nome;
    }