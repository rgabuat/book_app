<div class="container-fluid mt-3">
    <table id="logsTable" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>action</th>
                <th>user</th>
                <th>status</th>
                <th>status_result</th>
                <th>role</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i = 1;
                $result = mysqli_query($conn,"SELECT * FROM tbl_logs");
                if(mysqli_num_rows($result) > 0):
                foreach($result as $keys):
            ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $keys['action'] ?></td>
                <td><?= $keys['user'] ?></td>
                <td><?= $keys['status'] ?></td>
                <td><?= $keys['status_result'] ?></td>
                <td><?= $keys['role'] ?></td>
                <td><?= $keys['date'] ?></td>
            </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>