<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Lobster&family=Pacifico&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="blue" style="font-family: 'Dosis', sans-serif;">
    <?php session_start(); ?>
    <?php if (isset($_SESSION['vendedor'])) { ?>

        <nav class="green" style="font-family: 'Acme', sans-serif;">
            <div class="nav-wrapper">
                <a href="IndexVend.php" class="brand-logo" style="margin-left:10px">
                    Optica2020
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="CrearCliente.php">Crear Cliente <i class="material-icons left">assignment_ind</i></a></li>
                    <li><a href="buscar_receta.php">Buscar Recetas <i class="material-icons left">search</i></a></li>
                    <li class="active"><a href="CrearReceta.php">Crear Receta<i class="material-icons left">playlist_add</i></a></li>
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

        <div id="app">
            <div class="row">
                <div class="col l3 m12 s12 ">
                </div>
                <!--------------------------------------------AQUI VA EL INGRESAR--------------------------------------->
                <div class="card-panel">
                    <h4 class="center green white-text">Buscar Cliente</h4>
                    <div class="row">
                        <div class="col l4 m12 s12">
                            <form @submit.prevent="buscar" class="pad-25 b1">
                                <input type="text" v-model="rut" placeholder="Rut_cliente">
                                <button class="btn-small">buscar</button>
                            </form>
                        </div>
                        <div class="col l8 s12 m12">
                            <p>
                                <ul class="collection b1">
                                    <li class="collection-item">nombre: {{cliente.nombre_cliente}}</li>
                                    <li class="collection-item">direccion: {{cliente.direccion_cliente}}</li>
                                    <li class="collection-item">telefono: {{cliente.telefono_cliente}}</li>
                                    <li class="collection-item">email: {{cliente.email_cliente}}</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <!-------------------------------------------Fin Buscar Cliente----------------------------------------->

            <form @submit.prevent="crearReceta">
                <div class="card-panel "><b>
                        <hr class="b1"></b>
                    Tipo Lente: *
                    <p>
                        <label>
                            <input type="radio" v-model="tipo_lente" value="cerca" />
                            <span>cerca</span>
                        </label>
                        <label class="padleft-10">
                            <input type="radio" v-model="tipo_lente" value="lejos" />
                            <span>lejos</span>
                        </label>
                    </p>
                    <div class="row">
                        <div class="col l3">
                            <!--Material Cristal-->
                            <div class="card-panel b1">
                                Material Cristal
                                <select v-model="id_material_cristal" class="browser-default b1">
                                    <option v-for="m in materiales" :value="m.id_material_cristal">
                                        {{m.material_cristal}}
                                    </option>
                                </select>
                            </div>
                            <!--Fin Material Cristal--->
                            <!--Armazon--->
                            <div class="card-panel b1">
                                Armazon
                                <select v-model="id_armazon" class="browser-default b1">
                                    <option v-for="a in armazones" :value="a.id_armazon">
                                        {{a.nombre_armazon}}
                                    </option>
                                </select>
                            </div>
                            <!--Fin Armazon--->
                        </div>
                        <!----Tipo Cristal----->
                        <div class="col l3">
                            <div class="card-panel b1">
                                Tipo Cristal
                                <select v-model="id_tipo_cristal" class="browser-default b1">
                                    <option v-for="t in Tipos" :value="t.id_tipo_cristal">
                                        {{t.tipo_cristal}}
                                    </option>
                                </select>
                            </div>
                            <!--Fin Tipo Cristal--->
                            <!--Base-->
                            <div class="card-panel b1">
                                Base
                                <select class="browser-default b1" v-model="base">
                                    <option disabled selected hidden></option>
                                    <option value="superior">superior</option>
                                    <option value="inferior">inferior</option>
                                    <option value="interna">interna</option>
                                    <option value="externa">externa</option>
                                </select>
                            </div>
                            {{$data}}
                            <!--Fin Base--->
                        </div>
                        <div class="col l6 ">
                            <div class="row">
                                <div class="col l6 ">
                                    <div class="card-panel b1">
                                        Ojo Izquierdo *
                                        <input type="number" placeholder="Esfera" v-model="esfera_oi">
                                        <input type="number" placeholder="Cilindro" v-model="cilindro_oi">
                                        <input type="number" placeholder="Eje" v-model="eje_oi">
                                    </div>
                                </div>
                                <div class="col l6">
                                    <div class="card-panel b1">
                                        Ojo Derecho *
                                        <input type="number" placeholder="Esfera" v-model="esfera_od">
                                        <input type="number" placeholder="Cilindro" v-model="cilindro_od">
                                        <input type="number" placeholder="Eje" v-model="eje_od">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <b>
                        <hr class="b1"></b>
                </div>

                <div class="card-panel b1">
                    <div class="row">
                        <div class="col l3">
                            Prisma *
                            <input type="number" v-model="prisma" placeholder="Prisma">
                            Distancia Pupilar *
                            <input type="number" v-model="pupilar" placeholder="Distancia Pupilar">
                        </div>
                        <div class="col l3 offset-l1">
                            Fecha entrega *
                            <input type="date" v-model="fecha_entrega">
                            Valor Lente *
                            <input type="number" v-model="precio" placeholder="Precio Lente">

                        </div>
                        <div class="col l3 offset-l1">
                            Fecha retiro *
                            <input type="date" v-model="fecha_retiro">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l3 ">
                            Observación <br>
                            <div class="card-panel b1 br10">
                                <input text="text" v-model="observacion" placeholder="Observación"><br><br><br>
                            </div>
                        </div>
                        <div class="col l3 offset-l1"><br>
                            Rut Medico*
                            <input type="text" v-model="rut_medico" placeholder="Rut Medico"> <br>
                            Nombre Medico*
                            <input type="text" v-model="nombre_medico" placeholder="nombre Medico">
                        </div>
                        <div class="col l4 center"><br><br><br><br> <br>
                            <button class="btn w50">Crear Receta</button>
                            <p>
                                <?php if (isset($_SESSION['resp'])) {
                                    echo $_SESSION['resp'];
                                    unset($_SESSION['resp']);
                                } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
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
    <script src="../js/buscar_cliente.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
            var elems = document.querySelectorAll('.dropdown-trigger');
            var elems = document.querySelectorAll('.tooltipped');
            var instances = M.Tooltip.init(elems);
            var elems = document.querySelectorAll('.datepicker');
        });
    </script>
</body>
</html>