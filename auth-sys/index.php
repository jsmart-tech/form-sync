<?php require "includes/header.php"; ?>

<?php require "includes/footer.php"; ?>
<?php
  if(isset($_SESSION['username'])) {
    // Display the username
    echo "Welcome, " . $_SESSION['username'] . "!<br>";
  }
  
?>
