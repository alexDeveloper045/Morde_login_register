<?php include('conexion.php');
session_start();



if (!empty($_POST['logUsuario']) && !empty($_POST['logClave'])) {

$validacion = $conexion->prepare("SELECT usuario,password FROM registro WHERE usuario = :usuario AND password = :password");

$validacion->bindParam(':usuario', $_POST['logUsuario']);
$validacion->bindParam(':password', $_POST['logClave']);

$validacion->execute();
//cuando se vaya a validar hay que meter el fetch PDO encima de otra variable
$resultado = $validacion->fetch(PDO::FETCH_ASSOC);

if ($resultado['usuario'] === $_POST['logUsuario'] && $resultado['password'] === $_POST['logClave']) {
	
	$_SESSION['user'] = $resultado['usuario'];

	header('location:inicio.php');
}
else {
	header('location:login.php');
}
	
}









?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
<div class="container">
  <h2>Login</h2>
  <form method="POST">
    <div class="form-group">
      <label for="email">User: </label>
      <input type="text" class="form-control" id="email" placeholder="Enter user" name="logUsuario">
    </div>
    <div class="form-group">
      <label for="pwd">Password: </label>
      <input type="password" class="form-control" placeholder="Enter password" name="logClave">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>