<?php 
require_once('views/header.php');
?>
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">HomePage</a>
    </li>
    <li class="breadcrumb-item active">
            <a href="index.php?controller=Post&action=listMyPosts">My Posts</a>
    </li>
    <li class="breadcrumb-item active">Add a new Post</li>
  </ol>

    <div class="container pb-5">
        <h3 align="center">ADD A NEW POST</h3>
        <?php 
            if (isset($_COOKIE['msg'])) {
        ?>
        <div class="alert alert-danger">
        <strong>Danger!</strong> <?php echo $_COOKIE['msg']; ?>
    </div>
        <?php        
            }
        ?>
    <hr>
        <form action="?controller=Post&action=store" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="" placeholder="Title" name="title">
            </div>
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <textarea class="form-control" name="excerpt" placeholder="Enter a short excerpt"></textarea>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" placeholder="Enter the post content" rows="6" required></textarea>
            </div>

            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" class="form-control" name="thumbnail">
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" required>
                <option value="">-- Select Category --</option>
                <option value="1">Technology</option>
                <option value="2">Lifestyle</option>
                <option value="3">Travel</option>
                <option value="4">Food</option>
                <option value="5">Education</option>
                <option value="6">Health</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" required>
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="archived">Archived</option>
                </select>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5">Save Post</button>
            </div>
        </form>
    </div>
  
</div>

    

<?php 
require_once('views/footer.php');
?>

