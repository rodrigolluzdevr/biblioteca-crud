<?php
session_start();
ob_start();
include_once './conexao.php';

$cod = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT);
var_dump($cod);

if(empty($cod)) {
    $_SESSION['msg'] = "<p style='color:red;' class='font-weight-bold font-italic font-monospace'> Cadastro não encontrado!</p>";
    header("Location: exibe.php");
}

$query_cadastro = "SELECT cod FROM cadastro WHERE cod = $cod LIMIT 1";
$result_cadastro = $coon->prepare($query_cadastro);
$result_cadastro->execute();

if(($result_cadastro) AND ($result_cadastro->rowCount() != 0)) {
    $query_del_cadastro = "DELETE FROM cadastro WHERE cod = $cod";
    $deletar_cadastro = $coon->prepare($query_del_cadastro);
    $deletar_cadastro->execute();

    if($deletar_cadastro->execute()) {
        $_SESSION['msg'] = "<p style='color:green;' class='font-weight-bold font-italic font-monospace'> Cadastro apagado com sucesso</p>";
        header("Location: exibe.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red;' class='font-weight-bold font-italic font-monospace'> Cadastro não foi apagado!</p>";
        header("Location: exibe.php");
    }

} else {
    $_SESSION['msg'] = "<p style='color:red;' class='font-weight-bold font-italic font-monospace'> Cadastro não encontrado!</p>";
    header("Location: exibe.php");
} 