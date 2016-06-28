<?php echo $this->Form->create('User',array('class'=>false,'inputDefaults'=>array())); ?>
<div class="login-container">
	<div class="well-login">
		<div class="control-group">
			<div class="controls">
				<div>
				<?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'placeholder'=>'Tài khoản',"class"=>"login-input user-name"));?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div>
				<?php echo $this->Form->input('password',array('placeholder'=>'Mật khẩu','class'=>"login-input user-pass",'label'=>false,'div'=>array('class'=>'form_loginpass')));?>
				</div>
			</div>
		</div>
		<div class="clearfix">
			<?php echo $this->Form->submit('Đăng nhập',array('class'=>'btn btn-inverse login-btn')); ?>
			<?php echo $this->Form->end();?>
		</div>
		<div class="remember-me">
			<?php echo $this->Form->checkbox('remember_me'); ?> Nhớ mật khẩu
		</div>
	</div>
</div>