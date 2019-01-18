<?php include '../inc/application_include.php'?>
<?php include $MyHomePath.'assets/inc/include_vue.php'; ?>

<?php

// password_hash($TEST,PASSWORD_BCRYPT);
// password_verify("Pass", $TEST);
$list_vue = Vue_SelectAll();

$ModifResponse = '';

if(1 == 0) {
	$ModifResponse = '
	$("#formulaire").attr("action","./index-test.php");
	$("#formulaire").attr("target","");
	$("#formulaire").submit();';
}else
{
	$ModifResponse = 'alert("alerte au gogol les enfants.");';
}

print($ModifResponse);
?>