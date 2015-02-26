<?php
class InventoryItemsController extends AppController {
	public $components = array('Session');
	
	public function index() {
		$this->set('inventoryItems', $this->InventoryItem->find('all'));
	}
	
	public function view($id = null) {
		if(!$id) {
			throw new NotFoundException(__('Invalid Inventory Item'));
		}
		
		$item = $this->InventoryItem->findById($id);
		if (!$item) {
			throw new NotFoundException(__('Invalid Inventory Item'));
		}
		
		$this->set('inventoryItem', $item);
	}
	
	public function add(){
		//Check Request to see if it is a Post
		if($this->request->is('post')){
			$this->InventoryItem->create(); //Make a new InventoryItem object
			//debug($this->request->data);
			if($this->InventoryItem->save($this->request->data)){ //Try and save InventoryItem
				$this->Session->setFlash(__('InventoryItem '.$this->request->data['InventoryItem']['name'].' created'),'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-success'
				));
				return $this->redirect(array('action' => 'index')); //Redirect back to InventoryItem list
			}
			$this->Session->setFlash(__('Unable to add InventoryItem :('));
		}
		//debug($this->InventoryItem);
		$this->set('units', $this->InventoryItem->Unit->find('list'));
	}
	
	public function delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		
		$inventoryItem = $this->InventoryItem->findById($id);
		debug($inventoryItem);
		$delReturnVal = $this->InventoryItem->delete($id);
		if($delReturnVal){
			$this->Session->setFlash(__('The Inventory Item, %s, has been deleted!', h($inventoryItem['InventoryItem']['name'])),'alert', array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function deleteSelected() {
		try{
			foreach($this->request->data['InventoryItems'] as $key => $value)
			{
				$this->InventoryItem->delete($key);
			}
		} catch(Exception $e) {
			$this->InventoryItem->read(null, $key);
			$this->InventoryItem->set('active', false);
			$this->InventoryItem->save();
			// $this->Session->setFlash(__('The Inventory Item, %s, has been deleted!', h($inventoryItem['InventoryItem']['name'])),'alert', array(
					// 'plugin' => 'BoostCake',
					// 'class' => 'alert-danger'
				// ));
		}
		$this->redirect($this->referer());
	}
}
?>