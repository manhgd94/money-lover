<div class="transactions view">
<h2><?php echo __('Transaction'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wallet'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaction['Wallet']['name'], array('controller' => 'wallets', 'action' => 'view', $transaction['Wallet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaction['Category']['name'], array('controller' => 'categories', 'action' => 'view', $transaction['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Money'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['money']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transaction'), array('action' => 'edit', $transaction['Transaction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transaction'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wallets'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wallet'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
