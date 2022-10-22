<?php 	

include('db.php');
$con = conectar();

$id_producto = $_POST['id_producto'];
$nombre_producto = $_POST['nombre_producto'];
$referencia = $_POST['referencia'];
$precio = $_POST['precio'];
$peso = $_POST['peso'];
$categoria = $_POST['categoria'];
$stock = $_POST['stock'];
$fecha_creacion = $_POST['fecha_creacion'];




if (empty($id_producto)) {
	$q = "INSERT INTO producto (nombre_producto, referencia, precio, peso, categoria, stock, fecha_creacion) VALUES ('$nombre_producto', '$referencia', $precio, $peso, '$categoria', $stock, '$fecha_creacion')";
	$result = mysqli_query($con, $q);
	
	echo'<script type="text/javascript">
        alert("producto registrado");
        window.location.href="producto.php";
        </script>';
}else{
	$q = "UPDATE producto SET nombre_producto = '$nombre_producto', referencia = '$referencia', precio = $precio, peso = $peso, categoria = '$categoria', stock = $stock, fecha_creacion = '$fecha_creacion' WHERE id_producto = $id_producto";
	$result = mysqli_query($con, $q);
	
	echo'<script type="text/javascript">
        alert("Producto Actualizado");
        window.location.href="producto.php";
        </script>';
}


 ?>