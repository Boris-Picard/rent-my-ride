<main>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-4 pb-3">
                    <form action="" method="POST" novalidate class="d-flex">
                        <select class="form-select" name="id_category" aria-label="Default select example">
                            <option selected disabled>Séléctionner une catégorie</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?= $category->id_category ?>" <?= (isset($id_category) && $id_category == $category->id_category) ? 'selected' : '' ?>><?= $category->name ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn btn-primary mx-3">Valider</button>
                    </form>
                </div>
                <div class="col-12">
                    <div class="row g-3">
                        <?php foreach ($getPages as $vehicle) {
                            if (isset($id_category) && $id_category == $vehicle->id_category) { ?>
                                <div class="col-4">
                                    <div class="card shadow-lg border-0 rounded-4" style="width: 18rem;">
                                        <!-- <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="card-img-top" alt="..."> -->
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $vehicle->name ?></h5>
                                            <p class="card-text"><?= $vehicle->brand ?></p>
                                            <p class="card-text"><?= $vehicle->model ?></p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } elseif (empty($id_category)) { ?>
                                <div class="col-4">
                                    <div class="card shadow-lg border-0 rounded-4" style="width: 18rem;">
                                        <!-- <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="card-img-top" alt="..."> -->
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $vehicle->name ?></h5>
                                            <p class="card-text"><?= $vehicle->brand ?></p>
                                            <p class="card-text"><?= $vehicle->model ?></p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center py-2">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <?php if ($page > 1) { ?>
                                            <li class="page-item rounded-circle"><a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a></li>
                                        <?php } ?>
                                        <?php for ($i = 1; $i <= $nbPages; $i++) {  ?>
                                            <li class="page-item"><a class="page-link <?= $page == $i ? 'active' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a></li>
                                        <?php }  ?>
                                        <?php if ($page < $nbPages) { ?>
                                            <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>