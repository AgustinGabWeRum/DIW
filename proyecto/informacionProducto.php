<?php
    $servername = "localhost:3306";
    $database = "Zapashop";
    $username = "daw";
    $password = "daw";
    $contador = 1;
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }
    
    $consulta = "SELECT id_Producto, nombre, precio, imagenes FROM Productos";
    $resultado = $conn->query($consulta);

    while($fila = mysqli_fetch_array($resultado)){
        $contador++;
?>

    <div class="cajaZapas">
        <img ondragstart="drag(event)" id="<?php echo $fila['id_Producto']?>" draggable class="posicionProducto" src=<?php echo $fila['imagenes']?> />
        <p class="letraZapas" name="nombre"><?php echo $fila['nombre']?></p>
        <p class="letraZapas"><?php echo $fila['precio']?> €</p>
    </div>
    
    <?php if($contador == 4){ ?>
        
        <a name="season2"></a>
        <p class="letraTitulo">NIKE AIR FORCE</p>
        <br />
    <?php } ?>
    
<?php }    
    mysqli_close($conn);
?>