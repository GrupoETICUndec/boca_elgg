<?php
    elgg_register_event_handler('init', 'system', 'tap_subir_ejercicio_init');
    
    function tap_subir_ejercicio_init() {
        $funcion = 'subir_ejercicio_page_handler';
        elgg_register_page_handler('tap_subir_ejercicio', $funcion);
    }
    
    function subir_ejercicio_page_handler() {
		//include('Formulario.php');
		//include('Ejercicio.php');
        $user = elgg_get_logged_in_user_entity();
		$id = $_REQUEST['numero'];
		//$form = Formulario::getFormulario($num);  
		//$guid = $_SESSION[_sf2_attributes][guid];
		//$user = get_user($guid);
		//$ejer = Ejercicio::getEjercicio($id);
		//$userProb = get_user($ejer['guid_us']);		
/*		try{
			$mdb = DataBase::getDb('mysql', 'elggadd', 2);
			$query = "SELECT * FROM ejercicios WHERE id_ex = $id";
			$temp = $mdb->prepare($query);
			$result = $temp->execute();
			$fila = $result->fetchAll();
			$ejer = array('id_ex' => $fila[0]['id_ex'], 
						'descripcion'=>$fila[0]['descripcion'],
						'nombre'=>$fila[0]['nombre'], 
						'guid_us'=> (int) $fila[0]['guid_us']);
			$mdb = null;
		} catch(PDOException $e){
			print "ERROR!". $e->getMessage();
			die();
		}
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
		</html>";*/
        $params = cargaArray('Torneo Argentino de Programación', $form, '');
        include('body.php');
    }
?>
