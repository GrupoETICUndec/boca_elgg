<?php
include('/var/www/html/run/config/DataBase.php');
try{
	$mdb = DataBase::getDb('mysql', 'elggadd', 2);
	$sql = "SELECT id_catalogo, nombre_catalogo FROM catalogo";
	$temp = $mdb->prepare($sql);
	$temp->execute();
	$resultado = $temp->fetchAll();
} catch (PDOException $e){
	print "ERROR";
}
$form = " 
<html>
	<title></title>
	<body>
	";
	
	foreach($resultado as $res){
		$form .= "<a href='/elgg/tap_sol/start.php?numero=".$res['id_catalogo']."'>".$res['nombre_catalogo']." </a></br>";
		
		}
$form .= "</body>
</html>
";

return $form;
?>
