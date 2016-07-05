<div class="wallets index">
	<h2><?php echo __('Wallets'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('current'); ?></th>
			<th><?php echo $this->Paginator->sort('expense'); ?></th>
			<th><?php echo $this->Paginator->sort('income'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($wallets as $wallet): ?>
	<tr>
		<td><?php echo h($wallet['Wallet']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($wallet['User']['name'], array('controller' => 'users', 'action' => 'view', $wallet['User']['id'])); ?>
		</td>
		<td><?php echo h($wallet['Wallet']['name']); ?>&nbsp;</td>
		<td><?php if (h($wallet['Wallet']['current'])==true): ?>
			<span class="glyphicon glyphicon-ok"></span>
		<?php endif ?></td>
		<td><?php echo h($wallet['Wallet']['expense']); ?>&nbsp;</td>
		<td><?php echo h($wallet['Wallet']['income']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $wallet['Wallet']['id']), array('class'=>'button btn btn-info')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $wallet['Wallet']['id']), array('class'=>'button btn btn-success')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $wallet['Wallet']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $wallet['Wallet']['id']), 'class'=>'button btn btn-danger')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pagination pagination-large">
    	<ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
    </div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Wallet'), array('action' => 'add', $userlogin['id'])); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
