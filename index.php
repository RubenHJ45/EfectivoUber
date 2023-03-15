<?php

require_once 'conector.php';


// No mostrar los errores de PHP
error_reporting(0);


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="estilo.css"> -->

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/datatables.net/js/jquery.dataTables.min.js"></script>

    <script src="./node_modules/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>

    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">


    <script>
        $(document).ready(function() {
            $('#example').DataTable({


                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Hay _TOTAL_ Resultados",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Resultados",
                    "infoFiltered": "(Filtrado de _MAX_ total Resultados)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Resultados",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>

    <title>CUENTAS EFECTIVO UBER</title>
</head>

<body>
    <?php


    if (isset($_POST['insertar'])) {

        $mes = $_POST['meses'];

        $fecha = $_POST['fecha'];

        $efectivo = $_POST['efectivo'];

        $ingreso = $_POST['ingreso'];

        $concepto = $_POST['concepto'];

        $gastos = $_POST['gastos'];

        $propina = $_POST['propina'];

        $sql = "INSERT INTO $mes (fecha,efectivo, gastos ,ingreso,concepto,propina ) 
    VALUES ('$fecha', '$efectivo','$gastos','$ingreso','$concepto','$propina')";
        $query = $conn->query($sql);

        //var_dump($sql);
    }


    // $nov = "";
    // $dic = "";
    $crear = "";

    // if(isset($_REQUEST['meses']))$mes =$_POST['meses'];
    // if(isset($_POST['dic']))$dic =$_POST['dic'];
    if (isset($_POST['crear'])) $crear = $_POST['crear'];

    if ($crear) {
        $mes = $_POST['nuevo'];
        $sql = "CREATE TABLE `uber`.`$mes` ( `id` INT NOT NULL AUTO_INCREMENT , `fecha` VARCHAR(150) NOT NULL , `efectivo` DOUBLE NOT NULL , `gastos` DOUBLE NOT NULL , `ingreso` DOUBLE NOT NULL , `concepto` VARCHAR(200) NOT NULL , `propina` DOUBLE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $query = $conn->query($sql);
    }

    //var_dump($sql);

    ?>

    <h1 class="text-center mt-2">CUENTAS EFECTIVO UBER </h1>
    <div id="caja">

    </div>

    </div>
    <div class="container border rounded-3 p-3 d-flex ">
        <div class="container rounded-3 justify-content-center" style="width:28% ;">
            <form name="formulario1" class="p-3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <h2 class="text-center">INGRESAR EFECTIVO</h2>



                <span class="input-group-text bg-info  text-white rounded-3" id="inputGroup-sizing-default">MES
                    <select name="meses" class="form-control ms-2" id="meses" required>

                        <option value="">seleccione mes</option>
                        <option value="enero">ENERO</option>
                        <option value="febrero">FEBRERO</option>
                        <option value="marzo">MARZO</option>
                        <option value="abril">ABRIL</option>
                        <option value="mayo">MAYO</option>
                        <option value="junio">JUNIO</option>
                        <option value="julio">JULIO</option>
                        <option value="agosto">AGOSTO</option>
                        <option value="septiembre">SEPTIEMBRE</option>
                        <option value="octubre">OCTUBRE</option>
                        <option value="noviembre">NOVIEMBRE</option>
                        <option value="diciembre">DICIEMBRE</option>

                    </select></span>

                <span class="input-group-text  mt-2 rounded-3 bg-info text-white" id="inputGroup-sizing-default">FECHA
                    <input type="text" id="fecha" class="form-control ms-2 " name="fecha"></span>


                <span class="input-group-text  mt-2  rounded-3 bg-success text-white" id="inputGroup-sizing-default">EFECTIVO
                    <input type="text" name="efectivo" class="form-control p-2 ms-2" placeholder="efectivo €" required aria-label="Sizing example input"></span>

                <span class="input-group-text mt-2 rounded-3 bg-danger text-white" id="inputGroup-sizing-default">GASTOS
                    <input type="text" name="gastos" class="form-control 
                     m-auto ms-3 p-2" placeholder="gastos €"></span>

                <span class="input-group-text mt-2  rounded-3 bg-primary text-white" id="inputGroup-sizing-default ">INGRESO
                    <input type="text" name="ingreso" class="form-control ms-2" placeholder="gastos €"></span>


                <span class="input-group-text mt-2  bg-warning rounded-3" id="inputGroup-sizing-default">CONCEPTO
                    <input type="text" name="concepto" class="form-control ms-2 " placeholder="concepto"></span>

                <span class="input-group-text  mt-2 rounded-3 text-white" id="inputGroup-sizing-default" style="background-color: green ;">PROPINAS
                    <input type="text" name="propina" class="form-control ms-2" placeholder="propinas"></span>

                <input type="submit" name="insertar" value="GUARDAR" class="btn btn-primary text-white ms-2 mt-3 rounded-3">



            </form>

        </div> <!-- DIV FINAL DE FORMULARIO INGRESO -->


        <div class="container border rounded-3 p-3 justify-content-center  mt-3  mb-2 ">

            <h1 class="text-center mb-1 mt-1 border p-2 rounded-3 border-3"><?php echo strtoupper($_GET["meses"]); ?></h1>

            <table id="example" class="table mt-2 table-dark  table-striped table-hover table-bordered " width="100%" data-page-length="6">
                <thead class="text-center border">
                    <tr>
                        <th>ID</th>
                        <th style="width:15% ;">FECHA</th>
                        <th>EFECTIVO</th>
                        <th>GASTOS</th>
                        <th>INGRESO</th>
                        <th>CONCEPTO</th>
                        <th>PROPINAS</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>

                <?php
                $mes = $_GET["meses"];
                $sumar_cantidad = 0;
                $sumar_gastos = 0;
                $sumar_caja = 0;
                $ingreso = 0;
                $ingresar = 0;
                $propinas = 0;

                // var_dump($mes);

                $sql = "SELECT * FROM $mes ORDER BY id";

                $query = $conn->query($sql);

                foreach ($query as $row) :


                    $sumar_cantidad = $sumar_cantidad + floatval($row['efectivo']);
                    $sumar_gastos = $sumar_gastos + floatval($row['gastos']);
                    $sumar_caja = $sumar_cantidad - $sumar_gastos;
                    $ingreso = $ingreso + floatval($row['ingreso']);
                    $ingresar =  $sumar_cantidad - $ingreso;
                    $propinas = $propinas + floatval($row['propina']);
                    $ingresarGastos = $ingresar - $sumar_gastos;


                ?>

                    <tr>
                        <td class="text-center" style="color: lightskyblue;font-size:1.2rem;"><?php echo  $row['id']  ?></td>

                        <td class="text-center" style="color: lightskyblue;font-size:1.2rem;"><?php echo  $row['fecha']  ?></td>

                        <td class="text-center" style="color: rgb(26, 221, 26);font-size:1.5rem;"><?php echo $row['efectivo'] ?> €</td>
                        <td class="text-center" style="color: red;font-size:1.5rem;"><?php echo $row['gastos'] ?> €</td>
                        <td class="text-center text-primary" style="font-size:1.5rem;"><?php echo $row['ingreso'] ?> €</td>

                        <td class="text-center text-warning " style="width:100px;"><?php echo strtoupper($row['concepto']) ?> </td>
                        <td class="text-center" style="color: green;font-size:1.5rem;"><?php echo $row['propina'] ?> €</td>

                        <td class="text-center"><a href="borrarOfrenda.php?id=<?php echo $row['id']; ?>&mes=<?php echo $mes ?>"><i id='borrar' name='borrar' class="bi bi-trash-fill btn btn-danger" type='button' onclick="return confirm('Estas seguro que quieres borra al usuario?')"></i> </a>

                            <a href="editar.php?id=<?php echo $row['id']; ?>&meses=<?php echo $mes; ?>&fecha=<?php echo $row['fecha']; ?>&efectivo=<?php echo $row['efectivo']; ?>&ingreso=<?php echo $row['ingreso']; ?>&gastos=<?php echo $row['gastos']; ?>&concepto=<?php echo $row['concepto']; ?>&propina=<?php echo $row['propina']; ?>">
                                <i class="bi bi-pencil btn btn-warning" id='editar' name='editar'></i>


                            </a>
                        </td>

                    </tr>

                <?php endforeach; ?>
            </table>

            <div class="container mt-2 overflow-auto rounded-3 border d-flex p-3 justify-content-center">


                <form action="index.php" class="row ">
                    <div class="col-12 ">

                        <span class="input-group-text me-2 mt-2 bg-info text-white w-100 rounded-3" id="inputGroup-sizing-default">MES
                            <select name="meses" class="form-select  ms-2" id="meses" onchange="this.form.submit()">

                                <option value="">seleccione mes</option>
                                <option value="enero">ENERO</option>
                                <option value="febrero">FEBRERO</option>
                                <option value="marzo">MARZO</option>
                                <option value="abril">ABRIL</option>
                                <option value="mayo">MAYO</option>
                                <option value="junio">JUNIO</option>
                                <option value="julio">JULIO</option>
                                <option value="agosto">AGOSTO</option>
                                <option value="septiembre">SEPTIEMBRE</option>
                                <option value="octubre">OCTUBRE</option>
                                <option value="noviembre">NOVIEMBRE</option>
                                <option value="diciembre">DICIEMBRE</option>


                            </select></span>
                    </div>

                </form>



                <form class="row ms-2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-group ms-1 mb-2 mt-2 ">
                        <span class="input-group-text bg-success text-white" id="inputGroup-sizing-default">NUEVO
                            <input type="text" id="nuevo" name="nuevo" class="form-control ms-2" placeholder="nuevo mes" required>
                            <input type="submit" id="crear" name="crear" class="btn btn-primary border border-1 ms-3 text-white" value="CREAR"></span>
                    </div>


                </form>

            </div> <!-- FIN DE FORMULARIOS NUEVOS MESES -->

        </div> <!-- FIN DE CONTENEDOR DE TABLA -->
    </div>
    <!--fin de contenedor de todo -->


    <div class="container  p-4 mt-3 border mb-5  rounded-3">
        <div class="row ">
            <div class="col">
                <h1 class="border rounded-3 p-2 text-center"><?php echo "EFECTIVO" . "<br><spam style='color:lawngreen;'>" .  $sumar_cantidad;  ?>€</spam>
                </h1>
            </div>
            <div class="col">
                <h1 class="border rounded-3 p-2 text-center"><?php echo "GASTOS" . "<br><spam style='color:red;'>" .  $sumar_gastos;  ?>€</spam>
                </h1>
            </div>
            <div class="col">
                <h1 class="border rounded-3 p-2 text-center"><?php echo "PROPINAS" . "<br><spam style='color:lawngreen;'>" .  $propinas;  ?>€</spam>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h1 class="border rounded-3 p-2 text-center"><?php echo "CAJA-GASTO" . "<br><spam style='color:lawngreen;'>" .  $sumar_caja;  ?>€</spam>
                </h1>
            </div>

            <div class="col">
                <h1 class="border rounded-3 p-2  text-center"><?php echo "INGRESADO" . "<br><spam style='color:blue;'>" .  $ingreso; ?>€</spam>
                </h1>
            </div>
            <div class="col">
                <h1 class="border rounded-3 p-2 text-center"><?php echo "INGRESAR" . "<br><spam style='color:#ecf95c;'>" .  $ingresar .' - ' . $ingresarGastos ;  ?>€</spam>
                </h1>
            </div>
            <!-- <div class="col">
                <h1 class="border rounded-3 p-2 text-center"><?php echo "CON GASTOS" . "<br><spam style='color:#ecf95c;'>" .  $ingresarGastos ;?>€</spam>
                </h1>
            </div> -->

        </div>


    </div>

    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        let dias_semana = ["DOMINGO", "LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO"];
        let mes_anio = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];

        // crea un nuevo objeto `Date`
        var today = new Date();
        // `getDate()` devuelve el día del mes (del 1 al 31)
        var day = today.getDate();
        // `getMonth()` devuelve el mes (de 0 a 11)
        var month = today.getMonth() + 1;
        // `getFullYear()` devuelve el año completo
        var year = today.getFullYear();
        //alert(dias_semana);
        document.getElementById('fecha').value = dias_semana[today.getDay()] + ' ' + day + '/' + month + '/' + year;
    </script>
</body>

</html>