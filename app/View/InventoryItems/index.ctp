<h1>Inventory Items</h1>
<?php 
echo $this->Form->create(array('default' => false)); ?> <!--array('action' => 'deleteSelected')-->
<div class='display: inline-block;'>
<?php
echo $this->Html->link('Add Inventory Item', 
	array('controller' => 'inventoryItems',
		'action' => 'add'
	), 
	array(
		'class' => 'btn btn-primary'
	));
	
echo $this->Js->submit('Delete', array(
	'url' => array('controller' => 'inventoryItems', 'action' => 'deleteSelected'),
	'update' => '#inventoryItemTable',
	'div' => false,
	'class' => 'btn btn-danger',
	'confirm' => "Are you sure?"
)); ?>
</div>
<table class="table" id="inventoryItemTable">
    <tr>
        <th></th>
        <th>Name</th>
		<th>Barcode</th>
		<th>Description</th>
		<th>Size</th>
		<th>Unit Cost</th>
        <th>Created</th>
    </tr>
	<?php foreach ($inventoryItems as $inventory_item): ?>
	<? //debug($inventory_item); 
	if(!$inventory_item['InventoryItem']['active']) {
		echo '<tr class="danger">';
	} else {
		echo '<tr>';
	} ?>
		<td>
		<?php 
			echo $this->Form->checkbox('InventoryItems.'.$inventory_item['InventoryItem']['id'], array(
				'value' => $inventory_item['InventoryItem']['id'],
				'hiddenField' => false
			));
			?>
		</td>
		<td><?php echo $this->Html->link($inventory_item['InventoryItem']['name'],
				array('controller' => 'inventoryItems',
					'action' => 'view', $inventory_item['InventoryItem']['id']
				)
			); ?>
		</td>
		<td><?php echo $inventory_item['InventoryItem']['barcode']; ?></td>
		<td><?php echo $inventory_item['InventoryItem']['description']; ?></td>
		<td nowrap>
		<?php 
		$size = $inventory_item['InventoryItem']['size'];
		if($size){
			echo $size.' '.$inventory_item['Unit']['name']; 
		}
		unset($size);
		?>
		</td>
		<td><?php echo '$'.number_format($inventory_item['InventoryItem']['unit_cost'], 2); ?></td>
		<td><?php echo $inventory_item['InventoryItem']['created']; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($inventory_item); ?>
	<?php unset($checkbox_id); ?>
</table>
<?php echo $this->Form->end(); ?>