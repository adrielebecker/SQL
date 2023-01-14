<?php 
    session_start();//inicia seção
    require_once('acao.php'); 
    echo '<a href="index.php">Home</a> <br><br>';
    $final = "";

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

    if(empty($acao)){/*verifica se é nulo*/
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    }    
    
    $id = isset($_POST['id']) ? $_POST['id'] : "";

    if(empty($id)){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    }

    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $nome1 = isset($_POST['nome1']) ? $_POST['nome1'] : "";
    $email1 = isset($_POST['email1']) ? $_POST['email1'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
    $funcao = isset($_POST['funcao']) ? $_POST['funcao'] : "";

    // echo "Nome: " . $nome . " E-mail: " . $email . " Senha: " . $senha . "Ação: " . $acao;

    if($acao == "Enviar"){
        $final = Enviar($nome, $email, $senha, $funcao);
    }

    if($acao == "visualizar"){
    }
    if($acao == "alterar"){
        $final = alterar($nome, $email, $senha, $funcao, $id);
    }
    if($acao == "excluir"){
        $final = excluir($id);
    }
    if($acao == "Login"){
    //    echo "Nome: ".$nome." E-mail: ".$email." Ação: ".$acao." Senha: ".$senha;
        $selecao = "";
        if(empty($email1)){
            $selecao = 1;
            // echo "Entrou por nome";
            // echo listarId('camilly', 1);
           $final = login($nome1, $senha, $selecao);
        }
        else{
            $selecao = 2;
            $final = login($email1, $senha, $selecao);
        }
    }


    if($acao == "sairsecao"){
        $final = session_destroy(); //encerra seção
    }

        header("Location: index.php"); //envia para outra pag
    
?>