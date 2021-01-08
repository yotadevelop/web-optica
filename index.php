<?php
ini_set('display_errors', 1);
ini_set('dispplay_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Lobster&family=Pacifico&family=Shadows+Into+Light&display=swap" rel="stylesheet">
</head>

<body class="blue" style="font-family: 'Dosis', sans-serif;">
    <br>
    <h1 class="white-text light-green center z-depth-5 section" style="font-family: 'Lobster', cursive;
">Optica 2020</h1>
    <div class="container white pad-20 br10 ">
        <div class="row z-depth-5 section">
            <div class="col l4 m4 s12 ">
                <img src="img/optica.jpg" >
            </div>

    
                        
            <!---------CONTROL----ROL------>
            <div class="col l4 m2 s12 center ">
                <br><br><br><br>
                <form action="controllers/ControlRol.php" method="POST">
                    <button class="btn green w100" name="bt_admin" style="font-family: 'Acme', sans-serif;
">Administrador</button> <br><br><br> 
                    <button class="btn green w100" name="bt_vend" style="font-family: 'Acme', sans-serif;
">Vendedor</button>                 
                </form>            
            </div>
            <!--------FORMULARIO---ADMINISTRADOR---------->
                <div class="col l4 m4 s12 b1">
                        <?php if(!isset($_SESSION['rol'])) {?>
                        <h3 style="font-family: 'Pacifico', cursive;
">Acceso Admin</h3>
                        <form action="controllers/ControlLog.php" class="m10" method="POST">
                            <div class="input-field" style="font-family: 'Shadows Into Light', cursive;
">
                                <input id="rut_ad" type="text" name="rut_ad">
                                <label for="rut_ad">Rut </label>
                            </div>
                            <div class="input-field" style="font-family: 'Shadows Into Light', cursive;
">
                                <input id="clave_ad" type="password" name="clave_ad">
                                <label for="clave_ad">Clave de acceso</label>
                            </div>
                            <button class="btn black w100" style="font-family: 'Acme', sans-serif;
">entrar</button>
                        </form>

                        <?php }else{ ?>
                    <!---FORMULARIO----VENDEDOR------>
                    <h4 style="font-family: 'Pacifico', cursive;
">Acceso Vendedor</h4>
                        <form action="controllers/ControlLogVend.php" class="m10" method="POST">
                            <div class="input-field" style="font-family: 'Shadows Into Light', cursive;
">
                                <input id="rut" type="text" name="rut">
                                <label for="rut">rut de usuario </label>
                            </div>
                            <div class="input-field" style="font-family: 'Shadows Into Light', cursive;
">
                                <input id="clave" type="password" name="clave">
                                <label for="clave">Clave de acceso</label>
                            </div>
                            <button class="btn black w100" style="font-family: 'Acme', sans-serif;
">entrar</button>
                        </form><br>

                        <?php } ?>
                        <p class="red-text">
                        <?php  
                            if(isset( $_SESSION['error'])){
                                echo  $_SESSION['error'];
                                unset( $_SESSION['error']);
                            }                       
                        ?>        
                    </p>  
                </div>   
        </div>
        <h6><a href="Autor.php" class="btn black" style="font-family: 'Acme', sans-serif;
">creado por</a></h6>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>