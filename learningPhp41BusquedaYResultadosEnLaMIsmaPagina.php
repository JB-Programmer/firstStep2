<!-- Vid 41
PARTIMOS DE LAS PAGINAS DE learningPhp39 Y CON ALGUNAS MODIFICACIONES:
Queremos mostrar tanto la barra de busqueda como los resultados en la misma pagina
 ojo, el error que aparece es debido a qeu estamos ejecutando en local
 
 -->

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

                <?php
            //Aqui hemos creado un buscador, lo introducido en el input de learningPhp39 viaja hasta aqui
            //y trae todos los resultados que contienen antes o despues lo escrito '%$busqueda%'
            
            function ejecuta_consulta($labusqueda){
            


                    include 'learningPhp33a.php';

                    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);


                    //Esta funcion mysqli connect errno lo que hace es ejecutarse automaticamente cuando no consigue conectar con la db
                    if(mysqli_connect_errno()){

                        echo "No se puede conectar a la Base de Datos";
                        exit();

                    }

                    mysqli_set_charset($conexion, "utf8");

                    mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra base de datos");

                    echo "conectado";

                    $consulta = "SELECT * FROM productos WHERE NOMBREARTÍCULO LIKE '%$labusqueda%'";

                    //It is a recordSet, it is like a virtual table created in the memory.
                    $resultados = mysqli_query($conexion, $consulta);

                
                    echo "<table width='50%' align='center' border='1px dotted black'>";

                    while($filaasociativa = mysqli_fetch_array($resultados, MYSQL_ASSOC)){
                        echo "<tr><td>";
                        echo $filaasociativa['CÓDIGOARTÍCULO']."</td><td>";
                        echo $filaasociativa['NOMBREARTÍCULO']."</td><td> ";
                        echo $filaasociativa['PAÍSDEORIGEN']."</td><td> ";
                        //echo $filaasociativa['IMPORTADO']."</td><td>";
                        echo $filaasociativa['PRECIO']."</td> ";

                    }
                    echo "</table>";



                    //Cuando termine de trabajar con la base de datos, lo cierro
                    mysqli_close($conexion);
                
            }

            ?>
    </head>


    <body>
        
    <?php

            $mibusqueda=$_GET['buscar'];

            $mipag=$_SERVER['PHP_SELF'];

            if($mibusqueda!=NULL){
                ejecuta_consulta($mibusqueda);
            }else{
                echo
                    "<form action='".$mipag."' method='get'>
                    <label>Buscar:<input type='text' name='buscar'></label>
                    <input type='submit' name='enviando' value='Dale!'>
                    </form>";

                
            }


    ?>




       
    </body>
</html>
