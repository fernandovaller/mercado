
<div class="row">
	<div class="col-sm-6">
		<h1>Produtos</h1>		
	</div>
	<div class="col-sm-6 text-right">
		<?= anchor('produtos/formulario', 'Novo Produto', array("class"=>"btn btn-info")); ?>
	</div>
</div>

<hr>

<table class="table table-bordered table-hover">
	<thead>
		<tr class="active">
			<th>Codigo</th>
			<th>Produto</th>
			<th>Descrição</th>
			<th>Valor</th>		
		</tr>		
	</thead>
	<tbody>
		<?php 
		$total_venda = 0;
		foreach ($produtos as $row) {
			$total_venda += $row['preco'];
		?>
		<tr>
			<td><?=$row['id']?></td>
			<td><?=anchor("produtos/{$row['id']}", $row['nome']); ?></td>
			<td><?=character_limiter($row['descricao'], 20)?></td>
			<td class="moeda"><?=moeda($row['preco'])?></td>
		</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr class="active b">
			<td colspan="3"></td>
			<td class="moeda">R$ <?=moeda($total_venda)?></td>
		</tr>
	</tfoot>
</table>
<hr>
