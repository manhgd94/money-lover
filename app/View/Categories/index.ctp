<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Create account</h3>
    </div>
    <div class="panel-body">
      <div class="thu" style="float: left;">
      <h3>Thu</h3>
      <table>
        <?php foreach ($categories as $category): ?>
          <?php if ($category['Category']['type'] == 0 && $category['Category']['pid'] == 0): ?>
            <tr>
              <td><?php echo $this->Html->link(__(h($category['Category']['name'])), array('action' => 'view', $category['Category']['id'])); ?></td>
              <td>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id']), array('class'=>'button btn btn-sm btn-success')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']), 'class' => 'button btn btn-sm btn-danger')); ?>
              </td>
            </tr>
            <?php foreach ($categories as $cat): ?>
              <?php if ($cat['Category']['pid'] == $category['Category']['id']): ?>
                <tr>
                  <td class="cat-sub"><?php echo $this->Html->link(__(h($cat['Category']['name'])), array('action' => 'view', $cat['Category']['id'])); ?></td>
                  <td>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cat['Category']['id']), array('class'=>'button btn btn-sm btn-success')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cat['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cat['Category']['id']), 'class' => 'button btn btn-sm btn-danger')); ?>
                  </td>
                </tr>
              <?php endif ?>
            <?php endforeach ?>
          <?php endif ?>
        <?php endforeach ?>
      </table>
      </div>
      <div class="chi" style="float: left;">
      <h3>Chi</h3>
      <table>
        <?php foreach ($categories as $category): ?>
          <?php if ($category['Category']['type'] == 1 && $category['Category']['pid'] == 0): ?>
            <tr>
              <td><?php echo $this->Html->link(__(h($category['Category']['name'])), array('action' => 'view', $category['Category']['id'])); ?></td>
              <td>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id']), array('class'=>'button btn btn-sm btn-success')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']), 'class'=>'button btn btn-sm btn-danger')); ?>
              </td>
            </tr>
            <?php foreach ($categories as $cat): ?>
              <?php if ($cat['Category']['pid']==$category['Category']['id']): ?>
                <tr>
                  <td class="cat-sub"><?php echo $this->Html->link(__(h($cat['Category']['name'])), array('action' => 'view', $cat['Category']['id'])); ?></td>
                  <td>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cat['Category']['id']), array('class'=>'button btn btn-sm btn-success')); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cat['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cat['Category']['id']), 'class'=>'button btn btn-sm btn-danger')); ?>
                  </td>
                </tr>
              <?php endif ?>
            <?php endforeach ?>
          <?php endif ?>
        <?php endforeach ?>
      </table>
      </div>
    </div>
  </div>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('New Category'), array('action'          => 'add')); ?></li>
    <li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
    <li><?php echo $this->Html->link(__('New Transaction'), array('controller'   => 'transactions', 'action' => 'add')); ?> </li>
  </ul>
</div>
