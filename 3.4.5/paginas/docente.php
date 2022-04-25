 <?php
    include "../layout/header.php";
    include "../lib/config.php";
    require_once "../lib/datos.php";
    session_start();
    $ci = $_SESSION["ci"];
    $rol = $_SESSION["rol"];
    if (isset($ci)) {
    ?>
     <h2 class="title">Consulta Docente</h2>
     <?php
        if ($rol == "docente") {
            $datos = "SELECT P.DEPARTAMENTO, N.SIGLA, N.NotaFinal FROM PERSONA P INNER JOIN INSCRIPCION N ON P.CI=N.CI";
            $resultado = mysqli_query($con, $datos);
            $filas = mysqli_num_rows($resultado);
            $columnas = mysqli_num_fields($resultado);
            $ret = mysqli_fetch_array($resultado);
            while ($filas = mysqli_fetch_row($resultado)) {
                if ($filas[0] == 1) {
                    $materiaChu[] = array('materia' => $filas[1], 'nota' => $filas[2]);
                }
                if ($filas[0] == 2) {
                    $materiaLapaz[] = array('materia' => $filas[1], 'nota' => $filas[2]);
                }
                if ($filas[0] == 3) {
                    $materiaCocha[] = array('materia' => $filas[1], 'nota' => $filas[2]);
                }
                if ($filas[0] == 4) {
                    $materiaOruro[] = array('materia' => $filas[1], 'nota' => $filas[2]);
                }
                if ($filas[0] == 5) {
                    $materiaPotosi[] = array('materia' => $filas[1], 'nota' => $filas[2]);
                }
                if ($filas[0] == 6) {
                    $materiaTarija[] = array('materia' => $filas[1], 'nota' => $filas[2]);
                }
                if ($filas[0] == 7) {
                    $materiaSantacruz[] = array('materia' => $filas[1], 'nota' => $filas[2]);
                }
                if ($filas[0] == 8) {
                    $materiaBeni[] = array('materia' => $filas[1], 'nota' => $filas[2]);
                }
                if ($filas[0] == 9) {
                    $materiaPando[] = array('materia' => $filas[1], 'nota' => $filas[2]);
                }
            }
            foreach ($materiaChu as $row) {
                $sigla[] = $row['materia'];
            }
            foreach ($materiaLapaz as $row) {
                $sigla[] = $row['materia'];
            }
            foreach ($materiaCocha as $row) {
                $sigla[] = $row['materia'];
            }
            foreach ($materiaOruro as $row) {
                $sigla[] = $row['materia'];
            }
            foreach ($materiaPotosi as $row) {
                $sigla[] = $row['materia'];
            }
            foreach ($materiaTarija as $row) {
                $sigla[] = $row['materia'];
            }
            foreach ($materiaSantacruz as $row) {
                $sigla[] = $row['materia'];
            }
            foreach ($materiaBeni as $row) {
                $sigla[] = $row['materia'];
            }
            foreach ($materiaPando as $row) {
                $sigla[] = $row['materia'];
            }
            $siglaUni = array_unique($sigla);
        ?>

         <table border="3">
             <tr>
                 <th>sigla</th>
                 <th>CH.</th>
                 <th>LP</th>
                 <th>CB</th>
                 <th>OR</th>
                 <th>PT</th>
                 <th>TJ</th>
                 <th>SC</th>
                 <th>BE</th>
                 <th>PD</th>
             </tr>
             <?php
                foreach ($siglaUni as $s) {
                    echo "<tr>";
                    echo "<td>" . $s . "</td>";
                    //chuquisaca
                    $media = 0;
                    $notaDup = array();
                    foreach ($materiaChu as $row) {

                        if ($s == $row['materia']) {
                            $notaDup[] = $row['nota'];
                        }
                    }

                    if (array_sum($notaDup) == 0) {
                        $media = 0;
                    } else {
                        $media = intdiv(array_sum($notaDup), count($notaDup));
                    }
                    echo "<td>" . $media . "</td>";
                    //la paz
                    $media = 0;
                    $notaDup = array();
                    foreach ($materiaLapaz as $row) {

                        if ($s == $row['materia']) {
                            $notaDup[] = $row['nota'];
                        }
                    }

                    if (array_sum($notaDup) == 0) {
                        $media = 0;
                    } else {
                        $media = intdiv(array_sum($notaDup), count($notaDup));
                    }
                    echo "<td>" . $media . "</td>";
                    //cochabamba
                    $media = 0;
                    $notaDup = array();
                    foreach ($materiaCocha as $row) {

                        if ($s == $row['materia']) {
                            $notaDup[] = $row['nota'];
                        }
                    }

                    if (array_sum($notaDup) == 0) {
                        $media = 0;
                    } else {
                        $media = intdiv(array_sum($notaDup), count($notaDup));
                    }
                    echo "<td>" . $media . "</td>";
                    //oruro
                    $media = 0;
                    $notaDup = array();
                    foreach ($materiaOruro as $row) {

                        if ($s == $row['materia']) {
                            $notaDup[] = $row['nota'];
                        }
                    }

                    if (array_sum($notaDup) == 0) {
                        $media = 0;
                    } else {
                        $media = intdiv(array_sum($notaDup), count($notaDup));
                    }
                    echo "<td>" . $media . "</td>";
                    //potosi
                    $media = 0;
                    $notaDup = array();
                    foreach ($materiaPotosi as $row) {

                        if ($s == $row['materia']) {
                            $notaDup[] = $row['nota'];
                        }
                    }

                    if (array_sum($notaDup) == 0) {
                        $media = 0;
                    } else {
                        $media = intdiv(array_sum($notaDup), count($notaDup));
                    }
                    echo "<td>" . $media . "</td>";
                    //tarija
                    $media = 0;
                    $notaDup = array();
                    foreach ($materiaTarija as $row) {

                        if ($s == $row['materia']) {
                            $notaDup[] = $row['nota'];
                        }
                    }

                    if (array_sum($notaDup) == 0) {
                        $media = 0;
                    } else {
                        $media = intdiv(array_sum($notaDup), count($notaDup));
                    }
                    echo "<td>" . $media . "</td>";
                    //santa cruz
                    $media = 0;
                    $notaDup = array();
                    foreach ($materiaSantacruz as $row) {

                        if ($s == $row['materia']) {
                            $notaDup[] = $row['nota'];
                        }
                    }

                    if (array_sum($notaDup) == 0) {
                        $media = 0;
                    } else {
                        $media = intdiv(array_sum($notaDup), count($notaDup));
                    }
                    echo "<td>" . $media . "</td>";
                    //beni
                    $media = 0;
                    $notaDup = array();
                    foreach ($materiaBeni as $row) {

                        if ($s == $row['materia']) {
                            $notaDup[] = $row['nota'];
                        }
                    }

                    if (array_sum($notaDup) == 0) {
                        $media = 0;
                    } else {
                        $media = intdiv(array_sum($notaDup), count($notaDup));
                    }
                    echo "<td>" . $media . "</td>";
                    //pando
                    $media = 0;
                    $notaDup = array();
                    foreach ($materiaPando as $row) {

                        if ($s == $row['materia']) {
                            $notaDup[] = $row['nota'];
                        }
                    }

                    if (array_sum($notaDup) == 0) {
                        $media = 0;
                    } else {
                        $media = intdiv(array_sum($notaDup), count($notaDup));
                    }
                    echo "<td>" . $media . "</td>";
                    echo "</tr>";
                }
            } else {

                ?>
             <h2>usted no es docente</h2>
         <?php
            }
            ?>
         </table>
     <?php
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