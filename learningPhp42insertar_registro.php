<?php
           
            
                    //We bring the data from the form in learningPhp42
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
                    $consulta = "INSERT INTO PRODUCTOS (CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, FECHA, IMPORTADO, PAÍSDEORIGEN) VALUES ('$cod', '$sec', '$nom', '$pre', '$fec', '$imp', '$por')";

                    //It is a recordSet, it is like a virtual table created in the memory.
                    $resultados = mysqli_query($conexion, $consulta);

                    //If there is a problem with the $resultados
                    if($resultados==false){
                        echo "Query error";
                    }else{
                        echo "Register Saved";
                        include_once 'learningPhp42.php';
                    }
                
                   //Cuando termine de trabajar con la base de datos, lo cierro
                    mysqli_close($conexion);
                

            ?>