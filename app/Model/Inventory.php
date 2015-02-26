<?php
class Inventory extends AppModel{
	public $belongsTo = array(
		'InventoryItem',
		'Warehouse'
	);
	
	// public $virtualFields = array(
		// 'name' => 'CONCAT(InventoryItem.name)'
	// );
	
	// public $displayField = 'name';
	
	public $findMethods = array('itemName' =>  true);
	
	 protected function _findItemName($state, $query, $results = array()) {
        if ($state === 'before') {
            return $query;
        }
		if ($state === 'after') {
			$newResults = array();
			foreach($results as $result) {
				$newResults[$result['Inventory']['id']] = $result['InventoryItem']['name'];
			}
			
			return $newResults;
		}
    }
}
?>