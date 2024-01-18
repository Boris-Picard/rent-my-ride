<main>
    <section class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-5 pb-3">
                    <form action="" method="GET" novalidate class="d-flex">
                        <select class="form-select w-50" name="id_category" aria-label="Default select example">
                            <option selected disabled>Séléctionner une catégorie</option>
                            <?php foreach ($categories as $category) { ?>
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
                                    <li class="page-item"><a class="page-link " href="?page=<?= $page - 1 ?>">Previous</a></li>
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
                <!-- </div> -->
                <div class="col-12">
                    <div class="row g-3">
                        <?php foreach ($getPages as $vehicle) { ?>
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
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>