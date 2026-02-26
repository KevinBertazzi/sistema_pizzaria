<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('SENHA','');
define('BANCO','db_pizzaria');
//conexão ao banco


try{
    $conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset=utf8",USUARIO,SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//    echo "conectado com sucesso!";
//    capitura os dados capitados pelo form

$sabor = $_POST['sabor'];
$ingrediente = $_POST['ingrediente'];
$tamanho = $_POST['tamanho'];
$valor = $_POST['valor'];

$id = $_GET['id'];

$sql = "UPDATE tb_pizza SET sabor='$sabor', ingredinte='$ingrediente', tamanho='$tamanho', valor='$valor' where id=$id"; 

//executp p query acima
$comando = $conexao->prepare($sql);

//executa o comando
$comando->execute();

//exibe a msg de sucesso
// echo"cadatro realizado com sucesso";

header('location: ../pizza-lista.php');



}catch(PDOEexception $erro){
   echo "erro ao conectao ao banco de dados .$erro";
}








?>