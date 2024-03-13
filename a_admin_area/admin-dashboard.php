<?php
session_start();
include './conn.php';
  if (!isset($_SESSION['admin_email'])) {
    header("Location: admin-login-page.php");
  } 

  $recent_orders = "SELECT o.order_id, o.customer_id, o.prod_id, o.quantity AS order_quantity, o.order_date, o.order_status, p.*, c.*
  FROM orders o, products p, customers c
  WHERE o.prod_id = p.prod_id AND o.customer_id = c.customer_id
  ORDER BY o.order_date DESC LIMIT 10";
  $recent_result = mysqli_query($mysqli, $recent_orders);

  $all_orders = "SELECT COUNT(*) AS all_orders
  FROM orders";
  $orders_result = mysqli_query($mysqli, $all_orders);
  $all_items = mysqli_fetch_assoc($orders_result);

  $all_sales = "SELECT COUNT(*) AS all_sales
  FROM orders
  WHERE order_status = 'Paid'";
  $sales_result = mysqli_query($mysqli, $all_sales);
  $sales_count = mysqli_fetch_assoc($sales_result);

  $all_returns = "SELECT COUNT(*) AS all_returns
  FROM orders
  WHERE order_status = 'Cancelled'";
  $return_result = mysqli_query($mysqli, $all_returns);
  $return_count = mysqli_fetch_assoc($return_result);

  $total_profit = "SELECT o.order_id, o.customer_id, o.prod_id, o.quantity AS order_quantity, o.order_date, o.order_status, p.*, c.*
  FROM orders o, products p, customers c
  WHERE o.prod_id = p.prod_id AND o.customer_id = c.customer_id AND order_status = 'Paid'";
  $profit_result = mysqli_query($mysqli, $total_profit);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">

    </div>
    <ul class="nav-links">
        <li>
          <a href="admin-dashboard.php" class="active">
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
          <a href="./paymentAdmin.php">
          <i class="bi bi-cash-coin"></i>
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

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number"><?=$all_items['all_orders']?></div>
            <!-- <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div> -->
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number"><?=$sales_count['all_sales']?></div>
            <!-- <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div> -->
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <?php
              if (mysqli_num_rows($profit_result) > 0) {
                $overall_profit = 0;
                while ($profit = mysqli_fetch_assoc($profit_result)) {
                  $quantity = $profit['order_quantity'];
                  $price = $profit['prod_price'];
                  $total_amount = $quantity * $price;

                  $overall_profit += $total_amount;
                  $formatted_overall_profit = number_format($overall_profit);
                }
              }
            ?>
            <div class="number">₱ <?=$formatted_overall_profit?></div>
            <!-- <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div> -->
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <div class="number"><?=$return_count['all_returns']?></div>
            <!-- <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div> -->
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Sales</div>
          <div class="sales-details">
            <table>
              <thead class="details">
                <th>ID</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Total</th>
              </thead>
              <tbody>
                <?php
                  if (mysqli_num_rows($recent_result) > 0) {
                    while ($recents = mysqli_fetch_assoc($recent_result)) {
                      $total_price = $recents['order_quantity'] * $recents['prod_price'];
                      $formatted_total_price = number_format($total_price);
                      ?>
                      <tr>
                        <td><?=$recents['order_id']?></td>
                        <td><?=$recents['username']?></td>
                        <td><?=$recents['order_status']?></td>
                        <td>₱ <?=$formatted_total_price?></td>
                      </tr>
                  <?php  }
                  }
                ?>
              </tbody>
            </table>
          </div>
          <div class="button">
            <a href="./orderList.php">See All</a>
          </div>
        </div>

      </div>
    </div>
  </section>

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

