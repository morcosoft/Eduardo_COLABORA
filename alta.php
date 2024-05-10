<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $usuario =  filter_var($_POST['usu'], FILTER_SANITIZE_SPECIAL_CHARS);
    $clave= filter_var($_POST['clave'], FILTER_SANITIZE_SPECIAL_CHARS);
    $nya = filter_var($_POST['nya'], FILTER_SANITIZE_SPECIAL_CHARS);

    
$conexion = mysqli_connect("localhost", "root", "");
if (!$conexion){
	echo "ERROR: Imposible establecer conexión con la base de datos para ese usuario y esa clave.<br>\n";
}else{
	echo "Conexion con la base de datos establecida correctamente...<br><br>\n";
}

//Conecta con la base de datos
$db_selected = mysqli_select_db($conexion, "ejemplo");
if (!$db_selected) {
    echo "ERROR: Imposible seleccionar la base de datos.<br>\n";
    die(mysqli_error($conexion)); // Print MySQL error and exit
} else {
    echo "Base de datos seleccionada satisfactoriamente...<br><br>\n";
}

$result = mysqli_query($conexion, "INSERT INTO acceso VALUES ('$usuario', MD5('$clave'), '$nya')");


// Check if query executed successfully
if ($result) {
    echo "Los datos se han subido correctamente!<br>\n";
} else {
    echo "ERROR: " . mysqli_error($conexion) . "<br>\n"; // Print MySQL error if query fails
}
    
 ?>
</body>

</html>
