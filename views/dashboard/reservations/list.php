<section class="myAccount bg-light h-100">
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
                            <a href="/controllers/dashboard/categories/list-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-tag px-3"></i>Category</span></a>
                            <a href="/controllers/dashboard/vehicles/list-ctrl.php" class="py-3  nav-link navLink sidebarLink"><span><i class="bi bi-car-front-fill px-3"></i>Véhicle</span></a>
                            <a href="/controllers/dashboard/reservations/list-ctrl.php" class="py-3 active nav-link navLink sidebarLink"><span><i class="bi bi-book-half px-3"></i> Reservations</span></a>
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
                            <h1 class="fw-bold text-uppercase">Liste des réservations</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-3">
                            <!-- <?= $msg ?> -->
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-6 pb-3 ">
                            <button class="btn border-0 btn-light" id="backBtn"><i class="bi bi-arrow-left fs-4 align-middle "></i><span class="px-2">Revenir à la page précédente</span></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive shadow-lg p-4 bg-white rounded-4 text-center">
                                <table class="table table-borderless table-hover table-responsive align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Date de début</th>
                                            <th scope="col">Date de fin</th>
                                            <th scope="col">Véhicule</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rents as $rent) { ?>
                                            <tr>
                                                <th scope="row" class="fw-semibold"><?= $rent->firstname ?></th>
                                                <td class="fw-semibold"><?= $rent->lastname ?></td>
                                                <td class="fw-semibold"><?= $rent->startdate ?></td>
                                                <td class="fw-semibold"><?= $rent->enddate ?></td>
                                                <td class="fw-semibold">
                                                    <?php if (isset($rent->picture)) { ?>
                                                        <img src="/public/uploads/vehicles/<?= $rent->picture ?>" alt="" class="object-fit-cover rounded-circle imgVehicles">
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="/controllers/dashboard/reservations/confirm-ctrl.php?id=<?=$rent->id_client?>&vehicle=<?=$rent->id_vehicle?>" class="btn btn-success fw-bold text-uppercase">Confimer</a>
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