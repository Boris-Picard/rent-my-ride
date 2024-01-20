<main>
    <section class="bg-light d-flex align-items-center sectionVh">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row gx-5">
                        <div class="col-8">
                            <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="img-fluid rounded-4 shadow-lg" alt="<?= $vehicle->brand ?>">
                        </div>
                        <div class="col-4 p-4 rounded-4 h-75 shadow-lg">
                            <p class="fw-bold modelBrandVehicle"><?=$vehicle->brand?> <?= $vehicle->model ?></p>
                            <div class="hr">
                                <hr class="heightHrVehicle">
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-center">
                                    <div class="col-6">
                                        <p class="my-1 fw-bold">Plaque </p>
                                        <small class="fw-bold text-muted"><?= $vehicle->registration ?></small>
                                    </div>
                                    <div class="col-6">
                                        <p class="my-1 fw-bold">Kilométrage </p>
                                        <small class="fw-bold text-muted"><?= $vehicle->mileage ?> km</small>
                                    </div>
                                </div>
                                <div class="hr">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <a href="" class="btn reservationBtn w-100 fw-bold text-capitalize py-2">Réserver le véhicule</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>