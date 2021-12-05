<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "phpmysql");

// Comprar si la conexión es correcta
if (mysqli_connect_errno()) {
   echo "La conexión a la base de datos MySQL ha fallado: ".mysqli_connect_error();
}else{
   echo "Conexión realizada correctamente!!";
}

// Consulta para configurar la codificacion de caracteres
mysqli_query($conexion, "SET NAME 'utf8'");

// Consulta SELECT desde PHP
$query = mysqli_query($conexion, "SELECT * FROM notas");

while($nota = mysqli_fetch_assoc($query)){
   //var_dump($nota);
   echo "<h2>".$nota['titulo']."</h2>";
   echo $nota['descripcion']."<br/>";
}

// Insertar en la base de datos desde PHP
$sql = "INSERT INTO notas VALUES(null, 'Notas desde PHP', 'Esto es una nota desde PHP', 'green')";
$insert = $query = mysqli_query($conexion, $sql);

echo "<hr>";
if($insert){
   echo "Datos insertados correctamente";
}else{
   echo "Error: ".mysqli_error($conexion);
}