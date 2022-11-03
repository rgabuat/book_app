<div class="container-fluid mt-5">
    <table id="accountsTable" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Business name</th>
                <!-- <th>Key</th> -->
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
                <!-- <td><?= $key ?></td> -->
                <td><?= $row['bizName'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['contact'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
               <span>
               <a id="ActEditBtn" href="javascript:void(0);" class="text-warning" data-id="<?= $key; ?>" data-title="Edit" data-action="edit" data-mdb-toggle="modal" data-mdb-target="#edit<?= $key?>">
                    <i class="material-icons me-3">edit_note</i>
                </a>
               </span>
               <span>
               <a id="ActDelBtn" href="javascript:void(0);" class="text-danger" data-id="<?= $key?>" data-mdb-toggle="modal" data-mdb-target="#delete<?= $key?>" >
                    <i class="material-icons me-3">delete</i>
                </a>
               </span>  
                </td>
                <!-- edit shelter modal -->
                <div
                        class="modal fade"
                        id="edit<?= $key?>"
                        tabindex="-1"
                        aria-labelledby="AccountEditModal"
                        aria-hidden="true"
                        >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><span id="title" class="text-uppercase"></span>Edit <strong> <?= $row['bizName'] ?></strong></h5>
                                    <button
                                    type="button"
                                    class="btn-close"
                                    data-mdb-dismiss="modal"
                                    aria-label="Close"
                                    ></button>
                                </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="./controller/pets.controller.php" method="POST" class="" enctype='multipart/form-data'>
                                            <input type="hidden" name="action" value="">
                                            <div id="alert"></div>
                                            <div  class="form-outline mb-3">
                                                <input type="text" name="bizName" value="<?= isset($row['bizName']) ? $row['bizName']: "No data found"?>" class="form-control rounded-0" required />
                                                <label class="form-label" for="Name">Business Name</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="owner" value="<?= isset($row['owner']) ? $row['owner']: "No data found"?>" class="form-control  rounded-0" required />
                                                <label class="form-label" for="Owner">Owner Name</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="email" value="<?= isset($row['email']) ? $row['email']: "No data found" ?>" class="form-control  rounded-0" required />
                                                <label class="form-label" for="Email">Email</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="username" value="<?= isset($row['username']) ? $row['username']: "No data found" ?>" class="form-control  rounded-0" required />
                                                <label class="form-label" for="Username">Username</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="website" value="<?= isset($row['website']) ? $row['website']: "No data found" ?>" class="form-control  rounded-0" required />
                                                <label class="form-label" for="Website">Website</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="contact" value="<?= isset($row['contact']) ? $row['contact']: "No data found" ?>" class="form-control  rounded-0" required />
                                                <label class="form-label" for="Contact">Contact Number</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="street" value="<?= isset($row['street']) ? $row['street']: "No data found" ?>" class="form-control  rounded-0" required />
                                                <label class="form-label" for="Street">Street Address</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="city" value="<?= isset($row['city']) ? $row['city']: "No data found" ?>" class="form-control  rounded-0" required />
                                                <label class="form-label" for="City">City</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="province" value="<?= isset($row['province']) ? $row['province']: "No data found" ?>" class="form-control  rounded-0" required />
                                                <label class="form-label" for="Province">Province</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="country" value="<?= isset($row['country']) ? $row['country']: "No data found" ?>" class="form-control  rounded-0" required />
                                                <label class="form-label" for="Country">Country</label>
                                            </div>
                                            <input type="submit" name="update_cat" class="btn btn-success form-control my-3 rounded-0" data-mdb-ripple-color="dark" value="SUBMIT">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                <!-- delete shelter modal -->
                <div
                        class="modal fade"
                        id="delete<?= $key?>"
                        aria-labelledby="catDeleteModal"
                        >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="catDeleteModal"><span id="title-2" class="text-uppercase"></span>Delete Cat</h5>
                                    <button
                                    type="button"
                                    class="btn-close"
                                    data-mdb-dismiss="modal"
                                    aria-label="Close"
                                    ></button>
                                </div>
                            <div class="modal-body">
                                <div class="row">
                                    <form action="./controller/pets.controller.php" method="POST" class="" enctype='multipart/form-data'>
                                        <h3><p>Delete Shelter </p></h3>
                                        <input  type="hidden" name="cid" value="<?= $key ?>">
                                        <input type="submit" name="delete_cat" class="btn btn-success form-control my-3 rounded-0" data-mdb-ripple-color="dark" value="SUBMIT">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
</div>