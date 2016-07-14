<div class="categories index">
  <h2><?php echo __('Categories'); ?></h2>
  <div class="panel panel-primary">
    <div class="panel-body">
      <?php echo $this->Html->link(__('Add Category'), array('action' => 'add'), array('class'=>'button btn btn-success')); ?>
    </div>
  </div>
  <div class="thu pull-left">
    <h3>Thu</h3>
    <table class="table table-hover">
      <?php foreach ($categories as $category): ?>
        <?php if ($category['Category']['type'] == 0 && $category['Category']['pid'] == 0): ?>
          <tr class="cat-p">
            <td><?php echo $this->Html->link(__(h($category['Category']['name'])), array('action' => 'view', $category['Category']['id'])); ?></td>
            <td>
              <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')), array('action' => 'edit', $category['Category']['id']), array('class'=>'button btn btn-sm btn-success', 'escape'=>false)); ?>
              <?php echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']), 'class' => 'button btn btn-sm btn-danger', 'escape'=>false)); ?>
            </td>
          </tr>
          <?php foreach ($categories as $cat): ?>
            <?php if ($cat['Category']['pid'] == $category['Category']['id']): ?>
              <tr>
                <td class="cat-sub"><?php echo $this->Html->link(__(h($cat['Category']['name'])), array('action' => 'view', $cat['Category']['id'])); ?></td>
                <td>
                  <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')), array('action' => 'edit', $cat['Category']['id']), array('class'=>'button btn btn-sm btn-success', 'escape'=>false)); ?>
                  <?php echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')), array('action' => 'delete', $cat['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cat['Category']['id']), 'class' => 'button btn btn-sm btn-danger', 'escape'=>false)); ?>
                </td>
              </tr>
            <?php endif ?>
          <?php endforeach ?>
        <?php endif ?>
      <?php endforeach ?>
    </table>
  </div>
  <div class="chi pull-left">
    <h3>Chi</h3>
    <table class="table table-hover">
      <?php foreach ($categories as $category): ?>
        <?php if ($category['Category']['type'] == 1 && $category['Category']['pid'] == 0): ?>
          <tr class="cat-p">
            <td><?php echo $this->Html->link(__(h($category['Category']['name'])), array('action' => 'view', $category['Category']['id'])); ?></td>
            <td>
              <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')), array('action' => 'edit', $category['Category']['id']), array('class'=>'button btn btn-sm btn-success', 'escape'=>false)); ?>
              <?php echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')), array('action' => 'delete', $category['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $category['Category']['id']), 'class' => 'button btn btn-sm btn-danger', 'escape'=>false)); ?>
            </td>
          </tr>
          <?php foreach ($categories as $cat): ?>
            <?php if ($cat['Category']['pid'] == $category['Category']['id']): ?>
              <tr>
                <td class="cat-sub"><?php echo $this->Html->link(__(h($cat['Category']['name'])), array('action' => 'view', $cat['Category']['id'])); ?></td>
                <td>
                  <?php echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')), array('action' => 'edit', $cat['Category']['id']), array('class'=>'button btn btn-sm btn-success', 'escape'=>false)); ?>
                  <?php echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')), array('action' => 'delete', $cat['Category']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cat['Category']['id']), 'class' => 'button btn btn-sm btn-danger', 'escape'=>false)); ?>
                </td>
              </tr>
            <?php endif ?>
          <?php endforeach ?>
        <?php endif ?>
      <?php endforeach ?>
    </table>
  </div>
</div>
