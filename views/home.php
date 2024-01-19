<main>
    <section class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-5 pb-3">
                    <form action="" novalidate class="d-flex">
                        <select class="form-select w-50" name="id_category" aria-label="Default select example">
                            <small class="text-danger"><?= $error['categories'] ?></small>
                            <option selected disabled>Séléctionner une catégorie</option>
                            <?php foreach ($listCategories as $category) { ?>
                                <option value="<?= $category->id_category ?>" <?= (isset($id_category) && $id_category == $category->id_category) ? 'selected' : '' ?>><?= $category->name ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn btn-primary mx-3">Valider</button>
                    </form>
                </div>
                <!-- <div class="row"> -->
                <div class="col-6">
                    <div class="d-flex align-items-center pb-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php if ($page > 1) { ?>
                                    <li class="page-item"><a class="page-link " href="?page=<?= $page - 1 ?><?= $id_category != null ? '&id_category=' . $id_category : '' ?>">Previous</a></li>
                                <?php } ?>
                                <?php for ($i = 1; $i <= $nbPages; $i++) {  ?>
                                    <li class="page-item"><a class="page-link <?= $page == $i ? 'active' : '' ?>" href="?page=<?= $i ?><?= $id_category != null ? '&id_category=' . $id_category : '' ?>"><?= $i ?></a></li>
                                <?php }  ?>
                                <?php if ($page < $nbPages) { ?>
                                    <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?><?= $id_category != null ? '&id_category=' . $id_category : '' ?>">Next</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- </div> -->
                <div class="col-12">
                    <div class="row g-3">
                        <?php foreach ($limitPages as $vehicle) { ?>
                            <div class="col-md-4 col-12">
                                <div class="card border-0 rounded-4 bg-white shadow-lg">
                                    <?php if (isset($vehicle->picture)) { ?>
                                        <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="card-img-top rounded-top-4" alt="<?= $vehicle->model ?>">
                                    <?php } ?>
                                    <div class="card-body">
                                        <div class="pb-2">
                                            <small class="card-title fw-semibold nameColor"><?= $vehicle->name ?></small>
                                        </div>
                                        <!-- <p class="card-text fw-bold"><?= $vehicle->brand ?></p> -->
                                        <a href="" class="text-decoration-none stretched-link text-dark"><h2 class="card-text fw-bold cardBrandModel"><?= $vehicle->brand . ' ' . $vehicle->model ?></h2></a>
                                        <hr>
                                        <div class="justify-content-between d-flex">
                                            <small class="text-muted fw-semibold"><?= $vehicle->mileage ?> km</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>