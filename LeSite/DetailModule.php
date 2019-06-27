<?php include './assets/inc/application_include.php'; ?>
<html>        
    <head>
    <style type="text/css">
@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:red !important;
  background-color:#1F2739;
  
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: lightblue;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: lightblue;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}
.btn_rtr {
	-moz-box-shadow:inset 0px 1px 3px 0px #9fb4f2;
	-webkit-box-shadow:inset 0px 1px 3px 0px #9fb4f2;
	box-shadow:inset 0px 1px 3px 0px #9fb4f2;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #2c3446), color-stop(1, #185875));
	background:-moz-linear-gradient(top, #2c3446 5%, #185875 100%);
	background:-webkit-linear-gradient(top, #2c3446 5%, #185875 100%);
	background:-o-linear-gradient(top, #2c3446 5%, #185875 100%);
	background:-ms-linear-gradient(top, #2c3446 5%, #185875 100%);
	background:linear-gradient(to bottom, #2c3446 5%, #185875 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#2c3446', endColorstr='#185875',GradientType=0);
	background-color:#2c3446;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	border:1px solid #ed1a36;
	display:inline-block;
	cursor:pointer;
	color:#e61224;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:11px 23px;
	text-decoration:none;
	text-shadow:0px -1px 0px #404961;
}
.btn_rtr:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #185875), color-stop(1, #2c3446));
	background:-moz-linear-gradient(top, #185875 5%, #2c3446 100%);
	background:-webkit-linear-gradient(top, #185875 5%, #2c3446 100%);
	background:-o-linear-gradient(top, #185875 5%, #2c3446 100%);
	background:-ms-linear-gradient(top, #185875 5%, #2c3446 100%);
	background:linear-gradient(to bottom, #185875 5%, #2c3446 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#185875', endColorstr='#2c3446',GradientType=0);
	background-color:#185875;
}
.btn_rtr:active {
	position:relative;
	top:1px;
}


</style>
        <title>Accueil</title>
        <!-- Les includes communs -->
        <?php include $MyHomePath.'assets/inc/head.php'; ?>
        <!-- Les includes de groupes pour la page -->
        <script src="./assets/js/connexion.js"></script>
        <?php include $MyHomePath.'assets/inc/include_allModule.php'; ?>
    </head>
	<body>
<h2>Details consommation module</a></h2>
		<?php 

			$id_container = $_POST['id_container'];
			$type_module = $_POST['type_module'];
      $id_vue = $_POST['id_vue'];
      //$type_module="module_gaz";
		//$id_vue=1;
		//$id_container=1;
		//	$type_module = "module_habitation";
			$res = Affiche_Details_Module($type_module, $id_vue, $id_container);


echo "<table class='container'>"; ?>
	
	<tbody>
        <?php
    $entete = 1;
    foreach ($res as $idLine => $line) {
        echo "<tr>".$line->AfficherModule($entete)."</tr>";
        $entete = 0;
    }
    echo "</table>"; ?>
    </tbody>
    <?php
echo "</table>"
?>
<center>
<form action="EcranVue.php" method="POST">
			<input id="id_container" name="id_container" type="hidden" value='<?php echo $id_container ?>'>
      <input id="id_vue" name="id_vue" type="hidden" value='<?php echo $id_vue ?>'></br>
      
			<input class="btn_rtr" type="submit" value="Retour">
        </form>
        
</center>

<form action="Modification.php" method="POST">
			<?php 
/*			$type_module = CreateObject($type_module);
			$temp= new $type_module;*/
			$formulaire= $line->AfficherFormModification();
			echo $formulaire; ?>

      <input id="id_vue" name="id_vue" type="hidden" value='<?php echo $id_vue ?>'>
			<input type="hidden" id="id_container" name="id_container" value='<?php echo $id_container ?>'>
			<input class="btn_rtr" type="submit" value="valider">
		</form>
    </body>