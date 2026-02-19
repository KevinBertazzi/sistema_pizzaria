<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('SENHA','');
define('BANCO','db_pizzaria');
//conexão ao banco


try{
    $conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset=utf8",USUARIO,SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'];

$sql = "DELETE FROM tb_fornecedor WHERE id=$id";

$comando = $conexao -> prepare($sql);

$comando->execute();

header('Location: ../fornecedor-lista.php');





}catch(PDOEexception $erro){
   echo "erro ao conectao ao banco de dados .$erro";
}








?>