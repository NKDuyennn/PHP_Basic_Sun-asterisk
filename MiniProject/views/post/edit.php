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
    <li class="breadcrumb-item active">Edit Post <?php echo $data['id']; ?></li>
  </ol>

  <div class="container pb-5">
      <h3 align="center">EDIT POST</h3>
      <?php if (isset($_COOKIE['msg'])): ?>
      <div class="alert alert-danger">
          <strong>Danger!</strong> <?php echo $_COOKIE['msg']; ?>
      </div>
      <?php endif; ?>
      <hr>
      <form action="?controller=Post&action=update" method="POST" role="form" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

          <!-- Title -->
          <div class="form-group">
              <label for="">Title</label>
              <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($data['title']); ?>" required>
          </div>

          <!-- Excerpt -->
          <div class="form-group">
              <label for="excerpt">Excerpt</label>
              <textarea class="form-control" name="excerpt" rows="3"><?php echo htmlspecialchars($data['excerpt']); ?></textarea>
          </div>

          <!-- Content -->
          <div class="form-group">
              <label for="content">Content</label>
              <textarea class="form-control" name="content" rows="6" required><?php echo htmlspecialchars($data['content']); ?></textarea>
          </div>

          <!-- Thumbnail -->
          <div class="form-group">
              <label for="thumbnail">Thumbnail</label>
              <?php if (!empty($data['thumbnail'])): ?>
                  <div class="mb-2">
                      <img src="public/images/post/<?php echo htmlspecialchars($data['thumbnail']); ?>" alt="Thumbnail" style="max-width: 300px; height: auto;">
                  </div>
              <?php endif; ?>
              <input type="file" class="form-control" name="thumbnail">
              <small class="form-text text-muted">Leave blank to keep current thumbnail.</small>
          </div>

          <!-- Category -->
          <div class="form-group">
              <label for="category_id">Category</label>
              <select class="form-control" name="category_id" required>
                  <option value="">-- Select Category --</option>
                  <option value="1" <?php if($data['category_id'] == 1) echo 'selected'; ?>>Technology</option>
                  <option value="2" <?php if($data['category_id'] == 2) echo 'selected'; ?>>Lifestyle</option>
                  <option value="3" <?php if($data['category_id'] == 3) echo 'selected'; ?>>Travel</option>
                  <option value="4" <?php if($data['category_id'] == 4) echo 'selected'; ?>>Food</option>
                  <option value="5" <?php if($data['category_id'] == 5) echo 'selected'; ?>>Education</option>
                  <option value="6" <?php if($data['category_id'] == 6) echo 'selected'; ?>>Health</option>
              </select>
          </div>

          <!-- Status -->
          <div class="form-group">
              <label for="status">Status</label>
              <select class="form-control" name="status" required>
                  <option value="draft" <?php if($data['status'] == 'draft') echo 'selected'; ?>>Draft</option>
                  <option value="published" <?php if($data['status'] == 'published') echo 'selected'; ?>>Published</option>
                  <option value="archived" <?php if($data['status'] == 'archived') echo 'selected'; ?>>Archived</option>
              </select>
          </div>

          <!-- Readonly Fields -->
          <div class="form-group">
              <label for="slug">Slug</label>
              <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['slug']); ?>" readonly>
          </div>

          <div class="form-group">
              <label for="views">Views</label>
              <input type="number" class="form-control" value="<?php echo htmlspecialchars($data['views']); ?>" readonly>
          </div>

          <div class="form-group">
              <label for="author">Author</label>
              <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['author_name']); ?>" readonly>
          </div>

          <div class="form-group">
              <label for="created_at">Created At</label>
              <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['created_at']); ?>" readonly>
          </div>

          <div class="form-group">
              <label for="updated_at">Last Updated</label>
              <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['updated_at']); ?>" readonly>
          </div>

          <div class="form-group">
              <label for="published_at">Published At</label>
              <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['published_at']); ?>" readonly>
          </div>

          <!-- Submit Button -->
          <div class="text-center mt-4">
              <button type="submit" class="btn btn-primary px-5">Update Post</button>
          </div>
      </form>
  </div>

</div>

<?php 
require_once('views/footer.php');
?>
