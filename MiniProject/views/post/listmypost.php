<?php 
require_once('views/header.php');
?>
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">HomePage</a>
    </li>
    <li class="breadcrumb-item active">My Posts</li>
  </ol>

  <!-- Page Content -->
  <h1>My Posts</h1>
  <hr>
  <a href="?controller=Post&action=add" class="btn btn-primary"> + Create new post</a>
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
      <table class="table table-bordered" id="tableallposts" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Views</th>
            <th>Published At</th>
            <th style="text-align: center;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($data as $row) {
            ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['category_name']; ?></td>
              <td><?php echo $row['author_name']; ?></td>
              <td><?php echo $row['views']; ?></td>
              <td><?php echo $row['published_at']; ?></td>
              <td  style="text-align: center;">
                <a href="?controller=Post&action=detail&id=<?php echo $row['id']; ?>" class="btn btn-success">Detail</a>
                <a href="?controller=Post&action=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning">Update</a>  
                <a href="?controller=Post&action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger delete">Delete</a>
              </td>
            </tr>
            
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- <script type="text/javascript">
  $(function() {
      // body...
      $('body').on('click', '.detail', function(event) {
        event.preventDefault();
        /* Act on the event */
        id = $(this).data('href');
        console.log(id);
        $.ajax({
          url: 'index.php?mod=employee&act=detail',
          type: 'GET',
          dataType: 'json',
          data: {id: id},
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
</script> -->

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

<script type="text/javascript" src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#tableallposts').DataTable();
  } );
</script>
<?php 
require_once('views/footer.php');
?>