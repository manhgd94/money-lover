<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Edit wallet</h3>
    </div>
    <div class="panel-body">
    <?php
      echo $this->Form->create('Wallet');
      echo $this->Form->input('id', array('class'=>'form-control'));
      echo $this->Form->input('name', array('class'=>'form-control'));
      echo $this->Form->input('current', array('class'=>'form-control'));
    ?>
    <br>
    <?php
      echo $this->Form->submit(__('Edit',true), array('class'=>'btn btn-success'));
      echo $this->Html->link(__('Back'),   array('action' => 'index'), array('class' => 'btn btn-info'));
      echo $this->Form->end();
    ?>
    </div>
  </div>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Wallet.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Wallet.id')))); ?></li>
    <li><?php echo $this->Html->link(__('List Wallets'),      array('action'     => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('List Users'),        array('controller' => 'users',        'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New User'),          array('controller' => 'users',        'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Transaction'),   array('controller' => 'transactions', 'action' => 'add')); ?> </li>
  </ul>
</div>
