<?php 

namespace app\controladores;

use app\vistas\VistaCiudades;
use app\vistas\VistaCrearCiudades;
use app\modelos\ModeloCiudades;
use app\vistas\VistaMostrarCiudades;

class ControladorCiudades {

    /**
     * Get all cities object and show them
     */
    public static function showCiudades() {

        $ciudades = ModeloCiudades::getCiudades();

        VistaCiudades::render($ciudades);

    }

    /**
     * This method redirects the user to the form
     */
    public static function createCiudad() {

        VistaCrearCiudades::render();

    }

    public static function insertarCiudad($nombre, $pais, $latitud, $longitud) {

        ModeloCiudades::insertCiudad($nombre, $pais, $latitud, $longitud);

        header("Location: index.php?action=verCiudades");

    }

    public static function deleteCiudadId($id) {
        
        ModeloCiudades::deleteCiudadById($id);
        
        header("Location: index.php?action=verCiudades");
    }

    public static function searchCiudades($ciudades) {
        VistaMostrarCiudades::render($ciudades);
    }
}

?>