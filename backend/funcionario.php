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
//    capitura os dados capitados pelo form -->

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];


$sql = "INSERT INTO tb_funcionario (nome,email,telefone)values('$nome','$email','$telefone')";

//executp p query acima -->
$comando = $conexao->prepare($sql);

//executa o comando -->
$comando->execute();

 //exibe a msg de sucesso -->
echo" Funcionario cadastrado com sucesso";



}catch(PDOEexception $erro){
   echo "erro ao conectao ao banco de dados .$erro";
}

?>