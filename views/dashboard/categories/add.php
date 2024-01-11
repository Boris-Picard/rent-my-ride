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
                            <a href="/controllers/dashboard/dashboard-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-house px-3"></i> Dashboard</span></a>
                            <a href="/controllers/dashboard/categories/add-ctrl.php" class="py-3 nav-link active navLink sidebarLink"><span><i class="bi bi-tag px-3"></i>Category</span></a>
                            <a href="/controllers/dashboard/vehicles/add-vehicle-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-car-front-fill px-3"></i>Véhicle</span></a>
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
            <div class="row py-5 mt-4">
                <div class="col-8 mx-auto">
                    <div class="row">
                        <div class="col-12 pb-5">
                            <h1 class="fw-bold text-uppercase">Ajouter une catégorie de véhicule</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php if(isset($alert['success'])) { ?>
                                <div class="alert alert-success">
                                <?= $alert['success'] ?>
                            </div>
                            <?php } elseif (isset($alert['error'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                <?= $alert['error'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="POST" class="shadow-lg p-5 rounded-4">
                                <div class="mb-3">
                                    <div><small class="form-text text-danger"><?= $error['name'] ?? '' ?></small></div>
                                    <label for="name" class="form-label">Ajouter une catégorie de véhicule</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?= htmlentities($name ?? '') ?>" aria-describedby="name" placeholder="Ex: Une chaise" minlength="2" maxlength="70" pattern="<?= REGEX_NAME ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary fw-bold text-uppercase">Ajouter une catégorie</button>
                                <a href="/controllers/dashboard/categories/list-ctrl.php" class="btn btn-outline-primary fw-bold text-uppercase">Voir les catégories</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>