<?php

use models\UsuarioModel as UsuarioModel;

ini_set('display_errors', 1);
ini_set('dispplay_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once("../models/UsuarioModel.php");
if (isset($_SESSION['usuario'])) {
    $model = new UsuarioModel();
    $users = $model->userAllVendor();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Lobster&family=Pacifico&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="blue">

    <?php if (isset($_SESSION['usuario'])) { ?>
        <!--<a class="btn w50 green">Gestion Usuario</a><a href="salir.php" class="btn w50 green">Salir</a>-->
        <nav>
    <div class="nav-wrapper green z-depth-5 section" style="font-family: 'Acme', sans-serif;">
      <a href="#" class="brand-logo center">Gestion Usuario</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="salir.php">Salir</a></li>
      </ul>
    </div>
  </nav>

        <div class="row">
            <div class="col l1">
            </div>

            <!--------FORMULARIO---CREAR--USUARIO-------->
            <div class="col l3 m4 s12 b1 mt50 white z-depth-5 section">

                <?php if (!isset($_SESSION['Update'])) { ?>

                    <form action="../controllers/ControlInsertUser.php" class="pad-20" method="POST">
                        <div class="input-field" style="font-family: 'Shadows Into Light', cursive;">
                            <input id="rut" type="text" name="rut">
                            <label for="rut">Rut</label>
                        </div>
                        <div class="input-field" style="font-family: 'Shadows Into Light', cursive;">
                            <input id="nombre" type="text" name="nombre">
                            <label for="nombre">Nombre</label>
                        </div>
                        <input type="hidden" name="rol" value="vendedor">
                        <input type="hidden" name="clave" value="123456">
                        <input type="hidden" name="estado" value="1">
                        <button class="btn w100 black" style="font-family: 'Acme', sans-serif;">Crear</button>
                    </form>

                <?php  } else { ?>

                    <!--------FORMULARIO---EDITAR--USUARIO-------->
                    <form action="../controllers/ControlUpdate.php" class="pad-20" method="POST">
                        <div class="input-field"style="font-family: 'Shadows Into Light', cursive;">
                            <input type="text" name="rut" value="<?= $_SESSION['user']['rut']?>">
                            <label for="rut">Rut</label>
                        </div>
                        <div class="input-field" style="font-family: 'Shadows Into Light', cursive;">
                            <input type="text" name="nombre" value="<?= $_SESSION['user']['nombre']?>">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="input-field" >
                            <select name="estado">
                                <option value="0">Bloqueado</option>
                                <option value="1">Habilitado</option>
                            </select>
                        </div>
                        <button class="btn w100 black" style="font-family: 'Acme', sans-serif;">Editar</button>
                    </form>


                <?php 
                    unset($_SESSION['user']);
                    unset($_SESSION['Update']); 
                }
                ?>

                <p class="center">
                    <?php if (isset($_SESSION['resp'])) {
                        echo $_SESSION['resp'];
                        unset($_SESSION['resp']);
                    } ?>
                </p>
            </div>


            <div class="col l6 m8 s12 mt50 offset-l1 white center z-depth-5 section">
                <h3 class="light-green z-depth-5 section" style="font-family: 'Acme', sans-serif;">Lista de Usuarios</h3><hr>
                <form action="../controllers/ControlBD.php" method="POST">
                    <table>
                        <tr style="font-family: 'Acme', sans-serif;
">
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Actions</th>
                        </tr>
                        <?php foreach ($users as $us) { ?>
                            <tr>
                                <td><?= $us['rut'] ?></td>
                                <td><?= $us['nombre'] ?></td>
                                <?php if ($us['estado'] == 1) { ?>
                                    <td><?= $us['estado'] = "Habilitado" ?></td>
                                <?php } else { ?>
                                    <td><?= $us['estado'] = "Bloqueado" ?></td>
                                <?php } ?>
                                <td><button class="btn" name="bt_edit" value="<?= $us["rut"] ?>">Edit</button></td>
                            </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>

    <?php } else { ?>
        <br><br><br><br><br>

        <div class="col l4 offset-l2 center white"> 
                <h3 class="red-text center">ERROR!!</h3>
                <h5 class="red-text">este sitio es privado, debes iniciar sesion para poder ingresar aqui</h5>
                <a href="../index.php">
                    <h2  style="border: 1px solid red;">Pincha aquí para volver</h2><br><br>
                </a>
        </div>
    <?php } ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>
</html>