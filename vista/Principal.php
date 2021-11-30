<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: ../index.php');
} elseif (isset($_SESSION['nombre'])) {
    include '../controller/conexion.php';
    $sentencia = $bd->query("SELECT * FROM departamento;");
    $departamentos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($alumnos);
} else {
    echo "Error en el sistema";
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" >

        <link rel="stylesheet" href="css/style.css">
        <title>Principal</title>
    </head>
    <body>


        <div>

            <section>
                <article>
                    <h1>Departamentos</h1>
                    <h2> Agrega todos los departamentos de tu empresa, después podrás asignarlos a cada empleado.</h2><br/><br/>
                    <button type="button" class="buttonlink" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">+ Agregar departamento</button>
                </article><br/><br/><br/>


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
foreach ($departamentos as $dato) {
    ?>
                            <tr>
                                <td>



                                    <a href="../models/editar.php?id=<?php echo $dato->id_departamento; ?>" data-bs-toggle="modal2" data-bs-target="#exampleModal" data-bs-whatever="@mdo">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>

                                    </a></td>
                                <td><a href="../models/eliminar.php?id=<?php echo $dato->id_departamento; ?>">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>


                                    </a></td>
                                <td><?php echo $dato->departamento; ?></td>
                                <td><?php echo $dato->responsable; ?></td>
                                <td><?php echo $dato->usuario; ?></td>


                            </tr>
    <?php
}
?>

                </table>




            </section>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo departamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form method="POST" action="../models/insertar.php">

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nombre de departamento:</label>
                                <input type="text" class="form-control" id="nombredep" name="nombredep">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Responsable:</label>
                                <input type="text" class="form-control" id="responsable" name="responsable">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Usuario:</label>
                                <input type="text" class="form-control" id="usuario" name="usuario">
                            </div>
                            <input type="hidden" name="oculto" value="1">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-secondary" data-bs-dismiss="modal" value="Registrar">

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>

