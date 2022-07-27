<?php session_start();

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda acceder al formulario

 if (isset($_SESSION['usuario'])) {
	header('Location: index_confoto.php');
	die();
}

if (isset($_SESSION['nombre'])) {
	header('Location:validacion.php');
	die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password = hash('sha512', $password);//Al crear el campo en la DB ten cuidado de darle una tamaña arriba de 250 

	// Nos conectamos a la base de datos
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=mediconline', 'root', 'info2022');

	}catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}

	$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password');
	$statement->execute(array(
		':usuario' => $usuario,
		':password' => $password
	));

	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['nombre'] = $nombre;
		$_SESSION['usuario'] = $usuario;
		header('Location:validacion.php');
	} else {
		$errores = "<p><script>Swal.fire({
			title: 'Este campo está vacío',
			text: 'Campo Vacío',
			icon: 'warning',
			button: 'Cerrar',
		});</script></p>";
	}
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password = hash('sha512', $password);//Al crear el campo en la DB ten cuidado de darle una tamaña arriba de 250 

	// Nos conectamos a la base de datos
	try{
		$conexion = new PDO('mysql:host=localhost;dbname=mediconline', 'root', 'info2022');

	}catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}

	$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password');
	$statement->execute(array(
		':usuario' => $usuario,
		':password' => $password
	));

	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['nombre'] = $nombre;
		$_SESSION['usuario'] = $usuario;
		header('Location:validacion.php');
	} else {
		$errores = "<p><script>Swal.fire({
			title: 'Este campo está vacío',
			text: 'Campo Vacío',
			icon: 'warning',
			button: 'Cerrar',
		});</script></p>";
	}
}
	


require 'login.view.php';

?>