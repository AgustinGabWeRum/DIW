<?php include 'header.php'; ?>

<div class="contenedor">
    <div id="cabecera">
        <h3 style="text-align:center; color: white;">TU CUENTA PARA TODO LO</h3>
        <h3 style="text-align:center; color: white;"> RELACIONADO CON NIKE</h3>
    </div>
    <div>
        <img id="contacto" src="img/usuario.png">
    </div> 
    <?php

    require_once 'database.php';

    session_start();

    $idUsuario = $_SESSION['idUsuario'];

        $datosUsuario = "SELECT * FROM Usuarios WHERE id_Usuario = $idUsuario";
        $result = $conn->query($datosUsuario);

        if($fila=mysqli_fetch_array($result)){

            $usuario = $fila['usuario'];

            echo "<div id='usuario'><b>$usuario</b></div>";
        }
    ?>

    <div class="misPedidos"><a href="misPedidos.php" class="letraZapas">Mis Pedidos</a></div>

</div>