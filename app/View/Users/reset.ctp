<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Forgot Password</h3>
    </div>
    <div class="panel-body">
      <?php echo $this->Form->create('User'); ?>
        <?php
          echo $this->Form->input('password',array("type"=>"password", 'class'=>'form-control'));
          echo $this->Form->input('password_confirm',array("type"=>"password", 'class'=>'form-control'));
        ?>
        <br>
        <?php
          echo $this->Form->submit(__('Recover',true), array('class'=>'btn btn-success')); 
          echo $this->Form->end();
        ?>
    </div>
  </div>
</div>