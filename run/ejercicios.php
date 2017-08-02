<?php
	require_once('/var/www/boca/src/db.php');
	$prob = DBGetFullProblemData(1,true);

$ejercicios = <<< test
		<!DOCTYPE html>
		<html>

		<head>
			<!--<title>Admin Role</title>
			<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="cssadmin.css">
			<script src="http://code.jquery.com/color/jquery.color-2.1.2.min.js" integrity="sha256-H28SdxWrZ387Ldn0qogCzFiUDDxfPiNIyJX7BECQkDE=" crossorigin="anonymous"></script>
			<script type="text/javascript" src="jsadmin.js"></script>-->
		</head>

		<body>
			  <script language="javascript">
			    function conf4() {
			        var s2 = String(document.form1.probleminput.value);
			        var s1 = String(document.form1.problemsol.value);
					
					if(document.form1.fullname.value=="" || document.form1.basename=="" || document.form1.timelimit=="" || s1.length<4 || s2.length<4) {
						alert('Sorry, mandatory fields are empty');
					} else {
						var s1 = String(document.form1.problemdesc.value);
						var l = s1.length;
						if(l >= 3 && (s1.substr(l-3,3).toUpperCase()==".IN" ||
									 s1.substr(l-4,4).toUpperCase()==".OUT" ||
									 s1.substr(l-4,4).toUpperCase()==".SOL" ||
									 s1.substr(l-2,2).toUpperCase()==".C" ||
									 s1.substr(l-2,2).toUpperCase()==".H" ||
									 s1.substr(l-3,3).toUpperCase()==".CC" ||
									 s1.substr(l-3,3).toUpperCase()==".GZ" ||
									 s1.substr(l-4,4).toUpperCase()==".CPP" ||
									 s1.substr(l-4,4).toUpperCase()==".HPP" ||
									 s1.substr(l-4,4).toUpperCase()==".ZIP" ||
									 s1.substr(l-4,4).toUpperCase()==".TGZ" ||
									 s1.substr(l-5,5).toUpperCase()==".JAVA")) {
							alert('Description file has invalid extension: ...'+s1.substr(l-3,3));
						} else {
							document.form2.confirmation.value='confirm';
						}
					}
		     	}

			    function conf() {
						if(document.form1.problemname.value=="") {
							alert('Sorry, mandatory fields are empty');
						} else {
							var s2 = String(document.form1.probleminput.value);
							if(s2.length > 4) {
								if (confirm("Confirm?")) {
									document.form1.confirmation.value='confirm';
								}
							} else {
								alert('File package must be given');
							}
						}
			    }

			    function conf2(url) {
			      if (confirm("Confirm the DELETION of the PROBLEM and ALL data associated to it?")) {
					  if (confirm("Are you REALLY sure about what you are doing? DATA CANNOT BE RECOVERED!")) {
						  document.location=url;
					  } else {
						  document.location='problem.php';
					  }
			      } else {
			        document.location='problem.php';
			      }
			    }

			    function conf3(url) {
			      if (confirm("Confirm the UNDELETION of the PROBLEM?")) {
					  document.location=url;
				  } else {
					  document.location='admin.php';
				  }
			    }
			 	</script>



			<div class="container">
				<center>
					<table border="1" width=100%>
						<tr>
							<td nowrap="nowrap">Problem #</td>
						  	<td nowrap="nowrap">Short Name</td>
						  	<td nowrap="nowrap">Fullname</td>
						  	<td nowrap="nowrap">Basename</td>
						  	<td nowrap="nowrap">Descfile</td>
						  	<td nowrap="nowrap">Package file</td>
						  	<td nowrap="nowrap">Editar</td>
						  	<td nowrap="nowrap">Eliminar</td>
						</tr>
test;

		$filas="";					
					for($i=1; $i < count($prob); ++$i){  
						$number = $prob[$i]['number'];
						$urlinputfilename = rawurldecode($prob[$i]['inputfilename']);
						$inputfilename = $prob[$i]['inputfilename'];
						$name = $prob[$i]["name"];
						//$fullname = $prob[$i]["fullname"];
						$basefilename = $prob[$i]["basefilename"];
						$downloadfile = filedownload($prob[$i]["descoid"], $prob[$i]["descfilename"]);
						$descfilename = basename($prob[$i]["descfilename"]);
						$downloadpack = filedownload($prob[$i]["inputoid"] ,$prob[$i]["inputfilename"]);
				

		$filas .= "<tr>
					<td nowrap='nowrap'> $number </td>
					<td nowrap='nowrap'> $name </td>
					<td nowrap='nowrap'> $fullname </td>
					<td nowrap='nowrap'> $basefilename </td>
					<td nowrap='nowrap'>$descfilename</td>
					<td nowrap='nowrap'><a href='../../boca/src/filedownload.zip?$downloadpack ?>'> $inputfilename </a></td>
					<td nowrap='nowrap'><a href=\"tap_editor/start.php?n=".base64_encode($number)."&na=".base64_encode($name)."&fu=".base64_encode($fullname)."&ba=".base64_encode($basefilename)."&de=".base64_encode($descfilename)."\"><img src=\"http://localhost/elgg/mod/tap/img/editar.png\" width=30 height=30></a> </td>
					<td nowrap='nowrap'><a href=\"tap_delete/start.php?n=".base64_encode($number)."\"><img src=\"http://localhost/elgg/mod/tap/img/eliminar.png \" width=30 height=30></a> </td>

		 		 	</tr>";

				}

		$filas .= "</table></center></div><br><br><br>";


	return $ejercicios . $filas ;
?>
