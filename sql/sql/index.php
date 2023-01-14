<?php
    session_start();
    require_once('acao.php');
    if(!empty($_SESSION['nome'])){//diferente de null
        echo $_SESSION['nome'];
    }
    else{
        echo "Visitante";
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL</title>
    <?php
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
        if(empty($acao)){ //verifica se esta vindo por post, se não estiver, vai ver se vem por get
            $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        }
        
        
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
        $email = isset($_GET['email']) ? $_GET['email'] : "";
        $senha = isset($_GET['senha']) ? $_GET['senha'] : "";
        $funcao = isset($_GET['funcao']) ? $_GET['funcao'] : "";

        $item = retornaArray($id);
        // var_dump($item);

        // echo "Nome: " . $nome . " E-mail: " . $email . " Senha: " . $senha . "Ação: " . $acao;
    ?>
</head>
<body>
    <a href="index.php">Home</a><br><br>
    <form action="login.php" method="post">
        <fieldset>
            <legend>MySQL</legend>
            <input type="hidden" name="id" value="<?php if($acao == "alterar"){echo $item["id"];} else{echo "";}?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php if($acao == "alterar"){echo $item["nome"];} else{echo "";}?>"><br>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" autocomplete="off" value="<?php if($acao == "alterar"){echo $item["email"];} else{echo "";}?>" ><br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" value="<?php if($acao == "alterar"){echo $item["senha"];} else{echo "";}?>"><br>
            <label for="funcao">Função:</label>
            <input type="text" name="funcao" id="funcao" value="<?php if($acao == "alterar"){echo $item["idfuncao"];} else{echo "";}?>"><br>
            <input type="submit" value="<?php if($acao == "alterar"){echo "alterar";} else{echo "Enviar";}?>" name="acao" >
            <br>
           <?php
                echo 
                visualizar();
            ?>
       </fieldset>
    </form>
    <br>

    <form action="login.php" method="post">
        <fieldset>
            <legend>Login</legend>
            <label for="nome">Nome:</label>
            <input type="text" name="nome1" id="nome1" value="<?php if($acao == "alterar"){echo $nome;} else{echo "";}?>">
            <label for="desabilitar">Desabilitar nome:</label>
            <input type="checkbox" name="desabilitar" id="desabilitar"><br>
            <label for="email">E-mail:</label>
            <input type="email" disabled name="email1" id="email1" value="<?php if($acao == "alterar"){echo $email;} else{echo "";}?>"><br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" value="<?php if($acao == "alterar"){echo $senha;} else{echo "";}?>"><br>
            <input type="submit" value="Login" name="acao">
            <button><a href="login.php?acao=sairsecao">Sair</a></button>
        </fieldset>
    </form>
    <script>
        document.getElementById("desabilitar").onclick = function(){
            const pegarNome = document.querySelector('#nome1');
            const pegarEmail = document.querySelector('#email1');
            const pegarCheck = document.querySelector('#desabilitar');
            if(pegarCheck.checked){
                pegarNome.disabled = true;
                pegarEmail.disabled = false;
                pegarEmail.value = "";
            }
            else{
                pegarNome.disabled = false;
                pegarEmail.disabled = true;
                pegarNome.value = "";
            }
        };
    </script>
    <?php
        // $array = array("id" => "2", "nome" => "adri");
        // foreach ($array as $key) {
        //     echo $key."<br>";
        // }
        // var_dump($array);
    
    ?> 
</body>
</html>