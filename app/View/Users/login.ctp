<?php echo $this->Form->create('User',array('class'=>'form-signin','inputDefaults'=>array())); ?>
<div class="login-container">
  <h2 class="form-signin-heading">Please log in</h2>
  <div class="controls">
    <div>
    <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'placeholder'=>'Tài khoản',"class"=>"form-control username"));?>
    <?php echo $this->Form->input('password',array('placeholder'=>'Mật khẩu','class'=>"form-control password",'label'=>false,'div'=>array('class'=>'form_loginpass')));?>
    </div>
  </div>
  <div class="clearfix">
    <?php echo $this->Form->submit('Đăng nhập',array('class'=>'btn btn-lg btn-primary btn-block')); ?>
    <div>
      <?php echo $this->Html->link('Create an account', array('controller'=>'users', 'action'=>'add')) ?>
      <button type="button" class="btn btn-link btn-md" data-toggle="modal" data-target="#myModal">Forgot password</button>
    </div>
    <?php echo $this->Form->end();?>
  </div>
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Forgot password</h4>
        </div>
        <div class="modal-body">
          <?php echo $this->Form->create(false, array(
                    'url' => array('controller' => 'users', 'action' => 'forgotpassword'),
                    'id' => 'forgotpassword'
                ));
          ?>
          <?php
          // echo $this->Form->input('wallet_id');
            echo $this->Form->input('email', array('class'=>'form-control'));
          ?>
        </div>
        <div class="modal-footer">
          <?php
            echo $this->Form->submit(__('Send',true), array('class'=>'btn btn-info', 'div'=>false)); 
            echo $this->Form->end();
          ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>
</div>