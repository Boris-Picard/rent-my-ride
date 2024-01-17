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
                            <a href="/controllers/dashboard/categories/list-ctrl.php" class="py-3 nav-link active navLink sidebarLink"><span><i class="bi bi-tag px-3"></i>Category</span></a>
                            <a href="/controllers/dashboard/vehicles/list-ctrl.php" class="py-3 nav-link navLink sidebarLink"><span><i class="bi bi-car-front-fill px-3"></i>Véhicle</span></a>
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
                            <h1 class="fw-bold text-uppercase">Liste des catégories de véhicule</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-3">
                            <?= $msg ?>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-6 pb-3 ">
                            <button class="btn border-0 btn-light" id="backBtn"><i class="bi bi-arrow-left fs-4 align-middle"></i><span class="px-2">Revenir à la page précédente</span></button>
                        </div>
                        <div class="col-6 pt-3">
                            <div class="d-flex justify-content-end m-0">
                                <a href="/controllers/dashboard/categories/add-ctrl.php" class="btn btn-primary text-uppercase fw-bold mx-2">Ajouter une catégorie</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive shadow-lg p-4 bg-white rounded-4 text-center ">
                                <table class="table table-borderless table-hover table-responsive align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">N</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categories as $category) { ?>
                                            <tr>
                                                <th scope="row" class="py-3"><?= $category->id_category ?></th>
                                                <td class="fw-semibold"><?= $category->name ?></td>
                                                <td>
                                                    <a href="/controllers/dashboard/categories/update-ctrl.php?id=<?= $category->id_category ?>" class="text-decoration-none btn btn-sm btn-light">
                                                        <i class="bi bi-pencil-square text-dark fs-4"></i>
                                                    </a>
                                                    <a href="" class="formDelete btn btn-sm btn-light" data-category-name="<?= $category->name ?>" data-category-id="<?= $category->id_category ?>" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                                        <i class="bi bi-trash3-fill fs-4 text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title modalVehicle fs-5">Supprimer la catégorie : <span class="text-danger"></span></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible et entraînera la perte définitive des données associées.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary text-uppercase fw-bold" data-bs-dismiss="modal">annuler</button>
                                        <a href="" class="btn btn-danger deleteModalBtn text-uppercase fw-bold">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>