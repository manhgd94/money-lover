<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Create wallet</h3>
    </div>
    <div class="panel-body">
      <?php echo $this->Form->create('Wallet'); ?>
  <?php
    echo $this->Form->input('name', array('class'=>'form-control'));
    echo $this->Form->input('current', array('class'=>'form-control'));
  ?>
    <br>
    <?php
      echo $this->Form->submit(__('Create',true), array('class'=>'btn btn-success'));
      echo $this->Html->link(__('Back'),   array('action' => 'index'), array('class' => 'btn btn-info'));
      echo $this->Form->end();
    ?>
    </div>
  </div>
</div>
