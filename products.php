<?php 
include_once 'products_crud.php';
include_once 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Kiyowo BookStore: Products</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Script Datatable-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>

      <?php include_once 'nav_bar.php'; ?>
      <?php if($pos==="Admin" || $pos==="Supervisor"){ ?>

        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
              <div class="page-header">
                <h2>Create New Product</h2>
              </div>
              <form action="products.php" method="post" class="form-horizontal">
                <div class="form-group">
                  <label for="productid" class="col-sm-3 control-label">ID</label>
                  <div class="col-sm-9">
                   <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; ?>">
                 </div>
               </div>
               <div class="form-group">
                <label for="productname" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                  <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_NAME']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="productprice" class="col-sm-3 control-label">Price</label>
                <div class="col-sm-9">
                  <input name="price" type="text" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRICE']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="producttype" class="col-sm-3 control-label">Type</label>
                <div class="col-sm-9">
                  <select name="type" class="form-control" id="producttype" required>
                    <option value="Board Book" <?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Board Book") echo "selected"; ?>>Board Book</option>
                    <option value="Hardcover" <?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Hardcover") echo "selected"; ?>>Hardcover</option>
                    <option value="Paperback" <?php if(isset($_GET['edit'])) if($editrow['FLD_TYPE']=="Paperback") echo "selected"; ?>>Paperback</option>
                  </select>
                </div>
              </div> 
              <div class="form-group">
                <label for="productlanguage" class="col-sm-3 control-label">Language</label>
                <div class="col-sm-9">
                  <select name="language" class="form-control" id="productlanguage" required>
                    <option value="Bahasa Melayu" <?php if(isset($_GET['edit'])) if($editrow['FLD_LANGUAGE']=="Bahasa Melayu") echo "selected"; ?>>Bahasa Melayu</option>
                    <option value="English" <?php if(isset($_GET['edit'])) if($editrow['FLD_LANGUAGE']=="English") echo "selected"; ?>>English</option>
                    <option value="Mandarin" <?php if(isset($_GET['edit'])) if($editrow['FLD_LANGUAGE']=="Mandarin") echo "selected"; ?>>Mandarin</option>
                    <option value="Spanish" <?php if(isset($_GET['edit'])) if($editrow['FLD_LANGUAGE']=="Spanish") echo "selected"; ?>>Spanish</option>
                    <option value="Japannese" <?php if(isset($_GET['edit'])) if($editrow['FLD_LANGUAGE']=="Japannese") echo "selected"; ?>>Japannese</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="productpublisher" class="col-sm-3 control-label">Publisher</label>
                <div class="col-sm-9">
                  <input name="publisher" type="text" class="form-control" id="productpublisher" placeholder="Product Publisher" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PUBLISHER'];?>">
                </div>
              </div>
              <div class="form-group">
                <label for="productauthor" class="col-sm-3 control-label">Author</label>
                <div class="col-sm-9">
                  <input name="author" type="text" class="form-control" id="productauthor" placeholder="Product Author" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_AUTHOR']; ?>"  min="0" required>
                </div>
              </div>
              <div class="form-group">
                <label for="qty" class="col-sm-3 control-label">Quantity</label>
                <div class="col-sm-9">
                  <input name="quantity" type="number" class="form-control" id="qty" placeholder="Product Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_QUANTITY']; ?>"  min="1" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <?php if (isset($_GET['edit'])) { ?>
                    <input type="hidden" name="oldpid" value="<?php echo $editrow['FLD_PRODUCT_ID']; ?>">
                    <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Update</button>
                  <?php } else { ?>
                    <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create</button>
                  <?php } ?>
                  <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span>Clear</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  <?php } ?>
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table id="example" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Type</th>
            <th>Language</th>
            <th>Publisher</th>
            <th>Author</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
        // Read
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a180900_mypt2 ");
            $stmt->execute();
            $result = $stmt->fetchAll();
          }
          catch(PDOException $e){
            echo "Error: " . $e->getMessage();
          }
          foreach($result as $readrow) {
            ?>
            
            <tr>
             <td><?php echo $readrow['FLD_PRODUCT_ID']; ?></td>
             <td><?php echo $readrow['FLD_PRODUCT_NAME']; ?></td>
             <td><?php echo $readrow['FLD_PRICE']; ?></td>
             <td><?php echo $readrow['FLD_TYPE']; ?></td>
             <td><?php echo $readrow['FLD_LANGUAGE']; ?></td>
             <td><?php echo $readrow['FLD_PUBLISHER']; ?></td>
             <td><?php echo $readrow['FLD_AUTHOR']; ?></td>
             <td style="width:18%">
               <a data-href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>"
                 class="btn btn-warning btn-xs" role="button">Details</a>
                 <?php if($pos==="Admin"){ ?>
                  <a href="products.php?edit=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
                  <a href="products.php?delete=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>      
                </td>
              <?php } ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="bs-example">
  <!-- Button HTML (to Trigger Modal) -->
  <!-- Modal HTML -->
  <div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Product Details</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
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
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

<!-- Modal Script-->
<script>
  $(document).ready(function(){
    $(".btn").click(function(){
     var dataURL = $(this).attr( "data-href" )
     $('.modal-body').load(dataURL,function(){
      $('#myModal').modal({show:true});
      $('#myModal').on('hidden.bs.modal', function () {
        location.reload(); // location.reload();
      })
    });
   });
  });
</script>
<!-- DataTable Script-->
<script>
  $(document).ready(function () {
    $('#example').DataTable({
      dom: 'Blfrtip',
      buttons: ['excel'],
      "lengthMenu": [
        [5, 10, 22, 30, -1],
        [5, 10, 22, 30, 'All'],
        ],
    });
  });
</script>
<style>
  .bs-example{
    margin: 20px;
  }
</style>
</body>
</html>