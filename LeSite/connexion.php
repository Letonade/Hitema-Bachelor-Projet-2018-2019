<?php include './assets/inc/application_include.php'?>
<html>        
    <head>
        <title>Accueil</title>
        <!-- Les includes communs -->
        <?php include './assets/inc/head.php'; ?>
    </head>
	<body>
		<section class="login-block">
			<div class="container">
				<div class="row">
					<div class="col-md-8 login-sec">
						<h2 class="text-center">Capsa Container</h2>
						<form class="login-form">
							<div class="form-group">
								<label for="exampleInputEmail1" class="text-uppercase">SESSION</label>
								<input type="text" class="form-control" placeholder="">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1" class="text-uppercase">Password</label>
								<input type="password" class="form-control" placeholder="">
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input">
									<small>Remember Me</small>
								</label>
								<button type="submit" class="btn btn-login float-right">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>