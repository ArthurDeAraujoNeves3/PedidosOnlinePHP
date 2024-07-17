<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aguarde pelo pedido | PedidosOnline</title>
    <link rel="stylesheet" href="../../../index.css">
    <link rel="stylesheet" href="./pedidoDetailsStyle.css">
</head>
<body>

    <?php

        /*explode() vai separar uma string a partir de algum ponto. Exemplo

            1| $url = /PedidosOnlinePHP/src/pages/Pedido/pedidoDetails.php?id=85472722
            2| $var = explode("=", $url);
            3| $var[0] => /PedidosOnlinePHP/src/pages/Pedido/pedidoDetails.php?id
            4| $var[1] => 85472722

        */
        $urlId = explode("=", $_SERVER["REQUEST_URI"]);
        $pedidoId = $urlId[1];
        
        include_once("../../scripts/php/config.php");

        $sqlQuery = mysqli_query($conexao, "SELECT * FROM pedidos WHERE id = '$pedidoId'");
        $registro = mysqli_num_rows($sqlQuery);
        $data = $sqlQuery->fetch_assoc();
        
        if ( $registro > 0 ) {

            $nome = $data["Nome"];
            $endereco = $data["Endereco"];
            $pedido = $data["Pedido"];
            $horario = $data["Horario"];
            $StatusDoPedido = $data["StatusDoPedido"];

            echo "
                <div class='pedidoInfo'>

                    <p class='Logo'>Pedidos<span class='LogoOnline'>Online</span></p>
                    
                    <div>

                        <p>Nome: <span>$nome</span></p>
                        <p>Endereço: <span>$endereco</span></p>
                        <p>Seu pedido: <span>$pedido</span></p>
                        <p>Pedido feito: <span>$horario</span></p>
                        <p>Status: <span>$StatusDoPedido</span></p>

                    </div>

                    <a href='./pedido.php' class='buttonPO'>Voltar a pedir</a>

                </div>
            ";
            
        } else {

            echo "
                <div class='pedidoInfo'>

                    <p class='Logo'>Pedidos<span class='LogoOnline'>Online</span></p>
                    <p>PEDIDO NÃO ENCONTRADO!</p>

                    <a href='./pedido.php' class='buttonPO'>Pedir agora</a>

                </div>
            ";

        };

    ?>
    
</body>
</html>