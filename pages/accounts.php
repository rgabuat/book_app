<div class="container-fluid mt-5">
    <table id="accountsTable" class="display">
        <thead>
            <tr>
                <th>Sl no.</th>
                <th>Display Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Last Login</th>
                <!-- <th>Role</th> -->
                <!-- <th>Status</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $users = $auth->listUsers();
            $sln = 1;
            foreach($users as $user):?>
            <tr>
                <td><span><?= $sln++ ?></span></td>
                <td><span><?= $user->displayName ?></span></td>
                <td><span><?= $user->phoneNumber ?></span></td>
                <td><span><?= $user->email ?></span></td>
                <td><span class="badge badge-<?= $user->disabled ? 'danger' : 'success' ?>"><?= $user->disabled ? 'Disabled' : 'Enabled' ?></span></td>
                <td><span><?= $user->metadata->createdAt->format('Y-m-d h:i:s a'); ?></span></td>
                <td><span><?= $user->metadata->lastLoginAt->format('Y-m-d h:i:s a'); ?></span></td>
                <td>
                    <span>
                    <a id="editBtn" href="?page=accountedit&id=<?= $user->uid?>" class="text-warning" data-id="<?= $user->uid?>" data-title="Edit" data-action="edit" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Edit">
                            <i class="material-icons me-3">edit_note</i>
                        </a>
                    </span>
                    <span>
                        <a id="ActDelBtn" href="javascript:void(0);" class="text-danger" data-id="<?= $user->uid?>" data-mdb-toggle="modal" data-mdb-target="#delete<?= $user->uid?>" >
                            <i class="material-icons me-3">delete</i>
                        </a>
                    </span>  
                    <span>
                        <a id="ActDelBtn" href="javascript:void(0);" class="text-warning" data-id="<?= $user->uid?>" data-mdb-toggle="modal" data-mdb-target="#change_password<?= $user->uid?>" >
                            <i class="material-icons me-3">key</i>
                        </a>
                    </span>  
                    <?php if(!$user->disabled): ?>
                        <span>
                            <a id="ActDelBtn" href="javascript:void(0);" class="text-danger" data-id="<?= $user->uid?>" data-mdb-toggle="modal" data-mdb-target="#disable<?= $user->uid?>" >
                                <i class="material-icons me-3">cancel</i>
                            </a>
                        </span>
                    <?php else: ?>
                        <span>
                            <a id="ActDelBtn" href="javascript:void(0);" class="text-success" data-id="<?= $user->uid?>" data-mdb-toggle="modal" data-mdb-target="#enable<?= $user->uid?>" >
                                <i class="material-icons me-3">check_circle</i>
                            </a>
                        </span>
                    <?php endif; ?>
                </td>

                <div class="modal fade" id="change_password<?= $user->uid?>" tabindex="-1" aria-labelledby="change_password" aria-hidden="true">
                    <form action="./controller/users.controller.php" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update User Password</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Update password for User <?= $user->displayName ?> ?
                                </p>
                                <input type="hidden" name="uid" value="<?= $user->uid?>">
                                <div class="form-group mb-3">
                                    <label for="new_password">New Password</label>
                                    <input type="password" name="new_password" value="" class="form-control form-control-lg rounded-0" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="retype_new_password">Retype New Password</label>
                                    <input type="password" name="retype_new_password" value="" class="form-control form-control-lg rounded-0" required="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                <button type="submit" name="change_password" class="btn btn-warning">Update password</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="modal fade" id="disable<?= $user->uid?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="./controller/users.controller.php" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Disable User Account</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Disable User <?= $user->displayName ?>?
                                </p>
                                <input type="hidden" name="uid" value="<?= $user->uid?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                <button type="submit" name="disable_user" class="btn btn-danger">Disable</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="modal fade" id="enable<?= $user->uid?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="./controller/users.controller.php" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Enable User Account</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Enable User <?= $user->displayName ?>?
                                </p>
                                <input type="hidden" name="uid" value="<?= $user->uid?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                <button type="submit" name="enable_user" class="btn btn-success">Enable</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal fade" id="delete<?= $user->uid?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="./controller/users.controller.php" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete User Account</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Delete User <?= $user->displayName ?> ?
                                </p>
                                <input type="hidden" name="uid" value="<?= $user->uid?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                <button type="submit" name="delete_user" class="btn btn-danger">Delete</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>

            </tr>
            <?php  endforeach;?>
        </tbody>
    </table>

    <!-- modal -->

</div>