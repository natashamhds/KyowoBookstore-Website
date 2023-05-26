<?php
include_once 'database.php';
include_once 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Kiwoyo BookStore: Products Details</title>
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
      <style>
        img {
          display: block;
          margin-left: auto;
          margin-right: auto;
        }
      </style>
    </head>
    <body>

      <?php
      try {
        $stmt = $conn->prepare("SELECT * FROM tbl_products_a180900_mypt2 WHERE FLD_PRODUCT_ID = :pid");
        $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
        $pid = $_GET['pid'];
        $stmt->execute();
        $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
      catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
      ?>

      <div class="container-fluid" style='text-align: center;'>
        <div class="row">
          <div class="panel panel-default" style='display: inline-block; margin: 0 auto; padding: 3px; width: 50%;'>
            <?php if ($readrow['FLD_IMAGE'] == "" ) {
              echo "No image";
            }
            else { ?>
              <img src="products/<?php echo $readrow['FLD_IMAGE'] ?>" class="img-responsive">
            <?php } ?>
          </div>
          <br>
          <div class="panel panel-default" style='display: inline-block; margin: 0 auto; padding: 3px;'>
            <div class="panel panel-default">
              <div class="panel-heading"><strong>Product Details</strong></div>
              <div class="panel-body">
                Below are specifications of the product.
              </div>
              <table class="table">
                <tr>
                  <td class="col-xs-4 col-sm-4 col-md-4"><strong>Product ID</strong></td>
                  <td><?php echo $readrow['FLD_PRODUCT_ID'] ?></td>
                </tr>
                <tr>
                  <td><strong>Name</strong></td>
                  <td><?php echo $readrow['FLD_PRODUCT_NAME'] ?></td>
                </tr>
                <tr>
                  <td><strong>Price</strong></td>
                  <td>RM <?php echo $readrow['FLD_PRICE'] ?></td>
                </tr>
                <tr>
                  <td><strong>Type</strong></td>
                  <td><?php echo $readrow['FLD_TYPE'] ?></td>
                </tr>
                <tr>
                  <td><strong>Language</strong></td>
                  <td><?php echo $readrow['FLD_LANGUAGE'] ?></td>
                </tr>
                <tr>
                  <td><strong>Publisher</strong></td>
                  <td><?php echo $readrow['FLD_PUBLISHER'] ?></td>
                </tr>
                <tr>
                  <td><strong>Author</strong></td>
                  <td><?php echo $readrow['FLD_AUTHOR'] ?></td>
                </tr>
                <tr>
                  <td><strong>Quantity</strong></td>
                  <td><?php echo $readrow['FLD_QUANTITY'] ?></td>
                </tr>
              </table>
            </div>
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

    </body>
    </html>