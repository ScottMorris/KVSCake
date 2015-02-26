<?php
class InventoryOutgoingItem extends AppModel{
	public $belongsTo = array(
		'InventoryItem',
		'Warehouse',
		'InventoryStatus',
		'Client',
		'Note'
	);
	// public $belongsTo = array(
		// 'WarehouseType' => array (
			// 'className' => 'WarehouseType',
			// 'foreignKey' => 'warehouse_type_id'
		// )
	// );
}
?>