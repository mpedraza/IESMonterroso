<?php
require('../../bootstrap.php');
error_reporting(E_ALL);

// COMPROBACION DE ACCESO AL MODULO
if ((stristr($_SESSION['cargo'],'1') == false) && (stristr($_SESSION['cargo'],'2') == false) && (stristr($_SESSION['cargo'],'8') == false)) {
	
	if (isset($_SESSION['mod_tutoria'])) unset($_SESSION['mod_tutoria']);
	die ("<h1>ACCESO PROHIBIDO</h1>");
	
}
else {
	
	// COMPROBAMOS SI ES EL TUTOR, SINO ES DEL EQ. DIRECTIVO U ORIENTADOR
	if (stristr($_SESSION['cargo'],'2') == TRUE) {
		
		$_SESSION['mod_tutoria']['tutor']  = $_SESSION['mod_tutoria']['tutor'];
		$_SESSION['mod_tutoria']['unidad'] = $_SESSION['mod_tutoria']['unidad'];
		
	}
	else {
	
		if(isset($_POST['tutor'])) {
			$exp_tutor = explode('==>', $_POST['tutor']);
			$_SESSION['mod_tutoria']['tutor'] = trim($exp_tutor[0]);
			$_SESSION['mod_tutoria']['unidad'] = trim($exp_tutor[1]);
		}
		else{
			if (!isset($_SESSION['mod_tutoria'])) {
				header('Location:'.'tutores.php');
			}
		}
		
	}
}


include("../../menu.php");
include("menu.php");
?>

	<div class="container">
		
		<!-- TITULO DE LA PAGINA -->
		<div class="page-header">
			<h2>Tutor�a de <?php echo $_SESSION['mod_tutoria']['unidad']; ?> <small>Resumen de la unidad</small></h2>
			<h4 class="text-info">Tutor/a: <?php echo nomprofesor($_SESSION['mod_tutoria']['tutor']); ?></h4>
		</div>
		
		
		<!-- SCAFFOLDING -->
		<div class="row">
			
			<div class="col-sm-12">
				
				<?php include("inc_pendientes.php"); ?>
				
			</div>
			
		</div>
		
		
		<div class="row">
		
			<!-- COLUMNA IZQUIERDA -->
			<div class="col-sm-4">
				
				<?php include("inc_asistencias.php"); ?>
				<hr>
				<h3 class="text-info">Actividades extraescolares</h3>
				<?php include("inc_actividades.php"); ?>
				<hr>
				
				
			</div><!-- /.col-sm-4 -->
			
			
			
			<!-- COLUMNA CENTRAL -->
			<div class="col-sm-4">
				
				<?php include("inc_convivencia.php"); ?>
				<hr>
				<?php include("inc_biblio.php"); ?>
				<hr>
				<?php include("inc_informes_tareas.php"); ?>
				<hr>
				
			</div><!-- /.col-sm-4 -->
			
			
			
			<!-- COLUMNA DERECHA -->
			<div class="col-sm-4">
				
				<?php include("inc_mensajes.php"); ?>
				<hr>
				
				<?php include("inc_informes_tutoria.php"); ?>
				<hr>
				
				<?php include("inc_intervenciones.php"); ?>
				<hr>
				
			</div><!-- /.col-sm-4 -->
			
		
		</div><!-- /.row -->
		
	</div><!-- /.container -->
  
<?php include("../../pie.php"); ?>

</body>
</html>
