<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
        <div class="card bg-light mb-4">
                <div class="card-body">
                    <div class="col-md-6">
                        <h2 class="text-dark">Welcome <?= ucwords($_SESSION['username']);?></h2>
                        <p class="m-auto text-secondary"><?= ucwords($_SESSION['role']);?></p>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-xl-3 mb-4">
            <div  class="card bg-warning text-white">
                <div class="card-body">
                    <h3 class="card-title">Total Users</h3>
                    <h2 class="card-text ">
                    <?php countUsers($conn); ?>
                    </h2>
                    <hr>
                    <p class="m-0 text-center"><a href="?page=accounts" class="text-dark">View Details</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xl-3 mb-4">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h3 class="card-title">Total Books</h3>
                    <h2 class="card-text">
                        <?php countBooks($conn) ?>
                    </h2>
                    <hr>
                    <p class="m-0 text-center"><a href="?page=books" class="text-dark">View Details</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xl-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h3 class="card-title">Total Authors</h3>
                    <h2 class="card-text">
                        <?php countAuthors($conn) ?>
                    </h2>
                    <hr>
                    <p class="m-0 text-center"><a href="?page=authors" class="text-dark">View Details</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xl-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h3 class="card-title">Total Books Borrowed</h3>
                    <h2 class="card-text">
                        No Data
                    </h2>
                    <hr>
                    <p class="m-0 text-center"><a href="?page=stats" class="text-dark">View Details</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
        <div class="card bg-light text-primary">
                <div class="card-body">
                    <h3 class="card-title">Total Books</h3>
                    <table id="topBorrower" class="display table table-hover">
                <thead>
                    <tr>
                        <th>Top</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Borrowed</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
        <div class="card bg-light text-primary">
                <div class="card-body">
                    <h3 class="card-title">Total Books</h3>
                    <table id="topBooks" class="display table table-hover">
                <thead>
                    <tr>
                        <th>Top</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Borrowed</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>

</div>