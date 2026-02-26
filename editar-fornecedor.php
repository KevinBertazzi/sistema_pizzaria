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

    $sql = "SELECT * FROM  tb_fornecedor WHERE id=$id";

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
    <title>Pizzaria-editar</title>
    <link rel="stylesheet" href="css/pizza2.css">
</head>

<body>

    <header>
        <h1>Pizzaria-editar</h1>
    </header>

    <main>


        <form action="backend/atualizar_fornecedor.php?id=<?php echo $fornecedores[0]['id'];?>" method="post">


            <div id="grid">

                <div>
                    <label for="">nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $fornecedores[0]['nome'];?>" required>
                </div>

                <div>
                    <label for="">email</label>
                    <input type="text" name="email" id="email" value="<?php echo $fornecedores[0]['email'];?>" required>
                </div>

                <div>
                    <label for="">telefone</label>
                    <input type="text" name="telefone" id="telefone" value="<?php echo $fornecedores[0]['telefone'];?>" mistrequired>
                </div>

                <div>
                    <label for="">produto</label>
                    <input type="text" name="produto" id="produto"  value="<?php echo $fornecedores[0]['produto'];?>" mistrequired>
                </div>

            </div>

            <input type="submit" value="Salvar">

        </form>


    </main>





</body>

</html>