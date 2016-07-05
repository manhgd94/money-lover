<div class="panel-group" id="accordion">
  <?php foreach ($wallets as $wl): ?>
    <div class="panel panel-default <?php if ($wl['Wallet']['current']==true) echo "panel-primary"?>">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $wl['Wallet']['id']; ?>">
            <?php echo $wl['Wallet']['name']; ?><span class="caret"></span>
          </a>
          <span class="total-money"><?php echo "Chi: ".$wl['Wallet']['expense']; ?></span>
          <span class="total-money"><?php echo "Thu: ".$wl['Wallet']['income']; ?></span>
        </h4>
      </div>
      <div id="collapse<?php echo $wl['Wallet']['id']; ?>" class="panel-collapse collapse">
        <div class="panel-body">
          <table class="table">
            <tr>
              <th>category</th>
              <th>name</th>
              <th>note</th>
              <th>money</th>
              <th>created</th>
            </tr>
            <?php foreach ($transactions as $trs): ?>
              <?php if ($wl['Wallet']['id']==$trs['Transaction']['wallet_id']): ?>
                <tr>
                  <td><?php echo $trs['Category']['name']; ?></td>
                  <td><?php echo $trs['Transaction']['name']; ?></td>
                  <td><?php echo $trs['Transaction']['note']; ?></td>
                  <td><?php echo $trs['Transaction']['money']; ?></td>
                  <td><?php echo $trs['Transaction']['created']; ?></td>
                </tr>
              <?php endif ?>
            <?php endforeach ?>
          </table>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>