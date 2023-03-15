<?php
require_once 'conector.php';

    $mes = $_POST['meses'];

    $fecha = $_POST['fecha'];

    $efectivo = $_POST['efectivo'];

    $concepto = $_POST['concepto'];

    $gastos = $_POST['gastos'];

$sql = "INSERT INTO $mes (fecha,efectivo, gastos ,concepto ) 
VALUES ('$fecha', '$efectivo','$gastos','$concepto')";
$query = $conn->query($sql);

header("Location:index.php?mes=".$mes);

?>