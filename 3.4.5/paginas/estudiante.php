<?php
include "../layout/header.php";
include "../lib/config.php";
require_once "../lib/datos.php";
session_start();

$ci = $_SESSION["ci"];
$rol = $_SESSION["rol"];


?>
   <h2 class="title is-warning"><strong>Notas de Estudiante</strong></h2>
    <?php
    if (isset($ci)) {
        if ($rol == 'estudiante') {
            $datos = "SELECT U.CARRERA,N.SIGLA,N.Nota1,N.Nota2,N.Nota3,N.NotaFinal FROM ACCESO U INNER JOIN INSCRIPCION N ON U.CI=N.CI WHERE U.CI='$ci'";
            $resultado = mysqli_query($con, $datos);
            $filas = mysqli_num_fields($resultado);
            $columnas = mysqli_num_fields($resultado);
            $ret = mysqli_fetch_array($resultado);
    ?>
            <center>
                <div class="columns is-centered">
                    <div class="column">
                        <h2 class="title">Usted es estudiante de <?php echo $ret['CARRERA'] ?></h2>
                        <table border="2">
                            <tr>
                                <th>Sigla</th>
                                <th>Nota 1</th>
                                <th>Nota 2</th>
                                <th>Nota 3</th>
                                <th>Nota Final</th>
                            </tr>
                            <tr>
                                <?php
                                while ($filas = mysqli_fetch_row($resultado)) {
                                    echo "<tr>";
                                    echo "<td>" . $filas[1] . "</td>";
                                    echo "<td>" . $filas[2] . "</td>";
                                    echo "<td>" . $filas[3] . "</td>";
                                    echo "<td>" . $filas[4] . "</td>";
                                    echo "<td>" . $filas[5] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </center>
        <?php
        } else { ?>
            <h2>usted no es estudianete</h2>
    <?php
        }
    }
    ?>
    <div class="columns is-centered">
        <div class="column">
            <div class="buttons is-centered">
            <button class="button is-danger is-light"><a href="presentacion.php">VOLVER</a></button>
            </div>
        </div>
    </div>
<?php
include "../layout/footer.php";
?>