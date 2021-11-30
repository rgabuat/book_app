<div class="container-fluid mt-5">
    <table id="accountsTable" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Profile Image</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Contact</th>
                <th>Username</th>
                <!-- <th>Role</th> -->
                <!-- <th>Status</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $result = mysqli_query($conn,"SELECT users_login.id,fname,lname,email,dob,contact,username,password, users_login.status,users_login.image as profile_img, tbl_roles.role_level as userlevel FROM users_login JOIN tbl_roles ON users_login.role = tbl_roles.id");
            $i = 1;
            if (mysqli_num_rows($result) > 0) :
            foreach($result as $keys): ?>
             <tr>
                <?php $dir = './uploads/'; ?>
                <td><?= $i++ ?></td>
                <td><img src="<?= !empty($keys['profile_img']) ? $dir.$keys['image_id'] : $dir.'img_avatar.png"' ?>" class="img-fluid img-thumbnail" width="60px" height="60px" alt="..."></td>
                <td><?= $keys['fname'] ?></td>
                <td><?= $keys['lname'] ?></td>
                <!-- <td><= $keys['email'] ?></td> -->
                <td><?= $keys['contact'] ?></td>
                <td><?= $keys['username']?></td>
                <!-- <td><= $keys['status']?></td> -->
                <td>
               <span>
               <a id="editBtn" href="?page=bookeditpage&id=<?= $keys['id'] ?>" class="text-warning" data-id="<?= $keys['id'] ?>" data-title="Edit" data-action="edit" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Edit">
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
</div>