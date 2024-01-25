<?php 
require_once __DIR__ . '/../../models/Rent.php';
$rents = Rent::getAll() ?>
<section class="myAccount bg-light">
    <main class="d-flex flex-nowrap">
        <!-- SIDEBAR -->
        <div class="container-fluid sidebar rounded-4 py-5 mt-4">
            <div class="row">
                <div class="col-md-12 col-4 p-0 rounded-4 shadow-lg bg-white">
                    <div class="row m-0 p-0">
                        <div class="d-flex justify-content-center py-3">
                            <a class="navbar-brand nameLogoAccount" href="/controllers/home/home-ctrl.php">Rent my Ride</a>
                        </div>
                        <div class="col-12 col-4 d-flex flex-column p-0 sidebar rounded colSidebar g-5">
                            <a href="/controllers/dashboard/dashboard-ctrl.php" class="py-3 nav-link navLink <?= $dashboard ? 'active' : null ?> sidebarLink"><span><i class="bi bi-house px-3"></i> Dashboard</span></a>
                            <a href="/controllers/dashboard/categories/list-ctrl.php" class="py-3 nav-link <?= $categoriesActive ? 'active' : null ?> navLink sidebarLink"><span><i class="bi bi-tag px-3"></i>Category</span></a>
                            <a href="/controllers/dashboard/vehicles/list-ctrl.php" class="py-3 nav-link <?= $vehiclesActive ? 'active' : null ?> navLink sidebarLink"><span><i class="bi bi-car-front-fill px-3"></i>Véhicle</span></a>
                            <a href="/controllers/dashboard/reservations/list-ctrl.php" class="py-3 nav-link <?= $reservationsActive ? 'active' : null ?> navLink sidebarLink"><span><i class="bi bi-book-half px-3"></i> Reservations </span><span class="badge text-bg-danger"><?=count($rents)?></span></a>
                            <!-- <a href="" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-people px-3"></i> Users</span></a> -->
                            <!-- <a href="" class="mb-3 py-3 navLink logout position-absolute sidebarLink w-100 nav-link"><span><i class="bi bi-box-arrow-right px-3"></i>Logout</span></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>