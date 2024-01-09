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
                            <a href="/controllers/dashboard/categories/add-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-tag px-3"></i>Category</span></a>
                            <a href="/controllers/dashboard/vehicles/add-vehicles-ctrl.php" class="py-3 nav-link active navLink sidebarLink"><span><i class="bi bi-car-front-fill px-3"></i>Véhicle</span></a>
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
                            <h1 class="fw-bold text-uppercase">Ajouter un véhicule</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- ALERT -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="POST" class="shadow-lg p-5 rounded-4">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div><small id="lastnameHelp" class="form-text text-danger"><?= $error['name'] ?? '' ?></small></div>
                                        <label for="brand" class="form-label">Marque du véhicule</label>
                                        <input type="text" class="form-control" name="brand" id="brand" value="<?= htmlentities($name ?? '') ?>" aria-describedby="brand" placeholder="Ex: BMW" minlength="2" maxlength="70" pattern="<?= REGEX_NAME ?>" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="model" class="form-label">Modèle du véhicule</label>
                                        <input type="text" class="form-control" name="model" id="model" value="<?= htmlentities($name ?? '') ?>" aria-describedby="model" placeholder="Ex: BMW i7" minlength="2" maxlength="70" pattern="<?= REGEX_NAME ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="model" class="form-label">Immatriculation du véhicule</label>
                                        <input type="text" class="form-control" name="model" id="model" value="<?= htmlentities($name ?? '') ?>" aria-describedby="model" placeholder="Ex: AA-112-AA" minlength="2" maxlength="70" pattern="<?= REGEX_NAME ?>" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="model" class="form-label">Kilomètrage du véhicule</label>
                                        <input type="text" class="form-control" name="model" id="model" value="<?= htmlentities($name ?? '') ?>" aria-describedby="model" placeholder="Ex: 100 000" minlength="2" maxlength="70" pattern="<?= REGEX_NAME ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Ajouter une photo du véhicule</label>
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary fw-bold text-uppercase">Ajouter un véhicule</button>
                                <!-- <a href="/controllers/dashboard/categories/list-ctrl.php" class="btn btn-outline-primary fw-bold text-uppercase">Voir les catégories</a> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>