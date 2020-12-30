<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us || Shoes Shop</title>
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
          <li class="active"><a href="about.php">About</a></li>
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




    <div class="row" style="margin-top:30px;">
      <div class="small-12">
      <h1>About Us</h1>
      <h3 style="color:#000033;">Chúng Tôi Làm gì?</h3>
        <p>Shoes Shop là nơi dành cho những đôi giày thể thao và dễ đi cho cả gia đình từ nhiều thương hiệu tên tuổi. Bạn sẽ khám phá phong cách dành cho phụ nữ, nam giới và trẻ em từ các thương hiệu như Nike, Converse, Vans, Sperry, Madden Girl, Skechers, ASICS và sau đó là một số! Với các cửa hàng ở Mỹ, Canada và nhiều sự lựa chọn trực tuyến hơn trên trang Famous.com và FamousFootwear.ca, Shoes Shop là mục tiêu chính về giày dép gia đình cho các thương hiệu phổ biến mà bạn biết và yêu thích.
      
        <h3 style="color:#000033;">Tại sao khách hàng yêu thích chúng tôi?</h3>
        <p>Chúng tôi đã hoạt động trong lĩnh vực kinh doanh được một thời gian, và thời gian đó chúng tôi không chỉ tạo được mối quan hệ thân thiết với nhiều nhà cung cấp trên toàn thế giới mà còn nhận ra những gì mọi người cần. Điều này có nghĩa là chúng tôi luôn có thể cung cấp tất cả các mẩu giày mới nhất, giá cả tốt, dịch vụ đáng tin cậy, giao hàng nhanh và hỗ trợ khách hàng cao cấp.</p>
        <p>Shoes Shop là một phần của công ty mẹ Inc., một tổ hợp các thương hiệu giày dép trên toàn thế giới. Được tham gia, những thương hiệu này cho phép tạo ra một tổ chức mẹ có cả một sự kế thừa và sứ mệnh. Sự kế thừa của tổ chức mẹ kết hợp hơn 130 kỹ năng thủ công lâu đời, lòng nhiệt tình rèn luyện sức khỏe và tài kinh doanh, với sứ mệnh tiếp tục thúc đẩy các cá nhân cảm thấy tốt hơn.</p>

        <footer>
           <p style="text-align:center; font-size:0.8em;">&copy; Shoes Shop. All Rights Reserved.</p>
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
