<?php

    include 'insertarLineaCarrito.php';

    $servername = "localhost";
    $database = "Zapashop";
    $username = "daw";
    $password = "daw";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }

        $consultaIdProductoIdCarrito = "SELECT id_Producto FROM LineaCarrito WHERE id_Carrito='$idCarrito'";

        $resultadoid_carritoIdProducto = mysqli_query($conn, $consultaIdProductoIdCarrito);
        while($selectidProducto=mysqli_fetch_array($resultadoid_carritoIdProducto)){
             
            $filas=mysqli_num_rows($resultadoid_carritoIdProducto);
           
            $idProductoCarrito = $selectidProducto["id_Producto"];

            //SELECCIONAR EL IDPRODUCTO

            $consultaImprimirCarrito = "SELECT * FROM Productos WHERE id_Producto='$idProductoCarrito'";

            $resultIdProducto = mysqli_query($conn, $consultaImprimirCarrito);

            while($filaImprimirCarrito = mysqli_fetch_array($resultIdProducto)){
 
                echo "<div class='item-carrito'>";
                    echo "<p class='nombre'>". $filaImprimirCarrito['nombre']." </p>";
                    echo "<p class='nombre'>". $filaImprimirCarrito['precio']."€"." </p>";
                echo "</div>";      
          }
    }
    

    mysqli_close($conn);
?>