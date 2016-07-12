<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Category</h3>
    </div>
    <div class="panel-body">
      <table class="table">
        <tr>
          <td><?php echo "<label>Pid</label><br>"; ?></td>
          <td><?php echo h($category['Category']['pid']); ?></td>
        </tr>
        <tr>
          <td><?php echo "<label>Name</label><br>"; ?></td>
          <td><?php echo h($category['Category']['name']); ?></td>
        </tr>
        <tr>
          <td><?php echo "<label>Type</label><br>"; ?></td>
          <td><?php echo h($category['Category']['type']); ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
    <li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']))); ?> </li>
    <li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
    <li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
  </ul>
</div>
<div class="related">
  <h3><?php echo __('Related Transactions'); ?></h3>
  <?php if (!empty($category['Transaction'])): ?>
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
  <?php foreach ($category['Transaction'] as $transaction): ?>
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
  <?php endforeach ?>
  </table>
<?php endif ?>

  <div class="actions">
    <ul>
      <li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?></li>
    </ul>
  </div>
</div>
