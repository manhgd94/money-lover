<div class="wallets index">
  <h2><?php echo __('Wallets'); ?></h2>
  <div class="panel panel-primary">
    <div class="panel-body">
      <?php echo $this->Html->link(__('Add Wallet'), array('action' => 'add'), array('class'=>'button btn btn-success')); ?>
    </div>
  </div>
  <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
  <thead>
  <tr>
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
    <td><?php echo h($wallet['Wallet']['name']); ?>&nbsp;</td>
    <td><?php if (h($wallet['Wallet']['current'])==true): ?>
      <span class="glyphicon glyphicon-ok"></span>
    <?php endif ?></td>
    <td><?php echo $this->App->adddotstring(h($wallet['Wallet']['expense'])); ?>&nbsp;</td>
    <td><?php echo $this->App->adddotstring(h($wallet['Wallet']['income'])); ?>&nbsp;</td>
    <td class="actions">
      <?php
        echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search')),
          array('action' => 'view', $wallet['Wallet']['id']),
          array('class'=>'button btn btn-sm btn-info', 'escape'=>false));
      ?>
      <?php
        echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')),
          array('action' => 'edit', $wallet['Wallet']['id']),
          array('class'=>'button btn btn-sm btn-success', 'escape'=>false));
      ?>
      <?php
        echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')),
          array('action' => 'delete', $wallet['Wallet']['id']),
          array('confirm' => __('Are you sure you want to delete # %s?', $wallet['Wallet']['id']),
                'class'=>'button btn btn-sm btn-danger', 'escape'=>false));
      ?>
    </td>
  </tr>
<?php endforeach ?>
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
