<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avatar'); ?></dt>
		<dd>
			<?php echo h($user['User']['avatar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Verified'); ?></dt>
		<dd>
			<?php echo h($user['User']['verified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Verifiecation Code'); ?></dt>
		<dd>
			<?php echo h($user['User']['verifiecation_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wallets'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wallet'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Wallets'); ?></h3>
	<?php if (!empty($user['Wallet'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Current'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Wallet'] as $wallet): ?>
		<tr>
			<td><?php echo $wallet['id']; ?></td>
			<td><?php echo $wallet['user_id']; ?></td>
			<td><?php echo $wallet['name']; ?></td>
			<td><?php echo $wallet['current']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'wallets', 'action' => 'view', $wallet['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'wallets', 'action' => 'edit', $wallet['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'wallets', 'action' => 'delete', $wallet['id']), array('confirm' => __('Are you sure you want to delete # %s?', $wallet['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Wallet'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
