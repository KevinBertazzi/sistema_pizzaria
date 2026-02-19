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

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$produto = $_POST['produto'];

$sql = "INSERT INTO tb_fornecedor (nome,telefone,email,produto)values('$nome','$telefone','$email','$produto')";

//executp p query acima
$comando = $conexao->prepare($sql);

//executa o comando
$comando->execute();

//exibe a msg de sucesso
echo"cadatro realizado com sucesso";



}catch(PDOEexception $erro){
   echo "erro ao conectao ao banco de dados .$erro";
}








?>