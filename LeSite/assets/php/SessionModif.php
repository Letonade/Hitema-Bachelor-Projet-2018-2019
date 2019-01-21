<?php include '../inc/application_include.php'?>
<?php include $MyHomePath.'assets/inc/include_vue.php'; ?>

<?php
$validate = 0;
// password_hash($TEST,PASSWORD_BCRYPT);
// password_verify("Pass", $TEST);
$ModifResponse = '';
$MyView = new Vue;
$MyView->Password($_POST["password"]);
$MyView->VueName($_POST["sessionId"]);

if ($MyView->Password != "" and $MyView->Password() != NULL) {
	$ModifResponse .= 
	$MyView = Vue_FindOneByNameAndPassword($MyView);
	if (is_object($MyView) && $MyView->IdVue() != NULL) {
		$validate = 1;
	}

	if($validate === 1) {
		$ModifResponse = '
		$("#formulaire").attr("action","./index-test.php");
		$("#formulaire").attr("target","");
		$("#formulaire").submit();';
	}else
	{
		//$ModifResponse = 'alert("Le formulaire n\'est pas correctement rempli.");';
		$ModifResponse = '
		$("#error-label").remove();
		$("#formulaire").prepend("<div id=\"error-label\" style=\"color:#dc3545;\">Log failed or not valid<hr></div>");
		$("#password").addClass("is-invalid");
		$("#sessionId").addClass("is-invalid");';
	}
}

print($ModifResponse);
?>