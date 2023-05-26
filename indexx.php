<?php
include_once 'session.php';
if ($pos==="Supervisor"){
 header("location:indexxx.php");
}
else if ($pos==="Admin"){
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kiyowo BookStore</title>
  <style type="text/css">
    /* Importing fonts from Google */
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');
    * 
    {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Ubuntu', sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-image: url(background2.png);
    }

    .container {
      position: relative;
      width: 1200px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    .container .serviceBox {
      position: relative;
      width: 350px;
      height: 280px;
      background: #8E629B;
      border-radius: 20px;
      overflow: hidden;
    }

    .container .serviceBox .icon {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: var(--i);
      transition: 0.5s;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 2;
      transition-delay: 0.25s;
    }

    .container .serviceBox:hover .icon {
      top: 30px;
      left: calc(50% - 40px);
      width: 80px;
      height: 80px;
      border-radius: 50%;
      transition-delay: 0s;
    }

    .container .serviceBox .icon ion-icon {
      font-size: 5em;
      color: #fff;
      transition: 0.5s;
      transition-delay: 0.25s;
    }

    .container .serviceBox:hover .icon ion-icon {
      font-size: 2em;
      transition-delay: 0s;
    }

    .container .serviceBox .content {
      position: relative;
      padding: 20px;
      color: #fff;
      text-align: center;
      margin-top: 100px;
      z-index: 1;
      transform: scale(0);
      transition: 0.5s;
      transition-delay: 0s;
    }

    .container .serviceBox:hover .content {
      transform: scale(1);
      transition-delay: 0.25s;
    }

    .container .serviceBox .content h2 {
      margin-top: 10px;
      margin-bottom: 5px;
    }

    .container .serviceBox .content p {
      font-weight: 300;
      line-height: 1.5em;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="page-title home text-center">
              <span class="heading-page" style="color: white; font-family: 'b Bagian'; font-size: 66px;"> Welcome to Kiyowo BookStore
              </span>
            </div>
    <a class="serviceBox" href="products.php" style="text-decoration: none;">
      <div class="icon" style="--i:#4eb7ff">
        <ion-icon name="cube-outline"></ion-icon>
      </div>
      <div class="content">
        <h2>Products</h2>
        <p>Read products to the exisiting product list</p>
      </div>
    </a>
    <a class="serviceBox" href="customers.php" style="text-decoration: none;">
      <div class="icon" style="--i:#689b62">
        <ion-icon name="people-outline"></ion-icon>
      </div>
      <div class="content">
        <h2>Customers</h2>
        <p>Read customers to the existing customer list</p>
      </div>
    </a>
    <a class="serviceBox" href="orders.php" style="text-decoration: none;">
      <div class="icon" style="--i:#cd57ff">
        <ion-icon name="cart-outline"></ion-icon>
      </div>
      <div class="content">
        <h2>Orders</h2>
        <p>Create & read orders to the existing order list</p>
      </div>
    </a>
    <a class="serviceBox" href="logout.php" style="text-decoration: none;">
      <div class="icon" style="--i:#ffb508">
        <ion-icon name="log-in-outline"></ion-icon>
      </div>
      <div class="content">
        <h2>Logout</h2>
        <p>Logout from the system</p>
      </div>
    </a>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>