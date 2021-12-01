<div class="container-fluid mt-5">
    <div class="row text-left">
      <div class="col-12 text-right mb-3">
        <a href="?page=addbooks" class="btn btn-success">ADD NEW BOOK</a>
      </div>
    </div>
    <table id="booksTable" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Author</th>
                <th>Book title</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $result = mysqli_query($conn,"SELECT tbl_books.id,tbl_books.title,tbl_books.price,tbl_books.description,tbl_books.image_id ,tbl_authors.name as author FROM tbl_books JOIN tbl_authors WHERE tbl_books.author = tbl_authors.id");
            $i = 1;
            if (mysqli_num_rows($result) > 0) :
            foreach($result as $keys): ?>
             <tr>
                <?php $dir = './uploads/'; ?>
                <td><?= $i++ ?></td>
                <td><img src="<?= !empty($keys['image_id']) ? $dir.$keys['image_id'] : $dir.'img_avatar.png"' ?>" class="img-fluid img-thumbnail" width="60px" height="60px" alt="..."></td>
                <td><?= $keys['author'] ?></td>
                <td><?= $keys['title'] ?></td>
                <td><?= $keys['price'] ?></td>
                <td><?= $keys['description'] ?></td>
                <td>
               <span>
               <a id="editBtn" href="?page=bookeditpage&id=<?= $keys['id'] ?>" class="text-warning" data-id="<?= $keys['id'] ?>" data-title="Edit" data-action="edit" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Edit">
                    <i class="material-icons me-3">edit_note</i>
                </a>
               </span>
               <span>
               <!-- <a id="delBtn" href="javascript:void(0);" class="text-danger" data-id="<?= $keys['id'] ?>" data-title="Delete" data-action="delete" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Delete" >
                    <i class="material-icons me-3">delete</i>
                </a> -->
               </span>
            </td>
            </tr>
            <?php endforeach;?>
            <?php else : ?>
                <tr>
                    <td colspan="8"><p class="py-3 text-center" >NO RECORD FOUND!</p></td>
                </tr>
            <?php endif?>
        </tbody>
    </table>
</div>