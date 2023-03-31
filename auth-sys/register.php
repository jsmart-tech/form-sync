<?php require "includes/header.php"; ?>

<?php require "includes/config.php"; ?>



<?php
if(isset($_SESSION['username'])){
  header("location:index.php");
}

if(isset($_POST["submit"])){

  if($_POST['email'] =='' OR $_POST['username'] == '' OR $_POST['password'] ==  ''){
    echo "<script>window.alert('some inputs are missing');</script>";
    
  }else {
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password']; 
    $query = "SELECT email FROM users";
    $result = $conn->query($query);
    
    // loop through existing emails to check for matches
    $email_taken = false;
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        if ($row['email'] == $email) {
            $email_taken = true;
            break; // exit the loop once a match is found
        }
    }
    
    if ($email_taken) {
      // email already taken, give the user an alert and stop from registering
      echo "<script>alert('Email has been registered by another user. Please choose another.');</script>";
      die; // stop from registering
      

    } 
    $insert = $conn->prepare("INSERT INTO users(email, username, mypassword)
      VALUES (:email, :username, :mypassword )");
 
    $insert-> execute([
      ':email'=> $email,
      ':username'=> $username,
      ':mypassword'=> password_hash($password, PASSWORD_DEFAULT),
    ]);
  
    echo "<script>window.alert('registration complete');</script>";
   
} 
}

?>


<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">
   
    <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">register</button>
    <h6 class="mt-3">Aleardy have an account?  <a href="login.php">Login</a></h6>

  </form>
</main>
<?php require "includes/footer.php"; ?>
