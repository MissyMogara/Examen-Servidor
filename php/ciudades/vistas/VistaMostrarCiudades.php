<?php

namespace app\vistas;

class VistaMostrarCiudades
{
    public static function render($ciudades)
    {

        include_once "head.php";
        include_once "header.php";

?>


        <body>
            <h2 class="text-center">Ciudades</h2>
            <?php 
            foreach ($ciudades->results as  $ciudad){
                $nombre = $ciudad->components->_normalized_city;
                $pais = $ciudad->components->country;
                $latitud = $ciudad->annotations->DMS->lat;
                $longitud = $ciudad->annotations->DMS->lng;

                echo '
            <div class="card">
                <span>Nombre: </span><span>' . $nombre . '</span>
                <br>
                <span>País: </span><span>' . $pais . '</span>
                <br>
                <span>Latitud: </span><span>' . $latitud . '</span>
                <br>
                <span>Longitud: </span><span>' . $longitud . '</span>
                <br>
                <a href="index.php?action=addCiudad&ciudadNombre=' . $nombre . '&ciudadPais=' . $pais . '&ciudadLat=' . $latitud . '&ciudadLng=' . $longitud . '">Añadir</a>
            </div>
            ';
            }
                        
            ?>

            
        </body>

<?php

        include_once "footer.php";
    }
}


?>