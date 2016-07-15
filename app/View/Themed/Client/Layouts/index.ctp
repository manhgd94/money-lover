<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $this->element('head') ?>
</head>
<body class="home">
<!-- Wrapper -->
<div class="wrapper">
  <!-- Header -->
  <div class="header">
    <div class="container">
      <?php echo $this->element('menu') ?>
    </div>    
  </div>
  <!-- End / Header -->
  <!-- Content -->
  <div class="content">
    <div class="container">
      <?php echo $this->Flash->render(); ?>
      <?php echo $this->fetch('content') ?>
    </div>    
  </div>
  <!-- End / Content -->
  <!-- Footer -->
  <footer class="footer">
    <?php echo $this->element('footer') ?>
  </footer>
  <!-- End / Footer -->
  <!-- js -->
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</div>
<!-- End / Wrapper -->
</body>
</html>