<section class="myAccount bg-light">
    <main class="d-flex flex-nowrap">
        <!-- SIDEBAR -->
        <div class="container-fluid sidebar rounded-4 py-5 mt-4">
            <div class="row ">
                <div class="col-12 p-0 rounded-4 shadow-lg bg-white">
                    <div class="row m-0 p-0">
                        <div class="d-flex justify-content-center py-3">
                            <a class="navbar-brand nameLogoAccount" href="/controllers/home/home-ctrl.php">Rent my Ride</a>
                        </div>
                        <div class="col-12 d-flex flex-column p-0 sidebar rounded colSidebar g-5">
                            <a href="/controllers/dashboard/dashboard-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-house px-3"></i> Dashboard</span></a>
                            <a href="/controllers/dashboard/categories/list-ctrl.php" class="py-3 nav-link  navLink sidebarLink"><span><i class="bi bi-tag px-3"></i>Category</span></a>
                            <a href="/controllers/dashboard/vehicles/list-ctrl.php" class="py-3 nav-link active navLink sidebarLink"><span><i class="bi bi-car-front-fill px-3"></i>Véhicle</span></a>
                            <a href="/controllers/dashboard/reservations/list-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-book-half px-3"></i> Reservations<span class="badge text-bg-danger"></span></span></a>
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
                            <h1 class="fw-bold text-uppercase">Mis à jour du véhicule</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?= $msg ?>
                            <?php if (isset($alert['success'])) { ?>
                                <div class="alert alert-success">
                                    <?= $alert['success'] ?>
                                </div>
                            <?php } elseif (isset($alert['error'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <?= $alert['error'] ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <?php } ?>
                                </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-12 pb-3 ">
                                <button class="btn border-0 btn-light" id="backBtn"><i class="bi bi-arrow-left fs-4 align-middle"></i><span class="px-2">Revenir à la page précédente</span></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form action="" method="POST" class="shadow-lg p-5 rounded-4" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <div><small class="form-text text-danger"><?= $error['brand'] ?? '' ?></small></div>
                                            <label for="brand" class="form-label">Marque du véhicule</label>
                                            <input type="text" class="form-control" name="brand" id="brand" value="<?= $vehicle->brand ?>" aria-describedby="brand" placeholder="Ex: BMW" minlength="2" maxlength="50" pattern="<?= REGEX_NAME ?>" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div><small class="form-text text-danger"><?= $error['model'] ?? '' ?></small></div>
                                            <label for="model" class="form-label">Modèle du véhicule</label>
                                            <input type="text" class="form-control" name="model" id="model" value="<?= $vehicle->model ?>" aria-describedby="model" placeholder="Ex: BMW i7" minlength="2" maxlength="50" pattern="<?= REGEX_MODEL ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <div><small class="form-text text-danger"><?= $error['registration'] ?? '' ?></small></div>
                                            <label for="registration" class="form-label">Immatriculation du véhicule</label>
                                            <input type="text" class="form-control" name="registration" id="registration" value="<?= $vehicle->registration ?>" aria-describedby="registration" placeholder="Ex: AA-112-AA" minlength="9" maxlength="9" pattern="<?= REGEX_REGISTRATION ?>" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div><small class="form-text text-danger"><?= $error['mileage'] ?? '' ?></small></div>
                                            <label for="mileage" class="form-label">Kilomètrage du véhicule</label>
                                            <input type="text" class="form-control" name="mileage" id="mileage" value="<?= $vehicle->mileage ?>" aria-describedby="mileage" placeholder="Ex: 100 000" minlength="1" maxlength="10" pattern="<?= REGEX_MILEAGE ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div><small class="form-text text-danger"><?= $error['categories'] ?? '' ?></small></div>
                                            <label for="" class="mb-2">Catégorie du véhicule</label>
                                            <select class="form-select" name="categories" aria-label="Default select example">
                                                <option selected disabled></option>
                                                <?php foreach ($listCategories as $category) { ?>
                                                    <option value="<?= $category->id_category ?>" <?= ($category->id_category == $vehicle->id_category) ? 'selected' : '' ?>><?= $category->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <?php if (isset($vehicle->picture)) { ?>
                                                    <div class="pt-3 d-flex justify-content-center">
                                                        <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="" class="object-fit-cover imgVehiclesUpdate rounded-circle">
                                                        <div class="mx-2 d-flex align-items-center">
                                                            <a href="/controllers/dashboard/vehicles/update-img-ctrl.php?id=<?= $vehicle->id_vehicle ?>" class="btn btn-danger fw-bold text-uppercase">
                                                                Supprimer
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div><small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small></div>
                                                    <label for="picture" class="form-label">Ajouter une photo du véhicule (optionnel)</label>
                                                    <input class="form-control" type="file" id="picture" name="picture" placeholder="Photo" accept="image/png, image/jpeg, image/avif">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger fw-bold text-uppercase">Modifier un véhicule</button>
                                    <a href="/controllers/dashboard/vehicles/list-ctrl.php" class="btn btn-outline-danger fw-bold text-uppercase">Annuler</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</section>