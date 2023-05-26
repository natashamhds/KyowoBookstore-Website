<?php
include_once 'orders_crud.php';
include_once 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Kiyowo BookStore: Orders</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Script Datatable-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>

      <?php include_once 'nav_bar.php'; ?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="page-header">
              <h2>Create New Order</h2>
            </div>
            <form action="orders.php" method="post" class="form-horizontal">
              <div class="form-group">
                <label for="orderid" class="col-sm-3 control-label">Order ID</label>
                <div class="col-sm-9">
                  <input name="oid" type="text" class="form-control" id="orderid" placeholder="Order ID" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_num']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="orderdate" class="col-sm-3 control-label">Order Date</label>
                <div class="col-sm-9">
                  <input name="orderdate" type="text" class="form-control" id="orderdate" placeholder="Order Date" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_date']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="staffname" class="col-sm-3 control-label">Staff</label>
                <div class="col-sm-9">
                  <select name="sid" class="form-control" id="staffname" required>
                    <?php
                    try {
                      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a180900_mypt2");
                      $stmt->execute();
                      $result = $stmt->fetchAll();
                    }
                    catch(PDOException $e){
                      echo "Error: " . $e->getMessage();
                    }
                    foreach($result as $staffrow) {
                      ?>
                      <?php if((isset($_GET['edit'])) && ($editrow['FLD_STAFF_ID']==$staffrow['FLD_STAFF_ID'])) { ?>
                        <option value="<?php echo $staffrow['FLD_STAFF_ID']; ?>" selected><?php echo $staffrow['FLD_STAFF_NAME'];?></option>
                      <?php } else { ?>
                        <option value="<?php echo $staffrow['FLD_STAFF_ID']; ?>"><?php echo $staffrow['FLD_STAFF_NAME'];?></option>
                      <?php } ?>
                      <?php
                      } // while
                      $conn = null;
                      ?> 
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="custname" class="col-sm-3 control-label">Customer</label>
                  <div class="col-sm-9">
                    <select name="cid" class="form-control" id="custname" required>
                      <?php
                      try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT * FROM tbl_customers_a180900_mypt2");
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                      }
                      catch(PDOException $e){
                        echo "Error: " . $e->getMessage();
                      }
                      foreach($result as $custrow) {
                        ?>
                        <?php if((isset($_GET['edit'])) && ($editrow['FLD_CUSTOMER_ID']==$custrow['FLD_CUSTOMER_ID'])) { ?>
                          <option value="<?php echo $custrow['FLD_CUSTOMER_ID']; ?>" selected><?php echo $custrow['FLD_CUSTOMER_NAME']?></option>
                        <?php } else { ?>
                          <option value="<?php echo $custrow['FLD_CUSTOMER_ID']; ?>"><?php echo $custrow['FLD_CUSTOMER_NAME']?></option>
                        <?php } ?>
                        <?php
                        } // while
                        $conn = null;
                        ?> 
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <?php if (isset($_GET['edit'])) { ?>
                        <input type="hidden" name="oldoid" value="<?php echo $editrow['fld_order_num']; ?>">
                        <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
                      <?php } else { ?>
                        <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
                      <?php } ?>
                      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <div class="page-header">
                  <h2>Order List</h2>
                </div>
                <table class="table table-striped table-bordered">
                  <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Staff</th>
                    <th>Customer</th>
                    <th></th>
                  </tr>
                  <?php
                  // Read
                  try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM tbl_orders_a180900, tbl_staffs_a180900_mypt2, tbl_customers_a180900_mypt2 WHERE ";
                    $sql = $sql."tbl_orders_a180900.fld_staff_num = tbl_staffs_a180900_mypt2.FLD_STAFF_ID and ";
                    $sql = $sql."tbl_orders_a180900.fld_customer_num = tbl_customers_a180900_mypt2.FLD_CUSTOMER_ID";
                    $stmt = $conn->prepare("$sql");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                  }
                  catch(PDOException $e){
                    echo "Error: " . $e->getMessage();
                  }
                  foreach($result as $orderrow) {
                    ?> 
                    <tr>
                      <td><?php echo $orderrow['fld_order_num']; ?></td>
                      <td><?php echo $orderrow['fld_order_date']; ?></td>
                      <td><?php echo $orderrow['FLD_STAFF_NAME']; ?></td>
                      <td><?php echo $orderrow['FLD_CUSTOMER_NAME']; ?></td>
                      <td>
                        <a href="orders_details.php?oid=<?php echo $orderrow['fld_order_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
                        <?php if($pos==="Admin" || $pos==="Supervisor" ){ ?>
                          <a href="orders.php?edit=<?php echo $orderrow['fld_order_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
                          <?php if($pos==="Admin" || $pos==="Supervisor"){ ?>
                            <a href="orders.php?delete=<?php echo $orderrow['fld_order_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
                            <?php } ?></td>
                          </td>
                          ><?php } ?>
                        </tr>
                      <?php } ?>
                    </table>
                  </div>
                </div>
              </div>

              <script type="text/javascript">
                $(document).ready( function () {
                  $('#table-striped table-bordered').DataTable();
                } );
              </script>
              
              <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
              <!-- Include all compiled plugins (below), or include individual files as needed -->
              <script src="js/bootstrap.min.js"></script>
              <!-- Datatable jQuery-->
              <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
              <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
              <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
              <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
              <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
              <!-- DataTable Script-->
              <script>
                $(document).ready(function () {
                  $('#orders').DataTable({
                    lengthMenu: [
                      [5, 10, 22, 30, -1],
                      [5, 10, 22, 30, 'All'],
                      ],
                  });
                });
              </script>

            </body>
            </html>