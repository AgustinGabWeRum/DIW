<?php include 'header.php'; ?>

    <div class="contenedorRegistro">

        <div id="cabecera">
            <br />
            <h3 style="text-align:center; color: white;">TU CUENTA PARA TODO LO</h3>
            <h3 style="text-align:center; color: white;"> RELACIONADO CON NIKE</h3>
            <br />
        </div>

        <form id="datosRegistro" action="registrarse.php" method="POST" >
            <label class="letraZapas">Nombre y Apellidos: </label>
            <br />
            <input type="text" name="nombre" required size="62">
            <br />
            <label class="letraZapas">Nombre de usuario: </label>
            <br />
            <input type="text" name="usuario" required size="62">
            <label class="letraZapas">Establezca su contraseña: </label>
            <br />
            <input type="password" name="password" required size="62">
            <br />
            <br />
            <input class="cursor" type="submit" value="Iniciar Sesión">
            <a href="formularioRegistro.php"><input class="cursor" type="button" value="Registrarse"></a>
        </form>
    </div>

</body>

</html>