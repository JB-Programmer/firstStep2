<?php
            
/*             Here we get the datas of the form (that where result of the search)
            and make changes */
                    
                    $cod=$_GET['c_art'];
                    $sec=$_GET['seccion'];
                    $nom=$_GET['n_art'];
                    $pre=$_GET['precio'];
                    $fec=$_GET['fecha'];
                    $imp=$_GET['importado'];
                    $por=$_GET['p_orig'];

                    require_once 'learningPhp33a.php';

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
                    echo "ESTE ES EL CODIGO: ".$cod."<br>";
                    echo "ESTA ES LA ANTIGUA SECCION: ".$sec."<br>";

                    $consulta = "UPDATE productos SET SECCIÓN='Metales' WHERE CÓDIGOARTÍCULO='$cod'";

                    //It is a recordSet, it is like a virtual table created in the memory.
                    $resultados = mysqli_query($conexion, $consulta);
                    echo "ESTA ES LA NUEVA SECCION: ".$sec."<br>";
                    //If there is a problem with the $resultados
                    if($resultados==false){
                        echo "Query error";
                    }else{
                        echo "Register Updated";
                        echo "Affected Rows: ".mysql_affected_rows($conexion);
                        echo "El nuevo pais de importacion es: " . $por;
                    }
                
                   //Cuando termine de trabajar con la base de datos, lo cierro
                    mysqli_close($conexion);
                

            ?>