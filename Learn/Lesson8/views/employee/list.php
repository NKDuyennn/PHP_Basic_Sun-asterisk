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
  </ol>

  <!-- Page Content -->
  <h1>EMPLOYEES</h1>
  <hr>
  <a href="?mod=employee&act=add" class="btn btn-primary">Add new employee</a>
  <?php 
        if (isset($_COOKIE['msg'])) {
    ?>
    <div class="alert alert-success">
  <strong>Success!</strong> <?php echo $_COOKIE['msg']; ?>
</div>
    <?php        
        }
        if (isset($_COOKIE['msg_fail'])) {
            ?>
    <div class="alert alert-danger">
  <strong>Danger!</strong> <?php echo $_COOKIE['msg_fail']; ?>
</div>
    <?php   
        }
     ?>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="tablenv" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Mã nhân viên</th>
            <th>Tên nhân viên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th style="text-align: center;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($data as $row){ 
            ?>
            <tr>
              <td><?php echo $row['code']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['mobile']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td  style="text-align: center;">
               <a href="?mod=employee&act=detail&code=<?php echo $row['code']; ?>" class="btn btn-success">Detail</a>  
                <a href="?mod=employee&act=edit&code=<?php echo $row['code']; ?>" class="btn btn-warning">Update</a>  
                <a href="?mod=employee&act=delete&code=<?php echo $row['code']; ?>" class="btn btn-danger delete" >Delete</a>

              </td>
            </tr>
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">

                    <h2 class="modal-title">Thông tin khách hàng</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <ul id="detail">

                    </ul>
                    
                    <div class="modal-footer">

                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                    
                  </div>
                </div>

              </div>
            </div>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('.delete').on('click',function(e){
      e.preventDefault();
      var url = $(this).attr('href')
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = url;
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
    })
  })

</script>

<script type="text/javascript">
  $(function() {
      // body...
      $('body').on('click', '.detail', function(event) {
        event.preventDefault();
        /* Act on the event */
        code = $(this).data('href');
        console.log(code);
        $.ajax({
          url: 'index.php?mod=employee&act=detail',
          type: 'GET',
          dataType: 'json',
          data: {code: code},
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function(data) {
          console.log(data);
          console.log("complete");
          noidung = '';
          noidung +=  '<p> MAKH: '+data.code +'<p/>' + '<br/>' ;
          noidung += '<p> TENKHACHHANG: '+data.name +'<p/>' + '<br/>';       
          noidung += '<p> DIACHI: '+data.quantity +'<p/>' + '<br/>';
          noidung += '<p> GMAIL: '+data.price +'<p/>' + '<br/>';
          $('.thongtin').html(noidung);
        });
        
      });
    })
</script>

<script type="text/javascript" src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#tablenv').DataTable();
} );
</script>
<?php 
require_once('views/footer.php');
?>