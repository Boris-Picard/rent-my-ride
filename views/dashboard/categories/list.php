<section class="myAccount bg-light h-100">
    <main class="d-flex flex-nowrap">
        <!-- SIDEBAR -->
        <div class="container-fluid sidebar rounded-4 py-5 mt-4">
            <div class="row ">
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
                            
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 pb-3 ">
                            <button class="btn border-0" id="backBtn"><i class="bi bi-arrow-left fs-4 align-middle"></i><span class="px-2">Revenir à la page précédente</span></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive shadow-lg p-4 bg-white rounded-4 text-center">
                                <table class="table table-borderless table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">N</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $value) { ?>
                                            <tr>
                                                <th scope="row" class="py-3"><?= $value['id_category'] ?></th>
                                                <td class="py-3"><?= $value['name'] ?></td>
                                                <td class="py-3 d-flex align-items-center justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-items-center mx-2">
                                                        <form action="/controllers/dashboard/categories/update-ctrl.php" method="GET">
                                                            <input type="hidden" name="id_category" value="<?= $value['id_category'] ?>">
                                                            <input type="hidden" name="name" value="<?= $value['name'] ?>">
                                                            <button href="/controllers/dashboard/categories/update-ctrl.php ?>" class="btn btn-outline-secondary fw-bold text-uppercase" id="editButton<?= $value['id_category'] ?>">
                                                                edit
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <button type="button" class="btn btn-outline-danger formDelete" data-bs-toggle="modal" data-bs-target="#modal<?= $value['id_category'] ?>">
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal<?= $value['id_category'] ?>" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="modal<?= $value['id_category'] ?>">Supprimer la catégorie : <span class="text-danger text-uppercase"><?= $value['name'] ?></span></h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible et entraînera la perte définitive des données associées.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="/controllers/dashboard/categories/delete-ctrl.php" method="POST">
                                                                        <input type="hidden" name="id_category" value="<?= $value['id_category'] ?>">
                                                                        <input type="hidden" name="name" value="<?= $value['name'] ?>">
                                                                        <button type="button" class="btn btn-secondary text-uppercase fw-bold" data-bs-dismiss="modal">annuler</button>
                                                                        <button type="submit" class="btn btn-danger text-uppercase fw-bold">Supprimer</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
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