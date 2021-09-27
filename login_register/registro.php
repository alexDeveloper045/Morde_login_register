<?php
include('conexion.php');

if (!empty($_POST['nombre']) ) {
    
    $conn = $conexion->prepare("INSERT INTO registro(nombre, apellido, usuario, password) VALUES (:nombre, :apellido, :usuario, :password)");

$conn->bindParam(':nombre', $_POST['nombre']);
$conn->bindParam(':apellido', $_POST['apellido']);
$conn->bindParam(':usuario', $_POST['usuario']);
$conn->bindParam(':password', $_POST['password']);
$conn->execute();

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container">
  <h2>Register</h2>
  <form method="POST">
    <div class="form-group">
      <label for="email">Name: </label>
      <input type="text" class="form-control" placeholder="Name" name="nombre">
    </div>
    <div class="form-group">
      <label>last name: </label>
      <input type="text" class="form-control" placeholder="Last name" name="apellido">
    </div>
    <div class="form-group">
      <label>User: </label>
      <input type="text" class="form-control" placeholder="User" name="usuario">
    </div>
    <div class="form-group">
      <label>password: </label>
      <input type="password" class="form-control" placeholder="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button><br><br>
    <a href="login.php" class="btn btn-primary">loguearse</a>
  </form>
  

</div>

</body>
</html>