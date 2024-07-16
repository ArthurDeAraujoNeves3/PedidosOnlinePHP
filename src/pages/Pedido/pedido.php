<!DOCTYPE html>
<html lang="en">
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

    ?>

    <form class="formPedido" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
        
        <input type="text" placeholder="Seu nome" name="nome" id="nome" value="<?php echo $nome ?>" />
        <input type="text" placeholder="Endereço" name="endereco" id="endereco" value="<?php echo $endereco ?>" />
        <input type="text" placeholder="Número" name="numero" id="numero" value="<?php echo $numero ?>" />

        <select name="pedido" value="<?php echo $pedido ?>" id="pedido">

            <option selected="selected" disabled hidden>Escolha o seu pedido</option>
            <option value="Hamburguer">Hamburguer</option>
            <option value="Batata Frita">Batata Frita</option>

        </select> <!--Produtos da loja-->

        <button class="buttonPO">Enviar pedido</button>
        
    </form>
    
</body>
</html>