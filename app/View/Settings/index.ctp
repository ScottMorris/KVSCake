<h1>Settings</h1>

<div class="panel panel-default">
  <div class="panel-heading">Inventory Statuses</div>

<ul class="list-group">
<?php foreach ($inventoryStatuses as $inventoryStatus): ?>

<li class="list-group-item"><?php echo $inventoryStatus; ?></li>

<?php endforeach; ?>
<?php unset($inventoryStatus); ?>
</ul>
<!-- Button trigger modal -->
<button class="btn btn-primary" data-toggle="modal" data-target="#inventoryStatusModel">
  Add Inventory Status
</button>
</div>
<h2>Units</h2>
<table class="table">
	<thead>
		<th>Suffix</th>
		<th>Name</th>
	</thead>
	<tbody>
		<?php //debug($units); ?>
		<?php foreach ($units as $unit): ?>
		<tr>
			<td><?php echo $unit['Unit']['name']?></td>
			<td><?php echo $unit['Unit']['long_name']?></td>
		</tr>
		<?php endforeach; ?>
		<?php unset($unit); ?>
	</tbody>
</table>
<!-- Button trigger modal -->
<button class="btn btn-primary" data-toggle="modal" data-target="#unitModel">
  Add Unit
</button>


<!-- Inventory Status Model-->
<div class="modal fade" id="inventoryStatusModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	<?php echo $this->Form->create("InventoryStatus"); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Inventory Status</h4>
      </div>
      <div class="modal-body">
		
        <?php echo $this->Form->input('InventoryStatus.name'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<?php echo $this->Form->submit('Save', array(
			'div' => false,
			'class' => 'btn btn-success',
		)); ?>
      </div>
	<?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>

<!-- Unit Model-->
<div class="modal fade" id="unitModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	<?php echo $this->Form->create("Unit"); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Model</h4>
      </div>
      <div class="modal-body">
		
        <?php echo $this->Form->input('Unit.name', array(
			'label' => 'Suffix'
		)); ?>
		<?php echo $this->Form->input('Unit.long_name', array(
			'label' => 'Name'
		)); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<?php echo $this->Form->submit('Save', array(
			'div' => false,
			'class' => 'btn btn-success',
		)); ?>
      </div>
	<?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>

