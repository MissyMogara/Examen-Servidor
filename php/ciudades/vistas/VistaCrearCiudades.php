<?php

namespace app\vistas;

class VistaCrearCiudades
{
    public static function render()
    {

        include_once "head.php";
        include_once "header.php";

?>


        <body>
            <div id="formularioCiudad">
            <h2>Crear ciudades</h2>
            <form action="index.php" method="POST">
            <input type="text" name="nombre" id="" required placeholder="Nombre de la ciudad...">
            <br>
            <input type="text" name="pais" required placeholder="País de la ciudad...">
            <br>
            <input type="number" name="latitud" required placeholder="Latitud de la ciudad...">
            <br>
            <input type="number" name="longitud" id="" require placeholder="Longitud de la ciudad...">
            <br>
            <button type="submit" class="submit-btn" name="insertCiudad">Crear</button>
            <button type="reset" class="reset-btn">Borrar</button>
            </form>
            </div>
        </body>

<?php

        include_once "footer.php";
    }
}


?>