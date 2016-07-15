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
