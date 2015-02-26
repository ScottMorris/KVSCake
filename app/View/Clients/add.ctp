<h1>Add Client</h1>
<?php
echo $this->Form->create('Client');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email');
echo $this->Form->end('Create Client');
?>