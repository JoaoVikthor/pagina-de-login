<?php 
include ('conexao.php');

if(isset($_POST['email'])||isset($_POST['senha'])){
    if(strlen($_POST['email'])==0){
        echo "preencha o seu email";
    } elseif (strlen($_POST['senha'])==0){
        echo "preencha a sua senha";
    } else {

    

        $email = $mysqli -> real_escape_string($_POST['email']);
        $senha = $mysqli -> real_escape_string($_POST['senha']);                                                                        
    
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

        $sql_query = $mysqli -> query($sql_code) or die ("Falha na execução do código SQL". $mysqli->error);                                
    
    $quantidade = $sql_query -> num_rows;

        if($quantidade == 1 ){
        $usuario = $sql_query-> fetch_assoc();

        if(!isset($_SESSION)){
            session_start();
        }

$_SESSION['id'] = $usuario['id'];
$_SESSION['nome'] = $usuario['nome'];

header("location: painel.php");

    }else{
        echo "Falha ao Logar! E-mail ou  Senha incorretos";
}
    }

}  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h1>Faça o seu Login </h1>

<form action="" method="post">
<p>
       <label>E-mail</label>
    <input type="text" name="email" >
</p>
 <p>
    <label for="">Senha</label>
    <input type="password" name="senha" >
 </p>

<p>
    <button type="submit">Entrar</button>
</p>

</form>

</body>
</html>