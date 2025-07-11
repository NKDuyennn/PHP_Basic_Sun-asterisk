
<?php 
require_once('views/header.php');
?>
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Employees</li>
    <li class="breadcrumb-item active">Detail</li>
  </ol>

  <div class="container">
        <h2 align="center">CHI TIẾT NHÂN VIÊN</h2>
        <p>Mã nhân viên: <?php echo $data['code'] ?></p>
        <p>Tên nhân viên: <?php echo $data['name'] ?></p>
        <p>Số điện thoại: <?php echo $data['mobile'] ?></p>
        <p>Email: <?php echo $data['email'] ?></p>
        <p>Địa chỉ: <?php echo $data['address'] ?></p>
    </div>
  
</div>

    

<?php 
require_once('views/footer.php');
?>

