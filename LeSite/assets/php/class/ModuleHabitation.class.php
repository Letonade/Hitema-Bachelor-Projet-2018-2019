<?php
class ModuleHabitation{

private $var_id_module_habitation;
private $var_nombre_badge;
private $var_date_changement;
private $var_poid;
private $var_nombre_apariel_electronique;
private $var_nombre_connexion;
private $var_id_container;

public function IdModuleHabitation(){
	if (func_num_args() > 0) {$this->var_id_module_habitation = func_get_arg(0);}
	else {return($this->var_id_module_habitation);}
}

public function NombreBadge(){
	if (func_num_args() > 0) {$this->var_nombre_badge = func_get_arg(0);}
	else {return($this->var_nombre_badge);}
}

public function DateChangement(){
	if (func_num_args() > 0) {$this->var_date_changement = func_get_arg(0);}
	else {return($this->var_date_changement);}
}

public function Poid(){
	if (func_num_args() > 0) {$this->var_poid = func_get_arg(0);}
	else {return($this->var_poid);}
}

public function NombreAparielElectronique(){
	if (func_num_args() > 0) {$this->var_nombre_apariel_electronique = func_get_arg(0);}
	else {return($this->var_nombre_apariel_electronique);}
}

public function NombreConnexion(){
	if (func_num_args() > 0) {$this->var_nombre_connexion = func_get_arg(0);}
	else {return($this->var_nombre_connexion);}
}

public function IdContainer(){
	if (func_num_args() > 0) {$this->var_id_container = func_get_arg(0);}
	else {return($this->var_id_container);}
}

public function AfficherModule($entete){
	$strDate = mb_convert_encoding('%d/%m/%Y %Hh%M','ISO-8859-9','UTF-8');
	$date = iconv("ISO-8859-9","UTF-8",strftime($strDate ,strtotime($this->DateChangement())));
	//$date = strftime("%V,%G,%Y", strtotime($this->DateChangement()));
	$chaine = "";
	if ($entete == 1) {
	$chaine .= "<tr>
					<td style='border:1px solid black;'>Date</td>
					<td style='border:1px solid black;'>Nombre de badgeages</td>
					<td style='border:1px solid black;'>Nombre d'appareils éléctroniques</td>
					<td style='border:1px solid black;'>Nombre de connexions</td>
					<td style='border:1px solid black;'>Poid</td>
				</tr>";
	}
	$chaine .= "<td style='border:1px solid black;'>".$date."</td>";
	$chaine .= "<td style='border:1px solid black;'>".$this->Consommation()."</td>";
	return($chaine);
}
public function get_module($val)
{
	$this->IdModuleHabitation($val['id_module_gaz']);
	$this->NombreBadge($val['consomation']);
	$this->DateChangement($val['date_changement']);
	$this->Poid($val['id_container']);
	$this->NombreAparielElectronique($val['id_container']);
	$this->NombreConnexion($val['id_container']);
	
	
}
}
?>