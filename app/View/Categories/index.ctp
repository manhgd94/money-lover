<div class="categories index">
	<h2><?php echo __('Categories'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('pid', 'Nhóm chính'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
		<?php foreach ($categories as $category): ?>
			<tr>
				<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
				<td><?php echo h($category['Category']['pid']); ?>&nbsp;</td>
				<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
				<td><?php if (h($category['Category']['type'])===false) {
								echo "Thu";
							}else{
								echo "Chi";
								} ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id']), array('class'=>'button btn btn-info')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id']), array('class'=>'button btn btn-success')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']), 'class'=>'button btn btn-danger')); ?>
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
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Create account</h3>
    </div>
    <div class="panel-body">
        <div class="thu" style="float: left;">
		<h3>Thu</h3>
			<?php foreach ($categories as $category): ?>
				<?php if ($category['Category']['type']==0): ?>
					<?php if ($category['Category']['pid']==0): ?>
						<div>
							<?php echo $this->Html->link(__(h($category['Category']['name'])), array('action' => 'view', $category['Category']['id'])); ?>
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id']), array('class'=>'button btn btn-success')); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']), 'class'=>'button btn btn-danger')); ?>
						</div>
						<?php foreach ($categories as $cat): ?>
							<?php if ($cat['Category']['pid']==$category['Category']['id']): ?>
								<div style="padding-left: 30px;"><?php echo $this->Html->link(__(h($cat['Category']['name'])), array('action' => 'view', $cat['Category']['id'])); ?>
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cat['Category']['id']), array('class'=>'button btn btn-success')); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cat['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cat['Category']['id']), 'class'=>'button btn btn-danger')); ?>
								</div>
							<?php endif ?>
						<?php endforeach ?>
					<?php endif ?>
				<?php endif ?>
			<?php endforeach; ?>
		</div>
		<div class="chi" style="float: left;">
		<h3>Chi</h3>
			<?php foreach ($categories as $category): ?>
				<?php if ($category['Category']['type']==1): ?>
					<?php if ($category['Category']['pid']==0): ?>
						<div>
							<?php echo $this->Html->link(__(h($category['Category']['name'])), array('action' => 'view', $category['Category']['id'])); ?>
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id']), array('class'=>'button btn btn-success')); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']), 'class'=>'button btn btn-danger')); ?>
						</div>
						<?php foreach ($categories as $cat): ?>
							<?php if ($cat['Category']['pid']==$category['Category']['id']): ?>
								<div style="padding-left: 30px;"><?php echo $this->Html->link(__(h($cat['Category']['name'])), array('action' => 'view', $cat['Category']['id'])); ?>
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cat['Category']['id']), array('class'=>'button btn btn-success')); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cat['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cat['Category']['id']), 'class'=>'button btn btn-danger')); ?>
								</div>
							<?php endif ?>
						<?php endforeach ?>
					<?php endif ?>
				<?php endif ?>
			<?php endforeach; ?>
		</div>
    </div>
  </div>
</div>
