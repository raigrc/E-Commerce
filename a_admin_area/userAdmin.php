<?php
  session_start();
  include ("./conn.php");

  if (!isset($_SESSION['admin_email'])) {
    header("Location: admin-login-page.php");
  }

  $customers_tbl = "SELECT * FROM customers";
  $result_customer = mysqli_query($mysqli, $customers_tbl);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
          <a href="orderList.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order list</span>
          </a>
        </li>
        <li>
          <a href="userAdmin.php" class="active">
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
   <div class="main-container">
    <section class="users-container">
      <div class="users-content">
          <div class="content-header">
              <div class="header-left">
                  <h1>All Users</h1>
                  <button type="button"><a href="admin-add-customers.php">Add User</a></button>
              </div>
          </div>
          <table class="users-tbl">
              <thead>
                  <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Date Registered</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                    <?php
                      if (mysqli_num_rows($result_customer) > 0) {

                          while ($customers = mysqli_fetch_assoc($result_customer)) {  
                            $customer_id = $customers['customer_id'];?>
                          <tr>
                            <td class="cust_id"><?=$customer_id?></td>
                            <td><?=$customers['username']?></td>
                            <td><?=$customers['email_address']?></td>
                            <td><?=$customers['date_added']?></td>
                            <td class="upd-dlt">
                              <div class="upd-dlt-option">
                                <button type="button" name="upd-btn"><a href="./admin-update-customers.php?id=<?php echo ($customer_id);?>">update</a></button>
                                <button type="button" name="dlt-btn"><a href="">delete</a></button>
                              </div>
                              <i class="bi bi-three-dots-vertical"></i>
                            </td>
                          </tr>
                      <?php    }
                      }
                    ?>
                  </tr>
              </tbody>    
          </table>
      </div>
  </section>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  
  <script src="./js/delete_customers.js"></script>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if(sidebar.classList.contains("active")){
        sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
      }else {
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    }
 </script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="./js/actions_customers.js"></script>
</body>
</html>

