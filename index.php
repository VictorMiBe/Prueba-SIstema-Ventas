<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<?php include('includes/header.php')?>
  <body>
    <?php if(!empty($user)): ?>
      
      <div class="nav nav-expanded" id="nav">
        <div class="icon-nav" id="icon-nav">
        <span><?= $user['email']; ?></span><i class="icon-menu"></i>
        </div>
        <div class="img-nav">
          <a href="#"><img src="./img/image 1.jpg"></a>
        </div>
        <div class="collection-buttons">
          <ul class="section-buttons">
            <a href="#">
              <li>
                <i class="icon-home"></i>
                <span>Pedidos</span>
              </li>
            </a>
            <a href="#">
              <li>
                <i class="icon-library"></i>
                <span>Clientes</span>
              </li>
            </a>
            <a href="#">
              <li>
                <i class="icon-images"></i>
                <span>Comerciales</span>
              </li>
            </a>
            <a href="cambiarContra.php">
              <li>
                <i class="icon-folder-open"></i>
                <span>Cambiar Contra</span>
              </li>
            </a>
            <a href="signup.php">
              <li>
                <i class="icon-home"></i>
                <span>Agregar Admin</span>
              </li>
            </a>
          </ul>
        </div>
			<a href="logout.php">
				<div class="btn-exit">
					<span>Desconectarse</span><i class="icon-exit"></i>
				</div>
			</a>
		</div>
    
    <?php else: ?>
      <?php require 'partials/header.php' ?>
      <?php header('Location:login.php'); ?>
    <?php endif; ?>
  </body>
</html>
