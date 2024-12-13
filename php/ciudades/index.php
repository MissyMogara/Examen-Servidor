<?php

namespace app;

use app\controladores\ControladorCiudades;

use app\controladores\ControladorOpenCageData;

session_start();

/**
 * AUTOLOAD
 */
spl_autoload_register(function ($class) {
    $ruta = substr($class, strpos($class, "\\") + 1);
    $ruta = str_replace("\\", "/", $ruta);
    include_once "./" . $ruta . ".php";
});

if (isset($_REQUEST["action"])) {

    if (strcmp($_REQUEST["action"], "llamarApi") == 0) {
    }

    if (strcmp($_REQUEST["action"], "crearCiudad") == 0) {
        ControladorCiudades::createCiudad();
    }

    if (strcmp($_REQUEST["action"], "verCiudades") == 0) {
        ControladorCiudades::showCiudades();
    }

    if (strcmp($_REQUEST["action"], "eliminar") == 0) {
        ControladorCiudades::deleteCiudadId($_REQUEST["id"]);
    }

    if (strcmp($_REQUEST["action"], "addCiudad") == 0) {
        ControladorCiudades::insertarCiudad($_REQUEST["ciudadNombre"], $_REQUEST["ciudadPais"], $_REQUEST["ciudadLat"], $_REQUEST["ciudadLng"]);
    }

    // if(strcmp($_REQUEST["action"], "buscarCiudad") == 0) {

    //     $nombreCiudad = $_REQUEST["ciudad"];
    //     $pais = $_REQUEST["pais"];

    //     $ciudades = ControladorOpenCageData::llamarApi($nombreCiudad, $pais);

    //     if($ciudades != null){
    //         ControladorCiudades::searchCiudades($ciudades);
    //     } else {
    //         ControladorCiudades::showCiudades($error);
    //     }

    // }

} else if ($_POST != null) {

    if (isset($_POST["insertCiudad"])) {

        $nombre = $_POST["nombre"];
        $pais = $_POST["pais"];
        $latitud = $_POST["latitud"];
        $longitud = $_POST["longitud"];

        ControladorCiudades::insertarCiudad($nombre, $pais, $latitud, $longitud);
    }

    if (isset($_POST["buscarCiudad"])) {
        $nombreCiudad = $_POST["ciudad"];
        $pais = $_POST["pais"];

        $ciudades = ControladorOpenCageData::llamarApi($nombreCiudad, $pais);

        if ($ciudades != null) {
            ControladorCiudades::searchCiudades($ciudades);
        }
    }

} else {

    ControladorCiudades::showCiudades();
    
}
