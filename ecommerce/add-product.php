<?php
	session_start(); 
 ?>
<?php require_once("config.php");?>

<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin || BOLT Sports Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">BOLT Sports Shop</a></h1>
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
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>

<?php
    $sql = "SELECT * FROM products";
    $query = mysqli_query($mysqli,$sql);
?>
<?php
    if (isset($_GET["id_delete"])) {
		$sql = "DELETE FROM products WHERE id = ".$_GET["id_delete"];
		mysqli_query($mysqli,$sql);
	}
	
?>



    <table border="1px;" align="center">
	<thead>
		<tr>
			<td bgcolor="#E6E6FA">ID</td>
			<td bgcolor="#E6E6FA">Code</td>
			<td bgcolor="#E6E6FA">Name</td>
			<td bgcolor="#E6E6FA">Description</td>
			<td bgcolor="#E6E6FA">Image</td>
            <td bgcolor="#E6E6FA">Qty</td>
            <td bgcolor="#E6E6FA">Price</td>
            <td bgcolor="#E6E6FA">Hành động</td>
		<tr>
	</thead>
	<tbody>
	<?php 
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$id = $data['id'];
	?>
		<tr>
			<td><?php echo $id; ?></td>
			<td><?php echo $data['product_code']; ?></td>
			<td><?php echo $data['product_name']; ?></td>
			<td><?php echo $data['product_desc']; ?></td>
            <td><?php echo '<img src="images/products/'.$data['product_img_name'].'"/>' ?></td>
			<td><?php echo $data['qty']; ?></td>
            <td><?php echo $data['price']; ?></td>
			<td>
				<a href="edit-product.php?id=<?php echo $id;?>">Sửa</a> |
				<a href="add-product.php?id_delete=<?php echo $id;?>">Xóa</a>
			</td>
		</tr>
	<?php 
			$i++;
		}
	?>
	</tbody>
</table>




    <footer style="margin-top:10px;">
        <p style="text-align:center; font-size:0.8em;">&copy; BOLT Sports Shop. All Rights Reserved.</p>
    </footer>

      





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>