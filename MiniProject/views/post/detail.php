
<?php 
require_once('views/header.php');
?>
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">HomePage</a>
    </li>
    <?php if ($_SESSION['user']['id'] == $data['id']): ?>
        <li class="breadcrumb-item active">
            <a href="index.php?controller=Post&action=listMyPosts">My Posts</a>
        </li>
    <?php endif; ?>
    <li class="breadcrumb-item active">Detail Post <?php echo $data['id'] ?></li>
  </ol>

  <div class="container">
        <h2 align="center">Detail Post </h2>
        <p>Post ID: <?php echo $data['id'] ?></p>
        <p>Title: <?php echo $data['title'] ?></p>
        <p>Category: <?php echo $data['category_name'] ?></p>
        <p>Excerpt: <?php echo $data['excerpt'] ?></p>
        <p>Content: <?php echo $data['content'] ?></p>
        <p>Thumbnail:</p>
        <?php
            // Kiểm tra nếu thumbnail bắt đầu bằng http thì là URL full
            if (strpos($data['thumbnail'], 'http') === 0) {
                $thumbnailSrc = $data['thumbnail'];
            } else {
                // Ngược lại, nó là file trong thư mục
                $thumbnailSrc = 'public/images/post/' . $data['thumbnail'];
            }
        ?>
        <img src="<?php echo $thumbnailSrc; ?>" alt="Thumbnail" style="max-width: 400px; height: auto;">
        <p>Author: <?php echo $data['author_name'] ?></p>
        <p>Views: <?php echo $data['views'] ?></p>
        <p>Published At: <?php echo $data['published_at'] ?></p>
    </div>
  
</div>

    

<?php 
require_once('views/footer.php');
?>

