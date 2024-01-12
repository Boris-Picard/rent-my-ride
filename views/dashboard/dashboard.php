<section class="myAccount bg-light">
    <main class="d-flex flex-nowrap">
        <!-- SIDEBAR -->
        <div class="container-fluid sidebar rounded-4 py-5 mt-4">
            <div class="row">
                <div class="col-12 p-0 rounded-4 shadow-lg bg-white">
                    <div class="row m-0 p-0">
                        <div class="d-flex justify-content-center py-3">
                            <a class="navbar-brand nameLogoAccount" href="">Rent my Ride</a>
                        </div>
                        <div class="col-12 d-flex flex-column p-0 sidebar rounded colSidebar g-5">
                            <a href="/controllers/dashboard/dashboard-ctrl.php" class="py-3 nav-link navLink active sidebarLink"><span><i class="bi bi-house px-3"></i> Dashboard</span></a>
                            <a href="/controllers/dashboard/categories/add-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-tag px-3"></i>Category</span></a>
                            <a href="/controllers/dashboard/vehicles/add-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-car-front-fill px-3"></i>Véhicle</span></a>
                            <!-- <a href="" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-bookmarks px-3"></i> Collections</span></a> -->
                            <!-- <a href="" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-people px-3"></i> Users</span></a> -->
                            <!-- <a href="" class="mb-3 py-3 navLink logout position-absolute sidebarLink w-100 nav-link"><span><i class="bi bi-box-arrow-right px-3"></i>Logout</span></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main -->
        <div class="container-fluid h-100">
            <div class="row py-5 mt-4 text-center">
                <div class="col-8 mx-auto">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="fw-bold text-uppercase">
                                Bienvenu sur votre Dashboard
                            </h1>
                        </div>
                    </div>
                    <div class="row py-5">
                        <div class="col-5">
                            <div class="card rounded-4 shadow-lg py-5">
                                <div class="card-body">
                                    <h5 class="card-title">Nombre de catégories de véhicules :</h5>
                                    <p class="card-text fw-bold fs-1">
                                    <p class="fw-bold fs-1">
                                        <?= count($categories) ?>
                                    </p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card rounded-4 shadow-lg py-5">
                                <div class="card-body">
                                    <h5 class="card-title">Nombre de véhicules :</h5>
                                    <p class="card-text fw-bold fs-1">
                                        <?= count($vehicles) ?>
                                    </p>
                                    <p>
                                        <?php if($vehicles) { ?>
                                            Dernier ajout : <?= $vehicles[0]->created_at ?>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>