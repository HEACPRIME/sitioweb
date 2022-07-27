<?php session_start();

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda volver a registrar un usuario.
if (isset($_SESSION['usuario'])) {
	header('Location:doctores/index.php');
	die();
}

// Comprobamos si ya han sido enviado los datos
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Validamos que los datos hayan sido rellenados
	$nombre = filter_var(strtolower($_POST['nombre']), FILTER_SANITIZE_STRING);
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$email = $_POST['correo'];

// // Tambien podemos limpiar mediante las funciones
// 	# El problema es que si lo hacemos de esta forma no estamos eliminando caracteres especiales, solo los transformamos.
	
// 	// La funcion htmlspecialchars() convierte caracteres especiales en entidades HTML, (&, "", '', <, >)
// 	$usuario = htmlspecialchars($_POST['usuario']);
// 	// La funcion trim() elimina espacio en blanco al inicio y final de la cadena de texo
// 	$usuario = trim($usuario);
// 	// stripslashes() quita las barras de un string con comillas escapadas, los \ los convierte en \'
// 	$usuario = stripslashes($usuario);

	$errores = '';

	// Comprobamos que ninguno de los campos este vacio.
	if (empty($usuario) or empty($password) or empty($password2)) {
		$errores = "<p><script>Swal.fire({
			title: 'Este campo está vacío',
			text: 'Campo Vacío',
			icon: 'warning',
			button: 'Cerrar',
		});</script></p>";
	} else {

// Validamos que el correo contenga '@'


		function valida_email($email){   
			if(preg_match("^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^", $email))   
				return true;   
			else  
				return false;
		}
		$mail = $_POST['correo'];
		if(valida_email($mail))
		{ 
			echo "El mail es valido"; 
		} else { 
			$errores .= "<p><script>Swal.fire({
				title: 'Invalid E-mail',
				text: 'The E-Mail does not contain @',
				icon: 'error',
				button: 'Cerrar',
			});</script></p>"; 
		} 

		// Comprobamos que el usuario no exista ya.
		try{
			$conexion = new PDO('mysql:host=localhost;dbname=mediconline', 'root', 'info2022');

		}catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}

		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
		$statement->execute(array(':usuario' => $usuario));

		// El metodo fetch nos va a devolver el resultado o false en caso de que no haya resultado.
		$resultado = $statement->fetch();

		// Si resultado es diferente a false entonces significa que ya existe el usuario.
		if ($resultado != false) {
			$errores .= "<p><script>Swal.fire({
				title: 'Usuario',
				text: 'Este usuario ya existe',
				icon: 'error',
				button: 'Cerrar',
			});</script></p>";
		}

		// Hasheamos nuestra contraseña para protegerla un poco.
		# OJO: La seguridad es un tema muy complejo, aqui solo estamos haciendo un hash de la contraseña,
		# pero esto no asegura por completo la informacion encriptada.
		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);

		// Comprobamos que las contraseñas sean iguales.
		if ($password != $password2) {
			$errores.= "<p><script>Swal.fire({
				title: 'Las contraseñas no coinciden',
				text: 'ERROR',
				icon: 'error',
				button: 'Cerrar',
			});</script></p>";
		}
	}

	// Comprobamos si hay errores, sino entonces agregamos el usuario y redirigimos.
	if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO usuarios (id_usuario,nombre ,usuario,email,password ) VALUES (null, :nombre,:usuario, :email,:password)');
		$statement->execute(array(
			':nombre' => $nombre,
			':usuario' => $usuario,
			':password' => $password,
			':email'  => $email


		));

		// Despues de registrar al usuario redirigimos para que inicie sesion.
		header('Location: login.php');
	}
}

require 'registro.view.php';
?>