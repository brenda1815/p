<?php
    session_start();
    require_once "../../clases/Conexion.php";

    $c = new Conectar();
    $conexion = $c->conexion();

    $idUsuario = $_SESSION['idUsuario'];
    $sql = "SELECT id_categoria, nombre_categoria FROM tabla_categoria WHERE id_usuario = '$idUsuario'";
    $result = mysqli_query($conexion,$sql);

?>
<!-- Creacion del selec para que el usuario pueda escoger en que ctaegoria quiere guardar
el archivo -->

<select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
    <?php
        while ($mostrar = mysqli_fetch_array($result)){
        $idCategoria = $mostrar['id_categoria'];
    ?>
        <option value="<?php echo $idCategoria?>"><?php echo $mostrar['nombre_categoria']; ?></option>
    <?php
        }
    ?>
</select>
