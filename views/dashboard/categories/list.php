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
                            <!-- <a href="" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-chat px-3"></i> Messages</span></span></a> -->
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
                            <h1 class="fw-bold text-uppercase">Liste des catégories de véhicule</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive shadow-lg p-4 bg-white rounded-4 text-center">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">N</th>
                                            <th scope="col">Nom</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="py-3">1</th>
                                            <td class="py-3"></td>
                                            <td class="py-3"><button class="btn btn-outline-secondary text-uppercase fw-bold">edit</button><i class="bi bi-trash3-fill"></i></td>
                                        </tr>
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