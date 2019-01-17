<?php
class Container{

private $var_id_container;
private $var_id_container_type;
private $var_date_acquisition;
private $var_date_fin;
private $var_libelle;

public function IdContainer(){
	if (func_num_args() > 0) {$this->var_id_container = func_get_arg(0);}
	else {return($this->var_id_container);}
}

public function IdContainerType(){
	if (func_num_args() > 0) {$this->var_id_container_type = func_get_arg(0);}
	else {return($this->var_id_container_type);}
}

public function DateAcquisition(){
	if (func_num_args() > 0) {$this->var_date_acquisition = func_get_arg(0);}
	else {return($this->var_date_acquisition);}
}

public function DateFin(){
	if (func_num_args() > 0) {$this->var_date_fin = func_get_arg(0);}
	else {return($this->var_date_fin);}
}

public function Libelle(){
	if (func_num_args() > 0) {$this->var_libelle = func_get_arg(0);}
	else {return($this->var_libelle);}
}

}
?>