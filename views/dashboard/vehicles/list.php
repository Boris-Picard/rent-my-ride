<section class="myAccount bg-light h-100">
    <main class="d-flex flex-nowrap">
        <!-- SIDEBAR -->
        <div class="container-fluid sidebar rounded-4 py-5 mt-4">
            <div class="row ">
                <div class="col-12 p-0 rounded-4 shadow-lg bg-white">
                    <div class="row m-0 p-0">
                        <div class="d-flex justify-content-center py-3">
                            <a class="navbar-brand nameLogoAccount" href="/controllers/home-ctrl.php">Rent my Ride</a>
                        </div>
                        <div class="col-12 d-flex flex-column p-0 sidebar rounded colSidebar g-5">
                            <a href="/controllers/dashboard/dashboard-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-house px-3"></i> Dashboard</span></a>
                            <a href="/controllers/dashboard/categories/list-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-tag px-3"></i>Category</span></a>
                            <a href="/controllers/dashboard/vehicles/list-ctrl.php" class="py-3 active nav-link navLink sidebarLink"><span><i class="bi bi-car-front-fill px-3"></i>Véhicle</span></a>
                            <!-- <a href="" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-bookmarks px-3"></i> Collections</span></a> -->
                            <!-- <a href="" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-people px-3"></i> Users</span></a> -->
                            <!-- <a href="" class="mb-3 py-3 navLink logout position-absolute sidebarLink w-100 nav-link"><span><i class="bi bi-box-arrow-right px-3"></i>Logout</span></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main -->
        <div class="container-fluid">
            <div class="row py-5 mt-4">
                <div class="col-8 mx-auto">
                    <div class="row">
                        <div class="col-12 pb-5">
                            <h1 class="fw-bold text-uppercase">Liste des véhicules</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-3">
                            <?= $msg ?>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-6 pb-3 ">
                            <button class="btn border-0 btn-light" id="backBtn"><i class="bi bi-arrow-left fs-4 align-middle "></i><span class="px-2">Revenir à la page précédente</span></button>
                        </div>
                        <div class="col-6 pt-3">
                            <div class="d-flex justify-content-end m-0">
                                <a href="/controllers/dashboard/vehicles/add-ctrl.php" class="btn btn-primary text-uppercase fw-bold mx-2">Ajouter une véhicule</a>
                                <a href="/controllers/dashboard/vehicles/archive-ctrl.php?page=archive" class="btn btn-outline-primary text-uppercase fw-bold">Voir les véhicules archivées</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive shadow-lg p-4 bg-white rounded-4 text-center">
                                <table class="table table-borderless table-hover table-responsive align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                Catégorie
                                                <a href="/controllers/dashboard/vehicles/order-ctrl.php?order=ASC" class="btn btn-sm btn-light"><i class="bi bi-caret-up-fill mx-1 text-dark"></i></a>
                                                <a href="/controllers/dashboard/vehicles/order-ctrl.php?order=DESC" class="btn btn-sm btn-light"><i class="bi bi-caret-down-fill text-dark"></i></a>
                                            </th>
                                            <th scope="col">Marque</th>
                                            <th scope="col">Modèle</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($vehicles as $vehicle) { ?>
                                            <tr>
                                                <th scope="row" class="fw-semibold"><?= $vehicle->name ?></th>
                                                <td class="fw-semibold"><?= $vehicle->brand ?></td>
                                                <td class="fw-semibold"><?= $vehicle->model ?></td>
                                                <td class="fw-semibold">
                                                    <?php if (isset($vehicle->picture)) { ?>
                                                        <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="" class="object-fit-cover rounded-circle imgVehicles">
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="/controllers/dashboard/vehicles/update-ctrl.php?id=<?= $vehicle->id_vehicle ?>" class="text-decoration-none btn btn-sm btn-light">
                                                        <i class="bi bi-pencil-square text-dark fs-4"></i>
                                                    </a>
                                                    <a href="/controllers/dashboard/vehicles/archive-ctrl.php?id=<?= $vehicle->id_vehicle ?>" class="text-decoration-none btn btn-sm btn-light">
                                                        <i class="bi bi-archive text-dark fs-4"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>