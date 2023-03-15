<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORRAR REGISTRO</title>
</head>
<body>

<?php 

include('conector.php');

    $id =$_GET['id'];
    $mes = $_GET['mes'];

    $sql = "DELETE FROM $mes WHERE ID='$id'";
    $query = $conn->query($sql);

    

    header("Location:index.php?meses=".$mes);
?>
    
</body>
</html>