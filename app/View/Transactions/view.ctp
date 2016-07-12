<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Transaction</h3>
    </div>
    <div class="panel-body">
      <table class="table">
        <tr>
          <td><?php echo "<label>Wallet</label><br>"; ?></td>
          <td><?php echo $this->Html->link($transaction['Wallet']['name'], array('controller' => 'wallets', 'action' => 'view', $transaction['Wallet']['id'])); ?></td>
        </tr>
        <tr>
          <td><?php echo "<label>Category</label><br>"; ?></td>
          <td><?php echo $this->Html->link($transaction['Category']['name'], array('controller' => 'categories', 'action' => 'view', $transaction['Category']['id'])); ?></td>
        </tr>
        <tr>
          <td><?php echo "<label>Name</label><br>"; ?></td>
          <td><?php echo h($transaction['Transaction']['name']); ?></td>
        </tr>
        <tr>
          <td><?php echo "<label>Note</label><br>"; ?></td>
          <td><?php echo h($transaction['Transaction']['note']); ?></td>
        </tr>
        <tr>
          <td><?php echo "<label>Money</label><br>"; ?></td>
          <td><?php echo $this->App->adddotstring(h($transaction['Transaction']['money'])); ?></td>
        </tr>
        <tr>
          <td><?php echo "<label>Created</label><br>"; ?></td>
          <td><?php echo h($transaction['Transaction']['created']); ?></td>
        </tr>
        <tr>
          <td><?php echo "<label>Modified</label><br>"; ?></td>
          <td><?php echo h($transaction['Transaction']['modified']); ?></td>
        </tr>
      </table>
      <?php echo $this->Html->link(__('Back'),   array('action' => 'index'), array('class' => 'btn btn-info')); ?>
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
