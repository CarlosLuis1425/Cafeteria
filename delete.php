<?php 	
include('db.php');
$con = conectar();

$id_producto = $_GET['id'];


$q = "SELECT * FROM venta v LEFT JOIN producto ON id_producto = v.producto WHERE v.producto = $id_producto ";

$result = mysqli_query($con, $q);

if ($result) {
	$q = "DELETE FROM venta WHERE producto = $id_producto";

	$result = mysqli_query($con, $q);
	$q = "DELETE FROM producto WHERE id_producto = $id_producto";

	$result = mysqli_query($con, $q);
}else{
	$q = "DELETE FROM producto WHERE id_producto = $id_producto";

	$result = mysqli_query($con, $q);
}


echo'<script type="text/javascript">
        alert("Producto Eliminado");
        window.location.href="producto.php";
        </script>';
 ?>