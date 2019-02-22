<?php
class ContainerType{

private $var_id_container_type;
private $var_container_type_libelle;

public function IdContainerType(){
	if (func_num_args() > 0) {$this->var_id_container_type = func_get_arg(0);}
	else {return($this->var_id_container_type);}
}

public function ContainerTypeLibelle(){
	if (func_num_args() > 0) {$this->var_container_type_libelle = func_get_arg(0);}
	else {return($this->var_container_type_libelle);}
}

}
?>