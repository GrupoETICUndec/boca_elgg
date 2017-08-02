<?php
	require_once('/var/www/boca/src/db.php');
	include('Ejercicio.php');
	class Formulario{
		public static function getFormulario($id){
			//$guid = $_SESSION[_sf2_attributes][guid];
			//$user = get_user($guid);
			$ejer = Ejercicio::getEjercicio($id);
			//$userProb = get_user($ejer['guid_us']);		
			$form =
			"<html>
			<head></head>
			<body>
			<form action='http://localhost/run/runSave.php' method='post' enctype='multipart/form-data'>
				<b>Ejercicio N°: ".$ejer['id_ex'].
				"</b><br><br>"
				.$ejer['descripcion'].
				"<br><br>
				Seleccione lenguaje: 
				<br>
				<select name='language'>
					<option value='C'>C</option>
					<option value='Java'>Java</option>
				</select>
				<br><br><br>
				Seleccione el archivo: 
				<input type='file' name='sourcefile'>
				<br/>
				<input type='text' id='problem' name='problem' value=".$ejer['nombre'].">
				<input type='text' id='usernumber' name='usernumber' value="..">
				<input type='text' id='username' name='username' value="..">
				<input type='submit' value='Enviar' style='width:100px; height:25px;'>
			</form>
			</body>
			</html>";
			return $form;
		}
		/*<input type='text' id='usernumber' name='usernumber' value=".$user[guid].">
				<input type='text' id='username' name='username' value=".$user[username].">*/
	}
?>
