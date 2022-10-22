<?php

include('db.php');
$con = conectar();

$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];
$redirect = false;

$q = "SELECT stock FROM producto WHERE id_producto = $id_producto";

$result = mysqli_query($con, $q);


$row = mysqli_fetch_array($result);


if ($row['stock'] > 0) {

	if ($cantidad <= $row['stock']) {
		$stock = $row['stock'] - $cantidad;
		$q = "UPDATE producto SET stock = $stock  WHERE id_producto = $id_producto";
		$result = mysqli_query($con, $q);
		$q = "INSERT INTO venta (cantidad, producto) VALUES ($cantidad, $id_producto)";
		$result = mysqli_query($con, $q);
		$redirect = true;
	}else {
		echo'<script type="text/javascript">
        alert("la cantidad es mayor a el stock");
        window.location.href="producto.php";
        </script>';
	}	
}else{
	echo'<script type="text/javascript">
        alert("No se puede realizar la venta");
        window.location.href="producto.php";
        </script>';
}

if ($redirect) {
	echo'<script type="text/javascript">
        alert("Venta realizada");
        window.location.href="producto.php";
        </script>';
}


?>