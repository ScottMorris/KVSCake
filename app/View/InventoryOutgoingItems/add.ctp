<h1>Depart Items</h1>

<?php //debug($inventoryStatuses); ?>
<?php //debug($inventoryItems); ?>
<table>
	<tr>
		<td>
			<?php
			echo $this->Form->input('inventory_status', array('label' => false, 'div' => false,
				'onchange' => 'javascript:copyOption($(this).find(":selected").val(), "statusSelect");'
			));
			?>
		</td>
		<td>
			<?php
			echo $this->Form->input('client', array('label' => false, 'div' => false, 
				'onchange' => 'javascript:copyOption($(this).find(":selected").val(), "clientSelect");'
			));
			?>
		</td>
		<td>
			<?php
			echo $this->Html->link('Add Row', 
				'#',
				array(
					'class' => 'btn btn-primary',
					'onclick' => 'javascript:addNewOutgoingItemRow();',
				)
			);
			?>
		</td>
	</tr>
</table>
<?php echo $this->Form->create(null); ?>
<table id="itemsTable" class="table">
	<thead>
		<tr>		
			<th>Barcode</th>
			<th>Item</th>
			<th>Warehouse</th>
			<th>Status</th>
			<th>Client</th>
			<th>Note</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
			<?php echo $this->Form->input('InventoryOutgoingItemNew.1.barcode', array(
						'label' => false//,
						//'id' => 'InventoryWarehouseId'.$movingItem['InventoryItem']['id'],
						//'name' =>
					)); ?>
			</td>
			<td>
				<?php echo $this->Form->input('InventoryOutgoingItemNew.1.inventory_item', array(
						'label' => false,
						 'empty' => "",
						 'onchange' => 'javascript:setOutgoingItemInformation($(this).find(":selected").val(), false, $(this).attr("id"));'
						 //,
						//'id' => 'InventoryWarehouseId'.$movingItem['InventoryItem']['id'],
						//'name' =>
					)); ?>
			</td>
			<td>
				<?php echo $this->Form->input('InventoryOutgoingItemNew.1.warehouse', array(
							'label' => false,
							'class' => 'warehouseSelect'
							//,
							//'id' => 'InventoryWarehouseId'.$movingItem['InventoryItem']['id'],
							//'name' =>
						)); ?>
			</td>
					<td>
				<?php echo $this->Form->input('InventoryOutgoingItemNew.1.inventory_status', array(
							'label' => false,
							'class' => 'statusSelect'//,
							//'id' => 'InventoryWarehouseId'.$movingItem['InventoryItem']['id'],
							//'name' =>
						)); ?>
			</td>
			<td>
				<?php echo $this->Form->input('InventoryOutgoingItemNew.1.client', array(
							'label' => false,
							'class' => 'clientSelect'//,
							//'id' => 'InventoryWarehouseId'.$movingItem['InventoryItem']['id'],
							//'name' =>
						)); ?>
			</td>
			<td>
				<?php echo $this->Form->input('InventoryOutgoingItemNew.1.note', array(
							'label' => false//,
							//'id' => 'InventoryWarehouseId'.$movingItem['InventoryItem']['id'],
							//'name' =>
						)); ?>
			</td>
		</tr>
	</tbody>
</table>
<?php
echo $this->Form->submit('Depart Items', array(
	//'url' => array('controller' => 'inventory', 'action' => 'moveSelected'),
	//'update' => 'html',
	//'name' => 'submitDelete',
	'div' => false,
	'class' => 'btn btn-success'//,
	//'confirm' => "Are you sure?"
)); ?>
<?php echo $this->Form->end(); ?>