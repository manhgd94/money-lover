<div class="panel-group" id="accordion">
  <?php foreach ($wallets as $wl): ?>
    <div class="panel panel-default <?php if ($wl['Wallet']['current'] == true) echo "panel-success"?>">
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
                  <td><?php echo $trs['Transaction']['note']; ?></td>
                  <td><?php echo $this->App->adddotstring($trs['Transaction']['money']); ?></td>
                  <td><?php echo $trs['Transaction']['created']; ?></td>
                  <td class="actions">
                    <?php
                      echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-search')),
                        array('controller' => 'wallets', 'action' => 'view', $trs['Wallet']['id']),
                        array('class'=>'button btn btn-sm btn-info', 'escape'=>false));
                    ?>
                    <?php
                      echo $this->Html->link($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-edit')),
                        array('controller' => 'wallets', 'action' => 'edit', $trs['Wallet']['id']),
                        array('class'=>'button btn btn-sm btn-success', 'escape'=>false));
                    ?>
                    <?php
                      echo $this->Form->postLink($this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')),
                        array('controller' => 'wallets', 'action' => 'delete', $trs['Wallet']['id']),
                        array('confirm' => __('Are you sure you want to delete # %s?', $trs['Wallet']['id']),
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