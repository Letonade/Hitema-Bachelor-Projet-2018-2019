<?php
class ModuleGaz{
	private $var_id_module_gaz;
	private $var_consommation;
	private $var_date_changement;
	private $var_id_container;
	private $var_consommation_max;
	
	public function IdModuleGaz(){
		if (func_num_args() > 0) {$this->var_id_module_gaz = func_get_arg(0);}
		else {return($this->var_id_module_gaz);}
	}
	
	public function Consommation(){
		if (func_num_args() > 0) {$this->var_consommation = func_get_arg(0);}
		else {return($this->var_consommation);}
	}
	
	public function DateChangement(){
		if (func_num_args() > 0) {$this->var_date_changement = func_get_arg(0);}
		else {return($this->var_date_changement);}
	}
	
	public function IdContainer(){
		if (func_num_args() > 0) {$this->var_id_container = func_get_arg(0);}
		else {return($this->var_id_container);}
	}
	
	public function ConsommationMax(){
		if (func_num_args() > 0) {$this->var_consommation_max = func_get_arg(0);}
		else {return($this->var_consommation_max);}
	}
	
	public function AfficherModule($entete){
		$strDate = mb_convert_encoding('%d/%m/%Y %Hh%M','ISO-8859-9','UTF-8');
		$date = iconv("ISO-8859-9","UTF-8",strftime($strDate ,strtotime($this->DateChangement())));
		//$date = strftime("%V,%G,%Y", strtotime($this->DateChangement()));
		$chaine = "";
		if ($entete == 1) {
		$chaine .= "<tr>
						<td style='border:1px solid black;'>Date</td>
						<td style='border:1px solid black;'>Consommation</td>
					</tr>";
		}
		$chaine .= "<td style='border:1px solid black;'>".$date."</td>";
		$chaine .= "<td style='border:1px solid black;'>".$this->Consommation()."</td>";
		return($chaine);
	}

	public function AfficherModuleInList(){
		//$date = iconv("ISO-8859-9","UTF-8",strftime($strDate ,strtotime($this->DateChangement())));
		//$date = strftime("%V,%G,%Y", strtotime($this->DateChangement()));
		$chaine = "";
		$chaine .= "Consommation: ".$this->Consommation()."";
		return($chaine);
	}

	public function ImageModule(){
		return("images/img-1.jpg");
	}
	
	public function GetModule($val)
	{
		$this->IdModuleGaz($val['id_module_gaz']);
		$this->Consommation($val['consommation']);
		$this->DateChangement($val['date_changement']);
		$this->IdContainer($val['id_container']);
		$this->ConsommationMax($val['consommation_max']);
		
	}
	
	public function Depassement()
	{
		if ($this->Consommation() > $this->ConsommationMax())
			{return 1;}
		else
			{return 0;}
	}

	public function AfficherFormModification(){
		$chaine="Consommation: <input type='text' name='consommation' id='consommation' value=".$this->var_consommation_max.">
		<input type='hidden' name='type_module' id='type_module' value='module_gaz'>";
		return $chaine;
	}
}
?>