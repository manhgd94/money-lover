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
      <?php
        echo $this->Html->link('Create an account', array('controller'=>'users', 'action'=>'add'));
        echo "<span class='space'>|</span>";
        echo $this->Html->link('Forgot password', array('controller'=>'users', 'action'=>'forgetpwd')); ?>
    </div>
    <?php echo $this->Form->end();?>
  </div>
</div>