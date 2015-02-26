<h1>Move Items</h1>
<!--List of Items-->
<?php echo $this->Form->create(null, array('url' => array('controller' => 'inventory','action' => 'moveSelected'))); ?>
<table class="table">
	<thead>
		<tr>
			<th>Inventory Item</th>
			<th>Current Warehouse</th>
			<th>New Warehouse</th>
			<th>Current Quantity</th>
			<th>Quantity</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($movingItems as $movingItem): ?>
		<tr>
			<td>
				<?php echo $movingItem['InventoryItem']['name'];
				echo $this->Form->hidden('Inventory.'.$movingItem['InventoryItem']['id'].'.id', array( 
					'value' => $movingItem['Inventory']['id']
				)); ?>
			</td>
			<td>
				<?php echo $movingItem['Warehouse']['name']; ?>
			</td>
			<td>
				<?php echo $this->Form->input('Inventory.'.$movingItem['InventoryItem']['id'].'.warehouse_id', array(
					'label' => false//,
					//'id' => 'InventoryWarehouseId'.$movingItem['InventoryItem']['id'],
					//'name' =>
				)); ?>
			</td>
			<td>
				<?php echo $movingItem['Inventory']['quantity']; ?>
			</td>
			<td>
				<?php echo $this->Form->input('Inventory.'.$movingItem['InventoryItem']['id'].'.quantity', array(
					'label' => false
				)); ?>
			</td>
		</tr>
	<?php endforeach;
		unset($movingItem);
//debug($movingItems);
//debug($warehouses);		?>
	</tbody>
</table>
<!--Which Warehouse to Move Them to (bulk move?)-->
<!--Save-->
<?php echo $this->Form->end(array('label' => 'Move','class' => 'btn btn-success')); ?>