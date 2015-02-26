<?php
class Client extends AppModel{
	public $virtualFields = array(
		'name' => 'CONCAT(first_name, " ", last_name)'
	);
			
	public $displayField = 'name';
}
?>