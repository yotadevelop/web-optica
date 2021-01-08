<?php

session_start();
if(isset($_SESSION['usuario'])){
    unset($_SESSION['usuario']);
    session_destroy();
}

if(isset($_SESSION['vendedor'])){
    unset($_SESSION['vendedor']);
    session_destroy();
}

header("Location: ../index.php");
