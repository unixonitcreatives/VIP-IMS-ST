<?php include('session.php'); ?>


<?php
$alertMessage = "";
$i = 0;
require_once 'config.php';
//Total In Stocks 
$account = $_SESSION['username'];
$qry = "SELECT username, warehouse FROM area_center WHERE username = '$account'";
$result = mysqli_query($link, $qry) or die(mysqli_error($link));
if (mysqli_num_rows($result) > 0) {
  while($rows = mysqli_fetch_array($result)){
    $username = $rows['username'];
    $warehouse_ac = $rows['warehouse'];
    //echo "<script>alert('$warehouse_ac');</script>";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //Assigning posted values to variables.
  $warehouse = test_input($_POST['warehouse']);
  $product = test_input($_POST['product']);
  $qty = test_input($_POST['qty']);
  $date = test_input($_POST['date']);
  $remarks = test_input($_POST['remarks']);

  if(empty($product)){
      $alertMessage = "Please enter product.";
  }

  if(empty($qty)){
      $alertMessage = "Please enter qty.";
  }

  if(empty($date)){
      $alertMessage = "Please enter date.";
  }

  if(empty($alertMessage)){
    $query = "
    INSERT INTO stock_request (product, qty, warehouse, status, remarks, created_by, created_at)
    VALUES ('$product', '$qty', '$warehouse', 'Pending', '$remarks', '$account', '$date')"; //Prepare insert query
    $result = mysqli_query($link, $query) or die(mysqli_error($link)); //Execute  insert query
    if($result){
      $info = $_SESSION['username']." generated new request";
      $info2 = "Details: ".$product. ", " .$qty.", ".$warehouse;
      $alertlogsuccess = $_SESSION['username'].": request generated succesfully!";
      include "logs.php";
      echo "<script>window.location.href='stock-request-history.php'</script>"; 
    } else {
      //If execution failed
      $alertMessage = "<div class='alert alert-danger' role='alert'>
      Error adding data.
      </div>";
      mysqli_close($link);
    }
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include "includes/header.php"; ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include "includes/navbar.php"; ?>
    <?php include "includes/sidebar-manage.php"; ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">VIP Inventory Management System</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Stock Transfer</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Transfer Stocks</h3>

                  </div>
                </div>

                <div class="card-body">
                  <?php echo $alertMessage; ?>
                  <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Warehouse</label>
                          <input type="text" class="form-control" placeholder="pcs" name="warehouse" id="" value="<?php echo $warehouse_ac;?>" readonly>

                        </div>

                        <div class="form-group">
                          <label>Product</label>
                          <select class="form-control select2" oninput="upperCase(this)"  name="product" required>
                            <option value="">SELECT PRODUCT</option>
                            <?php
                            $queryWarehouse = "";
                            $queryWarehouse = "SELECT * FROM product_model";
                            if($resultWarehouse = mysqli_query($link, $queryWarehouse)){
                              if(mysqli_num_rows($resultWarehouse) > 0){
                                while($row = mysqli_fetch_array($resultWarehouse)){

                                  echo "<option value='".$row['model']."'>" . $row['model'] .  "</option>";
                                }

                                        // Free result set
                                mysqli_free_result($resultWarehouse);
                              } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                              }
                            } else{
                              echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                            }


                            ?>
                          </select>
                        </div>

                        
                        
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" onkeydown="return false" required>
                          </div>
                          <!-- /.input group -->
                        </div>

                        <div class="form-group">
                          <label>Quantity</label>
                          <input type="text" class="form-control" placeholder="pcs" name="qty" id="" onkeypress="return isNumberKey(event)" required>

                        </div>





                      </div>
                    </div>




                    <div class="form-group">
                      <label>Remarks</label><br>
                      <textarea class="form-control" width="100%" rows="5" style="resize: none;" placeholder="" name="remarks"></textarea>

                      <br>
                    </div>

                  </div>

                  <div class="card-footer">
                    <button type="submit" name="transfer" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" class="btn btn-primary" >Request</button>
                    
                  </form>
                </div>
              </div>
            </div>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?php include "includes/footer.php"; ?>
  </div>
  <!-- ./wrapper -->
  <!-- REQUIRED SCRIPTS -->
  <?php include "includes/js.php"; ?>


</body>
</html>