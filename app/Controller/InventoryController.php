<?php
class InventoryController extends AppController {
	public $components = array('Session');
	
	public function index() {
		$this->set('inventory', $this->Inventory->find('all'));
	}
	
	public function add(){
		//Check Request to see if it is a Post
		if($this->request->is('post')){
			$this->Inventory->create(); //Make a new Inventory object
			//debug($this->request->data);
			if($this->Inventory->save($this->request->data)){ //Try and save Inventory
				$this->Session->setFlash(__('Inventory '.$this->request->data['Inventory']['name'].' created'),'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
				return $this->redirect(array('action' => 'index')); //Redirect back to Inventory list
			}
			$this->Session->setFlash(__('Unable to add Inventory :('),'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-error'
				));
		}
		//debug($this->Inventory);
		$this->set('inventoryItems', $this->Inventory->InventoryItem->find('list'));
		$this->set('warehouses', $this->Inventory->Warehouse->find('list'));
	}
	
	private function delete($request){
		if($request->is('get')){
			throw new MethodNotAllowedException();
		}
		
		$inventoryRow = $this->Inventory->findById($id);
		debug($inventoryRow);
		$delReturnVal = $this->Inventory->deleteAll(array('conditions' => 
            array('Inventory.id' => $request)));//delete($id);
		if($delReturnVal){
			$this->Session->setFlash(__('The Inventory Item, %s, has been deleted from %s!', h($inventoryRow['InventoryItem']['name']), $inventoryRow['Warehouse']['name']),'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
		}
		//return $this->redirect(array('action' => 'index'));
	}
	
	public function formSubmitted(){
		if(isset($this->request->data['submitMove'])){
			$itemsToDisplay = $this->Inventory->findAllById($this->request->data['Inventory']);
			$this->loadModel('Warehouse');
			$warehouses = $this->Warehouse->find('list');
			// find('list', array('conditions' => 
            // array('Inventory.id' => true)))
			
			$this->set('movingItems', $itemsToDisplay);
			$this->set('warehouses', $warehouses);
			
			return $this->render('move_selected');
		} else if(isset($this->request->data['submitDelete'])) {
			delete($this->request);
		}
		$this->Session->setFlash(__('Couldn\'t figureout where to go!'),'alert', array(
			'plugin' => 'BoostCake',
			'class' => 'alert-danger'
		));
		debug($this->request->data);
		$this->redirect($this->referer());
	}
	
	public function moveSelected(){
		//$InventoryItemsToMove = new array()
		//try{
			 foreach($this->request->data['Inventory'] as $key => $value)
			 {
				//handle updating records if they already exist
				debug($value);
				debug($value['id']);
				//look up item
				$originalItem = $this->Inventory->read(null, $value['id']);
				debug($originalItem);
				//if quantity not '', make new entry, decrement from old
				if(!empty($value['quantity'])){
					debug(true);
					$newItem = $this->Inventory->create(); //Make a new Inventory object inventory_item_id
					$newItem['Inventory']['inventory_item_id'] = $originalItem['Inventory']['inventory_item_id'];
					$newItem['Inventory']['quantity'] = $value['quantity'];
					$newItem['Inventory']['warehouse_id'] = $value['warehouse_id'];
					
					//decrement quantity from the old item
					$originalItem['Inventory']['quantity'] -= $value['quantity'];
					
					//Save Items
					//debug($this->request->data);
					if($this->Inventory->save($this->Inventory->save($newItem))){ //Try and new Inventory
						if($this->Inventory->save($originalItem)){ //Try and update old Inventory
						
						}
					}
					debug($newItem);
				} else {
					debug(false);
					//Update Warehouse
					$originalItem['Inventory']['warehouse_id'] = $value['warehouse_id'];
					debug($originalItem);
					
					//Save Inventory
					if($this->Inventory->save($originalItem)){ //Try and update old Inventory
						
					}
				}
				
				// $this->InventoryItem->delete($key);
				
				
			 }
			 unset($originalItem);
			 unset($newItem);
		// } catch(Exception $e) {
			// $this->InventoryItem->read(null, $key);
			// $this->InventoryItem->set('active', false);
			// $this->InventoryItem->save();
			//// $this->Session->setFlash(__('The Inventory Item, %s, has been deleted!', h($inventoryItem['InventoryItem']['name'])),'alert', array(
			//		// 'plugin' => 'BoostCake',
			//		// 'class' => 'alert-danger'
			//	// ));
		// }
		//debug($this->request);
		//$this->set('inventory', $requestData['InventoryItems']);
		//$this->redirect($this->referer());
		debug($this->request->data);
	}
}
?>