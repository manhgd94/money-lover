<div class="users index">
  <h2><?php echo __('Users'); ?></h2>
  <div class="panel panel-primary">
    <div class="panel-body">
      <?php echo $this->Html->link(__('Add User'), array('action' => 'add'), array('class'=>'button btn btn-success')); ?>
    </div>
  </div>
  <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
  <thead>
  <tr>
      <th><?php echo $this->Paginator->sort('name'); ?></th>
      <th><?php echo $this->Paginator->sort('email'); ?></th>
      <th><?php echo $this->Paginator->sort('avatar'); ?></th>
      <th><?php echo $this->Paginator->sort('active'); ?></th>
      <th><?php echo $this->Paginator->sort('created'); ?></th>
      <th class="actions"><?php echo __('Actions'); ?></th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($users as $user): ?>
  <tr>
    <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
    <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
    <td>
      <?php if (!empty($user['User']['avatar'])): ?>
        <?php echo $this->Html->image(h($user['User']['avatar']), array('alt' => 'avatar', 'class'=>'avatar-img')); ?>
      <?php else: ?>
        <?php echo $this->Html->image('icon-profile.png', array('alt' => 'avatar', 'class' => 'avatar-img')); ?>
      <?php endif ?>
    </td>
    <td><?php if (h($user['User']['active'])==true): ?>
      <span class="glyphicon glyphicon-ok"></span>
    <?php else: ?>
      <span class="glyphicon glyphicon-remove"></span>
    <?php endif ?></td>
    <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
    <td class="actions">
      <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search')), array('action' => 'view', $user['User']['id']), array('class'=>'button btn btn-sm btn-info', 'escape'=>false)); ?>
      <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')), array('action' => 'edit', $user['User']['id']), array('class'=>'button btn btn-sm btn-success', 'escape'=>false)); ?>
      <?php echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']), 'class'=>'button btn btn-sm btn-danger', 'escape'=>false)); ?>
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
