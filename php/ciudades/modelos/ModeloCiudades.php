<?php 

namespace app\modelos;

use \PDO;
use app\modelos\Ciudad;

class ModeloCiudades {
    /**
     * Returns all cities from the database
     */
    public static function getCiudades(){
        
        $conexion = new ConexionBD();

        // DB query to get all cities        
        $stmt = $conexion->getConnexion()->prepare("SELECT * FROM ciudades");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\modelos\Ciudad');
        $stmt->execute();
        $ciudades = $stmt->fetchAll();

        $conexion->cerrarConexion();

        return $ciudades;

    }

    /**
     * This method intert a city into mariadb
     */
    public static function insertCiudad($nombre, $pais, $latitud, $longitud) {

        $conexion = new ConexionBD();
        // DB query to insert the city
        $stmt = $conexion->getConnexion()->prepare("INSERT INTO ciudades (nombre, pais, latitud, longitud) VALUES (:nombre, :pais, :latitud, :longitud)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':pais', $pais);
        $stmt->bindParam(':latitud', $latitud);
        $stmt->bindParam(':longitud', $longitud);
        $stmt->execute();

        $conexion->cerrarConexion();

    }

    /**
     * This method deletes a city from mariadb
     */	
    public static function deleteCiudadById($id) {
        $conexion = new ConexionBD();
        // DB query to delete the city
        $stmt = $conexion->getConnexion()->prepare("DELETE FROM ciudades WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $conexion->cerrarConexion();
    }
}

?>