<h1>Add Inventory Item</h1>
<?php
echo $this->Form->create('InventoryItem');
echo $this->Form->input('name');
echo $this->Form->input('barcode');
echo $this->Form->input('description');
echo $this->Form->input('size');
// , array(
//	'beforeInput' => '<div class="input-group">',
//	'afterInput' => $this->Form->input('unit_id', array(
//		'beforeInput' => '<div class="input-group-addon">')
//)));
echo $this->Form->input('unit_id');
echo $this->Form->input('unit_cost');
echo $this->Form->end('Add Inventory Item');
?>