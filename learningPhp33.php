<!-- Videos [33-38]
    Conectar con base de datos y hacer peticiones basicas CON MYSQLI   SIN CLASES


   Necesito direccion de la base de datos, el nombre de la misma, usuario y contrasena
 -->

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    </head>


    <body>
        
        
        <?php

        include 'learningPhp33a.php';

        $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);


        //Esta funcion mysqli connect errno lo que hace es ejecutarse automaticamente cuando no consigue conectar con la db
        if(mysqli_connect_errno()){

            echo "No se puede conectar a la Base de Datos";
            exit();

        }

        mysqli_set_charset($conexion, "utf8");

        mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra base de datos");

        $consulta = "SELECT * FROM productos WHERE paísdeorigen = 'ESPAÑA'";

        //It is a recordSet, it is like a virtual table created in the memory.
        $resultados = mysqli_query($conexion, $consulta);

/*        
        //Fetch row va linea a linea recorriendo esa tabla virtual, esta funcion fetch_row cada
        //vez que se ejecuta accede a la linea siguiente
        //OJO, CADA FILA TIENE VARIAS COLUMNAS, COLUMNA 1, 2, 3, 4 $fila[1], $fila[2]
        
        //Cada vez que encuentra una fila, ejecuta mysqli, y eso es igual a true
        echo"<table width='50%' align='center' border='1px dotted black'>";

        //Fila es un array que se crea gracias a la funcion mysqli_fetch_row, ojo
        //no es asociativa sino numeral(o como se llame)

        while($fila = mysqli_fetch_row($resultados)){
            echo "<tr><td>";
            echo $fila[0]."</td><td>";
            echo $fila[1]."</td><td> ";
            echo "España </td><td>";
            echo $fila[2]."</td><td> ";
            echo $fila[3]."</td>";
        }
        echo "</table>";
 */



        echo "<br><br>";

        /*Hay otra funcion que es mysqli_fetch_array, que nos pide dos parametros, el resulset, donde tenemos
        guardados los registros y una contaste que ser'a MYSQL_ASSOC (asi le indico que
        estamos trabajando con un array asociativo, y ahora ya puedo trabajar
        con el nombre de los campos y no con [0], [1]...
        este trabaja con arrays asociativos, que nos permite, en lugar de acceder
        a un indice, acceder a un nombre de campo Lo har'e en el proximo bucle
        */
        echo "<table width='50%' align='center' border='1px dotted black'>";

        while($filaasociativa = mysqli_fetch_array($resultados, MYSQLI_ASSOC)){
            echo "<tr><td>";
            echo $filaasociativa['CÓDIGOARTÍCULO']."</td><td>";
            echo $filaasociativa['NOMBREARTÍCULO']."</td><td> ";
            echo $filaasociativa['PAÍSDEORIGEN']."</td><td> ";
            echo $filaasociativa['IMPORTADO']."</td><td>";
            echo $filaasociativa['PRECIO']."</td><td> ";

        }
        echo "</table>";



        //Cuando termine de trabajar con la base de datos, lo cierro
        mysqli_close($conexion);
        ?> 



        
    </body>
</html>

