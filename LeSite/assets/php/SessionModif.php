<?php include '../inc/application_include.php'?>
<?php include $MyHomePath.'assets/inc/include_vue.php'; ?>

<?php
$validate = 0;
// password_hash($TEST,PASSWORD_BCRYPT);
// password_verify("Pass", $TEST);
$ModifResponse = '';
$errorTxtTable = array();
$errorClassTable = array("password" => "removeClass('is-invalid')", "sessionId" => "removeClass('is-invalid')");
$MyView = new Vue;
$MyView->Password($_POST["password"]);
$MyView->VueName($_POST["sessionId"]);

//in test
// $Tarr = new customGenericObject;
// $Tarr->addParam("MyParamGeneric_1");
// $Tarr->addParam("MyParamGeneric_2");
// $Tarr->actionPush("MyParamGeneric_2",'addClass("is-invalid")');
// $Tarr->actionPush("MyParamGeneric_2",'Do1("is-invalid")');
// $Tarr->actionPush("MyParamGeneric_2",'Do2("is-invalid")');
// $Tarr->txtPush("MyParamGeneric_2", 'err','Le mot de passe doit faire entre fsf');
// $Tarr->valuePush("MyParamGeneric_2", 'MyNum',42);
// print_r($Tarr);

if ($MyView->VueName() != NULL 
	&& $MyView->VueName() != "" 
	&& strlen($MyView->VueName()) >= constant("VUE_ID_LENGTH_MIN")
	&& strlen($MyView->VueName()) <= constant("VUE_ID_LENGTH_MAX")) 
{
	if ($MyView->Password() != NULL 
		&& $MyView->Password() != "" 
		&& strlen($MyView->Password()) >= constant("VUE_MDP_LENGTH_MIN")
		&& strlen($MyView->Password()) <= constant("VUE_MDP_LENGTH_MAX")) 
	{
		$MyView = Vue_SelectOneByNameAndPassword($MyView);
		if (is_object($MyView) && $MyView->IdVue() != NULL) {
			$validate = 1;
		}

		if($validate === 1) {
			$ModifResponse = '
			$("#formulaire").attr("action","./index-test.php");
			$("#formulaire").attr("target","");
			$("#formulaire").submit();';
		}else
		{/* Dans ce cas on ne trouve pas de vue a ces information. */
			if (Vue_FindOneByVueName($_POST["sessionId"]) == 1) {
				array_push($errorTxtTable, 'Mot de passe invalide.');
				$errorClassTable["password"] = 'addClass("is-invalid")';
			}else
			{
				if ($_POST["action"] == "verification"){$ModifResponse = '
					if(confirm("Aucune session de ce nom.\nVoulez vous créer cette Session ?"))
					{fct_verifier_connexion("ajout_accord");};';}
				elseif ($_POST["action"] == "ajout_accord") {
					print_r($MyView);
				}
			}
		}
	}else
	{/* Ce cas correspond au manque de password */
		array_push($errorTxtTable, 'Le mot de passe doit faire entre '.constant("VUE_MDP_LENGTH_MIN").' et '.constant("VUE_MDP_LENGTH_MAX").' caracteres.');
		$errorClassTable["password"] = 'addClass("is-invalid")';
	}
}else{/* Cas de session Vide */
	array_push($errorTxtTable, 'L\'Id de session doit faire entre '.constant("VUE_ID_LENGTH_MIN").' et '.constant("VUE_ID_LENGTH_MAX").' caracteres.');
	$errorClassTable["sessionId"] = 'addClass("is-invalid")';
	if ($MyView->Password() == NULL 
		|| $MyView->Password() == "" 
		|| strlen($MyView->Password()) < constant("VUE_MDP_LENGTH_MIN")
		|| strlen($MyView->Password()) > constant("VUE_MDP_LENGTH_MAX")) 
	{/* Ce cas correspond au manque de password */
		array_push($errorTxtTable, 'Le mot de passe doit faire entre '.constant("VUE_MDP_LENGTH_MIN").' et '.constant("VUE_MDP_LENGTH_MAX").' caracteres.');
		$errorClassTable["password"] = 'addClass("is-invalid")';
	}

}

/* Résolution */
$ModifResponse .= '$("#error-label").remove();';
foreach ($errorClassTable as $key => $value) {
	$ModifResponse .= '$("#'.$key.'").'.$value.';';
}
if (isset($errorTxtTable[0])) {
	$ModifResponse .= '$("#formulaire").prepend("<div id=\"error-label\" style=\"color:#dc3545;\">'.arrayToList($errorTxtTable).'<hr></div>");';
}
print($ModifResponse);
?>