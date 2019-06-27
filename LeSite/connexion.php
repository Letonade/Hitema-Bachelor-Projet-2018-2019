<?php include './assets/inc/application_include.php'; ?>
<html>        
    <head>
        <title>Accueil</title>
        <!-- Les includes communs -->
        <?php include $MyHomePath.'assets/inc/head.php'; ?>
        <!-- Les includes de groupes pour la page -->
        <script src="./assets/js/connexion.js"></script>
		<?php include $MyHomePath.'assets/inc/include_vue.php'; ?>
		<style>
		.login-block {
    background: rgb(32, 31, 31);
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to bottom, rgb(58, 57, 57), rgb(8, 8, 8));
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom, rgb(32, 32, 32), rgb(14, 13, 13));
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    float: left;
    width: 100%;
    height: 100%;
    padding: 50px 0;
}
.btn-login {
    background: rgb(12, 12, 12);
    color: #fff;
    font-weight: 600;
}
.login-sec h2 {
    margin-bottom: 30px;
    font-weight: 800;
    font-size: 30px;
    color: rgb(19, 18, 18);
}
.login-sec h2:after {
    content: " ";
    width: 100px;
    height: 5px;
    background: rgb(36, 35, 35);
    display: block;
    margin-top: 20px;
    border-radius: 3px;
    margin-left: auto;
    margin-right: auto
}
</style>
	</head>
	
	<body>
		<section class="login-block">
			<div class="container">
				<div class="row">
					<div class="col-md-8 login-sec">
						<h2 class="text-center">Capsa Container</h2>
						<form id="formulaire" class="login-form" action="" method="post" onkeyup='if (event.keyCode === 13) {document.getElementById("formulaire_validate").click();}'>
							<div class="form-group">
								<label for="sessionId" >Session</label>
								<input name="sessionId" id="sessionId" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="password" >Password</label>
								<input name="password" id="password" type="password" class="form-control">
							</div>
							<div class="form-check">
								<button id="formulaire_validate" type="button" class="btn btn-login float-right" onclick="fct_verifier_connexion('verification')">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>