<main>
    <section class="bg-light d-flex align-items-center sectionVh">
        <div class="container mt-5">
            <h2>User Information Form</h2>
            <form>
                <div class="row shadow-lg rounded-4 p-5">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div><small class="form-text text-danger"><?= $error['firstname'] ?? '' ?></small></div>
                            <label for="firstname" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Ex : John">
                        </div>
                        <div class="mb-3">
                            <div><small class="form-text text-danger"><?= $error['lastname'] ?? '' ?></small></div>
                            <label for="lastname" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Ex : Doe">
                        </div>
                        <div class="mb-3">
                            <div><small class="form-text text-danger"><?= $error['email'] ?? '' ?></small></div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ex : johndoe@gmail.com">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div><small class="form-text text-danger"><?= $error['birthday'] ?? '' ?></small></div>
                            <label for="birthday" class="form-label">Anniversaire</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="mb-3">
                            <div><small class="form-text text-danger"><?= $error['phone'] ?? '' ?></small></div>
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Ex : 0699999999">
                        </div>
                        <div class="mb-3">
                            <div><small class="form-text text-danger"><?= $error['city'] ?? '' ?></small></div>
                            <label for="city" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Ex : Amiens">
                        </div>
                        <div class="mb-3">
                            <div><small class="form-text text-danger"><?= $error['zipcode'] ?? '' ?></small></div>
                            <label for="zipcode" class="form-label">Code postal</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Ex : 80000">
                        </div>
                        <button type="submit" class="btn p-2 btnValidForm w-100 fw-bold text-uppercase">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>