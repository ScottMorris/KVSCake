<?php
class WarehousesController extends AppController {
	// public $helpers =  array(
		// 'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		// 'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		// 'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	// );//array('Html', 'Form');
	public $components = array('Session');
	
	public function index() {
		$this->set('warehouses', $this->Warehouse->find('all'));
	}
	public function add(){
		//Check Request to see if it is a Post
		if($this->request->is('post')){
			$this->Warehouse->create(); //Make a new Warehouse object
			//debug($this->request->data);
			if($this->Warehouse->save($this->request->data)){ //Try and save Warehouse
				$this->Session->setFlash(__('Warehouse '.$this->request->data['Warehouse']['name'].' created'));
				return $this->redirect(array('action' => 'index')); //Redirect back to Warehouse list
			}
			$this->Session->setFlash(__('Unable to add Warehouse :('));
		}
		$this->set('warehouseTypes', $this->Warehouse->WarehouseType->find('list'));
	}
	
	
	public function delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		
		$warehouse = $this->Warehouse->findById($id);
		debug($warehouse);
		$delReturnVal = $this->Warehouse->delete($id);
		if($delReturnVal){
			$this->Session->setFlash(__('The warehouse, %s, has been deleted!', h($warehouse['Warehouse']['name'])));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
?>