<?php
class InventoryOutgoingItemsController extends AppController {
	public $components = array('Session');
	public $uses = array('InventoryOutgoingItem', 'InventoryItem', 'InventoryStatus', 'Warehouse', 'Client', 'Inventory', 'Note');
	
	public function index() {
		$this->set('inventoryOutgoingItems', $this->InventoryOutgoingItem->find('all'));
	}
	
	public function add() {
		
		if ($this->request->is('post')) {
			debug($this->request->data);
			//Loop [InventoryOutgoingItemNew][index][data]
			foreach($this->request->data['InventoryOutgoingItemNew'] as $key => $value) {
				debug($value);
			
				//Create Note first
				if(!empty($value['note'])){
					$note = $this->Note->create();
					$note['text'] = $value['note'];
					$noteSave = $this->Note->save($note);
					if($noteSave) {
						$noteId = $noteSave['Note']['id'];
					}
				}
				debug($noteSave);
				//Make new InventoryOutgoingItem
				$inventoryOutgoingItem = $this->InventoryOutgoingItem->create();
				$InventoryOutgoingItem['inventory_item_id'] = $value['inventory_item'];
				$InventoryOutgoingItem['warehouse_id'] = $value['warehouse'];
				$InventoryOutgoingItem['inventory_status_id'] = $value['inventory_status'];
				$InventoryOutgoingItem['client_id'] = $value['client'];
				if(isset($noteId)) {
					$InventoryOutgoingItem['note_id'] = $noteId;
				}
				if($this->InventoryOutgoingItem->save($InventoryOutgoingItem)){
				
				}
				//Update Stock accordingly
				$inventoryToUpdate = $this->Inventory->findByInventoryItemIdAndWarehouseId($value['inventory_item'], $value['warehouse']);
				debug($inventoryToUpdate);
				$inventoryQuantity = $inventoryToUpdate['quantity'];
				if($inventoryQuantity - 1 <= 0) {
					$inventoryQuantity = 0;
				} else {
					$inventoryQuantity -= 1;
				}
				$inventoryToUpdate['quantity'] = $inventoryQuantity;
				if($this->Inventory->save($inventoryToUpdate)) {
					return $this->redirect(array('action' => 'index'));
				}
			}
		}
		
		$this->set('inventoryStatuses', $this->InventoryStatus->find('list'));
		$this->set('warehouses', $this->Warehouse->find('list'));
		$this->set('clients', $this->Client->find('list'));
		// $this->Inventory->virtualFields['inventory_item_name'] = 'InventoryItem.name';
		$this->set('inventoryItems', $this->Inventory->find('itemName',array(
			'fields' => array('Inventory.id', 'InventoryItem.name')
		)));
		// debug($this->Inventory->find('all', array(
			// 'fields' => array('Inventory.id', 'inventory_item_name')
		// )));
		// debug($this->Inventory->find('itemName',array(
			// 'fields' => array('Inventory.id', 'InventoryItem.name')
		// )));
	}
	
// array(
	// 'InventoryOutgoingItemNew' => array(
		// (int) 1 => array(
			// 'barcode' => '456789',
			// 'inventory_item' => '7',
			// 'warehouse' => '13',
			// 'inventory_status' => '1',
			// 'client' => '1',
			// 'note' => ''
		// ),
		// (int) 2 => array(
			// 'barcode' => '1234555',
			// 'inventory_item' => '8',
			// 'warehouse' => '20',
			// 'inventory_status' => '1',
			// 'client' => '1',
			// 'note' => ''
		// )
	// )
// )
	
	public function ajaxGetInventoryItem(){
		if($this->request->is('post')){
			
			
			
			
			if(isset($this->request->data['barcode'])) {
				$barcode = $this->request->data['barcode'];
				$item = $this->InventoryItem->findByBarcode($barcode);
				//debug($this->request);
				$inventories = $this->Inventory->findAllByInventoryItemId($item['InventoryItem']['id']);
			}else if(isset($this->request->data['inventory_item'])) {
				$itemId =  $this->request->data['inventory_item'];
				$inventories = $this->Inventory->findAllById($itemId);
			}
			$this->set('inventories', $inventories);
			//echo $this->Js->object($inventories);
			//$this->autoRender = false;
			$this->layout = '';
		}
	}
	
	
}
?>