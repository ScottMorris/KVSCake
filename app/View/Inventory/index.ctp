<h1>Stock</h1>
<?php echo $this->Form->create(null, array('url' => array('controller' => 'inventory','action' => 'formSubmitted'))); ?>
<div class='display: inline-block;'>
<?php
echo $this->Html->link('Add to Stock', 
	array('controller' => 'inventory',
		'action' => 'add'
	), 
	array(
		'class' => 'btn btn-success'
	));
	
echo $this->Form->submit('Move Stock', array(
	//'url' => array('controller' => 'inventory', 'action' => 'moveSelected'),
	//'update' => 'html',
	'name' => 'submitMove',
	'div' => false,
	'class' => 'btn btn-primary'//,
	//'confirm' => "Are you sure?"
));

echo $this->Form->submit('Delete', array(
	//'url' => array('controller' => 'inventory', 'action' => 'moveSelected'),
	//'update' => 'html',
	'name' => 'submitDelete',
	'div' => false,
	'class' => 'btn btn-danger'//,
	//'confirm' => "Are you sure?"
)); ?>
</div>
<table id="inventoryTable" class="table">
	<thead>
		<tr>
			<th></th>
			<th>Inventory Item</th>
			<th>Warehouse</th>
			<th>Quantity</th>
			<th>Created</th>
			<th>Modified</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($inventory as $inventory_row): ?>
		<? //debug($inventory_row); 
		if(!$inventory_row['InventoryItem']['active']){
			echo '<tr class="warning">';
		} else {
			echo '<tr>';
		}
		?>
			<td><?php 
				echo $this->Form->checkbox('Inventory.'.$inventory_row['Inventory']['id'], array(
					'value' => $inventory_row['Inventory']['id'],
					'hiddenField' => false
				));
				?></td>
			<td><?php echo $this->Html->link($inventory_row['InventoryItem']['name'],
					array('controller' => 'inventory',
						'action' => 'view', $inventory_row['Inventory']['id']
					)
				); ?>
			</td>
			<td><?php echo $inventory_row['Warehouse']['name']; ?></td>
			<td><?php echo $inventory_row['Inventory']['quantity']; ?></td>
		
			<td width="15%"><?php echo $inventory_row['InventoryItem']['created']; ?></td>
			<td width="15%"><?php echo $inventory_row['InventoryItem']['modified']; ?></td>
		</tr>
		<?php endforeach; ?>
		<?php unset($inventory_row); ?>
	</tbody>
</table>
<?php echo $this->Form->end(); ?>