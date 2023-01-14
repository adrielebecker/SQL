<?php
    function Enviar ($nome, $email, $senha, $funcao) {
        /*inserir algo no BD*/$sql = "INSERT INTO LOGIN.USUARIO(`nome`,`email`,`senha`,`idfuncao`) values ('$nome', '$email','$senha', $funcao)";
        /*conectar ao BD*/$mysql = mysqli_connect('localhost', 'root', '', 'login');
        // var_dump($mysql);
        $mysql->prepare($sql);//-> setar
        $mysql->query($sql); //requisição de banco de dados e envia
        mysqli_close($mysql);//fecha a requisição do BD
    }
    
    function visualizar(){
        $sql = 'SELECT * FROM LOGIN.USUARIO';//selecionar algo BD
        $mysql = mysqli_connect('localhost', 'root', '', 'login');
        $result = mysqli_query($mysql, $sql); //requisição de banco de dados com execução do sql

        // var_dump($result);
        
        while($linha = $result->fetch_assoc()/*retorna o array com os dados*/){
            if ($linha["idfuncao"] == 1) {
                $funcao = "Administrador";
            }else{
                $funcao = "Normal";
            }
            echo "<table border='1'>
            <tr>
                <td> Id </td>
                <td> Nome </td>
                <td> E-mail </td>
                <td> Senha </td>
                <td> Função </td>
                <td><a href='login.php?acao=excluir&id=".$linha['id']."'>Excluir dados</a></td>
            </tr>
            <tr>
                <td>".$linha['id']."</td>
                <td>".$linha['nome']."</td>
                <td>".$linha['email']."</td>
                <td>".$linha['senha']."</td>
                <td>".$linha['idfuncao']."</td>
                <td><a href='index.php?acao=alterar&id=".$linha['id']."'>Alterar dados</a><br></td> 
            </tr>    
            </table><br>";
        }
        mysqli_close($mysql);
    }

    function alterar($nome, $email, $senha, $funcao, $id){
        $sql = "update login.usuario set nome ='".$nome."', email = '".$email."', senha = '".$senha."', idfuncao = '".$funcao."' where id = '".$id."' ";
        $mysql = mysqli_connect('localhost', 'root', '', 'login');
        $result = mysqli_query($mysql, $sql);
        if($result){
            header('Location: login.php?acao=visualizar');//enviando pra outra pag
        }
        mysqli_close($mysql);
    }

    function excluir($id){
        echo $sql = "delete from login.usuario where id = '".$id."'";//deletando algo do BD
        $mysql = mysqli_connect('localhost', 'root', '', 'login');
        $result = mysqli_query($mysql, $sql);
        if($result){
            header('Location: login.php?acao=visualizar');
        }
        mysqli_close($mysql);
    }

    function listarId($valor, $selecao){
        switch ($selecao) { //se for == 1, é nome, se == 2 é email
            case 1:
                $sql = "SELECT * FROM login.usuario WHERE nome = '$valor'";
                break;
            
            case 2:
                $sql = "SELECT * FROM login.usuario WHERE email = '$valor'";
                break;
        }
        $mysql = mysqli_connect('localhost', 'root', '', 'login');
        $result = mysqli_query($mysql, $sql);
        while($linha = $result->fetch_assoc()){
            return $linha['nome'];
        }
    }

    function login($valor, $senha, $selecao){
        switch ($selecao) {
            case 1:
                $sql = "SELECT * FROM login.usuario /*condiçao*/WHERE nome = '$valor' and senha = '$senha'";
                break;
            
            case 2:
                $sql = "SELECT * FROM login.usuario WHERE email = '$valor' and senha = '$senha'";
                break;
        }
        // echo "Valor: ".$valor." Senha: ".$senha." Selecao: ".$selecao;
        $mysql = mysqli_connect('localhost', 'root', '', 'login');
        $result = mysqli_query($mysql, $sql); 
        // var_dump(listarId($valor, $selecao)[0]['nome']);
            if($result){
                
                $_SESSION['nome'] = listarId($valor, $selecao);
            }

    }

    function retornaArray($id){
        $sql = "SELECT * FROM login.usuario WHERE id = $id";
        $mysql = mysqli_connect('localhost', 'root', '', 'login');
        $result = mysqli_query($mysql, $sql); 
        return $result->fetch_assoc();
        while($linha = $result->fetch_assoc()/*retorna o array com os dados*/){
            return $linha;
        }
    }
?>