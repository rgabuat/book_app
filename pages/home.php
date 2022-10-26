<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
        <div class="card bg-light mb-4">
                <div class="card-body" style="background-color: #371576 !important; border-radius: .5rem !important;">
                    <div class="col-md-6">
                        <h2 style="color: #ffffff;">Welcome Admin</h2>
                        <p class="m-auto text-secondary" style="color: #81c3d7 !important;"><?= ucwords($_SESSION['role']);?></p>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
        </div>
        </div>
    </div>
    <div class="row">
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
        <div class="col-lg-4 col-md-6 col-xl-3 mb-4">
            <div  class="card bg-warning text-dark text-center">
                <div class="card-body" style="background-color: #371576 border-radius: .5rem;">
                    <h3 class="card-title">Total Adopters</h3>
                    <h2 class="card-text ">
                    <?php 
                        $ref_table = "Adopters";
                        $total_count = $database->getReference($ref_table)->getSnapshot()->numChildren();  
                        echo $total_count;
                    ?>
                    </h2>
                    <hr>
                    <p class="m-0 text-center"><a href="?page=accounts" class="text-dark">View Details</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xl-3 mb-4">
            <div class="card bg-secondary text-dark text-center">
                <div class="card-body" style="background-color: #81c3d7; border-radius: .5rem;">
                    <h3 class="card-title">Total Shelters</h3>
                    <h2 class="card-text">
                    <?php 
                        $ref_table = "Shelters";
                        $total_count = $database->getReference($ref_table)->getSnapshot()->numChildren();  
                        echo $total_count;
                    ?>
                    </h2>
                    <hr>
                    <p class="m-0 text-center"><a href="?page=books" class="text-dark">View Details</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xl-3 mb-4">
            <div class="card bg-primary text-white text-center">
                <div class="card-body" style="background-color: #2f6690; border-radius: .5rem;">
                    <h3 class="card-title">Total Dogs</h3>
                    <h2 class="card-text">
                    <?php
                        $ref_table = "Pets/Dogs";  
                        $total_count = $database->getReference($ref_table)->getSnapshot()->numChildren();
                        echo $total_count;
                    ?>
                    </h2>
                    <hr>
                    <p class="m-0 text-center"><a href="?page=authors" class="text-white">View Details</a></p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 col-xl-3 mb-4">
            <div class="card bg-success text-white text-center">
                <div class="card-body" style="background-color: #16425b; border-radius: .5rem;">
                    <h3 class="card-title">Total Cats</h3>
                    <h2 class="card-text">
                    <?php
                        $ref_table = "Pets/Cats";  
                        $total_count = $database->getReference($ref_table)->getSnapshot()->numChildren();
                        echo $total_count;
                    ?>
                    </h2>
                    <hr>
                    <p class="m-0 text-center"><a href="?page=stats" class="text-white">View Details</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'user'): ?>
    <div class="mt-5 row">
        <div class="col-12 rounded-0 text-center">
            <h4 class="mt-3 mb-3">CHECK OUT OUR COLLECTION OF MAGICAL ITEMS: BOOKS!</h4>
            <a href="./" class="btn btn-lg rounded-.5 text-white mb-3" style="background-color: #16425b;">Borrow Now</a>
        </div>
    </div>
    <?php endif; ?>

    <a href="./book_app"></a>

</div>