<?php

//Explicacion de los pasos en el otro learningPhp50

    $c_art=$_GET['c_art'];
    $seccion=$_GET['seccion'];
    $n_art=$_GET['n_art'];
    $precio=$_GET['precio'];
    $fecha=$_GET['fecha'];
    $importado=$_GET['importado'];
    $p_orig=$_GET['p_orig'];


    
    include 'learningPhp33a.php';

    $conexion=mysqli_connect($db_host, $db_usuario, $db_contra);

    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la base de datos<br>";
        exit();
    }


    mysqli_set_charset($conexion, "utf8");

    mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra base de datos");

    echo "Connected to DB.<br><br>";

    //THIS ? is the clue of prepared consult
    $sql = "INSERT INTO PRODUCTOS (CÓDIGOARTÍCULO, SECCIÓN, NOMBREARTÍCULO, PRECIO, FECHA, IMPORTADO, PAÍSDEORIGEN) VALUES (?, ?, ?, ?, ?, ?, ?)";

    //Step 2: prepare the query. It is the "most important" object.
    $resultado = mysqli_prepare($conexion, $sql);
    
//MUY IMPORTANTE
    //Step 3: Unir los parametros. , devuelve true or false. "s" indica
    //que el parametro es tipo texto, "i" indica que va a ser un entero
    //"nomeacuerdo" si fuera un decimal.
    //Tenemos que hacer el bind en el mismo orden que en en el query sql
    //Ojo, tengo que tener en cuenta que tipo de datos esta almacenado
    //En nuestro caso todos son strings, siete parametros es igual a siete letras "s" seguidas:
    $ok = mysqli_stmt_bind_param($resultado, "sssssss", $c_art, $seccion, $n_art, $precio, $fecha, $importado, $p_orig); //Return true if it is successfull


    //Step4: execute the query, return true or false.
    $ok = mysqli_stmt_execute($resultado); //idem

    if($ok==false){
        echo "Error in the execution <br>";

    }else{
        //Step 5: Here goes all the code to show the result (just if the execute is true, I mean, successful)
        //THIS IS NOT VALID FOR INSERT$ok = mysqli_stmt_bind_result($resultado, $codigo, $seccion, $precio, $pais);  //Returns true or false
        //That function needs the object created after the prepare, and so
        //many variables as SELECT variables I received
        echo "Registro agregado";
    
       /*  IT IS JUST FOR SELECT BUT NOT FOR INSERT
       //Step 6: Reading the results. fetch will run into the results
        echo "<h2>Articulos encontrados</h2><br><br>";
        
        while (mysqli_stmt_fetch($resultado)){
            echo "Codigo: ".$codigo.".<br>";
            echo "Seccion: ".$seccion.".<br>";
            echo "Precio: ".$precio.".<br>";
            echo "Pais: ".$pais.".<br>";
            echo "<br><br>";

        } */

        //Closing the object that "prepare" has created

        mysqli_stmt_close($resultado);
    }
    

?>