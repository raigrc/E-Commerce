<?php
session_start();
require 'conn.php';

  if (!isset($_SESSION['admin_email'])) {
    header("Location: admin-login-page.php");
  }

  $cust_id = $_GET['id'];
  $customers = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM customers where customer_id ='$cust_id'"));
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/admin-add-products.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body>
  <div class="sidebar">
    <div class="logo-details">

    </div>
      <ul class="nav-links">
        <li>
          <a href="admin-dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="productAdmin.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Product</span>
          </a>
        </li>
        <li>
          <a href="orderList.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order list</span>
          </a>
        </li>
        <li>
          <a href="userAdmin.php">
          <i class="bi bi-people-fill"></i>
            <span class="links_name">Users</span>
          </a>
        </li>
        <li>
          <a href="setting.php">
          <i class="bi bi-gear-wide-connected"></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="admin-logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name"><?=$_SESSION['admin_name']?></span>
      </div>
    </nav>

    <section class="user-update-container">
            <div class="update-content">
                <div class="content-header">
                    <div class="header-left">
                        <h1>Admin Add Customers</h1>
                    </div>
                </div>
                <div class="userid-num">
                    
                </div>
                <form id="update_customer_form" action="" method="post">
                    <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customers['customer_id']?>">
                    <div class="form-item">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?php echo $customers['username']?>">
                    </div>
                    <div class="form-item">
                        <label for="email_address">Email address</label>
                        <input type="email" name="email_address" id="email_address" value="<?php echo $customers['email_address']?>">
                    </div>
                    <div class="form-item">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" value="<?php echo $customers['password']?>">
                    </div>
                    <div class="form-item">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="<?php echo $customers['address']?>">
                    </div>
                    <div class="form-item">
                        <label for="number">Mobile Number</label>
                        <input type="text" name="number" id="number" value="<?php echo $customers['mobile_number']?>">
                    </div>
                    <button type="button" id="update_customer">Update</button>
                    <!-- <input type="submit" name="upd-btn" value="add"> -->
                </form>
            </div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="./js/update_customers.js"></script>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

