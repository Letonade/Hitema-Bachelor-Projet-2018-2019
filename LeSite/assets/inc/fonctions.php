<?php

function sqlStrNull($str){ if (is_null($str)) {return("NULL"); } else{return("'".$str."'");}}
function sqlStrVide($str){ if (is_null($str)) {return("''"); } else{return("'".$str."'");}}
function sqlDateNull($date){ if (is_null($date)) {return("NULL"); } else{return("'".$date."'");}}
function sqlIntNull($int){ if (is_null($int)) {return("NULL"); } else{return($int);}}
function sqlIntVide($int){ if (is_null($int)) {return("''"); } else{return($int);}}
function sqlIntZero($int){ if (is_null($int)) {return("'0'"); } else{return($int);}}
function sqlFloatNull($float){ if (is_null($float)) {return("NULL"); } else{return($float);}}
function sqlFloatVide($float){ if (is_null($float)) {return("''"); } else{return($float);}}
function sqlFloatZero($float){ if (is_null($float)) {return("'0'"); } else{return($float);}}

function arrayToList($array)
{
	$response = '<ul>';
	foreach ($array as $key => $value) {
		$response .= ' <li>' . $value;
	}
	$response .= '</ul>';
	return ($response);
}

/**
 * customErrArr
 */
class customGenericObject
{
	private $Arror = array();

	public function arror(){return($this->Arror);}
	public function addParam($nom)
	{
		$this->Arror[$nom] = array(
			'JQuery' 	=> '$("#'.$nom.'")',
			'actions' => array(),	// 	ex: '.addClass('laClasse')'
			'txts' 	=> array(),	// 	ex: "Libelle" => "MonLibelle"
			'values'	=> array()		//	ex: "NbArg" => 23
		);
	}
	public function actionPush($nom, $action)
	{
		array_push($this->Arror[$nom]["actions"],$action);
		return(1);
	}
	public function txtPush($nom, $where, $txt)
	{
		$this->Arror[$nom]["txts"][$where] = $txt;
		return(1);
	}
	public function valuePush($nom, $where, $value)
	{
		$this->Arror[$nom]["values"][$where] = $value;
		return(1);
	}
	public function all_AllActionInline()
	{
		$inline = '';
		foreach ($this->Arror as $param => $arr_options) 
		{
			foreach ($arr_options["actions"] as $key => $action) 
			{
				$inline .= $arr_options['JQuery'].$action.";";
			}
		}
	}
}

?>