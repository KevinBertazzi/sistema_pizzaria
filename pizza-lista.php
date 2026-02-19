
<?php


define('SERVIDOR','localhost');
define('USUARIO','root');
define('SENHA','');
define('BANCO','db_pizzaria');
//conexão ao banco


try{
    $conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO.";charset=utf8",USUARIO,SENHA);

    $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * from tb_pizza";

    $comando = $conexao->prepare($sql);
    $comando-> execute();


    // ARMAZENA EM UM ARRAY AS PIZZAS CADASTRADAS NO BANCO
    $pizzas = $comando->fetchAll(PDO::FETCH_ASSOC);


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
    <title>Listagem de pizzas</title>
    <link rel="stylesheet" href="css/pizza2.css">
</head>

<body>
    <header>
        <h1>Pizzaria listagem</h1>
    </header>
    <main>
        <table>
            <tr>

                <th>id</th>
                <th>sabor</th>
                <th>ingredientes</th>
                <th>tamanho</th>
                <th>valor</th>
                <th>Ações</th>

            </tr>
            <?php
            foreach($pizzas as $pizza):
            ?>
            <tr>
                <td><?php echo $pizza['id']?></td>
                <td><?php echo $pizza['sabor']?></td>
                <td><?php echo $pizza['ingredinte']?></td>
                <td><?php echo $pizza['tamanho']?></td>
                <td><?php echo $pizza['valor']?></td>
                <td>
                <a href="backend/deletar_pizza.php?id=<?php echo $pizza['id']?>" class="btn-del">deletar</a>    
                <a href="editar_pizza.php?id=<?php echo $pizza['id']?>" class="btn-edt">editar</a>
            </td>
            </tr>
            <?php
            endforeach
            ?>
        </table>
    </main>
</body>

</html>