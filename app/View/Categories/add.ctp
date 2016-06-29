<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Add Category'); ?></legend>
	<?php
		echo $this->Form->input('pid', array(
	                	'type' => 'select',
						'options' => $opt, // typically set from $this->find('list') in controller 
						'label'=> 'Nhóm chính',
						'default'=>'0',
						// 'value' => $arrProjectLeaderDetails['id'],  // specify default value 
						'escape' => false,  // prevent HTML being automatically escaped
						'error' => false,
						'class' => 'form-control'
					));
		echo $this->Form->input('name');
		$options = array('0' => 'Thu', '1' => 'Chi');
		$attributes = array('legend' => false);
		echo $this->Form->radio('type', $options, $attributes);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
