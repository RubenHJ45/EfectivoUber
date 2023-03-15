<?php
require_once 'conector.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="./estilo.css">


</head>

<body>
    <h1 class="titulo">OFRENDAS DIARIAS KAIROS</h1>
    <div class="contenVentas">
        <table class="tabla"  width="70%"  border="0" align="center">
            <tr>
                <td style="font-size: 1.5em;color:yellowgreen ;">FECHA</td>
                <td style="font-size: 1.5em;color:yellowgreen ;">OFRENDA</td>
                <td style="font-size: 1.5em;color:yellowgreen ;">GASTOS</td>
                <td style="font-size: 1.5em;color:yellowgreen ;">CONCEPTO</td>
                <td style="font-size: 1.5em;color:yellowgreen ;">OPCIONES</td>
            </tr>
            <?php
            $sumar_cantidad = 0;
            $sumar_gastos = 0;
            $sumar_caja = 0;
            $sql = "SELECT * FROM noviembre";
            
            $query = $conn->query($sql);

            foreach ($query as $row) :
                

                $sumar_cantidad = $sumar_cantidad + floatval( $row['ofrenda']);
                $sumar_gastos = $sumar_gastos + floatval($row['gastos']);
                $sumar_caja = $sumar_cantidad - $sumar_gastos
            
            ?>
                <tr class="regis">
                    <td ><?php echo  $row['fecha']  ?></td>
                    
                    <td style="color: yellow;" ><?php echo $row['ofrenda'] ?> €</td>
                    <td style="color: red;" ><?php echo $row['gastos'] ?> €</td>
                    <td ><?php echo $row['concepto'] ?> </td>
                    <td class="botBo"><a href="borrarOfrenda.php?id=<?php echo $row['id']; ?>">
                    <input type='button'  id='borrar' name='borrar' value='BORRAR'></a></td>

                </tr>

            <?php endforeach; ?>
        </table>
       <div class="foter">
       <h1 class="suma_total"><?php echo "OFRENDAS" . "<br><spam style='color:lawngreen;'>" .  $sumar_cantidad;  ?>€</spam></h1>
        <h1 class="suma_gastos"><?php echo "GASTOS" . "<br><spam style='color:red;'>" .  $sumar_gastos;  ?>€</spam></h1>
        <h1 class="suma_caja"><?php echo "EN CAJA" . "<br><spam style='color:lawngreen;'>" .  $sumar_caja;  ?>€</spam></h1>
       
       </div>
       <a href="index.php"><button class="volver">VOLVER</button></a>
    </div>
    
</body>

</html>