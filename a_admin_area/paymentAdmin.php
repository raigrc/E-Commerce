<?php
session_start();

include './conn.php';

  if (!isset($_SESSION['admin_email'])) {
    header("Location: admin-login-page.php");
  } 

  $get_payments = "SELECT o.order_id, o.customer_id, o.prod_id, o.quantity AS order_quantity, o.order_date, o.order_status, p.*, c.*, pay.*
  FROM orders o, products p, customers c, payments pay
  WHERE o.prod_id = p.prod_id AND o.customer_id = c.customer_id AND o.order_id = pay.order_id
  ORDER BY order_date DESC";
  $get_result = mysqli_query($mysqli, $get_payments);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="sidebar">
    <div class="logo-details">

    </div>
    <ul class="nav-links">
        <li>
          <a href="admin-dashboard.php" >
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
          <a href="orderList.php" >
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
          <a href="./paymentAdmin.php" class="active">
          <i class="bi bi-cash-coin" ></i>
            <span class="links_name">Payments</span>
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
    <div class="main-container">
      <section class="users-container">
        <!-- <div class="notif-search">
            <img src="./images/admin-dashboard/notif-icon.svg" alt="">
            <form action="">
                <input type="search" name="search" id="search">
                <label for="search"><img src="./images/admin-dashboard/search-icon.svg" alt=""></label>
            </form>
        </div> -->
        <div class="users-content">
            <div class="content-header">
                <div class="header-left">
                    <h1>Products</h1>
                    <!-- <button type="button"><a href="admin-add-users-page.php">Order Product</a></button> -->
                </div>
                <!-- <div class="header-right">
                    <div class="sort">
                        <img src="./images/admin-resorts/sort-icon.svg" alt="">
                        <p>Sort</p>
                    </div>
                    <div class="filter">
                        <img src="./images/admin-resorts/filter-icon.svg" alt="">
                        <p>Filter</p>
                    </div>
                </div> -->
            </div>
            <table class="users-tbl">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Amount</th>
                        <th>Mode of Payment</th>
                        <th>Date of Payment</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    if (mysqli_num_rows($get_result) > 0) {

                      while($orders = mysqli_fetch_assoc($get_result)) {
                        $total_price = $orders['order_quantity'] * $orders['prod_price'];
                        ?>
                        <tr>
                          <td><?=$orders['prod_id']?></td>
                          <td><?=$orders['username']?></td>
                          <td><?=$orders['prod_name']?></td>
                          <td><?=$orders['amount']?></td>
                          <td><?=$orders['payment_mode']?></td>
                          <td><?=$orders['payment_date']?></td>
                        </tr>
                    <?php  }
                    }
                  ?>
                  </tbody>
            </table>
        </div>
    </section>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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

