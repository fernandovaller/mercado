<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mercado - Curso CodeIgniter</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url('css/bootstrap.css')?>">
	<link rel="stylesheet" href="<?=base_url('css/bootstrap-flatly.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('css/style.css')?>">				

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="container">		
		<div class="wrapper">
			
			<form action="login/autenticar" method="post" name="Login_Form" class="form-signin">       
				<h3 class="form-signin-heading">Loja Mercado - Faça login</h3>
				<hr class="colorgraph"><br>

				<?php if($this->session->flashdata('success')){ ?>
					<p class="alert alert-success"><?= $this->session->flashdata('success') ?></p>
				<?php } ?>

				<?php if($this->session->flashdata('danger')){ ?>
					<p class="alert alert-danger"><?= $this->session->flashdata('danger') ?></p>
				<?php } ?>

				<input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
				<input type="password" class="form-control" name="senha" placeholder="Senha" required=""/>     		  

				<button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>  							
			</form>		

		</div>
		<p class="small text-center text-muted">Sistema desenvolvido usando CodeIgniter</p>	
	</div>	


	<script src="//code.jquery.com/jquery.js"></script>	
	<script src="<?=base_url('js/bootstrap.min.js')?>"></script>
</body>
</html>		