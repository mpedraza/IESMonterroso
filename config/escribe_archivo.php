<?php
			fwrite($f1,"<?php\r\n",150) or die("No se puede escribir en el archivo");
		fwrite($f1,"$"."dominio='".$_POST['dominio']."';\r\n");
		fwrite($f1,"$"."nombre_del_centro='".$_POST['nombre_del_centro']."';\r\n");	
		fwrite($f1,"$"."nombre_corto='".$_POST['nombre_corto']."';\r\n");
		fwrite($f1,"$"."codigo_del_centro='".$_POST['codigo_del_centro']."';\r\n");
		fwrite($f1,"$"."email_del_centro='".$_POST['email_del_centro']."';\r\n");
		fwrite($f1,"$"."director_del_centro='".$_POST['director_del_centro']."';\r\n");
		fwrite($f1,"$"."jefatura_de_estudios='".$_POST['jefatura_de_estudios']."';\r\n");
		fwrite($f1,"$"."secretario_del_centro='".$_POST['secretario_del_centro']."';\r\n");
		fwrite($f1,"$"."direccion_del_centro='".$_POST['direccion_del_centro']."';\r\n");
		fwrite($f1,"$"."localidad_del_centro='".$_POST['localidad_del_centro']."';\r\n");
		fwrite($f1,"$"."codigo_postal_del_centro='".$_POST['codigo_postal_del_centro']."';\r\n");
		fwrite($f1,"$"."telefono_del_centro='".$_POST['telefono_del_centro']."';\r\n");
		fwrite($f1,"$"."fax_del_centro='".$_POST['fax_del_centro']."';\r\n");
		fwrite($f1,"$"."curso_actual='".$_POST['curso_actual']."';\r\n");
		fwrite($f1,"$"."inicio_curso='".$_POST['inicio_curso']."';\r\n");
		fwrite($f1,"$"."fin_curso='".$_POST['fin_curso']."';\r\n");
		fwrite($f1,"$"."usuario_smstrend='".$_POST['usuario_smstrend']."';\r\n");
		fwrite($f1,"$"."clave_smstrend='".$_POST['clave_smstrend']."';\r\n");
		fwrite($f1,"$"."db='".$_POST['db']."';\r\n");
		fwrite($f1,"$"."db_reservas='".$_POST['db_reservas']."';\r\n");
		fwrite($f1,"$"."db_user='".$_POST['db_user']."';\r\n");
		fwrite($f1,"$"."db_host='".$_POST['db_host']."';\r\n");
		fwrite($f1,"$"."db_pass='".$_POST['db_pass']."';\r\n");
		
		if($_POST['mod_tic']){fwrite($f1,"$"."mod_tic='1';\r\n");}
		else{fwrite($f1,"$"."mod_tic='0';\r\n");}
		if($_POST['mod_horario']){fwrite($f1,"$"."mod_horario='1';\r\n");}
		else{fwrite($f1,"$"."mod_horario='0';\r\n");}
		if($_POST['mod_faltas']){fwrite($f1,"$"."mod_faltas='1';\r\n");}
		else{fwrite($f1,"$"."mod_faltas='0';\r\n");}
		if($_POST['mod_bilingue']){fwrite($f1,"$"."mod_bilingue='1';\r\n");}
		else{fwrite($f1,"$"."mod_bilingue='0';\r\n");}
		if($_POST['mod_transporte']){fwrite($f1,"$"."mod_transporte='1';\r\n");}
		else{fwrite($f1,"$"."mod_transporte='0';\r\n");}
		if($_POST['mod_sms']){fwrite($f1,"$"."mod_sms='1';\r\n");}
		else{fwrite($f1,"$"."mod_sms='0';\r\n");}
		if($_POST['mod_biblio']){fwrite($f1,"$"."mod_biblio='1';\r\n");}
		else{fwrite($f1,"$"."mod_biblio='0';\r\n");}
		if($_POST['p_biblio']){fwrite($f1,"$"."p_biblio='".$_POST['p_biblio']."';\r\n");}
		else{fwrite($f1,"$"."p_biblio='';\r\n");}
		if($_POST['mod_eval']){fwrite($f1,"$"."mod_eval='1';\r\n");}
		else{fwrite($f1,"$"."mod_eval='0';\r\n");}
		if($_POST['mod_matriculas']){fwrite($f1,"$"."mod_matriculas='1';\r\n");}
		else{fwrite($f1,"$"."mod_matriculas='0';\r\n");}
		if($_POST['raiz_dir']){fwrite($f1,"$"."raiz_dir='".$_POST['raiz_dir']."';\r\n");}
		if($_POST['doc_dir']){fwrite($f1,"$"."doc_dir='".$_POST['doc_dir']."';\r\n");}
		fwrite($f1,"$"."fotos_dir='/tmp';\r\n");
		
		fwrite($f1,"$"."num_administ='2';\r\n");
		fwrite($f1,"$"."num_conserje='1';\r\n");
 		fwrite($f1,"$"."administ1='".$_POST['administ1']."';\r\n");
		fwrite($f1,"$"."dnia1='".$_POST['dnia1']."';\r\n");
		fwrite($f1,"$"."idea1='".$_POST['idea1']."';\r\n");
		fwrite($f1,"$"."administ2='".$_POST['administ2']."';\r\n");
		fwrite($f1,"$"."dnia2='".$_POST['dnia2']."';\r\n");
		fwrite($f1,"$"."idea2='".$_POST['idea2']."';\r\n");
		fwrite($f1,"$"."administ3='".$_POST['administ3']."';\r\n");
		fwrite($f1,"$"."dnia3='".$_POST['dnia3']."';\r\n");
		
		fwrite($f1,"$"."conserje1='".$_POST['conserje1']."';\r\n");
		fwrite($f1,"$"."dnic1='".$_POST['dnic1']."';\r\n");

		fwrite($f1,"$"."num_carrito='".$_POST['num_carrito']."';\r\n");	
		fwrite($f1,"$"."carrito1='".$_POST['carrito1']."';\r\n");
		fwrite($f1,"$"."carrito2='".$_POST['carrito2']."';\r\n");	
		fwrite($f1,"$"."carrito3='".$_POST['carrito3']."';\r\n");	
		fwrite($f1,"$"."carrito4='".$_POST['carrito4']."';\r\n");	
		fwrite($f1,"$"."carrito5='".$_POST['carrito5']."';\r\n");	
		fwrite($f1,"$"."carrito6='".$_POST['carrito6']."';\r\n");	
		fwrite($f1,"$"."carrito7='".$_POST['carrito7']."';\r\n");	
		fwrite($f1,"$"."carrito8='".$_POST['carrito8']."';\r\n");	
		fwrite($f1,"$"."carrito9='".$_POST['carrito9']."';\r\n");	
		fwrite($f1,"$"."carrito10='".$_POST['carrito10']."';\r\n");	
		fwrite($f1,"$"."carrito11='".$_POST['carrito11']."';\r\n");	
		fwrite($f1,"$"."carrito12='".$_POST['carrito12']."';\r\n");	
		fwrite($f1,"$"."carrito13='".$_POST['carrito13']."';\r\n");	
		fwrite($f1,"$"."carrito14='".$_POST['carrito14']."';\r\n");	
		fwrite($f1,"$"."carrito15='".$_POST['carrito15']."';\r\n");	
		
		fwrite($f1,"$"."num_medio='".$_POST['num_medio']."';\r\n");	
		fwrite($f1,"$"."medio1='".$_POST['medio1']."';\r\n");	
		fwrite($f1,"$"."medio2='".$_POST['medio2']."';\r\n");	
		fwrite($f1,"$"."medio3='".$_POST['medio3']."';\r\n");	
		fwrite($f1,"$"."medio4='".$_POST['medio4']."';\r\n");	
		fwrite($f1,"$"."medio5='".$_POST['medio5']."';\r\n");	
		fwrite($f1,"$"."medio6='".$_POST['medio6']."';\r\n");	
		fwrite($f1,"$"."medio7='".$_POST['medio7']."';\r\n");	
		fwrite($f1,"$"."medio8='".$_POST['medio8']."';\r\n");	
		fwrite($f1,"$"."medio9='".$_POST['medio9']."';\r\n");	
		fwrite($f1,"$"."medio10='".$_POST['medio10']."';\r\n");		
		fwrite($f1,$funcion);	
		    fwrite($f1,"?>\r\n",150);
rewind($f1); 
fclose($f1);
?>