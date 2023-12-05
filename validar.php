<?php

    require_once "includes/conexao.php";

    $nome = $_POST["txtNome"];
    $pass = $_POST["txtPass"];
    $pass = hash("sha512", md5($pass));

    $query = mysqli_query($conn, "select * from visitante WHERE nome_visitante = '".$nome."' AND senha_visitante = '".$pass."'");

    $n = mysqli_num_rows($query);

    if($n == 1){
        $_SESSION['logado']=true;
        $_SESSION['erro']=0;
        header("location:dados.php");
    }
    else{
        $_SESSION['logado']=false;
        $_SESSION['erro']=1;
        header("location:index.php");
    } 
?>