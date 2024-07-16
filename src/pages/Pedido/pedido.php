<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça o pedido | Pedidos Online</title>
    <link rel="stylesheet" href="../../../index.css">
    
    <link rel="stylesheet" href="./pedidoStyle.css">
</head>
<body>

    <?php

        $nome = $_REQUEST["nome"] ?? "";
        $endereco = $_REQUEST["endereco"] ?? "";
        $numero = $_REQUEST["numero"] ?? "";
        $pedido = $_REQUEST["pedido"] ?? "";
        
        //isset verifica se a variável é diferente de null, e retorna como true ou false
        if ( isset($_POST["submit"]) ) {

            $horario = date("H:i:s");
            $status = 0;
            
            include_once("../../scripts/php/config.php");

            mysqli_query($conexao, "INSERT INTO pedidos(Nome, Endereco, Numero, Pedido, Horario, StatusDoPedido) VALUES ('$nome', '$endereco', '$numero', '$pedido', '$horario', '$status')");

            echo "Tudo certo";

        };

    ?>

    <form class="formPedido" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >

        <p class="Logo">Pedidos<span class="LogoOnline">Online</span></p>
        
        <div>

            <input type="text" placeholder="Seu nome" name="nome" id="nome" value="<?php echo $nome ?>" />
            <input type="text" placeholder="Endereço" name="endereco" id="endereco" value="<?php echo $endereco ?>" />
            <input type="text" placeholder="Número" name="numero" id="numero" value="<?php echo $numero ?>" />

            <select name="pedido" value="<?php echo $pedido ?>" id="pedido">

                <option selected="selected" disabled hidden>Escolha o seu pedido</option>
                <option value="Hamburguer">Hamburguer</option>
                <option value="Batata Frita">Batata Frita</option>

            </select> <!--Produtos da loja-->

        </div> <!--Inputs-->

        <button class="buttonPO" name="submit" id="buttonForm">Enviar pedido</button>
        
    </form>

    <script src="./pedido.js"></script> <!--Validando formulário-->
    
</body>
</html>