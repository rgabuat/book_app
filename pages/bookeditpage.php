<div class="container-fluid mt-5">
<?php $data = mysqli_query($conn,"SELECT *,tbl_authors.name FROM tbl_books JOIN tbl_authors WHERE tbl_books.author = tbl_authors.id AND tbl_books.id = '".$_GET['id']."';"); 
    if(mysqli_num_rows($data) > 0) :
    foreach($data as  $key) :?>
<div class="row">
<div class="col-md-4">
    <div class="card bg-light text-white">
      <div class="card-body">
          <h3 class="card-title text-er text-primary">Add New Book</h3>
          <p class="card-text">
          <form action="./controller/books.controller.php" method="POST" class="" enctype='multipart/form-data'>
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="bid" value="<?= $_GET['id'];?>">
                <select class="form-control form-control-lg my-3" name="author" id="exampleFormControlSelect1">
                <?php 
                $result = mysqli_query($conn,"SELECT DISTINCT* FROM tbl_authors WHERE status != 0");
                        if (mysqli_num_rows($result) > 0) :
                        foreach($result as $keys): ?>
                        <option value="<?= $keys['id'] ?>"><?= $keys['name'] ?></option>
                        <?php endforeach;?>
                        
                        <?php else : ?>
                        <option value="">NO RECORD FOUND</option>
                        <?php endif?>
                </select>
                <div class="form-outline my-3">
                  <input type="text" id="authorName" name="title" value="<?= $key['title'] ?>" class="form-control form-control-lg rounded-0" required />
                  <label class="form-label" for="formControlLg">Title</label>
                </div>
                <div class="form-outline my-3">
                  <input type="text" id="authorName" name="price" value="<?= $key['price'] ?>" class="form-control form-control-lg rounded-0" required />
                  <label class="form-label" for="formControlLg">Price</label>
                </div>
                <div class="form-outline my-3">
                  <input type="text" id="authorName" name="description" value="<?= $key['description'] ?>" class="form-control form-control-lg rounded-0" required />
                  <label class="form-label" for="formControlLg">Description</label>
                </div>
                <span class="text-primary">Book Image</span>
                <div class="form-outline my-3">
                  <input type="file" id="file-input" name="profile" value="" class="form-control form-control-lg rounded-0" required />
                </div>
               
              <div class="form-group">
                
                <input type="submit" name="submit" value="UPDATE BOOK" class="form-control form-control-lg btn btn-success">
              </div>
          </form>
          </p>
      </div>
    </div>
</div>
<div class="col-md-6">
<div class="card bg-light text-dark text-center">
  <div class="card-body">
      <h3 class="card-title">Image Preview</h3>
      <div id='img_contain'>
        <?php 
            $dir = './uploads/';
        ?>
      <img id="image-preview" align='middle'src="<?= !empty($key['image_id']) ? $dir.$key['image_id'] : $dir.'img_avatar.png"' ?>" class="img-fluid img-thumbnail" alt="your image" title=''/>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>