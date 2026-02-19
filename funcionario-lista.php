
<?php


define('SERVIDOR','localhost');
define('USUARIO','root');
define('SENHA','');
define('BANCO','db_pizzaria');
//conexão ao banco


try{
    $conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset=utf8",USUARIO,SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * from tb_funcionario";

    $comando = $conexao->prepare($sql);
    $comando-> execute();


    // ARMAZENA EM UM ARRAY AS PIZZAS CADASTRADAS NO BANCO
    $funcionarios = $comando->fetchAll(PDO::FETCH_ASSOC);


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
    <title>Listagem de funcionarios</title>
    <link rel="stylesheet" href="css/pizza2.css">
</head>

<body>
    <header>
        <h1>Listagem de funcionarios</h1>
    </header>
    <main>
        <table>
            <tr>

                <th>id</th>
                <th>nome</th>
                <th>email</th>
                <th>telefone</th>
                <th>Ações</th>

            </tr>
            <?php
            foreach($funcionarios as $funcionario):
            ?>
            <tr>
                <td><?php echo $funcionario['id']?></td>
                <td><?php echo $funcionario['nome']?></td>
                <td><?php echo $funcionario['email']?></td>
                <td><?php echo $funcionario['telefone']?></td>
                 <td><a href="backend/deletar-funcionario.php?id=<?php echo $funcionario['id']?>" class="btn-del">deletar</a></td>
            </tr>
            <?php
            endforeach
            ?>
        </table>
    </main>
</body>

</html>