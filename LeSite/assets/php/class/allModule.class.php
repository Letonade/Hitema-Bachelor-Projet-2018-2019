<?php
class AllModule{

private $var_list_modules = array();

public function ListModules(){
	if (func_num_args() > 0) 
		{
			if (is_object(func_get_arg(0)) || is_array(func_get_arg(0)))
				$this->var_list_modules = func_get_arg(0);
			else
				return("error need array/object.");
		}
	else 
		{
			return($this->var_list_modules);
		}
}

}
?>