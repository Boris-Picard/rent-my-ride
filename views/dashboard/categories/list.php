<section class="myAccount bg-light">
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
        <div class="container-fluid h-100">
            <div class="row py-5 mt-4">
                <div class="col-8 mx-auto">
                    <div class="row">
                        <div class="col-12 pb-5">
                            <h1 class="fw-bold text-uppercase">Liste des catégories de véhicule</h1>
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
                                <table class="table  table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">N</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $key) { ?>
                                            <tr>
                                                <th scope="row" class="py-3"><?= $key['id_category'] ?></th>
                                                <td class="py-3"><?= $key['name'] ?></td>
                                                <td class="py-3 w-25">
                                                    <div class="d-flex flex-wrap justify-content-center">
                                                        <button type="button" class="btn btn-outline-secondary text-uppercase fw-bold mx-2" data-bs-toggle="collapse" data-bs-target="#editCollapse<?= $key['id_category'] ?>" aria-expanded="false" aria-controls="editCollapse">edit</button>
                                                        <div class="collapse" id="editCollapse<?= $key['id_category'] ?>">
                                                            <form action="/controllers/dashboard/categories/update-ctrl.php" method="POST">
                                                                <div class="mb-3 d-flex justify-content-center flex-column align-items-center">
                                                                    <div><small id="lastnameHelp" class="form-text text-danger"><?= $error['name'] ?? '' ?></small></div>
                                                                    <label for="name" class="form-label mt-3 fw-semibold">Modifier la catégorie du véhicule</label>
                                                                    <input type="hidden" name="id_category" value="<?= $key['id_category'] ?>">
                                                                    <input type="text" class="form-control" name="name" id="name" value="<?= htmlentities($name ?? '') ?>" aria-describedby="name" placeholder="Ex: Une chaise" minlength="2" maxlength="70">
                                                                    <button type="submit" class="btn btn-outline-primary text-uppercase fw-bold mt-3">valider</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <button type="button" class="btn btn-outline-danger formDelete" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="modal">Supprimer la catégorie : <span class="text-danger text-uppercase"><?= $key['name'] ?></span></h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible et entraînera la perte définitive des données associées.
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="/controllers/dashboard/categories/delete-ctrl.php" method="POST">
                                                                            <input type="hidden" name="id_category" value="<?= $key['id_category'] ?>">
                                                                            <input type="hidden" name="name" value="<?= $key['name'] ?>">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                            <button type="submit" class="btn btn-danger">Sauvegarder les changements</button>
                                                                        </form>
                                                                    </div>
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


<!-- 
<button type="button" class="open btn btn-outline-secondary text-uppercase fw-bold" aria-label="Modal Button">edit</button>
                                                <div class="modalContainer">
                                                    <div class="modal">
                                                        <h5>
                                                            Github
                                                        </h5>
                                                        <ul>
                                                            <li>Versioning</li>
                                                            <li>Gestion de projet</li>
                                                            <li>Travail Collaboratif</li>
                                                        </ul>
                                                        <button class="close">
                                                            fermer
                                                        </button>
                                                    </div>
                                                </div> -->