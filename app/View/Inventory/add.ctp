<h1>Add to Inventory</h1>
<?php
echo $this->Form->create('Inventory');
echo $this->Form->input('inventory_item_id');
echo $this->Form->input('warehouse_id');
echo $this->Form->input('quantity');
echo $this->Form->end('Add to Inventory');
?>