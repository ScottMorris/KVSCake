<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @modified	  Scott Morris April 2014
 */

$cakeDescription = __d('cake_dev', 'KVS');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
		echo $this->Html->css('cake.generic.edited');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('kvs');
		
		//Add Scripts
	echo $this->Html->script('jquery-1.11.0'); 
	echo $this->Html->script('bootstrap');
	echo $this->Html->script('kvs');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div id="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><?php echo $cakeDescription; ?></a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><?php echo $this->Html->link('Clients', 
							array('controller' => 'clients',
							'action' => 'index'
							)); ?></li>
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventory <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('Warehouses', 
							array('controller' => 'warehouses',
							'action' => 'index'
							)); ?></li>
							<li><?php echo $this->Html->link('Stock', 
							array('controller' => 'inventory',
							'action' => 'index'
							)); ?></li>
							<li><?php echo $this->Html->link('Inventory Items', 
							array('controller' => 'inventoryItems',
							'action' => 'index'
							)); ?></li>
							<li><?php echo $this->Html->link('Outgoing Stock', 
							array('controller' => 'InventoryOutgoingItems',
							'action' => 'index'
							)); ?></li>
						</ul>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
		
	<div class="container">
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	
	</div>
	<div id="footer">
		<?php echo $this->Html->link(
				$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
				'http://www.cakephp.org/',
				array('target' => '_blank', 'escape' => false)
			);
		?>
		<?php echo $this->element('sql_dump'); ?>
</div>
<?php 
echo $this->Js->writeBuffer(); // Write cached scripts
?>
</body>
</html>
