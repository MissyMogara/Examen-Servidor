<?php

namespace app\vistas;

use app\modelos\Ciudad;

class VistaCiudades
{
    public static function render($ciudades)
    {

        include_once "head.php";
        include_once "header.php";

?>


        <body>
            <div class="buscador">
                <form action="index.php" method="POST">
                    <input type="text" placeholder="Nombre ciudad..." name="ciudad" id="ciudad" required>
                    <input type="text" placeholder="País ciudad..." name="pais" id="pais" required>
                    <button type="submit" name="buscarCiudad" class="bucador-btn" id="buscador">Buscar</button>
                </form>
            </div>

            <div class="contenedor-tabla ">
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>País</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>Opciones</th>
                    </tr>
                    <?php

                    foreach ($ciudades as $ciudad) {
                        echo "<tr>";
                        echo "<td>" . $ciudad->getNombre() . "</td>";
                        echo "<td>" . $ciudad->getPais() . "</td>";
                        echo "<td>" . $ciudad->getLatitud() . "</td>";
                        echo "<td>" . $ciudad->getLongitud() . "</td>";
                        echo "<td>
                            <a href='index.php?action=eliminar&id=" . $ciudad->getId() . "' class='table-link'>X</a>
                          </td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </body>

<?php

        include_once "footer.php";
    }
}


?>