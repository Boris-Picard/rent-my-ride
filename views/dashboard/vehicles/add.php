<section class="myAccount bg-light">
    <main class="d-flex flex-nowrap">
        <!-- SIDEBAR -->
        <div class="container-fluid sidebar rounded-4 py-5 mt-4">
            <div class="row">
                <div class="col-12 p-0 rounded-4 shadow-lg bg-white">
                    <div class="row m-0 p-0">
                        <div class="d-flex justify-content-center py-3">
                            <a class="navbar-brand nameLogoAccount" href="/controllers/home-ctrl.php">Rent my Ride</a>
                        </div>
                        <div class="col-12 d-flex flex-column p-0 sidebar rounded colSidebar g-5">
                            <a href="/controllers/dashboard/dashboard-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-house px-3"></i> Dashboard</span></a>
                            <a href="/controllers/dashboard/categories/list-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-tag px-3"></i>Category</span></a>
                            <a href="/controllers/dashboard/vehicles/list-ctrl.php" class="py-3 nav-link active navLink sidebarLink"><span><i class="bi bi-car-front-fill px-3"></i>Véhicle</span></a>
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
                            <?php if (isset($alert['success'])) { ?>
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
                            <form action="" method="POST" class="shadow-lg p-5 rounded-4" enctype="multipart/form-data" novalidate>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['brand'] ?? '' ?></small></div>
                                        <label for="brand" class="form-label">Marque du véhicule</label>
                                        <input type="text" class="form-control" name="brand" id="brand" value="<?= htmlentities($brand ?? '') ?>" aria-describedby="brand" placeholder="Ex: BMW" minlength="2" maxlength="50" pattern="<?= REGEX_NAME ?>" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['model'] ?? '' ?></small></div>
                                        <label for="model" class="form-label">Modèle du véhicule</label>
                                        <input type="text" class="form-control" name="model" id="model" value="<?= htmlentities($model ?? '') ?>" aria-describedby="model" placeholder="Ex: BMW i7" minlength="2" maxlength="50" pattern="<?= REGEX_MODEL ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['registration'] ?? '' ?></small></div>
                                        <label for="registration" class="form-label">Immatriculation du véhicule</label>
                                        <input type="text" class="form-control" name="registration" id="registration" value="<?= htmlentities($registration ?? '') ?>" aria-describedby="registration" placeholder="Ex: AA-112-AA" minlength="9" maxlength="9" pattern="<?= REGEX_REGISTRATION ?>" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['mileage'] ?? '' ?></small></div>
                                        <label for="mileage" class="form-label">Kilomètrage du véhicule</label>
                                        <input type="text" class="form-control" name="mileage" id="mileage" value="<?= $mileage ?? '' ?>" aria-describedby="mileage" placeholder="Ex: 100 000" minlength="1" maxlength="10" pattern="<?= REGEX_MILEAGE ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['categories'] ?? '' ?></small></div>
                                        <label for="" class="mb-2">Catégorie du véhicule</label>
                                        <select class="form-select" name="id_category" aria-label="Default select example">
                                            <option selected disabled></option>
                                            <?php foreach ($listCategories as $category) { ?>
                                                <option value="<?= $category->id_category ?>" <?= (isset($id_category) && $id_category == $category->id_category) ? 'selected' : '' ?>><?= $category->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div><small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small></div>
                                            <label for="picture" class="form-label">Ajouter une photo du véhicule (optionnel)</label>
                                            <input class="form-control" type="file" id="picture" name="picture" accept="image/png, image/jpeg" >
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary fw-bold text-uppercase">Ajouter un véhicule</button>
                                <a href="/controllers/dashboard/vehicles/list-ctrl.php" class="btn btn-outline-primary fw-bold text-uppercase">Voir les véhicules</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

