<?
session_start();
include("../../config.php");
// COMPROBAMOS LA SESION
if ($_SESSION['autentificado'] != 1) {
	$_SESSION = array();
	session_destroy();
	header('Location:'.'http://'.$dominio.'/intranet/salir.php');
	exit();
}

if($_SESSION['cambiar_clave']) {
	header('Location:'.'http://'.$dominio.'/intranet/clave.php');
}

registraPagina($_SERVER['REQUEST_URI'],$db_host,$db_user,$db_pass,$db);


?>
<?php
include("../../menu.php");
include("menu.php");

$prof=mysql_query("SELECT TUTOR FROM FTUTORES WHERE unidad like '$unidad%'");
$fprof = mysql_fetch_array($prof);
if(!($tutor)){$tutor=$fprof[0];}else{$fprof[0] = $tutor;}
?>
<div class="container">
<div class="row">
<div class="page-header">
<h2>Informes de Tutor�a <small> Activar Informe</small></h2>
</div>
<br>

<div class="col-md-4 col-md-offset-4">	
<div class="well well-large">
<?
if($unidad)
{
	echo '<h5>Grupo: <span class="text-info">';
	echo $unidad;
	echo '</span></h5> <h5>Tutor: <span class="text-info">';
	eliminar_mayusculas($fprof[0]);
	echo $fprof[0];
	echo '</span></h5><br />';
}
else
{
	?>
<form name="curso" method="POST" action="infotut.php">

<div class="form-group">
<label>Grupo: </label>
<SELECT name="unidad" onChange="submit()" class="form-control">
	<option><? echo $unidad;?></option>
	<? unidad();?>
</SELECT> 
</FORM>
</div>
	<?
}
?> <?php
echo "<form name='alumno' method='POST' action='activar.php' role='form'>";

echo "<div class='form-group'>
<label>Alumno </label>";
echo"<select name='alumno' class='form-control'>";
echo "<OPTION></OPTION>";
if ($unidad == ""){ echo "<OPTION></OPTION>";}
else
{
	$alumno=mysql_query("SELECT CLAVEAL, APELLIDOS, NOMBRE, unidad FROM alma WHERE unidad like '$unidad%' ORDER BY APELLIDOS ASC, NOMBRE ASC");
	while($falumno = mysql_fetch_array($alumno))
	{
	 echo "<OPTION>$falumno[1], $falumno[2] --> $falumno[0]</OPTION>";
	}
}
echo "</select></div>";

if ($unidad == ""){ echo "";}
else
{
	echo"<div class='form-group'>
	<label>Tutor/a del grupo</label>";
	echo "<input type='text' value ='$fprof[0]' name='tutor' class='form-control' readonly>";
	echo "</div>";
}
?>

<div class='form-group'>
<label>Fecha de la reuni�n</label>
<div class="input-group" id="datetimepicker1">
<input name="fecha"	type="text" class="form-control" value="" data-date-format="DD-MM-YYYY" id="fecha" required> 
	<span class="input-group-addon"><i class="fa fa-calendar"></i>
	</span>
	</div>
</div>

 <?
echo '<input type=submit value="Activar informe" class="btn btn-primary btn-block">';
?>
</form>
</div>
</div>
</div>
</div>
<?php
include("../../pie.php");
?> <script>
 $(function ()  
 { 
 	$('#datetimepicker1').datetimepicker({
 		language: 'es',
 		pickTime: false
 	})
 });  
 </script>
</body>
</html>