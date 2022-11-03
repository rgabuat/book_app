<div class="container-fluid mt-5">
    <table id="accountsTable" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Business name</th>
                <th>Key</th>
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
                <td><?= $key ?></td>
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
               <a id="ActDelBtn" href="javascript:void(0);" class="text-danger" data-id="<?= $key ?>" data-title="Delete" data-action="delete" data-mdb-toggle="tooltip" data-mdb-placement="top" title="Delete" >
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
</div>