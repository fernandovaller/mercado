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
					<a class="navbar-brand" href="/">Mercado</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">						
						<li><a href="<?=base_url('produtos')?>">Produtos</a></li>
						<li><a href="<?=base_url('vendas')?>">Vendas</a></li>
						<li><a href="<?=base_url('usuarios')?>">Usuários</a></li>
					</ul>
	
					<ul class="nav navbar-nav navbar-right">						
						<li class="dropdown">
							<?php $usuario_logado = $this->session->userdata("usuario_logado"); ?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$usuario_logado['email']?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?= anchor('login/logout', 'Sair')?><li>								
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>