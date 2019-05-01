<?php
class ModuleGaz{

private $var_id_module_gaz;
private $var_consommation;
private $var_date_changement;
private $var_id_container;

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

public function AfficherModuleGaz(){
	return("".$this->Consommation());
}
}
?>