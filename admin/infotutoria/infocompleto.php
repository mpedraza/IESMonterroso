<?
session_start();
include("../../config.php");
include_once('../../config/version.php');

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



include("../../menu.php");
  include("menu.php");

if (isset($_POST['id'])) {
	$id = $_POST['id'];
} 
elseif (isset($_GET['id'])) {
	$id = $_GET['id'];
} 
else
{
$id="";
}
?>
<div class="container">

<div class="page-header">
  <h2>Informes de Tutor�a <small> Informe de un alumno</small></h2>
</div>


<?php
  if (isset($_POST['llenar'])) {
	$llenar = $_POST['llenar'];
} 
elseif (isset($_GET['llenar'])) {
	$llenar = $_GET['llenar'];
} 
else
{
$llenar="";
}

if(empty($llenar)){}else{$id = $llenar;}

$alumno=mysqli_query($db_con, "SELECT APELLIDOS,NOMBRE,unidad, id, TUTOR, F_ENTREV, CLAVEAL FROM infotut_alumno WHERE ID='$id'");

$dalumno = mysqli_fetch_array($alumno);
$claveal=$dalumno[6];
	
if (empty($dalumno[0])) {
	echo '<div align="center"><div class="alert alert-warning alert-block fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
			<legend>ATENCI�N:</legend>
Debes seleccionar un alumno en primer lugar.<br>Vuelve atr�s e int�ntalo de nuevo<br><br /><input type="button" onClick="history.back(1)" value="Volver" class="btn btn-danger">
</div></div><hr>';
	exit;	
}

echo '<div class="media">';

$foto = '../../xml/fotos/'.$claveal.'.jpg';
if (file_exists($foto)) {
	echo '
		<div class="pull-left hidden-xs" style="width: 100px">
	    <img class="media-object img-thumbnail" src="../../xml/fotos/'.$claveal.'.jpg" alt="">
	  </div>';
}

echo '
	<div class="media-body">
    <h2>'.$dalumno[0].', '.$dalumno[1].' <small>Unidad: '.$dalumno[2].'</small></h2>
    <h4 class="text-warning">Fecha de visita: '.strftime('%e de %B de %Y',strtotime($dalumno[5])).'</h4>
    <h4 class="text-info">Tutor/a: '.mb_convert_case($dalumno[4], MB_CASE_TITLE, "iso-8859-1").'</h4>
  </div>
</div>
<br>';

$datos=mysqli_query($db_con, "SELECT asignatura, informe, id, profesor FROM infotut_profesor WHERE id_alumno='$id'");
if(mysqli_num_rows($datos) > 0)
{
echo "<div class=\"table-responsive\"><table class='table table-striped table-bordered' align='center'>";
while($informe = mysqli_fetch_array($datos))
{
$fondo = "";
if($informe[0] == $c_asig){$fondo="background-color:#dff0d8;";}
	echo "<tr><td style='width:15%;'><strong>$informe[0]</strong></td>
			<td style='width:20%;'>$informe[3]</td>
		  <td>$informe[1]</td>";
		if (strlen($fondo) > '0') {
		echo "<td style='width:2%;'><a href='borrar.php?del=1&id_del=$informe[2]&id_alumno=$id&asignatura=$asignatura&profesor=$informe[3]'><i
		class='fa fa-trash-o' title='Borrar'></a></td>";
	}
	echo"</tr>";
}

$combas = mysqli_query($db_con, "select combasi from alma where claveal = '$claveal'");
$combasi = mysqli_fetch_array($combas);
$tr_comb = explode(":",$combasi[0]);
$frase=" and (";
foreach ($tr_comb as $codasi)
{
	$frase.="codigo = '$codasi' or ";
}
$frase = substr($frase,0,-19).")";

$datos1 = mysqli_query($db_con, "SELECT distinct materia, profesor from profesores, asignaturas WHERE materia = nombre and profesores.grupo = '$dalumno[2]' and profesor not in (SELECT profesor FROM infotut_profesor WHERE id_alumno='$id') and materia not in (SELECT asignatura FROM infotut_profesor WHERE id_alumno='$id')  and abrev not like '%\_%' $frase");
while($informe1 = mysqli_fetch_array($datos1))
{
	echo "<tr><td style='width:15%;'><strong>$informe1[0]</strong></td>
		<td style='width:20%;'>$informe1[1]</td>
		  <td></td>";
	echo"</tr>";
}


echo"</table></div>";


echo '<div class="hidden-print">';
echo '<a href="imprimir.php?id='.$id.'" class="btn btn-primary">Imprimir</a> ';
echo '<a href="index.php" class="btn btn-default">Volver</a> ';
echo '</div>';

}
else
{
	echo '<br /><div align="center"><div class="alert alert-warning alert-block fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
			<h5>ATENCI�N:</h5>
Los Profesores no han rellenado a�n su Informe.<br />
<input name="volver" type="button" onClick="history.go(-1)" value="Volver" class="btn btn-danger">
</div></div><hr>';
	}
?>
</div>
	<? include("../../pie.php");?>								
</body>
</html>
