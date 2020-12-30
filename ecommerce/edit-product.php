
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
    <title>Admin || Shoes Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Shoes Shop</a></h1>
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


    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>Thay đổi thông tin sản phẩm</h3></br>
        <?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$name = $_POST["name"];
		$code = $_POST["code"];
		$description = $_POST["description"];
		$price = $_POST["price"];

        $id = $_POST["id"];
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE products SET product_name = '$name', product_code = '$code', product_desc = '$description', price = '$price' WHERE id=$id";
		// thực thi câu $sql với biến conn lấy từ file config.php
        mysqli_query($mysqli,$sql);
        
		header('Location: add-product.php');
	}

	


        ?>
        <?php
        $id = $_GET['id'];
          $result = $mysqli->query("SELECT * from products where id = " .$id);
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<div class="large-10 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';

            }
          }
        ?>
    

    <?php
    $sql = "SELECT * FROM products WHERE id = ".$id;
	$query = mysqli_query($mysqli,$sql);
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$id = $data['id'];
            
            
            
	?>
    <form action="edit-product.php" method="post">
		<table>
			<tr>
				<td colspan="2">
					<h3>Chỉnh sửa thông tin sản phẩm</h3>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
				</td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Tên :</td>
				<td><input type ="text" name="name" id="name" value="<?php echo $data['product_name']; ?>"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Code :</td>
				<td><input type="text" id="code" name="code" value="<?php echo $data['product_code']; ?>"></td>
			</tr>
			<tr>
                <td nowrap="nowrap">Desc :</td>
				<td><input type="text" id="description" name="description" value="<?php echo $data['product_desc']; ?>"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Giá :</td>
				<td><input type="text" id="price" name="price" value="<?php echo $data['price']; ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Cập nhật thông tin"></td>
			</tr>

		</table>
		
	</form>

    <?php } ?>

        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; Shoes Shop. All Rights Reserved.</p>
        </footer>

      </div>
    </div>





    
  </body>
</html>
