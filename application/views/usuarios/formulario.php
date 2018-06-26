<div class="row">
	<div class="col-sm-6">
		<h1>Cadastro de Usuários</h1>		
	</div>
	<div class="col-sm-6 text-right">
		<?= anchor('usuarios', 'Voltar', array("class"=>"btn btn-default")); ?>
	</div>
</div>
<hr>

<?php  
echo form_open('usuarios/novo');
echo form_label('Nome', 'nome');
echo form_input(array(
	'name'=> 'nome',
	'id' => 'nome',
	'class' => 'form-control',
	'maxlength' => '255'
));

echo form_label('Email', 'email');
echo form_input(array(
	'name'=> 'email',
	'id' => 'email',
	'class' => 'form-control',
	'maxlength' => '255'
));

echo form_label('Senha', 'senha');
echo form_password(array(
	'name'=> 'senha',
	'id' => 'senha',
	'class' => 'form-control',
	'maxlength' => '255'
));

echo form_button(array(
	'class' => 'btn btn-primary',
	'content' => 'Cadastrar',
	'type' => 'submit'
));
echo form_close();
?>			
