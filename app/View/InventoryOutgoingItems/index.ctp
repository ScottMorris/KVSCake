<h1>Outgoing Stock</h1>
<?php 
echo $this->Form->create(array('action' => 'deleteSelected')); ?>
<div class='display: inline-block;'>
<?php
echo $this->Html->link('Depart Items', 
	array('controller' => 'inventoryOutgoingItems',
		'action' => 'add'
	), 
	array(
		'class' => 'btn btn-success'
	));
	
echo $this->Js->submit('Delete', array(
	'url' => array('controller' => 'inventoryItems', 'action' => 'deleteSelected'),
	'update' => '#inventoryItemTable',
	'div' => false,
	'class' => 'btn btn-danger'
)); ?>
</div>
<table class="table" id="inventoryItemTable">
    <tr>
        <th></th>
        <th>Name</th>
		<th>Warehouse</th>
		<th>Status</th>
		<th>Client</th>
		<th>Note</th>
        <th>Created</th>
    </tr>
	<?php //debug($inventoryOutgoingItems);?>
	<?php foreach ($inventoryOutgoingItems as $inventoryOutgoingItem): ?>
	<? //debug($inventoryOutgoingItem); 
	if(!$inventoryOutgoingItem['InventoryItem']['active']) {
		echo '<tr class="danger">';
	} else {
		echo '<tr>';
	} ?>
		<td>
		<?php 
			echo $this->Form->checkbox('InventoryItems.'.$inventoryOutgoingItem['InventoryItem']['id'], array(
				'value' => $inventoryOutgoingItem['InventoryItem']['id'],
				'hiddenField' => false
			));
			?>
		</td>
		<td><?php echo $this->Html->link($inventoryOutgoingItem['InventoryItem']['name'],
				array('controller' => 'inventoryItems',
					'action' => 'view', $inventoryOutgoingItem['InventoryItem']['id']
				)
			); ?>
		</td>
		<td><?php echo $inventoryOutgoingItem['Warehouse']['name']; ?></td>
		<td><?php echo $inventoryOutgoingItem['InventoryStatus']['name']; ?></td>
		<td><?php echo $inventoryOutgoingItem['Client']['first_name'].' '.$inventoryOutgoingItem['Client']['last_name']; ?></td>
		<td>
		<?php 
		echo $inventoryOutgoingItem['Note']['text'];
		?>
		</td>
		<td><?php echo $inventoryOutgoingItem['InventoryOutgoingItem']['created']; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($inventoryOutgoingItem); ?>
	<?php unset($checkbox_id); ?>
</table>
<?php echo $this->Form->end(); ?>