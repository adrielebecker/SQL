<!DOCTYPE html>
<?php
    require_once('testeacao.php');
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
</head>
<body>
    <form action="" method="post">
        nome: <input type="text" name="nome" id="nome" value="<?=$nome;?>"><br>
        sexo: <input type="text" name="sexo" id="sexo" value="<?=$sexo;?>"><br>
        cpf: <input type="text" name="cpf" id="cpf" value="<?=$cpf;?>"><br>
        <input type="submit" value="enviar" name="acao" id="acao"><br>
    </form>
</body>
</html>