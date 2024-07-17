<?php

    if ( !isset($_SESSION) ) {

        session_start();

    };

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PedidosOnline</title>
    <link rel="stylesheet" href="../../../index.css">
    <link rel="stylesheet" href="./LoginStyle.css">
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="formLogin">

        <p class="Logo">Pedidos<span class="LogoOnline">Online</span> ADMIN</p>

        <?php

            //Se isso fosse um projeto sério e não de estudo, o legal também seria que ele verificasse para saber se $_SESSION['id'] já existe, se sim, ele redireciona para a DASHBOARD

            $nome = $_REQUEST["nome"] ?? "";
            $senha = $_REQUEST["senha"] ?? "";

            include_once("../../scripts/php/config.php");
            
            if ( isset($_REQUEST["submit"]) ) {

                $sqlQuery = mysqli_query($conexao, "SELECT * FROM admins WHERE nome = '$nome' AND senha = '$senha'");
                $request = mysqli_num_rows($sqlQuery);
                $data = $sqlQuery->fetch_assoc();

                if ( $request > 0 ) {

                    $_SESSION["nome"] = $nome; //O correto é utilizar um id ao invés do nome
                    header("Location: ../Dashboard/dashboard.php");

                } else {

                    echo "
                    
                        <div class='boxError'>

                            <p>Usuário não encontrado! Nome ou senha podem estar incorretos.</p>
                        
                        </div>

                    ";

                };

            };

        ?>

        <div>

            <input type="text" placeholder="Nome" name="nome" id="nome" value="<?php echo $nome?>" />
            <input type="password" placeholder="Senha" name="senha" id="senha" value="<?php echo $senha?>" />

        </div> <!--Inputs-->

        <button class="buttonPO" name="submit" onclick="verifyInputs()" >Entrar</button>

    </form>

    <script src="./Login.js"></script>
    
</body>
</html>
