




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

    $sql = "SELECT * FROM  tb_pizza WHERE id=$id";

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
    <title>Pizzaria-editar</title>
    <link rel="stylesheet" href="css/pizza2.css">
</head>

<body>

    <header>
        <h1>Pizzaria-editar</h1>
    </header>

    <main>


        <form action="backend/atualizar-pizza.php?id=<?php echo $pizzas[0]['id'];?>" method="post">


            <div id="grid">

                <div>
                    <label for="">Sabor</label>
                    <input type="text" name="sabor" id="sabor" value="<?php echo $pizzas[0]['sabor'];?>" required>
                </div>

                <div>
                    <label for="">Ingrediente</label>
                    <input type="text" name="ingrediente" id="iIngrediente" value="<?php echo $pizzas[0]['ingredinte'];?>" required>
                </div>

                <div>
                    <label for="">Tamanho</label>
                    <select name="tamanho" id="" required>
                        <option <?php if ($pizzas[0]['tamanho']=='P') echo 'selected' ?>  value="P">Pequena</option>
                        <option <?php if ($pizzas[0]['tamanho']=='G') echo 'selected' ?>  value="G">Grande</option>
                    </select>
                </div>

                <div>
                    <label for="">valor</label>
                    <input type="number" name="valor" id="valor"  step="0.01" min="1" value="<?php echo $pizzas[0]['valor'];?>" mistrequired>
                </div>

            </div>

            <input type="submit" value="Salvar">

        </form>


    </main>





</body>

</html>