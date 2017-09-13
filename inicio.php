<?php
session_start(); 
if(!isset($_SESSION['username'])){
    header("Location: index.php"); //redirect
    die();
}

$id = 0;
require "listado_index.php";
require "layout_top.php";?>
        <fieldset>
            <legend>
                <a href="alta.php">Alta Nuevo</a><br/>

                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Estado</th>
                        <th>Nacionalidad</th>
                    </tr>
                    <?php
                    foreach ($results as $p) {
                        printf("<tr><th>%s</th><th>%s</th><th>%s</th>", $p->nombre, $p->apellido, $p->fechnac
                        );
                        if ($p->activo == 1) {
                            printf("<th>Activo</th>");
                        } else {
                            printf("<th>Inactivo</th>");
                        }
                        printf("<th>%s</th>", $p->descripcion);
                        ?>

                        <th><a href="modificacion.php?id=<?php echo $p->id ?>" name="id" value="<?php $id = $p->id ?>">Modificar</a></th>
                        <th><a href="baja.php?id=<?php echo $p->id ?>" name="id" value="<?php $id = $p->id ?>">Baja</a></th></tr><br/>
                    <?php } ?>
                </table>
            </legend>
        </fieldset>
<?php require "layout_bottom.php";?>