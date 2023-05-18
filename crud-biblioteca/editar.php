<?php
session_start();
ob_start();
include_once './conexao.php';
$cod = filter_input(INPUT_GET, "cod", FILTER_SANITIZE_NUMBER_INT);

if(empty($cod)) {
    $_SESSION['msg'] = "<p style='color:red;'>Cadastro não encontrado!</p>";
    header("Location: exibe.php");
}

$query_cadastro = "SELECT cod, autor, livro FROM cadastro WHERE cod = $cod LIMIT 1";
$result_cadastro = $coon->prepare($query_cadastro);
$result_cadastro->execute();

if (($query_cadastro) AND ($result_cadastro->rowCount() != 0)) {
    $row_cadastro = $result_cadastro->fetch(PDO::FETCH_ASSOC);
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Cadastro não encontrado!</p>";
    header("Location: exibe.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>.no-underline:hover {text-decoration: none;}</style>
    <title> Editar </title>
</head>
    <body class="ml-2 g-3">
        <div class="mb-4 mt-4 text-secondary">
            <h2 class='font-monospace font-weight-bold font-italic'>Editar</h2>
        </div>
        
        <?php

        //Receber os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        // Verificar se o usuário clicou no botão
        if(!empty($dados['Editcadastro'])) {
            $empty_input = false;
            $dados = array_map('trim', $dados);
            if(in_array("", $dados)) {
                $empty_input = true;
                echo "<p style='color:red;' class='font-weight-bold font-italic'>Erro: Necessário preencher todos os campos!</p>";
            }

            if(!$empty_input) {
                $query_cadastro = "UPDATE cadastro SET autor=:autor, livro=:livro WHERE cod=:cod";
                $edit_cadastro = $coon->prepare($query_cadastro);
                $edit_cadastro->bindParam(':autor', $dados['autor'], PDO::PARAM_STR);
                $edit_cadastro->bindParam(':livro', $dados['livro'], PDO::PARAM_STR);
                $edit_cadastro->bindParam(':cod', $cod, PDO::PARAM_INT);
                if($edit_cadastro->execute()) {
                    $_SESSION['msg'] = "<p style='color:green;' class='font-weight-bold font-italic'>Cadastro editado com sucesso</p>";
                    header("Location: exibe.php");
                } else {
                    echo "<p style='color:red;' class='font-weight-bold font-italic'>Erro: Cadastro não editado</p>";
                }
            }
        }
        ?>

        <form name="edit-cadastro" method="POST" action="" class="">
            <div class="col-md-4 col-xs-12">
                <p class="font-weight-bold text-secondary">Autor: </p>
                <input type="text" name="autor" id="autor" placeholder="Nome do Autor" autocomplete="off" class="form-control font-weight-bold" value="<?php
                if(isset($dados['autor'])) {
                    echo $dados['autor'];
                } elseif (isset($row_cadastro['autor'])){ echo $row_cadastro['autor']; }?>"><br><br>
            </div>
            <div class="col-md-4 col-xs-12">
            <p class="font-weight-bold text-secondary">Livro: </p>
                <input type="text" name="livro" id="livro" placeholder="Nome do Livro" autocomplete="off" class="form-control font-weight-bold" value="<?php 
                if(isset($dados['livro'])) {
                    echo $dados['livro'];
                } elseif (isset($row_cadastro['livro'])){ echo $row_cadastro['livro']; }?>"><br><br>
             </div>
            <div class="col-3">
            <input type="submit" value="SALVAR" class="btn btn-info no-underline font-weight-bold" name="Editcadastro">
            </div>
        </form>
    </body>
</html>