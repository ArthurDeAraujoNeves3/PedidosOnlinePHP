<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | PedidosOnline</title>
    <link rel="stylesheet" href="../../../index.css">
    <link rel="stylesheet" href="./dashboardStyle.css">
    <script src="https://kit.fontawesome.com/de909c33c7.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php

        include_once("../../scripts/php/VerifyLogin.php");

        $urlId = explode("=", $_SERVER["REQUEST_URI"]);
        
        if ( count($urlId) > 1 ) {

            include_once("../../scripts/php/config.php");

            $urlDashboard = explode("?", $urlId[0]);
            $orderId =  $urlId[1];
            
            $sqlQuery = mysqli_query($conexao, "SELECT * FROM pedidos WHERE id = '$orderId'");
            $request = mysqli_num_rows($sqlQuery);
            $order = $sqlQuery->fetch_assoc();

            if ( $request == 1 ) {

                if( $order["StatusDoPedido"] == 0 ) {

                    mysqli_query($conexao, "UPDATE pedidos SET StatusDoPedido = 1 WHERE id = '$orderId'");
                    
                } else {

                    mysqli_query($conexao, "UPDATE pedidos SET StatusDoPedido = 0 WHERE id = '$orderId'");
                    

                }

                header("Location: $urlDashboard[0]");
                

            };

        };
        
    ?>

    <p class="Logo">Pedidos<span class="LogoOnline">Online</span></p>

    <div class="dashboard">

        <?php

            include_once("../../scripts/php/config.php");
            $sqlQuery = mysqli_query($conexao, "SELECT * FROM pedidos");
            $request = mysqli_num_rows($sqlQuery);

            if ( $request > 0 ) {

                for ( $i = 0; $i < $request; $i++) {

                    $order = $sqlQuery->fetch_assoc();

                    $nome = $order["Nome"];
                    $endereco = $order["Endereco"];
                    $pedido = $order["Pedido"];
                    $horario = $order["Horario"];
                    $StatusDoPedido = $order["StatusDoPedido"];
                    $StatusClass = "naoAtendido";
                    $id = $order["id"];
                    $currentPage = $_SERVER["PHP_SELF"];

                    if ( $StatusDoPedido == 0 ) {

                        $StatusDoPedido = "Não atendido";

                    } else {

                        $StatusDoPedido = "Atendido";
                        $StatusClass = "atendido";
                    };

                    echo "

                        <div class='pedido'>

                            <div><p class='title'>Nome</p><p>$nome</p></div>
                            <div><p class='title'>Endereço</p><p>$endereco</p></div>
                            <div><p class='title'>Pedido</p><p>$pedido</p></div>
                            <div><p class='title'>Pedido feito</p><p>$horario</p></div>
                            <div><p class='title'>Status</p><p class='$StatusClass'>$StatusDoPedido</p></div>
                            <div><a class='statusButton' href='$currentPage?id=$id'><span class='pen'><i class='fa-solid fa-pen'></i></span></a></div>
                            
                        </div>

                    ";
                    echo "</br>";

                };

            } else {

                echo("Nenhum pedido feito");

            };

            if ( isset($_REQUEST["reload"]) ) {

                header("Refresh:0");
                
            };

        ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <input type="submit" value="Atualizar dados" name="reload"  />

        </form>

    </div> <!--Pedidos-->
    
</body>
</html>
