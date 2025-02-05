<?php
function liste_fuellen($daf,$list,$size,$anz_pos,$sel=1)
{
$liste = fopen($daf,'r');
$zeile = trim(fgets($liste));
$spalte = explode(';',$zeile);
$i=1;
$ausgabe="<select name=$list size=$size>";
while(!feof($liste))
	{
	if($i==$sel)
	{$ausgabe.="<option value=$zeile selected> $spalte[$anz_pos] </option>";}
	else
	{$ausgabe.="<option value=$zeile> $spalte[$anz_pos] </option>";}	
	$i++;
	$zeile = trim(fgets($liste));
	$spalte = explode(';',$zeile);
	}
$ausgabe.="</select>";
fclose($liste);
return $ausgabe;
}
?>

<?php
function get_Zeile($dat,$key_pos,$keywert){
$fp= fopen($dat,'r');
$zeile = trim(fgets($fp));
$spalte = explode(';',$zeile);
$gefunden = false;
$ausgabe = "<table>
				<thead>
					<tr>";
		while(!feof($fp))
		{
			if($spalte[$key_pos]==$keywert)
			{
				$gefunden = true;
				$ausgabe.= $zeile
			}
			$zeile = trim(fgets($fp));
			$spalte = explode(';',$zeile);
		}			
	if($gefunden==true)
	{
		$ausgabe.="</tr>
					</thead>
						</table>";
	}
return $ausgabe;	
}
?>

<?php
function nummerisch_füllen($dat)
{
	$fp = fopen($dat,'r');
	$zeile = trim(fgets($fp));
	$spalte = explode(';',$zeile);
	$i = 0;
	$füllen = array();
		while(!feof($fp))
		{
			$füllen[$i] = $zeile;
			$zeile = trim(fgets($fp));
			$spalte = explode(';',$zeile);
			$i++;
		}
	fclose($fp)
	return $füllen;
}
?>

<?php 
function assoziativ_füllen($dat)
{
	$fp = fopen($dat,'r');
	$zeile = trim(fgets($fp));
	$spalte = explode(';',$zeile);
	$füllen = array();
		while(!feof($fp))
		{
			$füllen[$spalte[0]] = $spalte[1];
			$zeile = trim(fgets($fp));
			$spalte = explode(';',$zeile);
		}
	fclose($fp);
	return $füllen;
}
?>