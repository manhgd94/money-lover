<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Transaction</h3>
    </div>
    <div class="panel-body">
        <?php
          echo "<label>Wallet</label><br>";
          echo $this->Html->link($transaction['Wallet']['name'], array('controller' => 'wallets', 'action' => 'view', $transaction['Wallet']['id']))."<br>";
          echo "<label>Category</label><br>";
          echo $this->Html->link($transaction['Category']['name'], array('controller' => 'categories', 'action' => 'view', $transaction['Category']['id']))."<br>";
          echo "<label>Name</label><br>";
          echo h($transaction['Transaction']['name'])."<br>";
          echo "<label>Note</label><br>";
          echo h($transaction['Transaction']['note'])."<br>";
          echo "<label>Money</label><br>";
          echo $this->App->adddotstring(h($transaction['Transaction']['money']))."<br>";
          echo "<label>Created</label><br>";
          echo h($transaction['Transaction']['created'])."<br>";
          echo "<label>Modified</label><br>";
          echo h($transaction['Transaction']['modified'])."<br>";
        ?>
    </div>
  </div>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('Edit Transaction'), array('action' => 'edit', $transaction['Transaction']['id'])); ?> </li>
    <li><?php echo $this->Form->postLink(__('Delete Transaction'), array('action' => 'delete', $transaction['Transaction']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['Transaction']['id']))); ?> </li>
    <li><?php echo $this->Html->link(__('List Transactions'), array('action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Transaction'), array('action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Wallets'), array('controller' => 'wallets', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Wallet'), array('controller' => 'wallets', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
  </ul>
</div>
