<?php
class Warehouse extends AppModel{
	public $belongsTo = 'WarehouseType';
	// public $belongsTo = array(
		// 'WarehouseType' => array (
			// 'className' => 'WarehouseType',
			// 'foreignKey' => 'warehouse_type_id'
		// )
	// );
}
?>