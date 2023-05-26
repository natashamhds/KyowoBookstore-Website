<nav class="navbar navbar-default">
  <div class="container-fluid" style="background: #CA96BA">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="color: white; font-size: 20px; font-family: 'Arial';">Kiyowo BookStore</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if($pos==="Admin"){ ?>
          <li><a href="#" disabled="disabled" style="color: white"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: white"></span>  <?php echo $name; ?> (Admin)</a></li>
        <?php } ?>
        <?php if($pos==="Staff"){ ?>
         <li><a href="#" disabled="disabled" style="color: white"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: white"></span>  <?php echo $name; ?> (Normal Staff)</a></li>
       <?php } ?>
       <?php if($pos==="Supervisor"){ ?>
         <li><a href="#" disabled="disabled" style="color: white"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: white"></span>  <?php echo $name; ?> (Supervisor)</a></li>
       <?php } ?>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: white;">Menu<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php if($pos==="Admin" || $pos==="Staff" || $pos==="Supervisor"){ ?>
            <li><a href="products.php"><span class="glyphicon glyphicon-usd" aria-hidden="true" style="color: #B590B9"></span> Products</font></a></li>
            <li><a href="customers.php"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: #B590B9"></span> Customers</font></a></li>
            <?php if($pos==="Admin" || $pos==="Supervisor"){ ?>
              <li><a href="staffs.php"><span class="glyphicon glyphicon-user" aria-hidden="true" style="color: #B590B9"></span> Staffs</a></font></li>
            <?php } ?>
            <li><a href="orders.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="color: #B590B9"></span> Orders</a></font></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true" style="color: #B590B9"></span> Logout</a></li>
          <?php } ?>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>