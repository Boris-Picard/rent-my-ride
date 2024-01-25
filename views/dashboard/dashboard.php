        <!-- Main -->
        <div class="container-fluid h-100">
            <div class="row py-5 mt-4 text-center">
                <div class="col-12 col-md-8 mx-auto">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="fw-bold text-uppercase">
                                Bienvenu sur votre Dashboard
                            </h1>
                        </div>
                    </div>
                    <div class="row py-5">
                        <div class="col-md-6 col-12">
                            <div class="card h-100 rounded-4 shadow-lg border-0">
                                <div class="card-header rounded-top-4 py-4 bg-success">
                                    <h5 class="fw-bold text-light">Nombre de catégories de véhicules </h5>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="fw-bold card-text fs-1">
                                        <?= count($categories) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card rounded-4 h-100 shadow-lg border-0">
                                <div class="card-header rounded-top-4 bg-danger py-4">
                                    <h5 class="fw-bold text-light">
                                        Nombre de véhicules :
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text fw-bold fs-1">
                                        <?= count($vehicles) ?>
                                    </p>
                                    <p>
                                        <?php if ($vehicles) { ?>
                                            <small>Dernier ajout : <?= $date ?></small>
                                    <p>Marque : <span class="fw-semibold"><?= $vehicles[0]['brand'] ?></span></p>
                                    <p>Modèle : <span class="fw-semibold"><?= $vehicles[0]['model'] ?></span></p>
                                <?php } ?>
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card rounded-4 shadow-lg h-100 border-0">
                                <div class="card-header rounded-top-4 py-4 bg-secondary">
                                    <h5 class="card-title fw-bold text-light">Dernier enregistrement :</h5>
                                </div>

                                <div class="card-body">
                                    <p class="card-text text-start">
                                        Client : <span class="fw-bold"><?= $rents[0]->firstname . ' ' . $rents[0]->lastname ?></span>
                                    </p>
                                    <p class="card-text text-start">
                                        Date de début : <span class="fw-bold"><?= $rents[0]->startdate ?></span>
                                    </p>
                                    <p class="card-text text-start">
                                        Date de fin : <span class="fw-bold"><?= $rents[0]->enddate ?></span>
                                    </p>
                                    <p class="card-text text-start">
                                        Véhicule : <span class="fw-bold"><?= $rents[0]->brand . ' ' . $rents[0]->model ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
        </section>