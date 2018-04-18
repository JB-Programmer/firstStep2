
<?php
    //SQL INJECTION THAT CAN SHOWS ALL DATAS     
    //SELECT * FROM datospersonales WHERE NOMBRE = 'CLARUS' AND NIF ='' or '1'='1'  

    //SQL INJECTION THAT CAN DELETE EVERYTHING ON DB
    //DELETE FROM datospersonales WHERE NOMBRE = 'CLARUS' AND NIF ='' or '1'='1'  

$usu = $_GET['nombre'];
$con = $_GET['nif'];



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
        $consulta = "SELECT * FROM datospersonales WHERE NOMBRE = '$usu' AND NIF ='$con'";
        echo "$consulta<br><br>";

        //It is a recordSet, it is like a virtual table created in the memory.
        $resultados = mysqli_query($conexion, $consulta);

      
        echo "<table width='50%' align='center' border='1px dotted black'>";

        while($filaasociativa = mysqli_fetch_array($resultados, MYSQL_ASSOC)){
            echo "<tr><td>";
            echo $filaasociativa['nif']."</td><td>";
            echo $filaasociativa['nombre']."</td><td> ";
            echo $filaasociativa['apellido']."</td><td> ";
            //echo $filaasociativa['IMPORTADO']."</td><td>";
            echo $filaasociativa['EDAD']."</td> ";
           

        }
        echo "</table>";



        //Cuando termine de trabajar con la base de datos, lo cierro
        mysqli_close($conexion);
       


?>