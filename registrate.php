<?php session_start();//Inicia una sesion.
//Si existe una sesion redirecciona al index, para evitar un registro.
if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
}
//En caso de que se haya enviado algo por el método post.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
//Variable que almacena errores
	$errores = '';
//En caso de que alguno de los inputs este vacio.
	if (empty($usuario) or empty($password) or empty($password2)) {
		$errores .= '<li>Por favor rellena todos los datos correctamente</li>';
	} else {
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=expediente', 'root', '');//Conexion a la base de datos por medio de PDO.
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
        //Selecciona una campo dentro de la tabla.
		$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
		$statement->execute(array(':usuario' => $usuario));
		$resultado = $statement->fetch();
        //Verifica que dicho usuario no exista en la base de datos, por medio de la sentencia fetch.
		if ($resultado != false) {//Si el resultado es false, no existe un usuario con ese nombre.
			$errores .= '<li>El nombre de usuario ya existe</li>';
		}
        //HASHEA contraseña para mayor seguridad.
		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);
        //Devuelve un error en caso de que las contraseñas no sean las mismas
		if ($password != $password2) {
			$errores .= '<li>Las contraseñas no son iguales</li>';
		}
	}
    //Si no hay ningun error, almacena la informacion en la base de datos.
	if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)');
		$statement->execute(array(
			':usuario' => $usuario,
			':pass' => $password
		));
        //Redirecciona al login
		header('Location: login.php');
	}
}
//Modela la pagina con el codigo html de registrate.view
require 'views/registrate.view.php';

?>