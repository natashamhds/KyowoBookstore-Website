<?php
include_once 'customers_crud.php';
include_once 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Kiyowo BookStore: Customers</title>
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

      <?php if($pos==="Admin" || $pos==="Supervisor" ){ ?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
              <div class="page-header">
                <h2>Create New Customer</h2>
              </div>
              <form action="customers.php" method="post" class="form-horizontal">
                <div class="form-group">
                  <label for="customerid" class="col-sm-3 control-label">Customer ID</label>
                  <div class="col-sm-9">
                    <input name="cid" type="text" class="form-control" placeholder="Customer ID" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_CUSTOMER_ID']; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="custname" class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" placeholder="Name" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_CUSTOMER_NAME']; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone" class="col-sm-3 control-label">Phone Number</label>
                  <div class="col-sm-9">
                    <input name="phone" type="text" class="form-control" placeholder="Phone Number" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_CUSTOMER_PHONENO']; ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <?php if (isset($_GET['edit'])) { ?>
                      <input type="hidden" name="oldcid" value="<?php echo $editrow['FLD_CUSTOMER_ID']; ?>">
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
        <?php } ?>

        <div class="row">
          <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="page-header">
              <h2>Customer List</h2>
            </div>
            <table class="table table-striped table-bordered" id="customer">
              <thead>
                <tr>
                 <th>Customer ID</th>
                 <th>Name</th>
                 <th>Phone Number</th>
                 <?php  if($pos==="Admin" || $pos==="Supervisor"){?>
                  <th></th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php
      // Read
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
              foreach($result as $readrow) {
                ?>
                <tr>
                 <td><?php echo $readrow['FLD_CUSTOMER_ID']; ?></td>
                 <td><?php echo $readrow['FLD_CUSTOMER_NAME']; ?></td>
                 <td><?php echo $readrow['FLD_CUSTOMER_PHONENO']; ?></td>
                 <?php if($pos==="Admin" || $pos=="Supervisor"){ ?>
                  <td>
                    <a href="customers.php?edit=<?php echo $readrow['FLD_CUSTOMER_ID']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
                  <?php } ?>
                  <?php if($pos==="Admin" || $pos=="Supervisor"){ ?>
                    <a href="customers.php?delete=<?php echo $readrow['FLD_CUSTOMER_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
                  <?php } ?>
                  </td>
                <?php } ?>  
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

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
          $('#customer').DataTable({
            lengthMenu: [
              [5, 10, 22, 30, -1],
              [5, 10, 22, 30, 'All'],
              ],
          });
        });
      </script>
    </body>
    </html>