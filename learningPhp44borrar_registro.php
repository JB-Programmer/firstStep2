<?php
            //Vamos a borrar registro, usamos parte de learningPhp42
            //Ojo, en un IF muestro que hago si hay fallo en borrado y tambien hice que avise (y es algo diferente)
            //SI EL REGISTRO NO EXISTE, la funcion que usaremos es mysqli_affected_rows(conexion) y me 
            //devuelve cuantos registros se han visto afectados por instrucciones sql tipo
            //insert, delete o update. Si no hago esta parte, entonces el hecho
            //de que el campo no exista, no va a ser devuelto como un error.

                    $cod=$_GET['c_art'];
                    $sec=$_GET['seccion'];
                    $nom=$_GET['n_art'];
                    $pre=$_GET['precio'];
                    $fec=$_GET['fecha'];
                    $imp=$_GET['importado'];
                    $por=$_GET['p_orig'];

                    include 'learningPhp33a.php';

                    //Connect with host, user and pass
                    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);


                    //Esta funcion mysqli connect errno lo que hace es ejecutarse automaticamente cuando no consigue conectar con la db
                    if(mysqli_connect_errno()){
                        //Esto es lo que ocurre si no consigue conectarse con la base de datos
                        echo "No se puede conectar a la Base de Datos";
                        exit();

                    }
                    
                    //It is important, specially for Spanish
                    mysqli_set_charset($conexion, "utf8");
                    //It is what happens if it doesnt find the database
                    mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra base de datos");

                    echo "Connected to ".$db_nombre." successfully<br>";

                    //We have to use '' in values just if it typeof is string
                    $consulta = "DELETE FROM PRODUCTOS WHERE CÓDIGOARTÍCULO = '$cod'";

                    //It is a recordSet, it is like a virtual table created in the memory.
                    $resultados = mysqli_query($conexion, $consulta);

                    //If there is a problem with the $resultados (but it doesnt
                    //show error if the Cod articulo no existe).
                    if($resultados==false){
                        echo "Error deleting<br>";
                    }else{
                        if(mysqli_affected_rows($conexion)==0){
                        echo "Codigo Articulo inexistente<br>";
                        }else{
                            echo "Registros eliminados: ".mysqli_affected_rows($conexion).".<br>";
                        }
                    }
                
                   //Cuando termine de trabajar con la base de datos, lo cierro
                    mysqli_close($conexion);
                

            ?>