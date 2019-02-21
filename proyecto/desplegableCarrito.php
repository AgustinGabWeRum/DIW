<?php

    session_start();

    require 'database.php';

    $idUsuario= $_SESSION["idUsuario"];
    
    $consultaCarrito = "SELECT id_Carrito FROM Carrito WHERE id_Usuario = '$idUsuario'";

    $resultadoID_Carrito = $conn->query($consultaCarrito);

    if($fila=mysqli_fetch_array($resultadoID_Carrito)){

        //COGER CADA CARRITO E INSERTARLO EN LINEACARRITO CON SU RESPECTIVO USUARIO

        $idCarrito = $fila["id_Carrito"];

        $consultaLineaCarrito = "SELECT * FROM LineaCarrito WHERE id_Carrito='$idCarrito'";
        

        $resultadoLineaCarrito = mysqli_query($conn, $consultaLineaCarrito);

        if(mysqli_num_rows($resultadoLineaCarrito)>0){

            while($selectLineaCarrito=mysqli_fetch_array($resultadoLineaCarrito)){

                $producto = $selectLineaCarrito['id_Producto'];

                //SELECCIONAR LOS PRODUCTOS DEL IDCARRITO DEL USUARIO PARA HACE RUN DESPLEGABLE DE TODOS LOS PRODUCTOS
                
                $consultaProducto = "SELECT * FROM Productos WHERE id_Producto = $producto";
                $resultadoProducto = $conn->query($consultaProducto);

                while($filaProducto = mysqli_fetch_array($resultadoProducto)){

                    echo "<div class='item-carrito'>";
                    echo "<div class='item-img'>";
                        echo "<img class='imagenes' src=".$filaProducto['imagenes']." </img>";
                    echo "</div>";
                    echo "<div class='item-dato'>";
                        echo "<p>". $filaProducto['nombre']." </p>";
                        echo "<p><b>". $filaProducto['precio']."€"." </b></p>";
                        echo "<div onclick='eliminar(event)' class='item-eliminar'><p><b id=".$selectLineaCarrito['id_LineaCarrito'].">Eliminar</b></p></div>";
                    echo "</div>";
                    echo "</div>";
                    $total += $filaProducto['precio'];
    
                }               
            }
            echo"<div id='total'>Total: ".$total." € <p id='precioTotal'> ".$total."</p></div>";
            echo"<div id='comprar' onclick='comprar(event)'>Comprar</div>";
        }

    }

    mysqli_close($conn);
?>