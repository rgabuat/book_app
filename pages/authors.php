<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
            <a href="javascript:void(0);" class="btn btn-success mb-3" data-mdb-toggle="modal" data-mdb-target="#addAuthor">ADD NEW AUTHOR</a>
        </div>
    </div>
    <table id="authorsTable" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $result = mysqli_query($conn,"SELECT * FROM tbl_authors WHERE status != 0");
            $i = 1;
            if (mysqli_num_rows($result) > 0) :
            foreach($result as $keys): ?>
             <tr>
                <td><?= $i++ ?></td>
                <td><?= $keys['name'] ?></td>
            <td>
               <span>
               <a id="editBtn" href="javascript:void(0);" class="text-warning" data-id="<?= $keys['id'] ?>" data-title="Edit" data-action="edit" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Edit">
                    <i class="material-icons me-3">edit_note</i>
                </a>
               </span>
               <span>
               <a id="delBtn" href="javascript:void(0);" class="text-danger" data-id="<?= $keys['id'] ?>" data-title="Delete" data-action="delete" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Delete" >
                    <i class="material-icons me-3">delete</i>
                </a>
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
        $result = mysqli_query($conn,"SELECT DISTINCT* FROM tbl_authors WHERE status != 0");
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
    
    <!-- edit modal -->
    <div
    class="modal fade"
    id="editModal"
    tabindex="-1"
    aria-labelledby="AddAuthorModal"
    aria-hidden="true"
    >
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><span id="title" class="text-uppercase"></span> AUTHOR</h5>
            <button
            type="button"
            class="btn-close"
            data-mdb-dismiss="modal"
            aria-label="Close"
            ></button>
        </div>
        <div class="modal-body">
        <div class="row">
        <form action="./controller/author.controller.php" method="POST" class="" enctype='multipart/form-data'>
            <input id="action" type="hidden" name="action" value="">
            <input id="editId" type="hidden" name="editId" value="">
            <div id="alert"></div>
            <div id="editContainer" class="form-outline">
                <input type="text" id="authorName" name="author" value="" class="form-control form-control-lg rounded-0" required />
                <label class="form-label" for="formControlLg">Author Name</label>
            </div>
            <input type="submit" class="btn btn-success form-control my-3 rounded-0" data-mdb-ripple-color="dark" value="SUBMIT">
        </form>
        </div>
        </div>
    </div>
    </div>
</div>