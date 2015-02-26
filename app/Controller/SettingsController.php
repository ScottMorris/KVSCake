<?php
class SettingsController extends AppController {
	// public $helpers =  array(
		// 'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		// 'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		// 'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	// );//array('Html', 'Form');
	public $components = array('Session');
	public $uses = array('InventoryStatus', 'Unit');
	
	//'InventoryOutgoingItem', 'InventoryItem', , 'Warehouse', 'Client', 'Inventory', 'Note'
	
	public function index() {
		if($this->request->is('post')){
			if(!empty($this->request->data['InventoryStatus'])){
				$this->InventoryStatus->create();
				if($this->InventoryStatus->save($this->request->data)){
					$this->Session->setFlash(__('Inventory Status '.$this->request->data['InventoryStatus']['name'].' created'),'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'
					));
				} else {
					$this->Session->setFlash(__('Unable to add Inventory Status'));
				}
			}
			if(!empty($this->request->data['Unit'])){
				$this->Unit->create();
				if($this->Unit->save($this->request->data)){
					$this->Session->setFlash(__('Unit '.$this->request->data['Unit']['name'].' created'),'alert', array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'
					));
				} else {
					$this->Session->setFlash(__('Unable to add Unit'));
				}
			}
		}
		$this->set('inventoryStatuses', $this->InventoryStatus->find('list'));
		$this->set('units', $this->Unit->find('all'));
	}
}
?>