<!-- Main -->
<div class="container-fluid">
    <div class="row py-5 mt-4">
        <div class="col-8 mx-auto">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="fw-bold text-uppercase">Liste des réservations</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-3">
                    <?= $msg ?>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-6 pb-3 ">
                    <button class="btn border-0 btn-light" id="backBtn"><i class="bi bi-arrow-left fs-4 align-middle "></i><span class="px-2">Revenir à la page précédente</span></button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shadow-lg bg-white rounded-4 text-center mb-5">
                        <div class="card-header bg-success p-2">
                            <h2 class="fw-bold text-white text-uppercase">Liste des véhicules à confirmer</h2>
                        </div>
                        <table class="table table-borderless table-hover table-responsive align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date de début</th>
                                    <th scope="col">Date de fin</th>
                                    <th scope="col">Véhicule</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rents as $rent) { ?>
                                    <tr>
                                        <th scope="row" class="fw-semibold"><?= $rent->firstname ?></th>
                                        <td class="fw-semibold"><?= $rent->lastname ?></td>
                                        <td class="fw-semibold"><?= $rent->startdate ?></td>
                                        <td class="fw-semibold"><?= $rent->enddate ?></td>
                                        <td class="fw-semibold">
                                            <?php if (isset($rent->picture)) { ?>
                                                <img src="/public/uploads/vehicles/<?= $rent->picture ?>" alt="" class="object-fit-cover rounded-circle imgVehicles">
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/controllers/dashboard/reservations/confirm-ctrl.php?id=<?= $rent->id_client ?>&vehicle=<?= $rent->id_vehicle ?>" class="btn btn-success fw-bold text-uppercase">Confimer</a>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shadow-lg bg-white rounded-4 text-center">
                        <div class="card-header bg-danger p-2">
                            <h2 class="fw-bold text-white text-uppercase">Liste des véhicules réservés</h2>
                        </div>
                        <table class="table table-borderless table-hover table-responsive align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date de début</th>
                                    <th scope="col">Date de fin</th>
                                    <th scope="col">Véhicule</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($confirmedRents as $rent) { ?>
                                    <tr>
                                        <th scope="row" class="fw-semibold"><?= $rent->firstname ?></th>
                                        <td class="fw-semibold"><?= $rent->lastname ?></td>
                                        <td class="fw-semibold"><?= $rent->startdate ?></td>
                                        <td class="fw-semibold"><?= $rent->enddate ?></td>
                                        <td class="fw-semibold">
                                            <?php if (isset($rent->picture)) { ?>
                                                <img src="/public/uploads/vehicles/<?= $rent->picture ?>" alt="" class="object-fit-cover rounded-circle imgVehicles">
                                            <?php } ?>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                <?php }
                                ?>
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