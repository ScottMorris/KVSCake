<?php
class InventoryReportsController extends AppController {
	public $components = array('Session');
	public $uses = array('Inventory');
	
	public function index() {
		//Total Items in Stock
		///count intentory
		//Total Items in Each Warehouse
		///Count inventory with warehouse numbers
		/// group by
		//Total Value of Stock
		//Total Value in Each Warehouse
		
		$stockTotal = $this->Inventory->find('count');
		$this->Inventory->virtualFields = array(
			'total_monetary' => 'SUM()'
		);
		
		
		$itemTotals = array(
			'stockTotal' => $stockTotal//,
			// 'stockTotalValue' => $this->Inventory->find('all', array(
				// 'conditions' => array(
					// 'Inventory.'
					// )
				// )
			// )
		);
		$this->set('itemTotals', $itemTotals);
		
		debug($itemTotals);
	}
	
}
?>