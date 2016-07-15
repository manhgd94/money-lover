<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Wallet</h3>
    </div>
    <div class="panel-body">
      <table class="table">
        <tr>
          <td><?php echo "<label>User</label><br>"; ?></td>
          <td><?php echo $this->Html->link($wallet['User']['name'], array('controller' => 'users', 'action' => 'view', $wallet['User']['id'])); ?></td>
        </tr>
        <tr>
          <td><?php echo "<label>Name</label><br>"; ?></td>
          <td><?php echo h($wallet['Wallet']['name']); ?></td>
        </tr>
        <tr>
          <td><?php echo "<label>Current</label><br>"; ?></td>
          <td>
            <?php if (h($wallet['Wallet']['current'])): ?>
              <span class="glyphicon glyphicon-ok"></span>
            <?php endif ?>
          </td>
        </tr>
        <tr>
          <td><?php echo "<label>Expense</label><br>"; ?></td>
          <td><?php echo $this->App->adddotstring(h($wallet['Wallet']['expense'])); ?></td>
        </tr>
        <tr>
          <td><?php echo "<label>Income</label><br>"; ?></td>
          <td><?php echo $this->App->adddotstring(h($wallet['Wallet']['income'])); ?></td>
        </tr>
      </table>
      <?php echo $this->Html->link(__('Back'),   array('action' => 'index'), array('class' => 'btn btn-info')); ?>
    </div>
  </div>
</div>
<div class="clear"></div>
<div class="related">
  <h3><?php echo __('Related Transactions'); ?></h3>
  <?php if (!empty($wallet['Transaction'])): ?>
  <table class="table">
  <tr>
    <th><?php echo __('Id'); ?></th>
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
