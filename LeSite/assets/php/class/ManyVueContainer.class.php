<?php
class ManyVueContainer{

private $var_id_container;
private $var_id_vue;
private $var_date_ajout;
private $var_date_sortie;

public function IdContainer(){
	if (func_num_args() > 0) {$this->var_id_container = func_get_arg(0);}
	else {return($this->var_id_container);}
}

public function IdVue(){
	if (func_num_args() > 0) {$this->var_id_vue = func_get_arg(0);}
	else {return($this->var_id_vue);}
}

public function DateAjout(){
	if (func_num_args() > 0) {$this->var_date_ajout = func_get_arg(0);}
	else {return($this->var_date_ajout);}
}

public function DateSortie(){
	if (func_num_args() > 0) {$this->var_date_sortie = func_get_arg(0);}
	else {return($this->var_date_sortie);}
}

}
?>