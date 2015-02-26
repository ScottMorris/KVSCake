<h1>Warehouses</h1>
<?php echo $this->Html->link('Add Warehouse', 
	array('controller' => 'warehouses',
		'action' => 'add'
	), 
	array(
		'class' => 'btn btn-primary'
	)); ?>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
		<th>Location</th>
		<th>Type</th>
		<th>Actions</th>
        <th>Created</th>
    </tr>
	<?php foreach ($warehouses as $warehouse): ?>
	<? //debug($warehouse); ?>
	<tr>
		<td><?php echo $warehouse['Warehouse']['id']; ?></td>
		<td><?php echo $this->Html->link($warehouse['Warehouse']['name'],
				array('controller' => 'warehouses',
					'action' => 'view', $warehouse['Warehouse']['id']
				)
			); ?>
		</td>
		<td><?php echo $warehouse['Warehouse']['location']; ?></td>
		<td><?php echo $warehouse['WarehouseType']['name']; ?></td>
		<td><?php echo $this->Form->postLink('Delete', 
			array('action' => 'delete', $warehouse['Warehouse']['id']),
			array('confirm' => 'Are you sure you want to delete '.$warehouse['Warehouse']['name'].'?')
			); ?>
		</td>
		<td><?php echo $warehouse['Warehouse']['created']; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($warehouse); ?>
</table>
</div>