<div class="users index">
  <h2><?php echo __('Users'); ?></h2>
  <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
  <thead>
  <tr>
      <th><?php echo $this->Paginator->sort('id'); ?></th>
      <th><?php echo $this->Paginator->sort('name'); ?></th>
      <th><?php echo $this->Paginator->sort('username'); ?></th>
      <th><?php echo $this->Paginator->sort('email'); ?></th>
      <th><?php echo $this->Paginator->sort('avatar'); ?></th>
      <th><?php echo $this->Paginator->sort('active'); ?></th>
      <th><?php echo $this->Paginator->sort('created'); ?></th>
      <th><?php echo $this->Paginator->sort('modified'); ?></th>
      <th class="actions"><?php echo __('Actions'); ?></th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($users as $user): ?>
  <tr>
    <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
    <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
    <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
    <td>
      <?php if (!empty($user['User']['avatar'])): ?>
        <?php echo $this->Html->image(h($user['User']['avatar']), array('alt' => 'avatar', 'class'=>'avatar-img')); ?>
      <?php else: ?>
        <?php echo $this->Html->image('icon-profile.png', array('alt' => 'avatar', 'class' => 'avatar-img')); ?>
      <?php endif ?>
    </td>
    <td><?php echo h($user['User']['active']); ?>&nbsp;</td>
    <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
    <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
    <td class="actions">
      <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('class'=>'button btn btn-info')); ?>
      <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class'=>'button btn btn-success')); ?>
      <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']), 'class'=>'button btn btn-danger')); ?>
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
  ?>  </p>
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
    <li><?php echo $this->Html->link(__('New User'),     array('action'     => 'add')); ?></li>
    <li><?php echo $this->Html->link(__('List Wallets'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Wallet'),   array('controller' => 'wallets', 'action' => 'add')); ?> </li>
  </ul>
</div>
