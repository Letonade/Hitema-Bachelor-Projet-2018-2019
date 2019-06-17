<?php
class ModuleHabitation{
	private $var_id_module_habitation;
	private $var_nombre_badge;
	private $var_date_changement;
	private $var_poid;
	private $var_nombre_appareil_electronique;
	private $var_nombre_connexion;
	private $var_nombre_badge_max;
	private $var_poid_max;
	private $var_nombre_appareil_electronique_max;
	private $var_nombre_connexion_max;
	private $var_id_container;

	public function IdModuleHabitation(){
		if (func_num_args() > 0) {$this->var_id_module_habitation = func_get_arg(0);}
		else {return($this->var_id_module_habitation);}
	}

	public function NombreBadge(){
		if (func_num_args() > 0) {$this->var_nombre_badge = func_get_arg(0);}
		else {return($this->var_nombre_badge);}
	}

	public function NombreBadgeMax(){
		if (func_num_args() > 0) {$this->var_nombre_badge_max = func_get_arg(0);}
		else {return($this->var_nombre_badge_max);}
	}

	public function DateChangement(){
		if (func_num_args() > 0) {$this->var_date_changement = func_get_arg(0);}
		else {return($this->var_date_changement);}
	}

	public function Poid(){
		if (func_num_args() > 0) {$this->var_poid = func_get_arg(0);}
		else {return($this->var_poid);}
	}

	public function PoidMax(){
		if (func_num_args() > 0) {$this->var_poid_max = func_get_arg(0);}
		else {return($this->var_poid_max);}
	}

	public function NombreAppareilElectronique(){
		if (func_num_args() > 0) {$this->var_nombre_appareil_electronique = func_get_arg(0);}
		else {return($this->var_nombre_appareil_electronique);}
	}

	public function NombreAppareilElectroniqueMax(){
		if (func_num_args() > 0) {$this->var_nombre_appareil_electronique_max = func_get_arg(0);}
		else {return($this->var_nombre_appareil_electronique_max);}
	}

	public function NombreConnexion(){
		if (func_num_args() > 0) {$this->var_nombre_connexion = func_get_arg(0);}
		else {return($this->var_nombre_connexion);}
	}

	public function NombreConnexionMax(){
		if (func_num_args() > 0) {$this->var_nombre_connexion_max = func_get_arg(0);}
		else {return($this->var_nombre_connexion_max);}
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
		$chaine .= "<td style='border:1px solid black;'>".$this->NombreBadge()."</td>";
		$chaine .= "<td style='border:1px solid black;'>".$this->NombreAppareilElectronique()."</td>";
		$chaine .= "<td style='border:1px solid black;'>".$this->NombreConnexion()."</td>";
		$chaine .= "<td style='border:1px solid black;'>".$this->Poid()."</td>";
		return($chaine);
	}

	public function AfficherModuleInList(){
		//$date = iconv("ISO-8859-9","UTF-8",strftime($strDate ,strtotime($this->DateChangement())));
		//$date = strftime("%V,%G,%Y", strtotime($this->DateChangement()));
		$chaine = "";
		$chaine .= "Nombre de badgeage: ".$this->NombreBadge()."</br>";
		$chaine .= "Nombre d'appareil: ".$this->NombreAppareilElectronique()."</br>";
		$chaine .= "Nombre de connexion: ".$this->NombreConnexion()."</br>";
		$chaine .= "Poid: ".$this->Poid()."";
		return($chaine);
	}

	public function get_module($val)
	{
		$this->IdModuleHabitation($val['id_module_habitation']);
		$this->NombreBadge($val['nombre_badge']);
		$this->DateChangement($val['date_changement']);
		$this->Poid($val['poid']);
		$this->NombreAppareilElectronique($val['nombre_appareil_electronique']);
		$this->NombreConnexion($val['nombre_connexion']);
		$this->NombreBadgeMax($val['nombre_badge_max']);
		$this->PoidMax($val['poid_max']);
		$this->NombreAppareilElectroniqueMax($val['nombre_appareil_electronique_max']);
		$this->NombreConnexionMax($val['nombre_connexion_max']);
	}

	public function AfficherFormModification(){
		$chaine="Nombre de badgage: <input type='text' name='nombre_badgage' id='nombre_badgage' value=".$this->var_nombre_badge_max.">
		         Poid: <input type='text' name='poid' id='poid' value=".$this->var_poid_max.">
				 Nombre d'apareils électroniques: <input type='text' name='nombre_apareils' id='nombre_apareils' value=".$this->var_nombre_appareil_electronique_max.">
				 Nombre de connexion: <input type='text'name='nombre_connexion' id='nombre_connexion' value=".$this->var_nombre_connexion_max.">
				 <input type='hidden' name='module' id='module' value='ModuleHabitation'>";
		return $chaine;
	}
}
?>