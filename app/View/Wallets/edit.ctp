<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Edit wallet</h3>
    </div>
    <div class="panel-body">
    <?php
      echo $this->Form->create('Wallet');
      echo $this->Form->input('id', array('class'=>'form-control'));
      echo $this->Form->input('name', array('class'=>'form-control'));
      echo $this->Form->input('current', array('class'=>'form-control'));
    ?>
    <br>
    <?php
      echo $this->Form->submit(__('Edit',true), array('class'=>'btn btn-success'));
      echo "<button class='btn btn-default' onclick='goBack()'>Go Back</button>";
      echo $this->Form->end();
    ?>
    </div>
  </div>
</div>
