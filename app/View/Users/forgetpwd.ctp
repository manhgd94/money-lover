<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Forgot Password</h3>
    </div>
    <div class="panel-body">
      <?php
        echo $this->Form->create('User', array(
          'class' => 'form',
          'role'  => 'form',
          'inputDefaults' => array(
            'div'     => array('class' => 'form-group'),
            'label'   => array('class' => 'control-label'),
            'error'   => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        )));
        echo $this->Form->input('email', array('class'=>'form-control'));
        echo $this->Form->submit(__('Recover',true), array('class'=>'btn btn-success')); 
        echo $this->Form->end();
      ?>
    </div>
  </div>
</div>
