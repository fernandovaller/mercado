
<div class="row">
	<div class="col-sm-6">
		<h1>Minhas Vendas</h1>		
	</div>
	<div class="col-sm-6 text-right">
		
	</div>
</div>
<hr>
<table class="table table-bordered table-hover">
	<thead>
		<tr class="active">
			<th>Codigo</th>
			<th>Produto</th>
			<th>Data de entrega</th>			
			<th class="moeda">Valor</th>		
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
			<td><?=$row['nome']?></td>			
			<td class=""><?=data_br($row['data_de_entrega'])?></td>
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

