<h1>Add Warehouse</h1>
<?php
echo $this->Form->create('Warehouse');
echo $this->Form->input('name');
echo $this->Form->input('location');
echo $this->Form->input('warehouse_type_id');
echo $this->Form->end('Create Warehouse');
?>