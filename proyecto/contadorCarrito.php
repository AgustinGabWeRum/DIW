<?php

    session_start();

    require 'database.php';

    //HACEMOS UN COUNT DE LOS PRODUCTOS DEL IDCARRITO DEL USUARIO PARA SABER LA CANTIDAD
    
    $idUsuario = $_SESSION['idUsuario'];

    $consultaCarrito = "SELECT id_Carrito FROM Carrito WHERE id_Usuario = '$idUsuario'";

    $resultadoID_Carrito = $conn->query($consultaCarrito);

    if($fila=mysqli_fetch_array($resultadoID_Carrito)){
        
        $idCarrito = $fila['id_Carrito'];

        $consulta = "SELECT COUNT(id_Producto) FROM LineaCarrito WHERE id_Carrito=$idCarrito";

        $result = $conn->query($consulta);

        if($filaCOUNT=mysqli_fetch_array($result)){

            $contador = $filaCOUNT['COUNT(id_Producto)'];
            
            echo "<div id='contador' name='productosCarrito'>$contador</div>";
        }
    }

    mysqli_close($conn);
?>