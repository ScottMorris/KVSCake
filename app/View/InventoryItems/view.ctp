<h1><?php echo ($inventoryItem['InventoryItem']['name']); ?></h1>
<?php //debug($inventoryItem); ?>
<table class="table">
	<tr>
		<td><strong>Barcode</strong></td>
		<td><?php echo $inventoryItem['InventoryItem']['barcode'] ?></td>
	</tr>
	<tr>
		<td><strong>Description</strong></td>
		<td><?php echo $inventoryItem['InventoryItem']['description'] ?></td>
	</tr>
	<tr>
		<td><strong>Size</strong></td>
		<td><?php echo $inventoryItem['InventoryItem']['size'].' '.$inventoryItem['Unit']['name'] ?></td>
	</tr>
	<tr>
		<td><strong>Cost</strong></td>
		<td><?php echo '$'.number_format($inventoryItem['InventoryItem']['unit_cost'], 2); ?></td>
	</tr>
	<tr>
		<td><strong>Active</strong></td>
		<td><?php $boolarray = Array(false => 'Inactive', true => 'Active');
			echo $boolarray[$inventoryItem['InventoryItem']['active']] ?></td>
	</tr>
	<tr>
		<td><strong>Created</strong></td>
		<td><?php echo $inventoryItem['InventoryItem']['created']; ?></td>
	</tr>
</table>