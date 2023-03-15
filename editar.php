<?php
include 'conector.php';

// var_dump($_GET['meses']);    

if (!isset($_POST['actualizar'])) {

    $id = $_GET['id'];

    $mes = $_GET['meses'];

    $fecha = $_GET['fecha'];

    $efectivo = $_GET['efectivo'];

    $ingreso = $_GET['ingreso'];

    $concepto = $_GET['concepto'];

    $gastos = $_GET['gastos'];

    $propina = $_GET['propina'];
} else {

    $id = $_POST['id'];

    $mes = $_POST['meses'];

    $fecha = $_POST['fecha'];

    $efectivo = $_POST['efectivo'];

    $ingreso = $_POST['ingreso'];

    $concepto = $_POST['concepto'];

    $gastos = $_POST['gastos'];

    $propina = $_POST['propina'];

    $sql = "UPDATE $mes SET fecha='$fecha', efectivo='$efectivo', ingreso= '$ingreso',gastos='$gastos', concepto='$concepto', propina='$propina'  WHERE id='$id'";

    $query = $conn->query($sql);

    //var_dump($sql);
    header("Location:index.php?meses=".$mes);
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EDITAR REGISTROS</title>
</head>

<body>

    <h1 class="text-center mt-3">EDITAR REGISTROS</h1>

    <div class="container abs-center  p-2 mb-3 w-50 mt-1 border rounded-4 border-3 ">

        <div class="input-group mb-3 mt-2 w-100 d-flex justify-content-center">
            <form name="formulario2" class="W-75 p-3 form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <input type="hidden" value="<?php echo $id ?> " name="id">


                <span class=" mt-2 input-group-text ms-2 rounded-3 bg-info text-white w-auto" id="inputGroup-sizing-default">MES
                    <input type="text" name="meses" value="<?php echo $mes ?>" class="ms-2 form-control rounded-3" placeholder="mes"></span>

                <span class=" mt-2 input-group-text ms-2 rounded-3 bg-info text-white" id="inputGroup-sizing-default">FECHA
                    <input type="text" value="<?php echo $fecha ?>" class="ms-2 form-control rounded-3" name="fecha" placeholder="fecha"></span>

                <span class="mt-2 input-group-text ms-2  rounded-3 bg-success text-white" id="inputGroup-sizing-default">EFECTIVO
                    <input type="text" value="<?php echo $efectivo ?>" name="efectivo" class="ms-2 rounded-3 form-control" placeholder="ofrenda "></span>

                <span class="mt-2 input-group-text  ms-2 rounded-3 bg-primary text-white" id="inputGroup-sizing-default ">INGRESO
                    <input type="text" value="<?php echo $ingreso ?>" name="ingreso" class="ms-2 rounded-3 form-control" placeholder="gastos"> </span>

                <span class="mt-2 input-group-text ms-2  rounded-3 bg-danger text-white" id="inputGroup-sizing-default">GASTOS
                    <input type="text" value="<?php echo $gastos ?>" name="gastos" class="ms-2 rounded-3 form-control" placeholder="gastos"> </span>

                <span class="mt-2 input-group-text  ms-2 bg-warning rounded-3" id="inputGroup-sizing-default">CONCEPTO
                    <input type="text" value="<?php echo $concepto ?> " name="concepto" class="ms-2 rounded-3 form-control" placeholder="concepto"></span>

                <span class="input-group-text ms-2 mt-2 rounded-3  text-white" id="inputGroup-sizing-default" style="background-color: green ">PROPINAS
                    <input type="text" value="<?php echo $propina ?>" name="propina" class="ms-2 rounded-3  form-control" placeholder="gastos">

                    <input type="submit" name="actualizar" value="EDITAR" class="btn btn-warning ms-5"></span>



            </form>
        </div>
        <div class="container justify-content-center d-flex">
            <a  href="index.php"><button class="btn btn-primary ">VOLVER</button></a>
            </div>
    </div>
</body>

</html>