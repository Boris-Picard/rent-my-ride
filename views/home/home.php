<main>
    <section class="p-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 pb-3">
                    <p class="fw-semibold">Vous cherchez une catégorie en particulier ?</p>
                    <form action="" class="d-flex">
                        <select class="form-select w-50" name="id_category" aria-label="Default select example">
                            <option selected disabled>Séléctionner une catégorie</option>
                            <?php foreach ($listCategories as $category) { ?>
                                <option value="<?= $category->id_category ?>" <?= (isset($id_category) && $id_category == $category->id_category) ? 'selected' : '' ?>><?= $category->name ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn mx-3 homeSelectBtn fw-bold text-capitalize">Valider</button>
                </div>
                <div class="col-md-6 col-12 pb-3">
                    <div class="d-flex justify-content-end">
                        <p class="fw-semibold">Vous cherchez un modèle en particulier ?</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="input-group md-form form-sm form-2 pl-0 w-50">
                            <input class="form-control my-0 py-1" name="search" type="search" value="<?= isset($searched) ? $searched : '' ?>" placeholder="Chercher un modèle">
                            <span class="input-group-text searchLogo" id="basic-text1">
                                <i class="bi bi-search text-white" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex">
                        <h3 class="fw-bold">
                            <span class="onlyColor"><?= $vehicles ?></span> véhicules trouvés
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row g-3">
                    <?php if ($vehicles == 0) { ?>
                        <div class="col-12 py-5 mt-5 d-flex justify-content-center">
                            <h1 class="text-danger fw-bold fs-1">
                                Aucun résultat trouvé
                            </h1>
                        </div>
                    <?php } ?>
                    <?php foreach ($limitPages as $vehicle) { ?>
                        <div class="col-md-4 col-12">
                            <div class="card border-0 rounded-4 bg-white shadow-lg">
                                <?php if (isset($vehicle->picture)) { ?>
                                    <div class="ratio ratio-16x9">
                                        <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="card-img-top object-fit-cover rounded-top-4" alt="<?= $vehicle->model ?>">
                                    </div>
                                <?php } ?>
                                <div class="card-body">
                                    <div class="pb-2">
                                        <small class="card-title fw-semibold nameColor"><?= $vehicle->name ?></small>
                                    </div>
                                    <a href="/controllers/home/vehicle-ctrl.php?id=<?= $vehicle->id_vehicle ?>" class="text-decoration-none stretched-link text-dark">
                                        <h2 class="card-text fw-bold cardBrandModel"><?= $vehicle->brand . ' ' . $vehicle->model ?></h2>
                                    </a>
                                    <div class="hr">
                                        <hr>
                                    </div>
                                    <div class="justify-content-between d-flex">
                                        <small class="text-muted fw-semibold"><?= $vehicle->mileage ?> km</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center py-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination shadow-lg">
                                <li class="page-item"><a class="page-link paginationColor border-0" href="?page=<?= $page - 1 ?><?= $id_category != null ? '&id_category=' . $id_category : '' ?>">Précédent</a></li>
                                <?php for ($p = 1; $p <= $nbPages; $p++) {  ?>
                                    <li class="page-item"><a class="page-link paginationColor border-0 <?= $page == $p ? 'active' : '' ?>" href="?page=<?= $p ?><?= $id_category != null ? '&id_category=' . $id_category : '' ?>"><?= $p ?></a></li>
                                <?php }  ?>
                                <li class="page-item"><a class="page-link paginationColor border-0" href="?page=<?= $page + 1 ?><?= $id_category != null ? '&id_category=' . $id_category : '' ?>">Suivant</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>