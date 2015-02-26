<h1>Clients</h1>
<?php echo $this->Html->link(
	'Add Client', 
	array(
		'controller' => 'clients',
		'action' => 'add'
	), 
	array(
		'class' => 'btn btn-primary'
	)); ?>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
		<th>Email Address</th>
        <th>Created</th>
    </tr>
	<?php foreach ($clients as $client): ?>
	<tr>
		<td><?php echo $client['Client']['id']; ?></td>
		<td>
			<?php echo $this->Html->link($client['Client']['first_name'].' '.$client['Client']['last_name'],
				array('controller' => 'clients', 'action' => 'view', $client['Client']['id'])); ?>
		</td>
		<td><?php echo $client['Client']['email']; ?></td>
		<td><?php echo $client['Client']['created']; ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($client); ?>
</table>