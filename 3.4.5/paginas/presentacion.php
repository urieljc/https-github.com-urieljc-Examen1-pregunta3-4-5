<?php
include "../layout/header.php";
include "../lib/config.php";
require_once "../lib/datos.php";

session_start();
if (isset($_SESSION["ci"])) {
    //sacar nombre
    $ci = $_SESSION["ci"];
    $datos = "SELECT P.NOMBRE, P.APELLIDO,U.ROL FROM ACCESO U, PERSONA P WHERE P.CI=U.CI AND U.CI='$ci'";
    $resultado = mysqli_query($con, $datos);
    $filas = mysqli_num_rows($resultado);
    $ret = mysqli_fetch_array($resultado);
    $nombre = $ret['NOMBRE'];
    $apellido = $ret['APELLIDO'];
    $rol = $ret['ROL'];
    $_SESSION["rol"] = $rol;
    $persona = new modelo;
    $persona->almacenar($ci, $nombre, $apellido, $rol);
}
?>



<center>
    <div class="columns is-centered">
        <div class="column">
            <h1 class="title is-1 is-spaced ">
                <stronger>Pagina de Ingreso</stronger>
            </h1>

            <div class="container is-link">
                <div class="hero-body ">
                    <p class="title">
                    Bienvenido <?php echo $nombre . " " . $apellido; ?> </p>
                    </p>
                    <p class="subtitle has-text-danger ">
                        <strong ><?php echo $rol;?></strong> 
                    </p>
                </div>
            </div>

            <div class="buttons is-centered">
                <button class="button is-danger is-light"><a href="estudiante.php">ESTUDIANTE</a></button>
                <button class="button is-danger is-light"><a href="docente.php">DOCENTE</a></button>
                <button class="button is-danger is-light"><a href="salir.php">SALIR</a></button>
            </div>
        </div>
    </div>
</center>

<?php
include "../layout/footer.php";
?>