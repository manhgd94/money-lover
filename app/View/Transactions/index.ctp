<div class="transactions index">
  <h2><?php echo __('Transactions'); ?></h2>
  <div class="search panel panel-success">
    <div class="panel-heading">
      <h2 class="panel-title">
        Search
      </h2>
    </div>
    <div class="panel-body">
      <?php echo $this->Form->create('Search',array('class'=>'form form-inline', 'type'=>'get'));
      echo $this->Form->input('name',array('div'=>false,'label'=>false,'placeholder'=>'Transaction Name','class'=>'form-control'));
      echo $this->Form->year('time', array(
        'empty' => 'Year',
        'class' => 'form-control'));
      echo $this->Form->month('time', array(
        'empty' => 'Month',
        'class' => 'form-control'));
      echo $this->Form->day('time', array(
        'empty' => 'Day',
        'class' => 'form-control'));
      echo $this->Form->submit('Search',array('class'=>'button btn btn-success'));
      echo $this->Form->button('Clear', array('type' => 'reset', 'class'=>'button btn btn-default'));
      echo $this->Form->end();?>
    </div>
  </div>
  <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
  <thead>
  <tr>
    <th><?php echo $this->Paginator->sort('id'); ?></th>
    <th><?php echo $this->Paginator->sort('wallet_id'); ?></th>
    <th><?php echo $this->Paginator->sort('category_id'); ?></th>
    <th><?php echo $this->Paginator->sort('name'); ?></th>
    <th><?php echo $this->Paginator->sort('note'); ?></th>
    <th><?php echo $this->Paginator->sort('money'); ?></th>
    <th><?php echo $this->Paginator->sort('created'); ?></th>
    <th><?php echo $this->Paginator->sort('modified'); ?></th>
    <th class="actions"><?php echo __('Actions'); ?></th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($transactions as $transaction): ?>
  <tr>
    <td><?php echo h($transaction['Transaction']['id']); ?>&nbsp;</td>
    <td>
      <?php echo $this->Html->link($transaction['Wallet']['name'], array('controller' => 'wallets', 'action' => 'view', $transaction['Wallet']['id'])); ?>
    </td>
    <td>
      <?php echo $this->Html->link($transaction['Category']['name'], array('controller' => 'categories', 'action' => 'view', $transaction['Category']['id'])); ?>
    </td>
    <td><?php echo h($transaction['Transaction']['name']); ?>&nbsp;</td>
    <td><?php echo h($transaction['Transaction']['note']); ?>&nbsp;</td>
    <td><?php echo $this->App->adddotstring(h($transaction['Transaction']['money'])); ?>&nbsp;</td>
    <td><?php echo h($transaction['Transaction']['created']); ?>&nbsp;</td>
    <td><?php echo h($transaction['Transaction']['modified']); ?>&nbsp;</td>
    <td class="actions">
      <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search')), array('action' => 'view', $transaction['Transaction']['id']), array('class'=>'button btn btn-sm btn-info', 'escape'=>false)); ?>
      <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')), array('action' => 'edit', $transaction['Transaction']['id']), array('class'=>'button btn btn-sm btn-success', 'escape'=>false)); ?>
      <?php echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id']), 'class'=>'button btn btn-sm btn-danger', 'escape'=>false)); ?>
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
  ?></p>
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
    <li><?php echo $this->Html->link(__('New Transaction'), array('action'     => 'add')); ?></li>
    <li><?php echo $this->Html->link(__('List Wallets'),    array('controller' => 'wallets',    'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Wallet'),      array('controller' => 'wallets',    'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Category'),    array('controller' => 'categories', 'action' => 'add')); ?> </li>
  </ul>
</div>
