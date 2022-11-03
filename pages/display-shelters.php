<div class="container-fluid mt-5">
    <table id="accountsTable" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Business name</th>
                <th>City</th>
                <th>Contact</th>
                <th>Email</th>
                <!-- <th>Role</th> -->
                <!-- <th>Status</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include('dbconnect.php');

                $ref_table = "Shelters";
                $fetchdata = $database->getReference($ref_table)->getValue();

                if ($fetchdata > 0) {
                $i = 1;
                foreach($fetchdata as $key => $row) {
            ?>
                <td><?= $i++ ?></td>
                <td><?= $row['bizName'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['contact'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
               <span>
               <a id="editBtn" href="?page=edit-shelters&id=<?= $key; ?>" class="text-warning" data-id="<?= $key; ?>" data-title="Edit" data-action="edit" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Edit">
                    <i class="material-icons me-3">edit_note</i>
                </a>
               </span>
               <span>
               <a id="ActDelBtn" href="javascript:void(0);" class="text-danger" data-id="<?= $key['id'] ?>" data-title="Delete" data-action="delete" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Delete" >
                    <i class="material-icons me-3">delete</i>
                </a>
               </span>  
                </td>
                </tr>
                <?php
                }
                } else {
                ?>
                    <tr>
                    <td colspan="6"> No Record Found</td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>

    <!-- modal -->

    <div
        class="modal fade"
        id="AccountEditModal"
        tabindex="-1"
        aria-labelledby="AccountEditModal"
        aria-hidden="true"
        >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="title" class="text-uppercase"></span> ACCOUNT</h5>
                    <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                    ></button>
                </div>
            <div class="modal-body">
            <div class="row">
                <form action="./controller/users.controller.php" method="POST" class="" enctype='multipart/form-data'>
                    <input id="action" type="hidden" name="action" value="">
                    <input id="editId" type="hidden" name="editId" value="">
                    <div id="alert"></div>
                    <div id="editContainer" class="form-outline">
                        <input type="text" id="authorName" name="author" value="" class="form-control form-control-lg rounded-0" required />
                        <label class="form-label" for="formControlLg">Account</label>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success form-control my-3 rounded-0" data-mdb-ripple-color="dark" value="SUBMIT">
                </form>
            </div>
            </div>
        </div>
    </div>



</div>