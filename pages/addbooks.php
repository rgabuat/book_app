<div class="container-fluid mt-5">
  <!-- <div class="row">
    <div class="col-12">
        <a href="javascript:void(0);" class="btn btn-success mb-3" data-mdb-toggle="modal" data-mdb-target="#addAuthor">ADD NEW AUTHOR</a>
    </div>
  </div> -->
<div class="row">
<div class="col-md-4">
    <div class="card bg-light text-white">
      <div class="card-body">
          <h3 class="card-title text-center text-primary">Add New Book</h3>
          <p class="card-text">
          <form action="./controller/books.controller.php" method="POST" class="" enctype='multipart/form-data'>
                <input type="hidden" name="action" value="create">
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
                  <input type="text" id="authorName" name="title" value="" class="form-control form-control-lg rounded-0" required />
                  <label class="form-label" for="formControlLg">Title</label>
                </div>
                <div class="form-outline my-3">
                  <input type="text" id="authorName" name="price" value="" class="form-control form-control-lg rounded-0" required />
                  <label class="form-label" for="formControlLg">Price</label>
                </div>
                <div class="form-outline my-3">
                  <input type="text" id="authorName" name="description" value="" class="form-control form-control-lg rounded-0" required />
                  <label class="form-label" for="formControlLg">Description</label>
                </div>
                <span class="text-primary">Book Image</span>
                <div class="form-outline my-3">
                  <input type="file" id="file-input" name="profile" value="" class="form-control form-control-lg rounded-0" required />
                </div>
               
              <div class="form-group">
                
                <input type="submit" name="submit" value="ADD BOOK" class="form-control form-control-lg btn btn-success">
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
      <img id="image-preview" align='middle'src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png" alt="your image" title=''/>
    </div>
  </div>
</div>
</div>


<!-- Modal -->
<div
  class="modal fade"
  id="addAuthor"
  tabindex="-1"
  aria-labelledby="AddAuthorModal"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD NEW AUTHOR</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="form-group">
    <label for="exampleFormControlSelect1">Authors Created</label>
    <select class="form-control form-control-lg my-3" id="exampleFormControlSelect1">
    <?php 
    $result = mysqli_query($conn,"SELECT DISTINCT* FROM tbl_authors");
            if (mysqli_num_rows($result) > 0) :
            foreach($result as $keys): ?>
              <option value="<?= $keys['id'] ?>"><?= $keys['name'] ?></option>
            <?php endforeach;?>
            
            <?php else : ?>
              <option value="">NO RECORD FOUND</option>
            <?php endif?>
    </select>
  </div>
      </div>
      <form action="./controller/author.controller.php" method="POST" class="" enctype='multipart/form-data'>
        <input type="hidden" name="action" value="create">
        <div class="form-outline">
            <input type="text" id="formControlLg" name="author" class="form-control form-control-lg rounded-0" required />
            <label class="form-label" for="formControlLg">Author Name</label>
        </div>
        <input type="submit" class="btn btn-success form-control my-3 rounded-0" data-mdb-ripple-color="dark" value="SUBMIT">
      </form>
      </div>
    </div>
  </div>
</div>

</div>