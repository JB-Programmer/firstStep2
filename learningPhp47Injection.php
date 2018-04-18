
<?php
//El PROGRAMADOR PUEDE SUFRIR UNA INJECCION DEL TIPO

//SELECT * FROM productos WHERE NOMBREARTÍCULO = 'serrucho' or '1'='1'

//para conseguir este query bastaria con introducir en la barra del buscador 

// TIPICA INJECCION  serrucho' or '1'='1 y me devolveria todos los datos
$busqueda = $_GET['buscar'];


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

        //It is the old query: $consulta = "SELECT * FROM productos WHERE NOMBREARTÍCULO LIKE '%$busqueda%'";

        //I have deleted % % characters to simplify the description
        $consulta = "SELECT * FROM productos WHERE NOMBREARTÍCULO = '$busqueda'";
        echo "$consulta<br><br>";

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
       


?>