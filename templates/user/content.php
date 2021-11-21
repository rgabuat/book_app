<div class="container mt-3">
    <div class="row">
    <?php 
    $result = mysqli_query($conn,"SELECT tbl_books.id,tbl_books.title,tbl_books.price,tbl_books.description,tbl_books.image_id ,tbl_authors.name as author FROM tbl_books JOIN tbl_authors WHERE tbl_books.author = tbl_authors.id");
    if (mysqli_num_rows($result) > 0) :
    foreach($result as $keys): ?>
    <div class="col-lg-3 col-md-6">
        <div  class="card bg-warning text-white mb-3 bg-image hover-zoom">
            <?php $dir = './uploads/'; ?>
            <img
                
                src="<?= !empty($keys['image_id']) ? $dir.$keys['image_id'] : $dir.'img_avatar.png"' ?>" class="img-fluid img-thumbnail" alt="Book image"
                class="card-img-top"
                alt="Book Img"
                style="object-fit:cover;height:250px;"
            />
            <!-- src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" -->
            <div class="card-body">
                <p class="card-title text-center"><?= ucwords($keys['title']); ?></p>
                <!-- <span><?= $keys['title']; ?></span>
                <p class="card-text ">
                    <?= !empty($keys['description']) ? $keys['description'] : 'No Description on this Book' ?>
                </p> -->
                <p class="m-0 text-center"><a href="./bookview.php?id=<?= $keys['id']; ?>" class="text-light btn btn-primary rounded-0">BORROW THIS BOOK</a></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif;?>
    </div>
</div>