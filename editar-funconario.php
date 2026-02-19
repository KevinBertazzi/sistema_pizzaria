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

    $sql = "SELECT * from tb_funcionario WHERE id=$id";


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
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>CadastroFuncionario</title>
    <link rel="stylesheet" href="css/funcionario.css">
</head>

<body>
    <header>
        <h1>Cadastro de funcionario</h1>
    </header>

    <main>

        <form action="backend/funcionario.php" method="post">
            <div id="grid">

                <div>
                    <label for="">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $funcionarios[0]['nome'];?>">
                </div>

                <div>
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $funcionarios[0]['email'];?>">
                </div>

                <div>
                    <label for="">Telefone </label>
                    <input type="text" name="telefone" id="telefone" value="<?php echo $funcionarios[0]['telefone'];?>">
                </div>

            </div>

            <input type="submit" value="Cadastrar">




        </form>




    </main>





</body>

</html>