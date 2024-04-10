<!DOCTYPE html>
<?php
$user = isset($_POST['user']) ? $_POST['user'] : "";
$senha = isset($_POST['senha']) ? $_POST['senha'] : "";
$csenha = isset($_POST['csenha']) ? $_POST['csenha'] : "";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas a fazer</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 style="text-align: center;">Cadastre-se</h1><hr>

    <div style="background-color: black; width: 400px; height: 400px; border-radius: 10px; margin-left:37%; margin-top: 7%; position: fixed;">
        <div class="col-md-10">
    <form action="" method="post">
        <h3 style="color: white; margin-left: 35%; margin-top: 2%;">Cadastre-se</h3>
        <div style="margin-left: 20%; margin-top: 10%;">
        <legend style="color:white;">Usuário</legend>
        <input class="form-control" type="text" placeholder="Insira o usuário" name="user" id="user">
        <legend style="color:white;">Senha</legend>
        <input class="form-control" type="password" placeholder="Insira a senha" name="senha" id="senha">
        <legend style="color:white;">Confirmar senha</legend>
        <input class="form-control" type="password" placeholder="Confirmar senha" name="csenha" id="csenha">
        </div>
        <button type="submit" class="btn btn-light" style="margin-top:8%; margin-left: 70%;">Cadastrar</button>
    </form>
    </div>
    </div>

    <?php
        if(isset($_POST['user']) && ($_POST['senha']) && ($_POST['csenha'])) {

         $dados = array(
          'user' => $_POST['user'],
          'senha' => $_POST['senha'],
          'csenha' => $_POST['csenha']);

        $dados_json = json_encode($dados);

        $fp = fopen("informacoes.json", "w");

        fwrite($fp, $dados_json);

        fclose($fp);
         }
    ?>


    <?php
       if(isset($_POST['senha']) && ($_POST['senha'] === $_POST['csenha'])) {

        header('Location: login.php');

      }
      else if(isset($_POST['senha'])){ //se forem diferentes mas veio do formulario
          echo "<script>alert('As senhas não conhecidem')</script>";
      }

    ?>
</body>
</html>