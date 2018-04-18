<!DOCTYPE html>
<html>
<head>
    <title>Buenos dias</title>
    <meta charset = "utf-8">
</head>

<body>

<?php


$nombre;
$nombre = "Jaime";

$edad = 33;

include ("saludador.php");
include ("despedidor.php");

saludame();
despideme();
$myArray = array("Jaime", "Jose", "Antonio");

print_r($myArray); //En php hay que usar print_r para mostrar array

echo "<br>";
echo $myArray[0];
echo "<br>";

$mySecondArray[0]="benchimol";
$mySecondArray[1]="rodriguez";

print_r($mySecondArray);

$myThirdArray["Calle"] = "Agustina de los reyes";
$myThirdArray["Numero"] = 2;
$myThirdArray["Telefono"] = 9803928098;

echo "<br>";

print_r($myThirdArray);



$myFourthArray = array(
    "Por la manana"=>"Leche con cereales",
    "Por la tarde"=>"Zumo con galletas",
    "Por la noche"=>"Te con pastitas"

);

if(isset($myFourthArray["Por la manana"])) {
    echo "<br>Acertaste!";
}else{
    echo "<br>Ese no es";
}




?>

</body>
</html>