<div class="container-fluid mt-5">
    <table id="booksTable" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Book Title</th>
                <th>Book Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $result = mysqli_query($conn,"SELECT tbl_orders.ord_uid as users,tbl_orders.id as olid,tbl_books.id as bid,tbl_books.title,tbl_books.image_id,tbl_orders.date as bookdate FROM tbl_orders JOIN tbl_orderdetails ON tbl_orders.id = tbl_orderdetails.ord_lid JOIN tbl_books ON tbl_orderdetails.ords_id = tbl_books.id WHERE tbl_orders.ord_uid = '".$_SESSION['id']."'");
            $i = 1;
            if (mysqli_num_rows($result) > 0) :
            foreach($result as $keys): ?>
             <tr>
                <?php $dir = './uploads/'; ?>
                <td><?= $i++ ?></td>
                <td><img src="<?= !empty($keys['image_id']) ? $dir.$keys['image_id'] : $dir.'img_avatar.png"' ?>" class="img-fluid img-thumbnail" width="60px" height="60px" alt="..."></td>
                <td><?= $keys['title'] ?></td>
                <td><?= date_format(date_create($keys['bookdate']),'g:ia \o\n l jS F Y') ?></td>
                <td>
               <!-- <span>
               <a id="editBtn" href="?page=bookeditpage&id=<?= $keys['id'] ?>" class="text-warning" data-id="<?= $keys['id'] ?>" data-title="Edit" data-action="edit" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Edit">
                    <i class="material-icons me-3">edit_note</i>
                </a>
               </span>
               <span>
               <a id="delBtn" href="javascript:void(0);" class="text-danger" data-id="<?= $keys['id'] ?>" data-title="Delete" data-action="delete" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Delete" >
                    <i class="material-icons me-3">delete</i>
                </a>
               </span> -->
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