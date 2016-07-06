<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <?php echo $this->Html->link('Money lover',array('controller'=>'home', 'action'=>'index'), array('class'=>'navbar-brand')) ?>
    </div>
    <ul class="nav navbar-nav">
    <li <?php if(isset($active) && $active == 'category') echo "class='active'"; ?>><?php echo $this->Html->link('Categories',array('controller'=>'categories', 'action'=>'index')) ?></li>
    <li <?php if(isset($active) && $active == 'wallet') echo "class='active'"; ?>><?php echo $this->Html->link('Wallets',array('controller'=>'wallets', 'action'=>'index')) ?></li>
    <li <?php if(isset($active) && $active == 'transaction') echo "class='active'"; ?>><?php echo $this->Html->link('Transactions',array('controller'=>'transactions', 'action'=>'index')) ?></li>
    <li <?php if(isset($active) && $active == 'user') echo "class='active'"; ?>><?php echo $this->Html->link('Users',array('controller'=>'users', 'action'=>'index')) ?></li>
    <?php if(isset($userlogin)): ?>
      <li><?php echo $this->Html->link('Logout',array('controller'=>'users', 'action'=>'logout')) ?></li>
    <?php endif ?>
    <?php if(!isset($userlogin)): ?>
      <li  <?php if(isset($active) && $active == 'login') echo "class='active'"; ?>><?php echo $this->Html->link('Login',array('controller'=>'users', 'action'=>'login')) ?></li>
    <?php endif ?>
    </ul>
  </div>
</nav>