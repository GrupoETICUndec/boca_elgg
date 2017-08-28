<?php
include('/var/www/html/run/config/DataBase.php');
$mdb = DataBase::getDb('mysql', 'elggadd', 2);
$cat = $_REQUEST['numero'];
$sql = "SELECT id_ex, nombre FROM ejercicios WHERE id_catalogo = $cat ORDER BY nombre";
$temp = $mdb->prepare($sql);
$temp->execute();
$resultado = $temp->fetchAll();
$form = " 
<html>
	<title></title>
	<body>
	";
	
	foreach($resultado as $res){
		$form .= "<a href='/elgg/tap_subir_ejercicio/start.php?numero=".$res['id_ex']."'>Ejercicio ".$res['nombre']." </a></br>";
		
		}
$form .= "</body>
</html>
";

return $form;
?>
