
<?php
    //Avoiding injection in form with mysql_real_escape_string
    //Avoiding injection in form with slashes, but it doesnt avoid ascii injection
    //VID47-48 SQL INJECTION THAT DELETE EVERYTHING:    
    //DELETEFROM datospersonales WHERE NOMBRE = 'CLARUS' AND NIF ='' or '1'='1'  
    //Las funciones rea escape string y addslashes son las mas usadas para
    //evitar injection, se recomienda la primera 
    //Tambien lo mas recomendable es las consultas preparadas, que 
    //crea consultas y las filtra.
    
/*     Evitando injection. Usaremos mysql_real_escape_string con ello evitamos
    que puedan insertar caracteres extranos en el formulario, como por ejemplo
    las comillas '' o &.  */

$usu = $_GET['nombre'];
$con = $_GET['nif'];



        include 'learningPhp33a.php';

        $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

        //Esta funcion real escape evita que entren caracteres extranos
        //y se hace uso de la variable conexiion y de la info del cuadro de texto
        //Ahora los caracteres extranos no los va a tener en cuenta.
        $usu = mysqli_real_escape_string($conexion, $_GET['nombre']);
        $con =  mysqli_real_escape_string($conexion, $_GET['nif']);

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
        $consulta = "DELETE FROM datospersonales WHERE NOMBRE = '$usu' AND NIF ='$con'";

        //It is a recordSet, it is like a virtual table created in the memory.
        $resultados = mysqli_query($conexion, $consulta);

        echo "Esta ha sido la consulta: ".$consulta.".<br>";

/*         
        ESTA PARTE ES MEJOR CAMBIARLA PARA QUE EL MENSAJE SEA IDEAL, CAMBIADO MAS ABAJO
        if($resultados){

        echo "The register has been deleted successfully";

        } */


        if(mysqli_affected_rows($conexion)>0){
            echo "Registro eliminado correctamente<br>";
        } else {
            echo "Error deleting.";
        }

        //Cuando termine de trabajar con la base de datos, lo cierro
        mysqli_close($conexion);
       


?>