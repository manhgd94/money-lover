<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo $this->Html->link('Money lover',array('controller'=>'home', 'action'=>'index'), array('class'=>'navbar-brand')) ?>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
      <li <?php if(isset($active) && $active == 'category') echo "class='active'"; ?>><?php echo $this->Html->link('Categories',array('controller'=>'categories', 'action'=>'index')) ?></li>
      <li <?php if(isset($active) && $active == 'wallet') echo "class='active'"; ?>><?php echo $this->Html->link('Wallets',array('controller'=>'wallets', 'action'=>'index')) ?></li>
      <li <?php if(isset($active) && $active == 'transaction') echo "class='active'"; ?>><?php echo $this->Html->link('Transactions',array('controller'=>'transactions', 'action'=>'index')) ?></li>
      <li <?php if(isset($active) && $active == 'user') echo "class='active'"; ?>><?php echo $this->Html->link('Users',array('controller'=>'users', 'action'=>'index')) ?></li>
      </ul>
      <ul class="nav navbar-nav pull-right push">
        <?php if(isset($userlogin)): ?>
          <li><a><?php echo "Hello " .$userlogin['name']; ?></a></li>
          <li><?php echo $this->Html->link('Logout',array('controller'=>'users', 'action'=>'logout')) ?></li>
        <?php endif ?>
        <?php if(!isset($userlogin)): ?>
          <li  <?php if(isset($active) && $active == 'login') echo "class='active'"; ?>><?php echo $this->Html->link('Login',array('controller'=>'users', 'action'=>'login')) ?></li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>
