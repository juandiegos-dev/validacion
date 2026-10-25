<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
	<input type="text" name="usuario" placeholder="Ingrese su usuario"><br>
	<input type="password" name="pass" placeholder="Ingrese su contraseña"><br>
	<input type="submit" value="Login">
</form>
<?php
if(!empty($_POST)){
	$usuario = $_POST["usuario"];
	$pass = $_POST["pass"];
	
	/*
	$_POST["clave"] = null;
	if(!isset($_POST["clave"])){
		echo "Ingrese clave<br>";
	}
	*/
	if(!filter_var($usuario, FILTER_VALIDATE_EMAIL)){
		echo "No ingreso el correo del usuario<br>";
		$contadorErrores++;
	}

	$contadorErrores = 0;

	if(trim($usuario)==""){
		echo "Ingrese Usuario<br>";
		$contadorErrores++;
	}
	
	if(trim($pass)==""){
		echo "Ingrese Contraseña<br>";
		$contadorErrores++;
	}

	if(strlen($pass)<8){
		echo "Su contraseña es muy corta<br>";
		$contadorErrores++;
	}

	if($contadorErrores!=0){
		exit();
	}

	echo "Sin errores<br>";
	$controller = new Controller();
	echo $controller->login($usuario, $pass);
}