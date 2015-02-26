<?php
class ClientsController extends AppController {
	public $components = array('Session');

	public function index() {
		$this->set('clients', $this->Client->find('all'));
	}
	
	public function view($id = null) {
		if(!$id) {
			throw new NotFoundException(__('Invalid Post'));
		}
		
		$client = $this->Client->findById($id);
		if (!$client) {
			throw new NotFoundException(__('Invalid Post'));
		}
		
		$this->set('client', $client);
	}
	
	public function add(){
		//Check Request to see if it is a Post
		if($this->request->is('post')){
			$this->Client->create(); //Make a new Client object
			if($this->Client->save($this->request->data)){ //Try and save Client
				$this->Session->setFlash(__('Client '.$this->request->data['Client']['first_name'].' created'));
				return $this->redirect(array('action' => 'index')); //Redirect back to client list
			}
			$this->Session->setFlash(__('Unable to add client :('));
		}
	}
}

?>