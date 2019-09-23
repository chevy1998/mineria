<?php
  //Librerias
  include("conexion.php");
  include("bayes.php");
  //instanciación de la clase conexión a postgresql.
  $conexion = new ConexionPGSQL();
  $conexion->conectar();
  if($conexion->conectar()==true){
    echo "conexion exitosa";
  }else{
    echo "no se pudo conectar";
  }
 // Options Select
  $vehicletype = $conexion->getOptions("vehicletype");
	$color = $conexion->getOptions("color");
	$race = $conexion->getOptions("race");
	$gender = $conexion->getOptions("gender");
	$state1 = $conexion->getOptions("state1");
  if($_POST){
  		$vehicletype = $_POST['vehicletype'];
  		$color = $_POST['color'];
  		$race = $_POST['race'];
  		$gender = $_POST['gender'];
  		$state1 = $_POST['state1'];
      $algoritmo = new bayes($vehicletype, $color, $race, $gender, $state1);
      $nInfractions = $conexion->getCountInfractions();
      $p1 = $algoritmo->getPeso("Citation", $nInfractions);
      $p2 = $algoritmo->getPeso("Warning", $nInfractions);
      $p3 = $algoritmo->getPeso("SERO", $nInfractions);
      $p4 = $algoritmo->getPeso("ESERO", $nInfractions);
      $sumaP = $p1 + $p2 + $p3 + $p4;
      $p1 = $p1/$sumaP;
      $p2 = $p2/$sumaP;
      $p3 = $p3/$sumaP;
      $p4 = $p4/$sumaP;
      $respuesta = $algoritmo->getMayorPeso($p1, $p2, $p3, $p4);
  }
?>

<html>
	<head>
		<title>Laboratorio 2 Bayes</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
		<section class="contenido">
			<article class="titulo">
			<h1>Calculo infracciones de transito<h1>
			</article>
			<form method="POST" action="index.php">
				<p>
					<span>Tipo vehiculo:</span>
					<select name="vehicletype" id="vehicletype">
						<option value="">Seleccione una</option>
						<?php
							while ($fila=pg_fetch_array($vehicletype)) {
								echo '<option value="'.$fila['vehicletype'].'">'.$fila['vehicletype'].'</option>';
							}
						?>
					</select>
				</p>
				<p>
					<span>Color:</span>
					<select name="color" id="color">
						<option value="">Seleccione una</option>
						<?php
							while ($fila=pg_fetch_array($color)) {
								echo '<option value="'.$fila['color'].'">'.$fila['color'].'</option>';
							}
						?>
					</select>
				</p>
				<p>
					<span>Raza:</span>
					<select name="race" id="race">
						<option value="">Seleccione una</option>
						<?php
							while ($fila=pg_fetch_array($race)) {
								echo '<option value="'.$fila['race'].'">'.$fila['race'].'</option>';
							}
						?>
					</select>
				</p>
				<p>
					<span>Genero:</span>
					<select name="gender" id="gender">
						<option value="">Seleccione una</option>
						<?php
							while ($fila=pg_fetch_array($gender)) {
								echo '<option value="'.$fila['gender'].'">'.$fila['gender'].'</option>';
							}
						?>
					</select>
				</p>
				<p>
					<span>Estado:</span>
					<select name="state1" id="state1">
						<option value="">Seleccione una</option>
						<?php
							while ($fila=pg_fetch_array($state1)) {
								echo '<option value="'.$fila['state1'].'">'.$fila['state1'].'</option>';
							}
						?>
					</select>
				</p>
				<p>
					<input type="submit" value="Calcular" class="boton">
				</p>
			</form>
			<p>
				<span>Resultado:</span>
				<br>
				<section class="resultado">
				<?php
				if($_POST){
					echo '<span style="color: red; font-size: 27px;">!'.$respuesta.'</span>';
				  echo "<br><strong>Nivel confianza</strong>";
					echo "<br>Citation: ".number_format($p1,5,'.','');
					echo "<br>Warning: ".number_format($p2,5,'.','');
					echo "<br>SERO: ".number_format($p3,5,'.','');
					echo "<br>ENSERO: ".number_format($p4,5,'.','');
				}
				?>
				</section>
			</p>
			<p>
				
			</p>
		</section>
	<body>
</html>

