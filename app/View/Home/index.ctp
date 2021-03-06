<div class="panel-group" id="accordion">
  <?php foreach ($wallets as $wl): ?>
    <div class="panel panel-default <?php if ($wl['Wallet']['current']) echo "panel-success"?>">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $wl['Wallet']['id']; ?>">
            <?php echo $wl['Wallet']['name']; ?><span class="caret"></span>
          </a>
          <span class="total-money text-danger"><?php echo $this->App->adddotstring($wl['Wallet']['expense']); ?></span>
          <span class="total-money text-success"><?php echo $this->App->adddotstring($wl['Wallet']['income']); ?></span>
        </h4>
      </div>
      <div id="collapse<?php echo $wl['Wallet']['id']; ?>" class="panel-collapse collapse">
        <div class="panel-body">
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Note</th>
              <th>Money</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
            <?php foreach ($transactions as $trs): ?>
              <?php if ($wl['Wallet']['id'] == $trs['Transaction']['wallet_id']): ?>
                <tr>
                  <td><?php echo $trs['Transaction']['name']; ?></td>
                  <td><?php echo $this->Text->autoParagraph($trs['Transaction']['note']); ?></td>
                  <?php if ($trs['Category']['type']): ?>
                    <td class="text-danger">
                  <?php else: ?>
                    <td class="text-success">
                  <?php endif ?>
                    <?php echo $this->App->adddotstring($trs['Transaction']['money']); ?>
                  </td>
                  <td><?php echo $trs['Transaction']['created']; ?></td>
                  <td class="actions">
                    <?php
                      echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search')),
                        array('controller' => 'Transactions', 'action' => 'view', $trs['Transaction']['id']),
                        array('class'=>'button btn btn-sm btn-info', 'escape'=>false));
                    ?>
                    <?php
                      echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')),
                        array('controller' => 'Transactions', 'action' => 'edit', $trs['Transaction']['id']),
                        array('class'=>'button btn btn-sm btn-success', 'escape'=>false));
                    ?>
                    <?php
                      echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')),
                        array('controller' => 'Transactions', 'action' => 'delete', $trs['Transaction']['id']),
                        array('confirm' => __('Are you sure you want to delete # %s?', $trs['Transaction']['id']),
                              'class'=>'button btn btn-sm btn-danger', 'escape'=>false));
                    ?>
                  </td>
                </tr>
              <?php endif ?>
            <?php endforeach ?>
          </table>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>
