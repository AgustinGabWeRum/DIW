<?php include 'header.php'; ?>

    <div class="contenedor">
        <div id="cabecera">
            <h3 style="text-align:center; color: white;">TU CUENTA PARA TODO LO</h3>
            <h3 style="text-align:center; color: white;"> RELACIONADO CON NIKE</h3>
        </div>
        <form id="datosInicio" action="iniciarSesion.php" method="POST">

            <label class="letraZapas">Usuario: </label>
            <br />
            <input type="text" name="usuario" size="62">
            <br />
            <label class="letraZapas">Contraseña: </label>
            <br />
            <input type="password" name="contrasenya" size="62">
            <br />
            <br />
            <input class="cursor" type="submit" value="Iniciar Sesión" name="login">
            <a href="formularioRegistro.php"><input class="cursor" type="button" value="Registrarse"></a>

        </form>
    </div>

</body>

</html>