<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Edit transaction</h3>
    </div>
    <div class="panel-body">
      <?php echo $this->Form->create('Transaction'); ?>
  <?php
    echo $this->Form->input('id');
    echo $this->Form->input('wallet_id',   array('class'=>'form-control'));
    echo $this->Form->input('category_id', array('class'=>'form-control'));
    echo $this->Form->input('name',        array('class'=>'form-control'));
    echo $this->Form->input('note',        array('class'=>'form-control'));
    echo $this->Form->input('money',       array('class'=>'form-control'));
  ?>
    <br>
    <?php
      echo $this->Form->submit(__('Create',true), array('class'=>'btn btn-success')); 
      echo $this->Form->end();
    ?>
    </div>
  </div>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>

    <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Transaction.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Transaction.id')))); ?></li>
    <li><?php echo $this->Html->link(__('List Transactions'), array('action'     => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('List Wallets'),      array('controller' => 'wallets',    'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Wallet'),        array('controller' => 'wallets',    'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Categories'),   array('controller' => 'categories', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Category'),      array('controller' => 'categories', 'action' => 'add')); ?> </li>
  </ul>
</div>
