<!-- Main -->
<div class="container-fluid">
    <div class="row py-5 mt-4">
        <div class="col-8 mx-auto">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="fw-bold text-uppercase">Confirmer la réservation</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-3">
                    <!-- <?= $msg ?> -->
                </div>
            </div>
            <div class="row g-2">
                <div class="col-6 pb-3 ">
                    <button class="btn border-0 btn-light" id="backBtn"><i class="bi bi-arrow-left fs-4 align-middle "></i><span class="px-2">Revenir à la page précédente</span></button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1><?= $rent[0]->brand ?> <?= $rent[0]->model ?></h1>
                    <div class="row">
                        <div class="col-6">
                            <div class="ratio ratio-16x9">
                                <img src="/public/uploads/vehicles/<?= $rent[0]->picture ?>" alt="" class="object-fit-cover rounded-4">
                            </div>
                        </div>
                        <div class="col-6 p-3">
                            <p>Prénom : <span class="fw-bold"><?= $rent[0]->firstname ?></span></p>
                            <p>Nom : <span class="fw-bold"><?= $rent[0]->lastname ?></span></p>
                            <p>Age : <span class="fw-bold"><?= $rent[0]->birthday ?></span></p>
                            <p>Email : <span class="fw-bold"><?= $rent[0]->email ?></span></p>
                            <p>Début de la réservation : <span class="fw-bold"><?= $rent[0]->startdate ?></span></p>
                            <p>Fin de la réservation : <span class="fw-bold"><?= $rent[0]->enddate ?></span></p>
                            <form action="" method="POST">
                                <div class="py-3 d-flex justify-content-center">
                                    <a href="/controllers/dashboard/reservations/confirm-ctrl.php?id=<?= $rent[0]->id_client ?>&vehicle=<?= $rent[0]->id_vehicle ?>&mail=true" class="btn btn-success fw-bold text-uppercase">Envoyer un mail de confirmation</a>
                                </div>
                                <div class="py-3 d-flex justify-content-center">
                                    <a href="/controllers/dashboard/reservations/confirm-ctrl.php?id=<?= $rent[0]->id_client ?>&vehicle=<?= $rent[0]->id_vehicle ?>&delete=<?= $rent[0]->id_rent ?>" class="btn btn-danger fw-bold text-uppercase">Annuler la réservation</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</section>