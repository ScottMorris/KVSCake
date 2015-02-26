<?php
class InventoryItem extends AppModel{
	public $belongsTo = 'Unit';
	// public $belongsTo = array(
		// 'WarehouseType' => array (
			// 'className' => 'WarehouseType',
			// 'foreignKey' => 'warehouse_type_id'
		// )
	// );
}
?>