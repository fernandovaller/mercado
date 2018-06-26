

			<h1>Cadastro de Produtos</h1>
			<?= anchor('/', 'Voltar', array("class"=>"btn btn-default pull-right")); ?>	
			<hr>

<?= validation_errors('<p class="alert alert-danger">', '</p>')?>

<?php
echo form_open('produtos/novo');
echo form_label('Nome', 'nome');
echo form_input(array(
	'name'=> 'nome',
	'id' => 'nome',
	'class' => 'form-control',
	'maxlength' => '255',
	'value' => set_value("nome", '')
));

echo form_label('Preço', 'preco');
echo form_input(array(
	'name'=> 'preco',
	'id' => 'preco',
	'class' => 'form-control',
	'maxlength' => '255',
	'type' => 'number',
	'value' => set_value("preco", '')
));

echo form_label('Descrição', 'descricao');
echo form_textarea(array(
	'name'=> 'descricao',
	'id' => 'descricao',
	'class' => 'form-control',	
	'value' => set_value("descricao", '')
));

echo form_button(array(
	'class' => 'btn btn-primary',
	'content' => 'Cadastrar',
	'type' => 'submit'
));
echo form_close();
?>


