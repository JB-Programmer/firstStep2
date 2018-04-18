<?php
            /* Here we are going to SEE the result of the search in learningPhp45readandupdateregister
            and make  CHANGES. 
            I WILL INTRODUCE THE RESULTS IN THE INPUT SO AS WILL BE EASIER FOR THE
            CLIENT TO SEE THE ACTUAL VALUES BEFORE EDITING.
            WE HAVE TO TAKE CARE WITH THE "" AND '' IN THE QUERY*/
          
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
            
                    $consulta = "SELECT * FROM productos WHERE NOMBREARTÍCULO LIKE '%$busqueda%'";
            
                    //It is a recordSet, it is like a virtual table created in the memory.
                    $resultados = mysqli_query($conexion, $consulta);
            
                  
            
                    while($filaasociativa = mysqli_fetch_array($resultados, MYSQL_ASSOC)){
                        echo "<form action='learningPhp45update.php' method='get'>";

                            echo "<input type='text' name='c_art' value=' " . $filaasociativa['CÓDIGOARTÍCULO'] . "'><br>";
                            echo "<input type='text' name='n_art' value='" . $filaasociativa['NOMBREARTÍCULO'] . "'><br>";
                            echo "<input type='text' name='seccion' value='" . $filaasociativa['SECCIÓN'] . "'><br>";
                            echo "<input type='text' name='importado' value='" . $filaasociativa['IMPORTADO'] . "'><br>";
                            echo "<input type='text' name='precio' value='" . $filaasociativa['PRECIO'] . "'><br>";
                            echo "<input type='text' name='fecha' value='" . $filaasociativa['FECHA'] . "'><br>";
                            echo "<input type='text' name='p_orig' value='" . $filaasociativa['PAÍSDEORIGEN'] . "'><br>";
                            echo "<input type='submit' name='enviando' value='Actualizar!'>";
                            
                        echo "</form>";

                    }
                    
            
            
                    //Cuando termine de trabajar con la base de datos, lo cierro
                    mysqli_close($conexion);
                   
            
            
            ?>

