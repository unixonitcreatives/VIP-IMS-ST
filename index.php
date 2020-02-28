<?php include "session.php"; ?>
<?php require_once 'config.php'; ?>

<?php 
//Total In Stocks 
$account = $_SESSION['username'];
$qry = "SELECT * FROM stockist WHERE username = '$account'";
$result = mysqli_query($link, $qry) or die(mysqli_error($link));
if (mysqli_num_rows($result) > 0) {
  while($rows = mysqli_fetch_array($result)){
   $username = $rows['username'];
   $warehouse = $rows['area_center'];
 }

}
?>

<?php 
//Total In Stocks 
$stocksquery = "SELECT SUM(quantity) as TotalStocks FROM stocks WHERE status = 'In Stock' ";
$stocksresult = mysqli_query($link, $stocksquery) or die(mysqli_error($link));
if (mysqli_num_rows($stocksresult) > 0) {
  while($row = mysqli_fetch_array($stocksresult))

    $totalStocks = $row['TotalStocks'];
}
?>

<?php 
//Total Members 
$stocksquery = "SELECT SUM(quantity) as TotalStocks FROM stocks WHERE status = 'In Stock' ";
$stocksresult = mysqli_query($link, $stocksquery) or die(mysqli_error($link));
if (mysqli_num_rows($stocksresult) > 0) {
  while($row = mysqli_fetch_array($stocksresult))

    $totalStocks = $row['TotalStocks'];
}
?>


<?php 
//Total Members 
$query = "SELECT COUNT(model) as TotalModel FROM product_model WHERE type = 'retail' ";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result))

    $totalModel = $row['TotalModel'];
}
?>

<?php 
//Total Members 
$query = "SELECT COUNT(member_id) as TotalMembers FROM customers";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result))

    $totalMembers = $row['TotalMembers'];
}
?>

<?php 
//Total Members 
$query = "SELECT  COUNT(ob_tx_id) as TotalInvoice
FROM    outboundtb
WHERE   ob_date = curdate()";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result))

    $totalInvoice = $row['TotalInvoice'];
}
?>


<?php 
//Total Members 
$query = "SELECT COUNT(id) as TotalUnpaid FROM outboundtb WHERE ob_status='Unpaid'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result))
    $totalUnpaid = $row['TotalUnpaid'];
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
            <div class="col-sm-12">
              <h3 class="m-0 text-dark">Hello, <?php echo $account;?> Welcome to VIP Stockist Dashboard!</h3>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">


        <div class="card-header border-0">

        </div>
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> Notice</h5>
          VIP Stockist System is under BETA Testing. Contact Support if you experience any bugs or error.
        </div>
        <!-- Quick Access > L -->
        <label>Quick Access:</label><br>
        <a class="btn btn-primary" href="stock-request.php"><i class="nav-icon fas fa-cube"></i> Request Stock</a>
        <a class="btn btn-primary" href="stock-request-history.php"><i class="nav-icon fas fa-copy"></i> Request History</a>
        <a class="btn btn-success" href="stock-view.php"><i class="nav-icon fas fa-cubes"></i> View Stocks</a>


        <!-- /.card -->
      </div>

    </div>
    <!-- /.row -->
    <?php include "includes/footer.php"; ?>
  </div>
  




  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <script src="dist/js/demo.js"></script>
  <script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
