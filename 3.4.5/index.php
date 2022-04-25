<?php include "layout/header.php";
include "lib/config.php";
?>
    
    <center>
        <div class="columns is-centered">
            <div class="column is-one-quarter">
                <div class="login">
                    <p class="title is-3 is-spaced">Ingreso</p>
                    <form action="index.php" method="POST">
                        <div class="field">
                            <label class="label">Usuario</label>
                            <div class="control">
                                <input class="input" type="text" name="usuario" id="usuario" placeholder="Ingrese Usuario">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Clave</label>
                            <div class="control">
                                <input class="input" type="password" name="clave" id="clave" placeholder="Password">
                            </div>
                        </div>
                        <div class="field">
                            <p class="control">
                                <button class="button is-success">
                                    Aceptar
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>

    <?php
    
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "mibasebazan");
    if ($_POST) {
        session_start();

        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $datos = "SELECT CI FROM ACCESO WHERE USUARIO = '$usuario' AND PASSWORD = '$clave'";
        $resultado = mysqli_query($con, $datos);
        $filas = mysqli_num_rows($resultado);

        if ($filas != 0) {
            $ret = mysqli_fetch_array($resultado);
            $ci = $ret['CI'];
            $_SESSION["ci"] = $ret['CI'];
            //echo "usuario encontrado".$_SESSION["ci"];
            header("location:paginas/presentacion.php");
        }
    }
    ?>
<?php include "layout/footer.php";
?>