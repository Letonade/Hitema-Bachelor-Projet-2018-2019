<?php include './assets/inc/application_include.php'; ?>
<html>        
    <head>
        <title>Accueil</title>
        <!-- Les includes communs -->
        <?php include $MyHomePath.'assets/inc/head.php'; ?>
        <!-- Les includes de groupes pour la page -->
        <?php include $MyHomePath.'assets/inc/include_connexion.php'; ?>
        <?php include $MyHomePath.'assets/inc/include_vue.php'; ?>
    </head>
	<body>
		<section class="login-block">
			<div class="container">
				<div class="row">
					<div class="col-md-8 login-sec">
						<h2 class="text-center">Capsa Container</h2>
						<form id="formulaire" class="login-form" action="./EcranVue.php" method="post">
							<div class="form-group">
								<label for="sessionId" >Session</label>
								<input name="sessionId" id="sessionId" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="password" >Password</label>
								<input name="password" id="password" type="password" class="form-control">
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input">
									<small>Remember Me</small>
								</label>
								<button type="button" class="btn btn-login float-right" onclick="fct_verifier_connexion('verification')">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>