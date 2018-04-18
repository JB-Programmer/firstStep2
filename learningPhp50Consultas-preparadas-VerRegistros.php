<!-- 
Consultas preparadas MYSQL    
Ventajas
Evitan injection
SE ejecutan mas rapido del lado del servidor

Inconvenientes
Hay que escribir mas codigo
Hay que utilizar nuevas funciones 

PASOS
    Primero hay que crear la sentencia SQL "SELECT..." , sustituyendo los valores
de criterio por ?
    SEgundo: preparamos la consulta con la funcion mysqli_prepare que 
necesita dos parametros, la conexion y la sentencia sql.
OJO: este prepare nos va a devolver un objeto stmt que se utilizara
como parametro en el resto de pasos. 
    Tercero: tenemos que unir los parametros a la sentencia SQL "SELECT...."
esta union se hace mediante la funcion msqli_stmt_bind_param()... que devuelve 
un true y false. Esta funcion requiere del objeto mysqli_stmt que nos dio el 
prepare, el tipo de dato que vamos a pasarle a ? (string, int...), y una 
variable en la que tengamos almacenado es valor.     
    Cuarto: ejecutamos la instruccion SQL, con la funcion mysqli_stmt_execute, 
que devuelve true or false y necesita como parametro el objeto mysqli_stmt.
    Quinto: Una vez que hemos ejecutado, vamos a recibir un recordset
con los valores (el codigo de articulo, nombre de articulo, seccion...). Estos
campos tenemos que asociarlos con variables. Tantas variables como campos
nos devuelva la consulta. De eso se encarga myqli_stmt_bind_result, devuelve
true or false, y necesita tambien el objeto mysqli_stmt que nos devolvio
la funcion prepare.
    Sexto: hay que leer los valores que nos devolvio la consulta. Utilizaremos
mysqli_stmt_fetch, que pide como parametro el objeto mysqli_stmt

    -->


<?php
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultas Preparadas</title>
    </head>


    <body>
        
        <h1>Consultas Preparadas</h1>
        <form method='get' action='learningPhp50consuprep.php'>
            <label for='datosbusqueda'>Introduce Pais</label>
            <input type='text' name='pais'>
            <input type='submit' value="BuscarSegunPais" name="enviando">
            


        </form>


    </body>

</html>




