<?php 

// require __DIR__ . '/settings.php';

?>

<nav>
    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>

    <a href="logout.php">Logout</a>

    <?php  else: ?>

    <a href="login.php">Login</a>
    <a href="register.php">Join</a>

    <?php  endif; ?>
    
</nav>