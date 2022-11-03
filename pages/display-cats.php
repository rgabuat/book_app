<div class="container-fluid mt-5">
    <table id="accountsTable" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Key</th>
                <!-- <th>Name</th> -->
                <th>Age</th>
                <th>Sex</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $ref_table = "Pets/Cats";
                $fetchdata = $database->getReference($ref_table)->getValue();
    
                if ($fetchdata > 0) :
                $i = 1;
                foreach($fetchdata as $key => $cats) :
            ?>
                <td><?= $i++ ?></td>
                <!-- <td><?= $key ?></td> -->
                <td><?= $cats['petName'] ?></td>
                <td><?= $cats['petAge'] ?></td>
                <td><?= $cats['petSex'] ?></td>
                <td><span class="badge badge-<?= $cats['petStatus'] == 'Available' ? 'success' : 'danger' ?>"><?= $cats['petStatus'] ?></span></td>
                <td>
               <span>
                <a id="ActEditBtn" href="javascript:void(0);" class="text-warning" data-id="<?= $key?>" data-mdb-toggle="modal" data-mdb-target="#edit<?= $key?>" >
                            <i class="material-icons me-3">edit_note</i>
                        </a>
               </span>
               <span>
               <a id="ActDelBtn" href="javascript:void(0);" class="text-danger"  data-id="<?= $key?>" data-mdb-toggle="modal" data-mdb-target="#delete<?= $key?>" >
                    <i class="material-icons me-3">delete</i>
                </a>
               </span>  
                </td>

                <!-- edit cat modal -->
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
                                    <h5 class="modal-title" id="exampleModalLabel"><span id="title" class="text-uppercase"></span>Edit Cat <strong> <?= $cats['petName'] ?></strong></h5>
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
                                            <input type="hidden" name="cid" value="<?= $key ?>">
                                            <input type="hidden" name="petID" value="<?= $cats['petID'] ?>" class="form-control form-control rounded-0" required />
                                            <div id="alert"></div>
                                            <div  class="form-outline mb-3">
                                                <input type="text" name="imageName" value="<?= isset($cats['imageName'])  ?  $cats['imageName'] : 'no image name' ;?>" class="form-control rounded-0" required />
                                                <label class="form-label" for="Image">Image name</label>
                                            </div>
                                            <div  class="form-outline mb-3">
                                                <input type="text" name="petName" value="<?= $cats['petName'] ?>" class="form-control rounded-0" required />
                                                <label class="form-label" for="Name">Name</label>
                                            </div>
                                             <div class="form-outline mb-3">
                                                <input type="text" name="petAge" value="<?= $cats['petAge'] ?>" class="form-control  rounded-0" required />
                                                <label class="form-label" for="Age">Age</label>
                                            </div>
                                            <!-- <div class="form-outline mb-3">
                                                <input type="text" name="petAgeDD" value="<?= isset($cats['petAgeDD'])  ?  $cats['petAgeDD'] : 'no data' ;?>" class="form-control rounded-0" required />
                                                <label class="form-label" for="Age DD">Age DD</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="petAgeNum" value="<?= isset($cats['petAgeNum'])  ?  $cats['petAgeNum'] : 'no data' ;?>" class="form-control rounded-0" required />
                                                <label class="form-label" for="Age Num">Age Num</label>
                                            </div> -->
                                            <small><label class="form-label" for="Pet Sex">Pet Sex</label></small>
                                            <select name="petSex" class="form-control mb-3">
                                                <option value="">Select</option>
                                                <option <?= $cats['petSex'] == 'Male' ? 'selected' : '' ?> value="<?= $cats['petSex'] ?>">Male</option>
                                                <option <?= $cats['petSex'] == 'Female' ? 'selected' : '' ?> value="<?= $cats['petSex'] ?>">Female</option>
                                            </select>
                                            <p><strong>Pet Status:</strong><span class="badge badge-<?= $cats['petStatus'] == 'Available' ? 'success' : 'danger' ?>"><?= $cats['petStatus'] ?></span></p>
                                            <p class="mb-3">Questions:</p>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="q1" value="<?= $cats['q1'] ?>" class="form-control form-control rounded-0" required />
                                                <label class="form-label" for="Pet ID">Activity/Playfulness</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="q2" value="<?= $cats['q2'] ?>" class="form-control form-control rounded-0" required />
                                                <label class="form-label" for="Pet ID">Calmness/label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="q3" value="<?= $cats['q3'] ?>" class="form-control form-control rounded-0" required />
                                                <label class="form-label" for="Pet ID">Non-aggression</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="q4" value="<?= $cats['q4'] ?>" class="form-control form-control rounded-0" required />
                                                <label class="form-label" for="Pet ID">Sociability toward humans</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="q5" value="<?= $cats['q5'] ?>" class="form-control form-control rounded-0" required />
                                                <label class="form-label" for="Pet ID">Sociability toward pets</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="q6" value="<?= $cats['q6'] ?>" class="form-control form-control rounded-0" required />
                                                <label class="form-label" for="Pet ID">Litterbox Comfortability + Adjustment</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="q7" value="<?= $cats['q7'] ?>" class="form-control form-control rounded-0" required />
                                                <label class="form-label" for="Pet ID">Healthy Grooming</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="q8" value="<?= $cats['q8'] ?>" class="form-control form-control rounded-0" required />
                                                <label class="form-label" for="Pet ID">Age/Life Expectancy</label>
                                            </div>
                                            <div class="form-outline mb-3">
                                                <input type="text" name="q9" value="<?= $cats['q9'] ?>" class="form-control form-control rounded-0" required />
                                                <label class="form-label" for="Pet ID">Breed</label>
                                            </div>
                                            <!-- <div class="form-outline mb-3">
                                                <input type="text" name="shelter" value="<?= $cats['shelter'] ?>" class="form-control form-control rounded-0" required />
                                                <label class="form-label" for="Pet ID">Shelter</label>
                                            </div> -->
                                            <div class="form-outline mb-3">
                                                <textarea name="petDesc" cols="30" rows="10" class="form-control form-control rounded-0" required><?= $cats['petDesc'] ?></textarea>
                                                <label class="form-label" for="dssc">Description</label>
                                            </div>
                                           
                                            <input type="submit" name="update_cat" class="btn btn-success form-control my-3 rounded-0" data-mdb-ripple-color="dark" value="SUBMIT">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                    <!-- delete cat modal -->
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
                                        <h3><p>Delete Cat </p></h3>
                                        <input  type="hidden" name="cid" value="<?= $key ?>">
                                        <input type="submit" name="delete_cat" class="btn btn-success form-control my-3 rounded-0" data-mdb-ripple-color="dark" value="SUBMIT">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                    <td colspan="6"> No Record Found</td>
                    </tr>
                <?php endif; ?>
        </tbody>
    </table>

   



</div>