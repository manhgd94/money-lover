<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Create transaction</h3>
    </div>
    <div class="panel-body">
      <?php
        echo $this->Form->create('Transaction', array(
          'class' => 'form',
          'role'  => 'form',
          'inputDefaults' => array(
            'div'     => array('class' => 'form-group'),
            'label'   => array('class' => 'control-label'),
            'error'   => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        )));
        echo $this->Form->input('wallet_id',   array('class'=>'form-control'));
        echo $this->Form->input('category_id', array('class'=>'form-control'));
        echo $this->Form->input('name',        array('class'=>'form-control'));
        echo $this->Form->input('note',        array('class'=>'form-control'));
        echo $this->Form->input('money',       array('class'=>'form-control'));
        echo $this->Form->submit(__('Create',true), array('class' => 'btn btn-success'));
        echo "<button class='btn btn-default' onclick='goBack()'>Go Back</button>";
        echo $this->Form->end();
      ?>
    </div>
  </div>
</div>
