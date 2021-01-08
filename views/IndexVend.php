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
    <title>cliente</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Lobster&family=Pacifico&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="blue" style="font-family: 'Dosis', sans-serif;">
    <?php if (isset($_SESSION['vendedor'])) { ?>

        <nav class="green">
            <div class="nav-wrapper z-depth-5 section2" style="font-family: 'Acme', sans-serif;">
                <a href="IndexVend.php" class="brand-logo" style="margin-left:10px">
                    Optica2020
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="CrearCliente.php">Crear Cliente <i class="material-icons left">assignment_ind</i></a></li>
                    <li><a href="buscar_receta.php">Buscar Recetas <i class="material-icons left">search</i></a></li>
                    <li><a href="CrearReceta.php">Crear Receta<i class="material-icons left">playlist_add</i></a></li>
                    <li><a href="salir.php">Salir <i class="material-icons left">power_settings_new</i></a></li>
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <!-- START SIDENAV -->
        <ul id="slide-out" class="sidenav" style="font-family: 'Acme', sans-serif;">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img class="responsive-img" src="https://wallpaperstock.net/wallpapers/thumbs1/31196wide.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="https://upload.wikimedia.org/wikipedia/commons/1/12/User_icon_2.svg"></a>
                    <a href="#name"><span class="white-text name"><?= $_SESSION['vendedor']['nombre'] ?></span></a>
                    <a href="#email"><span class="white-text email"><?= $_SESSION['vendedor']['nombre'] ?>@gmail.com</span></a>
                </div>
            </li>
            <li><a href="CrearCliente.php">Crear Cliente <i class="material-icons left">assignment_ind</i></a></li>
            <li><a href="buscar_receta.php">Buscar Recetas <i class="material-icons left">search</i></a></li>
            <li><a href="CrearReceta.php">Crear Receta <i class="material-icons left">playlist_add</i></a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="salir.php">Salir <i class="material-icons left">power_settings_new</i></a></li>
        </ul>
        <!-- END SIDENAV -->

        <div class="row" style="font-family: 'Pacifico', cursive">
            <div class="col l6 offset-l3 s10 offset-s1">
                <div class="card-panel center">
                    <h4>Welcome <?= $_SESSION['vendedor']['nombre'] ?></h4>
                </div>
            </div>

            <div class="col l6 offset-l3 s10 offset-s1">
                <div class="card-panel center">
                    <div class="card">
                        <div class="card-image">
                            <img src="../img/optica-log.png">
                            <span class="card-title">Title</span>
                        </div>
                        <div class="card-content">
                            <h5>Mision:<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit, minus! Perferendis, vero.</p></h5>
                            <br>
                            <h5>Vision:<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex ipsam fuga assumenda?</p></h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    <?php } else { ?>
        <br><br><br><br><br>

        <div class="col l4 offset-l2 center white">
            <h3 class="red-text center">ERROR!!</h3>
            <h5 class="red-text">este sitio es privado, debes iniciar sesion para poder ingresar aqui</h5>
            <a href="../index.php">
                <h2 style="border: 1px solid red;">Pincha aquí para volver</h2><br><br>
            </a>
        </div>
    <?php } ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="../js/buscar_receta.js"></script>
    <script src="../js/buscar_cliente.js"></script>
    <script src="../js/tipo_cbo.js"></script>
    <script src="../js/armazon_cbo.js"></script>
    <script src="../js/cbo.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
            var elems = document.querySelectorAll('.dropdown-trigger');
            var elems = document.querySelectorAll('.tooltipped');
            var instances = M.Tooltip.init(elems);
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                'autoClose': true,
                'format': 'yyyy/mm/dd'
            });
        });
    </script>
</body>

</html>