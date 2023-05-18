<?php
session_start();
ob_start();
include_once './conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>.no-underline:hover {text-decoration: none;}</style>

    <title>Cadastrar</title>

</head>
    <body class="ml-2 mr-2">
    <container class="container justify-content-md-center col-md-3 col-xs-12">
            <div class="container row mb-4 mt-4">
                <div class="mr-2">
                    <a href="exibe.php" class='btn btn-info no-underline font-weight-bold'>DATABASE</a>
                </div>
                <div class="ml-2">
                    <a href="inicial.php" class='btn btn-info no-underline font-weight-bold'>LOGOUT</a>
                </div>
            </div>
            <div class="mb-5">
                <p  class="font-italic font-monospace text-secondary">Para o conhecimento mútuo de todos os livros do mundo</p>
                <h3 class="font-monospace font-weight-bold font-italic text-secondary display-6 p-4">Cadastro</h3>
            </div>
            <?php
                
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

                if(!empty($dados['Cadastrar'])) {
                    
                    $query_cadastro = "INSERT INTO cadastro (autor, livro) VALUES (:autor, :livro) ";
                    $cad_cadastro = $coon->prepare($query_cadastro);
                    $cad_cadastro->bindParam(':autor', $dados['autor'], PDO::PARAM_STR);
                    $cad_cadastro->bindParam(':livro', $dados['livro'], PDO::PARAM_STR);
                    $cad_cadastro->execute ();
                    if($cad_cadastro->rowCount()){
                        $_SESSION['msg'] = "<p style='color:green;' class='font-weight-bold font-italic font-monospace'>Cadastrado realizado com sucesso!</p>";
                        header("Location: exibe.php");
                    } else {
                        echo "<p style='color:red; class='font-weight-bold font-italic font-monospace''>Cadastro não realizado!.</p>";
                    }
                }
            ?>
            <form name="cadastro" method="POST" action="" >
                    <div class="row g-3">
                        <div class="col-md-3 mb-1 mt-1">
                            <input type="text" name="livro" id="livro" autocomplete="off" class="form-control font-weight-bold" placeholder="Livro" required >
                        </div>
                        <div class="col-md-2 mb-1 mt-1">
                            <input type="text" name="autor" id="autor" autocomplete="off" class="form-control font-weight-bold" placeholder="Autor" aria-label="Autor" required >
                        </div>
                        <div class="col-2 mb-1 mt-1">
                        <input type="submit" class="btn btn-info no-underline font-weight-bold" value="CADASTRAR" name="Cadastrar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        </div>
                    </div>
            </form>
        </container>
    </body>
</html>