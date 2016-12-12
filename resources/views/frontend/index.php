<!DOCTYPE html>
<html  ng-app="frontPl">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Prolearning</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="./frontend/bower_components/bootstrap/dist/css/bootstrap.css">
		<!-- Font awesome -->
		<link rel="stylesheet" href="./frontend/bower_components/font-awesome/css/font-awesome.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		

	</head>
	<body>

		<div  class="container">
			<div class="row">
				<div class="col-md-3 col-md-offset-9">
					<div class="">
						<p class="text-right">
						<i class="fa fa-facebook-official fa-2x" aria-hidden="true" style="color: blue"></i>
						<i class="fa fa-instagram fa-2x" aria-hidden="true" style=""></i>
						<i class="fa fa-youtube-play fa-2x" aria-hidden="true" style="color: red"></i>
						<i class="fa fa-whatsapp fa-2x" aria-hidden="true" style="color: green"></i>
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" ui-sref="home">Prolearning</a>
						</div>
				
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								<!--
								<li><a href="#">Link</a></li>
								<li><a href="#">Link</a></li>
								-->
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a ui-sref="programas">PROGRAMAS</a></li>
								
								<li><a ui-sref="destinos">DESTINOS</a></li>
								<!--
								<li class="dropdown">
									<a ui-sref="destinos" class="dropdown-toggle" data-toggle="dropdown"><DATA>DESTINOS</DATA> <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li><a href="#">Separated link</a></li>
									</ul>
								</li> -->

								<li class=""><a ui-sref="promociones">PROMOCIONES</a></li>
								<li class=""><a ui-sref="presupuesto">PRESUPUESTO</a></li>
								<li class=""><a ui-sref="contactanos">CONTÁCTANOS</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div>
				</nav>
			</div>

			<!--content and nested views-->
			<div ui-view="content"></div>

			
			<div ui-view="footer"></div>

		</div>

		<!-- Angular -->
		<script src="./frontend/bower_components/angular/angular.js"></script>
		<!-- jQuery -->
		<script src="./frontend/bower_components/jquery/dist/jquery.js"></script>
		<!--ng-animate-->
		<script src="./frontend/bower_components/angular-animate/angular-animate.js"></script>
		<!--ui-router-->
		<script src="./frontend/bower_components/angular-ui-router/release/angular-ui-router.js"></script>
		<script src="./frontend/js/app.js"></script>
			<!--controllers-->
			<script src="./frontend/js/controllers/HomeController.js"></script>
			<script src="./frontend/js/controllers/DestinoController.js"></script>
			<!--services-->
			<script src="./frontend/js/services/destinoService.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="./frontend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	</body>
</html>