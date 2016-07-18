<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Edit account</h3>
    </div>
    <div class="panel-body">
      <?php echo $this->Form->create('User', array('type' => 'file')); ?>
      <div class="avatar">
        <?php
          if (!empty($this->request->data['User']['avatar'])):
            echo $this->Html->image(h($this->request->data['User']['avatar']), array('alt' => 'avatar', 'class'=>'avatar-img'));
          else:
            echo $this->Html->image('icon-profile.png', array('alt' => 'avatar', 'class' => 'avatar-img'));
          endif;
          echo $this->Form->input('avatar', array('label'=>false, 'type'=>'file', 'class'=>'form-control', 'required' => false));
        ?>
      </div>
      <div class="info">
        <?php
          echo $this->Form->input('id',       array('class'=>'form-control'));
          echo $this->Form->input('name',     array('class'=>'form-control'));
          echo $this->Form->input('username', array('class'=>'form-control'));
          echo $this->Form->input('password', array('class'=>'form-control', 'value' => '','autocomplete'=>'off', 'required'=>false));
          echo $this->Form->input('email',    array('class'=>'form-control'));
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
</div>
