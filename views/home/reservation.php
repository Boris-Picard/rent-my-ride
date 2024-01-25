<main>
    <section class="bg-light d-flex align-items-center sectionVh">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <?php if (isset($alert['success'])) { ?>
                        <div class="alert alert-success">
                            <?= $alert['success'] ?>
                        </div>
                    <?php } elseif (isset($alert['error'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <?= $alert['error'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <h1>Formulaire de réservation</h1>
            <div class="row">
                <div class="col-md-8 col-12">
                    <form action="#" novalidate method="POST">
                        <div class="row shadow-lg rounded-4 p-5">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['firstname'] ?? '' ?></small></div>
                                        <label for="firstname" class="form-label">Prénom <span class="text-danger">*</span></label>
                                        <input type="text" value="<?= $firstname ?? '' ?>" class="form-control" id="firstname" name="firstname" placeholder="Ex : John" minlength="2" maxlength="100" pattern="<?= REGEX_NAME ?>" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['lastname'] ?? '' ?></small></div>
                                        <label for="lastname" class="form-label">Nom <span class="text-danger">*</span></label>
                                        <input type="text" value="<?= $lastname ?? '' ?>" class="form-control" id="lastname" name="lastname" placeholder="Ex : Doe" minlength="2" maxlength="100" pattern="<?= REGEX_NAME ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <div><small class="form-text text-danger"><?= $error['email'] ?? '' ?></small></div>
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" value="<?= $email ?? '' ?>" id="email" name="email" placeholder="Ex : johndoe@gmail.com" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['birthdate'] ?? '' ?></small></div>
                                        <label for="birthdate" class="form-label">Anniversaire <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $birthdate ?? '' ?>" min="<?= (date('Y') - 100) . date('-m-d') ?>" max="<?= (date('Y') - 18) . date('-m-d') ?>">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['phone'] ?? '' ?></small></div>
                                        <label for="phone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" value="<?= $phone ?? '' ?>" id="phone" name="phone" placeholder="Ex : 0699999999" minlength="10" maxlength="10">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['city'] ?? '' ?></small></div>
                                        <label for="city" class="form-label">Ville <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="<?= $city ?? '' ?>" id="city" name="city" placeholder="Ex : Amiens">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['postal'] ?? '' ?></small></div>
                                        <label for="postal" class="form-label">Code postal <span class="text-danger">*</span></label>
                                        <input type="text" value="<?= $postal ?? '' ?>" class="form-control" id="postal" name="postal" placeholder="Ex : 80000">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['startDate'] ?? '' ?></small></div>
                                        <label for="startDate" class="form-label">Date de début de la réservation <span class="text-danger">*</span></label>
                                        <input type="datetime-local" class="form-control" id="startDate" name="startDate" value="<?= $startDateFormat ?? '' ?>" min="<?= date('Y-m-d H:i') ?>">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div><small class="form-text text-danger"><?= $error['endDate'] ?? '' ?></small></div>
                                        <label for="endDate" class="form-label">Date de fin de la réservation <span class="text-danger">*</span></label>
                                        <input type="datetime-local" class="form-control" id="endDate" name="endDate" value="<?= $endDateFormat ?? '' ?>" min="<?= date('Y-m-d H:i') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 p-0">
                                <div class="col-12 py-3">
                                    <div class="d-flex">
                                        <button type="submit" class="btn w-100 p-3 btnValidForm fw-bold text-uppercase">Valider</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card border-0 rounded-4 shadow-lg">
                        <div class="ratio ratio-16x9">
                            <img src="/public/uploads/vehicles/<?= $vehicle->picture ?>" class="img-fluid card-img-top object-fit-cover rounded-top-4 shadow-lg" alt="<?= $vehicle->brand ?>">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <p class="fw-bold modelBrandVehicle mb-0"><?= $vehicle->brand ?> <?= $vehicle->model ?></p>
                                        <div class="hr">
                                            <hr class="heightHrVehicle">
                                        </div>
                                        <div class="col-6">
                                            <p class="my-1 fw-bold">Plaque </p>
                                            <small class="fw-bold text-muted"><?= $vehicle->registration ?></small>
                                        </div>
                                        <div class="col-6">
                                            <p class="my-1 fw-bold">Kilométrage </p>
                                            <small class="fw-bold text-muted"><?= $vehicle->mileage ?> km</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>