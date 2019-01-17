<?php
class Vue{

private $var_id_vue;
private $var_password;

public function IdVue(){
	if (func_num_args() > 0) {$this->var_id_vue = func_get_arg(0);}
	else {return($this->var_id_vue);}
}

public function Password(){
	if (func_num_args() > 0) {$this->var_password = func_get_arg(0);}
	else {return($this->var_password);}
}

}
?>