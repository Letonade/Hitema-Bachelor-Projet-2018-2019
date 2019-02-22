<?php
class ModuleElectricite{

private $var_id_module_electricite;
private $var_consommation;
private $var_date_changement;

public function IdModuleElectricite(){
	if (func_num_args() > 0) {$this->var_id_module_electricite = func_get_arg(0);}
	else {return($this->var_id_module_electricite);}
}

public function Consommation(){
	if (func_num_args() > 0) {$this->var_consommation = func_get_arg(0);}
	else {return($this->var_consommation);}
}

public function DateChangement(){
	if (func_num_args() > 0) {$this->var_date_changement = func_get_arg(0);}
	else {return($this->var_date_changement);}
}

}
?>