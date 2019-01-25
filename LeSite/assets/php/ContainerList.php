<section>
<?php
	$listContainer = Container_SelectAllForASessionId($_POST["sessionId"]);
	//print_r(print_r($_POST,1)."<br><br>".print_r($listContainer,1));

	foreach ($listContainer as $key => $container) 
	{
		echo($key.":{<p style='margin:0px 12px;'>".$container->Libelle()." de type ".$container->ContainerType->ContainerTypeLibelle()."</p>};<br>");
	}
	echo '<script type="text/javascript">fct_charger_modules_container(1);</script>';
?>
</section>