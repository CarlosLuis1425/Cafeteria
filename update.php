<?php

include('db.php');
$con = conectar();

$id_producto = $_GET['id'];

$q = "SELECT * FROM producto WHERE id_producto = $id_producto";

$result = mysqli_query($con, $q);



$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Producto</title>
</head>
<body>
        <div class="container text-center">
                <div class="row">
                        <div class="col-3">
                                <h3>Actualizar Producto</h3>
                                <form action="save.php" method="POST">
                                        <input class="form-control" name="id_producto" id="nombre_producto" type="hidden" placeholder="Nombre Producto" value = '<?php echo $row['id_producto']?>'>
                                        <input class="form-control" name="nombre_producto" id="nombre_producto" type="text" placeholder="Nombre Producto" value = '<?php echo $row['nombre_producto']?>'>
                                        <input class="form-control" name="referencia" ide="referencia" type="text" placeholder="Referencia" value = '<?php echo $row['referencia']?>'>
                                        <input class="form-control" name="precio" id="precio" type="number" placeholder="Precio" value = '<?php echo $row['precio']?>'>
                                        <input class="form-control" name="peso" id="peso" type="number" placeholder="Peso"value = '<?php echo $row['peso']?>'>
                                        <input class="form-control" name="categoria" id="categoria" type="text" placeholder="Categoría" value = '<?php echo $row['categoria']?>'>
                                        <input class="form-control" name="stock" id="stock" type="number" placeholder="Stock" value = '<?php echo $row['stock']?>'>
                                        <input class="form-control" name="fecha_creacion" id="fecha_creacion" type="date" data-date-format="YYYY-MM-DD" placeholder="Fecha de creación" value = '<?php echo $row['fecha_creacion']?>'>
                                        <button type="sucess" class="btn btn-success">Actualizar</button>
                                </form>
                        </div>
                        <div class="col-9">
                                <h2>Lista</h2>
                                <table class="table table-striped">
                                        <thead>
                                                <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Nombre producto</th>
                                                        <th scope="col">Referencia</th>
                                                        <th scope="col">Precio</th>
                                                        <th scope="col">Peso</th>
                                                        <th scope="col">Categoría</th>
                                                        <th scope="col">Stock</th>
                                                        <th scope="col">Fecha Creación</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>

                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php 
                                                $q = "SELECT * FROM producto";
                                                $result = mysqli_query($con, $q);

                                                while ($row = mysqli_fetch_array($result)) {



                                                        ?>
                                                        <tr>
                                                                <th scope="row"><?php echo $row['id_producto']?></th>
                                                                <td><?php       echo $row['nombre_producto']?></td>
                                                                <td><?php       echo $row['referencia']?></td>
                                                                <td><?php       echo $row['precio']?></td>
                                                                <td><?php       echo $row['peso']?></td>
                                                                <td><?php       echo $row['categoria']?></td>
                                                                <td><?php       echo $row['stock']?></td>
                                                                <td><?php       echo $row['fecha_creacion']?></td>
                                                                <td><a href="update.php?id=<?php echo $row['id_producto']?>"type="button" class="btn btn-primary">Editar</a></td>
                                                                <td><a href="delete.php?id=<?php echo $row['id_producto']?>"  type="button" class="btn btn-danger">Eliminar</a></td>
                                                        </tr>
                                                        <?php   
                                                }
                                                ?>
                                        </table>
                                </div>
                        </div>

                </div>
        </div>
</body>
</html>