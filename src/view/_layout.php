<html>
  <?php require '_head.php'; ?>
  <body>
     
  <ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a href="study">Study</a></li>
    <li><a href="test">Test</a></li>
    <?php if(isset($_SESSION['username'])): ?>
      <li><a href="/logout">Logout</a></li>
    <?php endif; ?>
  </ol>
  
  <div class="container">
    <div class="panel">
      <?php echo $content; ?>
    </div>
  </div>
    <?php require '_footer.php'; ?>
  </body>
</html>
