
<div class="row">
	<div class="col-sm-6">
		<h1>Usuários</h1>		
	</div>
	<div class="col-sm-6 text-right">
		<?= anchor('usuarios/formulario', 'Novo Usuário', array("class"=>"btn btn-info")); ?>
	</div>
</div>
<hr>

<table class="table table-bordered table-hover">
	<thead>
		<tr class="active">
			<th>ID</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Senha</th>
		</tr>	
	</thead>
	<tbody>
		<?php foreach ($usuarios as $row) {?>
			<tr>
				<td><?=$row['id']?></td>
				<td><?=$row['nome']?></td>
				<td><?=$row['email']?></td>
				<td><?=$row['senha']?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>	
