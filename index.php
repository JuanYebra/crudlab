<?php
session_start();
if (isset($_SESSION['nombre'])) {
    header('Location: vista/Principal.php');
}
?>

<html lang="es">

    <head>
        <meta charset="utf-8">
        <title> Formulario de Acceso </title>    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="vista/css/login.css">
        <style type="text/css">
        </style>

        <script type="text/javascript">

        </script>

    </head>

    <body>

        <div id="contenedor">
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <?php
                    if (isset($_GET["m"])) {
                        ?>
                        <div class="alert alert-warning alert-dismissable">
                            <strong class="alert">¡Error!</strong> El usuario o la contraseña son incorrectos.
                        </div>
                        <?php
                    }
                    ?>
                    <form id="login_form" action="models/loginProceso.php" method="post" >
                        <input type="text" id="correo_usuario" name="correo_usuario" placeholder="Correo" required>

                        <input type="password" placeholder="Contraseña" id="pass_usuario" name="pass_usuario" required>

                        <input type="hidden" name="enviar" class="form-control" value="si">
                        <button type="submit" title="Ingresar" name="Ingresar">Acceder</button>
                    </form>
                    <div class="pie-form">
                        <a href="#**">¿Perdiste tu contraseña?</a>
                    </div>
                    <div class="by">
                        <p>by yebra</p>
                    </div>
                </div>

            </div>
        </div>

    </body>
</html>
