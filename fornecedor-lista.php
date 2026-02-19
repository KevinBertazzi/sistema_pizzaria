<?php


define('SERVIDOR','localhost');
define('USUARIO','root');
define('SENHA','');
define('BANCO','db_pizzaria');
//conexão ao banco


try{
    $conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset=utf8",USUARIO,SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * from tb_fornecedor";

    $comando = $conexao->prepare($sql);
    $comando-> execute();


    // ARMAZENA EM UM ARRAY AS PIZZAS CADASTRADAS NO BANCO
    $fornecedores = $comando->fetchAll(PDO::FETCH_ASSOC);


    // FORMATA O CODIGO PARA EXIBIÇÃO VIA var_dump
    // echo"<pre>";
    // var_dump($pizzas);



}catch(PDOEexception $erro){
   echo "erro ao conectao ao banco de dados .$erro";
}


?>





<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de fornecedores</title>
    <link rel="stylesheet" href="css/pizza2.css">
</head>

<body>
    <header>
        <h1>Listagem de fornecedores</h1>
    </header>
    <main>
        <table>
            <tr>

                <th>id</th>
                <th>nome</th>
                <th>telefone</th>
                <th>email</th>
                <th>Produto</th>
                <th>Ações</th>

            </tr>
            <?php
            foreach($fornecedores as $fornecedor):
            ?>
            <tr>
                <td><?php echo $fornecedor['id']?></td>
                <td><?php echo $fornecedor['nome']?></td>
                <td><?php echo $fornecedor['telefone']?></td>
                <td><?php echo $fornecedor['email']?></td>
                <td><?php echo $fornecedor['produto']?></td>
                <td><a href="backend/deletar_fornecedor.php?id=<?php echo $fornecedor['id']?>" class="btn-del">deletar</a></td>
            </tr>
            <?php
            endforeach
            ?>
        </table>
    </main>
</body>

</html>