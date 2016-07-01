<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Create account</h3>
    </div>
    <div class="panel-body">
      <div class="avatar">
        <?php
          echo $this->Html->image(h($user['User']['avatar']), array('alt' => 'avatar', 'class'=>'avatar-img'));
        ?>
      </div>
      <div class="info">
        <?php
          echo "<label>Name</label><br>";
          echo h($user['User']['name'])."<br>";
          echo "<label>User name</label><br>";
          echo h($user['User']['username'])."<br>";
          echo "<label>Email</label><br>";
          echo h($user['User']['email'])."<br>";
          echo "<label>Ngày tạo</label><br>";
          echo h($user['User']['created'])."<br>";
        ?>
      </div>
    </div>
  </div>
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
