<?php 

function combo($nombre, $consulta, $campo_select, $campo_codigo, $campo_mostrar,$conn,$extra,$valpri) { ?>
	<select name="<?php echo $nombre ?>" <?php echo $extra ?>>

	<?php if ($valpri!=""){?>
		<option selected value=""><?php echo $valpri;?></option>
	<?php } ?>

	<?php $rcombo = mysql_query($consulta, $conn);
	while($rscombo = mysql_fetch_array($rcombo)){ ?>
		<option <?php if($rscombo[$campo_codigo]==$campo_select) {?>selected <?php } ?> value="<?php echo $rscombo[$campo_codigo]?>"><?php echo $rscombo[$campo_mostrar] ?></option>
	<?php }
	mysql_free_result($rcombo); ?>
	</select>
<?php } 

function comboc($nombre, $campos, $conn, $extra, $seleccionado) { ?>
	<select name="<?php echo $nombre ?>" <?php echo $extra ?>>
	<?php $aux_campos = split(",",$campos);
	$pos = count($aux_campos);
	for ($j=0;$j<$pos;$j++){ ?>
		<option value="<?php echo $j ?>" <?php if ($seleccionado == $j){?> selected <?php } ?>><?php echo $aux_campos[$j] ?></option>
	<?php } ?>
	</select>
<?php } ?>
