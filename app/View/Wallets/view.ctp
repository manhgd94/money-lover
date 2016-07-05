<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Wallet</h3>
    </div>
    <div class="panel-body">
      <?php
        echo "<label>User</label><br>";
        echo $this->Html->link($wallet['User']['name'], array('controller' => 'users', 'action' => 'view', $wallet['User']['id']))."<br>";
        echo "<label>Name</label><br>";
        echo h($wallet['Wallet']['name'])."<br>";
        echo "<label>Current</label><br>";
        echo h($wallet['Wallet']['current'])."<br>";
        echo "<label>Expense</label><br>";
        echo h($wallet['Wallet']['expense'])."<br>";
        echo "<label>Income</label><br>";
        echo h($wallet['Wallet']['income'])."<br>";
      ?>
    </div>
  </div>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('Edit Wallet'), array('action' => 'edit', $wallet['Wallet']['id'])); ?> </li>
    <li><?php echo $this->Form->postLink(__('Delete Wallet'), array('action' => 'delete', $wallet['Wallet']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $wallet['Wallet']['id']))); ?> </li>
    <li><?php echo $this->Html->link(__('List Wallets'), array('action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Wallet'), array('action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
  </ul>
</div>
<div class="related">
  <h3><?php echo __('Related Transactions'); ?></h3>
  <?php if (!empty($wallet['Transaction'])): ?>
  <table cellpadding = "0" cellspacing = "0">
  <tr>
    <th><?php echo __('Id'); ?></th>
    <th><?php echo __('Wallet Id'); ?></th>
    <th><?php echo __('Category Id'); ?></th>
    <th><?php echo __('Name'); ?></th>
    <th><?php echo __('Note'); ?></th>
    <th><?php echo __('Money'); ?></th>
    <th><?php echo __('Created'); ?></th>
    <th><?php echo __('Modified'); ?></th>
    <th class="actions"><?php echo __('Actions'); ?></th>
  </tr>
  <?php foreach ($wallet['Transaction'] as $transaction): ?>
    <tr>
      <td><?php echo $transaction['id']; ?></td>
      <td><?php echo $transaction['wallet_id']; ?></td>
      <td><?php echo $transaction['category_id']; ?></td>
      <td><?php echo $transaction['name']; ?></td>
      <td><?php echo $transaction['note']; ?></td>
      <td><?php echo $transaction['money']; ?></td>
      <td><?php echo $transaction['created']; ?></td>
      <td><?php echo $transaction['modified']; ?></td>
      <td class="actions">
        <?php echo $this->Html->link(__('View'), array('controller' => 'transactions', 'action' => 'view', $transaction['id'])); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'transactions', 'action' => 'edit', $transaction['id'])); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transactions', 'action' => 'delete', $transaction['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transaction['id']))); ?>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php endif; ?>

  <div class="actions">
    <ul>
      <li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add', $wallet['Wallet']['id'])); ?> </li>
    </ul>
  </div>
</div>
