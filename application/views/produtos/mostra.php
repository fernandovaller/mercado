
<div class="row">
	<div class="col-sm-6">
		<h1>Detalhes do Produtos</h1>		
	</div>
	<div class="col-sm-6 text-right">
		<?= anchor('produtos', 'Voltar', array("class"=>"btn btn-default")); ?>
	</div>
</div>

<hr>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td class="">ID</td>
			<td><?=$produto['id']?></td>
		</tr>		
		<tr>
			<td class="">Produto</td>
			<td><?=$produto['nome']?></td>
		</tr>
		<tr>
			<td class="">Preço</td>
			<td><?=$produto['preco']?></td>
		</tr>
		<tr>
			<td class="">Descrição</td>
			<td><?=auto_typography(html_escape($produto['descricao']))?></td>
		</tr>
	</tbody>
</table>

<h2>Comprar</h2>
<hr>
<?php

echo form_open('vendas/nova');
echo form_hidden('produto_id',  $produto['id']);
echo form_label('Data de Entrega', 'data_de_entrega');
echo form_input(array(
	'name'=>'data_de_entrega',
	'class' => 'form-control',
	'id'=>'data_de_entrega',
	'value' => ''
));
echo form_input(array(
	'type' => 'submit',
	'class'=> 'btn btn-primary',
	'value' => 'comprar'
));
echo form_close();

?>

