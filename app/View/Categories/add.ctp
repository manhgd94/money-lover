<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Edit category</h3>
    </div>
    <div class="panel-body">
    <?php echo $this->Form->create('Category'); ?>
    <?php
      echo $this->Form->input('pid', array(
        'type'    => 'select',
        'options' => $opt, // typically set from $this->find('list') in controller 
        'label'   => 'Nhóm chính',
        'default' => '',
        'empty'   => 'Đặt làm nhóm chính',
        // 'value' => $arrProjectLeaderDetails['id'],  // specify default value 
        'escape'  => false,  // prevent HTML being automatically escaped
        'error'   => false,
        'class'   => 'form-control',
        'required'=> false
      ));
      echo $this->Form->input('name', array('class' => 'form-control'));
      $options    = array('0' => 'Thu', '1' => 'Chi');
      $attributes = array('legend' => false);
      echo $this->Form->radio('type', $options, $attributes);
    ?>
    <br>
    <?php
      echo $this->Form->submit(__('Create',true), array('class' => 'btn btn-success'));
      echo "<button class='btn btn-default' onclick='goBack()'>Go Back</button>";
      echo $this->Form->end();
    ?>
    </div>
  </div>
</div>
