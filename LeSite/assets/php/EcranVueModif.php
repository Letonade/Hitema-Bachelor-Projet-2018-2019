<?php include '../inc/application_include.php'?>
<?php include $MyHomePath.'assets/inc/include_container.php'; ?>
<?php include $MyHomePath.'assets/inc/include_allModule.php'; ?>

<?php
$action = $_POST["action"];
$ModifResponse = '$("#error-label").remove();';
$CustomObject = new customGenericObject;

switch($action)
{
	case 'charger_modules_container';
		$id_container = $_POST["id_container"];
		$CustomObject->addParam("TabTuile");
		$CustomObject->txtpush("TabTuile", "err", $id_container);

		

		/* Résolution */
		if ($CustomObject->countTextLineNamed("err") > 0) {
			$CustomObject->actionpush('TabTuile','prepand','.prepend("<div id=\"error-label\" style=\"color:#dc3545;\">'.$CustomObject->allTextInListName("err").'<hr></div>");');
		}
		$ModifResponse .= $CustomObject->allActionInline();
		print($ModifResponse);
	break;
	default;
	    echo 'Erreur : action invalide.';
	break;
}

?>