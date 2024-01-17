<main>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row g-3">
                        <?php foreach ($vehicles as $vehicle) { ?>
                            <div class="col-4">
                                <div class="card shadow-lg border-0" style="width: 18rem;">
                                    <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $vehicle->brand ?></h5>
                                        <p class="card-text"><?= $vehicle->model ?></p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                                        <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
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