<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if (isset($_SESSION["username"])) {header ("location:../index.php");}

$fnameErr = $lnameErr = $addressErr = $cityErr = $emailErr = $passwordErr = "";

//check input user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "First name is required";
  }
  else if (empty($_POST["lname"])) {
    $lnameErr = "Last name is required";
  }
  else if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }
  else if (empty($_POST["pwd"])) {
    $passwordErr = "Password is required";
  }
  else if (strlen($_POST["pwd"]) < 6) {
    $passwordErr = "Password must be at least 6 characters";
  }
  else {
    include 'insert.php';
  }
}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register ||Shoes Shop</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="../index.php">Shoes Shop</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li class="active"><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>


    <!-- <form method="POST" action="insert.php" style="margin-top:30px;"> -->
    <form method="POST" action="" style="margin-top:30px;">
      
      <div class="row">
        <div class="small-8">
          <div class="row">
          <p class="error">* Required field</p>
            <div class="small-4 columns">
              <label for="right-label" class="right inline">First Name</label>
            </div>
            <div class="small-7 columns">
              <input type="text" id="right-label" placeholder="Nguyen" name="fname">
              <p class="error"><?php echo $fnameErr; ?></p>
            </div>
            <div class="small-1 columns">*</div>
          </div>

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Last Name</label>
            </div>
            <div class="small-7 columns">
              <input type="text" id="right-label" placeholder="Nam" name="lname">
              <p class="error"><?php echo $lnameErr; ?></p>
            </div>
            <div class="small-1 columns">*</div>
          </div>

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Address</label>
            </div>
            <div class="small-7 columns">
              <input type="text" id="right-label" placeholder="KTX A" name="address">
            </div>
            <div class="small-1 columns"></div>
          </div>

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">City</label>
            </div>
            <div class="small-7 columns">
              <input type="text" id="right-label" placeholder="Ho Chi Minh" name="city">
            </div>
            <div class="small-1 columns"></div>
          </div>
          
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">E-Mail</label>
            </div>
            <div class="small-7 columns">
              <input type="email" id="right-label" placeholder="nguyenvana@example.com" name="email">
              <p class="error"><?php echo $emailErr; ?></p>
            </div>
            <div class="small-1 columns">*</div>
          </div>

          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Password</label>
            </div>
            <div class="small-7 columns">
              <input type="password" id="right-label" name="pwd">
              <p class="error"><?php echo $passwordErr; ?></p>
            </div>
            <div class="small-1 columns">*</div>
          </div>

          <div class="row">
            <div class="small-4 columns">
            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Register" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer>
           <p style="text-align:center; font-size:0.8em;">Shoes Shop. All Rights Reserved.</p>
        </footer>

      </div>
    </div>




    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
