<?php
session_start();

  if (!isset($_SESSION['admin_email'])) {
    header("Location: admin-login-page.php");
  } else {

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/admin-add-products.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
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
                        <h1>Add Products</h1>
                    </div>
                </div>
                <div class="userid-num">
                    
                </div>
                <form action="upload-products.php" method="post" enctype="multipart/form-data">
                <input type="hidden" id="admin-id">
                    <div class="form-item">
                        <label for="category">Categories</label>
                    <select name="category" id="category">
                        <option value="">Categories</option>
                        <option value="men">Men</option>
                        <option value="women">Women</option>
                        <option value="footwear">Footwear</option>
                    </select>
                    </div>
                    <div class="form-item">
                        <label for="prod_name">Product Name</label>
                        <input type="text" name="prod_name" id="prod_name">
                    </div>
                    <div class="form-item">
                        <label for="prod_price">Product Price</label>
                        <input type="text" name="prod_price" id="prod_price">
                    </div>
                    <div class="form-item">
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" id="quantity">
                    </div>
                    <div class="form-item">
                    <textarea name="prod_desc" id="prod_desc" placeholder="Product Description"></textarea>
                    </div>
                    <div class="form-item">
                    <input type="file" name="prod_img">
                    </div>
                    <div class="form-item">
                    <input type="file" name="prod_img2">
                    </div>
                    <input type="submit" name="submit" value="submit">
                </form>
            </div>
        </section>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>