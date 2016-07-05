<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Create account</h3>
    </div>
    <div class="panel-body">
      <?php echo $this->Form->create('User', array('type' => 'file')); ?>
      <div class="avatar">
        <?php 
          echo $this->Html->image('icon-profile.png', array('alt' => 'avatar', 'class' => 'avatar-img'));
          echo $this->Form->input('avatar', array('label'=>false, 'type' => 'file', 'class' => 'form-control', 'required' => false));
        ?>
      </div>
      <div class="info">
        <?php
          echo $this->Form->input('name',     array('class' => 'form-control'));
          echo $this->Form->input('username', array('class' => 'form-control'));
          echo $this->Form->input('password', array('class' => 'form-control'));
          echo $this->Form->input('email',    array('class' => 'form-control'));
        ?>
        <br>
        <?php
          echo $this->Form->submit(__('Create',true), array('class' => 'btn btn-success')); 
          echo $this->Form->end();
        ?>
      </div>
    </div>
  </div>
</div>
