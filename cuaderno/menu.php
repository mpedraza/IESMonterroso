<?
$activo1="";
$activo2="";
$activo3="";
$activo4="";
$activo5="";
if (strstr($_SERVER['REQUEST_URI'],'cuaderno.php')==TRUE) {$activo1 = ' class="active" ';}
if (strstr($_SERVER['REQUEST_URI'],'faltas')==TRUE) {$activo2 = ' class="active" ';}
if (strstr($_SERVER['REQUEST_URI'],'calendario/')==TRUE){ $activo3 = ' class="active" ';}
if (strstr($_SERVER['REQUEST_URI'],'sin colocar')==TRUE){ $activo4 = ' class="active" ';}
if (strstr($_SERVER['REQUEST_URI'],'horario.php')==TRUE){ $activo5 = ' class="active" ';}

if (isset($_GET['profesor'])) {
	$profesor = $_GET['profesor'];
}
elseif (isset($_POST['profesor'])) {
	$profesor = $_POST['profesor'];
}
else {
	$profesor = $_SESSION['profi'];
}
if (isset($_GET['dia'])) {
	$dia = $_GET['dia'];
}
elseif (isset($_POST['dia'])) {
	$dia = $_POST['dia'];
}

if (isset($_GET['hora'])) {
	$hora = $_GET['hora'];
}
elseif (isset($_POST['hora'])) {
	$hora = $_POST['hora'];
}

if (isset($_GET['curso'])) {
	$curso = $_GET['curso'];
}
elseif (isset($_POST['curso'])) {
	$curso = $_POST['curso'];
}

if (isset($_GET['asignatura'])) {
	$asignatura = $_GET['asignatura'];
}
elseif (isset($_POST['asignatura'])) {
	$asignatura = $_POST['asignatura'];
}

?>
<div class="container hidden-print">
<div class="tabbable">
<ul class="nav nav-tabs">
	<li <? echo $activo5;?>>
	<!-- Button trigger modal --> 
		<a href="#"	class="pull-right" data-toggle="modal" data-target="#myModal0"> Horario </a> 
		<!-- Modal -->
		<div class="modal fade" id="myModal0" tabindex="-1" role="dialog"
			aria-labelledby="myModal0Label" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span
			aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<h4 class="modal-title" id="myModal0Label">Horario de Grupos.</h4>
		</div>
		<div class="modal-body">	
<div align="center" class="table-responsive">

<table class="table table-bordered table-condensed table-striped table-centered">
<thead>
  <tr>
	<th>&nbsp;</th>
	<th>L</th>
	<th>M</th>
	<th>X</th>
	<th>J</th>
	<th>V</th>
  </tr>
</thead>
<tbody>
<?php	
// Horas del d�a
$todas_horas = array (1 => "1", 2 => "2", 3 => "3", 4 => "4", 5 => "5", 6 => "6" );
foreach ( $todas_horas as $n_hora => $nombre_hora ) {	
echo '<tr><th>'.$nombre_hora.'�</th>';
	
	//D�as
	for($z = 1; $z < 6; $z ++) {

		?>
<td valign="top">
<div align=center>
      <?php
		if (! (empty ( $z ) and ! ($n_hora))) {
			$extra_cal = "and dia = '$z' and hora = '$n_hora'";
		}

		$asignatur1 = mysqli_query($db_con, "SELECT distinct  c_asig, a_asig, a_grupo FROM  horw where prof = '$profesor' $extra_cal" );	
		$rowasignatur1 = mysqli_fetch_row ( $asignatur1 );
		
		if (strlen( $rowasignatur1 [2] )>1 and ! ($rowasignatur1 [0] == "25" or $rowasignatur1 [0] == "44")) {
			echo "<span class='label label-info'>" . $rowasignatur1 [1] . "</span><br />";
		}
		
		elseif (empty ( $rowasignatur1 [2] ) and ! ($rowasignatur1 [0] == "25" or $rowasignatur1 [0] == "44")) {
			echo "<span class='label label-default'>" . $rowasignatur1 [1] . "</span><br />";
		}
		elseif (($rowasignatur1 [0] == "25" or $rowasignatur1 [0] == "44") and $mod_faltas == '1') {
			if (strstr($_SESSION ['cargo'],"1")==TRUE) {
				echo "<a href='http://$dominio/intranet/admin/guardias/admin.php'><span class='label label-danger'>".$rowasignatur1[1]."</span>";
			}
			else{
				echo "<a href='http://$dominio/intranet/admin/guardias/index.php?n_dia=$z&hora=$n_hora&profeso=$profesor' class='label label-danger'>" . $rowasignatur1 [1] . "</a>";
			}
		}
		// Recorremos los grupos a los que da en ese hora.
		$asignaturas1 = mysqli_query($db_con, "SELECT distinct  c_asig, a_grupo FROM  horw where prof = '$profesor' and dia = '$z' and hora = '$n_hora'" );
		while ( $rowasignaturas1 = mysqli_fetch_array ( $asignaturas1 ) ) {
			$grupo = $rowasignaturas1 [1];
				echo "<a href='http://$dominio/intranet/cuaderno.php?dia=$z&hora=$n_hora&curso=$grupo&asignatura=$rowasignatur1[0]&profesor=$profesor' style='font-size:0.8em'>";
			if (is_numeric ( substr ( $grupo, 0, 1 ) )) {
				echo $grupo . "<br />";
			}
				echo "</a>";
		}
		?>
    </span></div>
</td>
<?
	}
	?></tr><?
}
?>
</tbody>
</table>
</div>	
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		</div>
		</div>
		</div>
		</div>
	
	</li>

	<li <? echo $activo1;?>><a href="http://<? echo $dominio;?>/intranet/cuaderno.php?menu_cuaderno=1&profesor=<? echo $_SESSION['profi'];?>&dia=<? echo $dia;?>&hora=<? echo $hora;?>&curso=<? echo $curso;?>&asignatura=<? echo $asignatura;?>">Cuaderno de notas</a></li>
	
	<li <? echo $activo2;?>><a href="http://<? echo $dominio;?>/intranet/faltas/index.php?menu_cuaderno=1&profesor=<? echo $_SESSION['profi'];?>&dia=<? echo $dia;?>&hora=<? echo $hora;?>&curso=<? echo $curso;?>&asignatura=<? echo $asignatura;?>">Faltas de asistencia</a></li>

	<li <? echo $activo3;?>><a href="http://<? echo $dominio;?>/intranet/admin/calendario/diario/index_cal.php?menu_cuaderno=1&profesor=<? echo $_SESSION['profi'];?>&dia=<? echo $dia;?>&hora=<? echo $hora;?>&curso=<? echo $curso;?>&asignatura=<? echo $asignatura;?>">Actividades del Grupo</a></li>

	<li <? echo $activo4;?>><a href="#?menu_cuaderno=1&profesor=<? echo $_SESSION['profi'];?>&dia=<? echo $dia;?>&hora=<? echo $hora;?>&curso=<? echo $curso;?>&asignatura=<? echo $asignatura;?>">Diario del Grupo</a></li>

</ul>
</div>
</div>