<?php 
    $servidor = "localhost"; // servidor do banco (IP ou localhost)
    $usuario = "root"; // nome do ususario do banco
    $senha = ""; // senha do usuario do banco
    $banco = "sebrae"; //nome do banco
    $porta = 3360; // se a porta for diferente e o sistema não encontrar o banco é necessário adicionar a porta
    $conn = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);

    if(!$conn){
        die("Erro ao conctar com o servidor!");
    }
?>