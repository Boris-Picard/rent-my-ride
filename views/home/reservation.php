<main>
    <section class="bg-light d-flex align-items-center sectionVh">
        <div class="container mt-5">
            <h2>User Information Form</h2>
            <form action="#" method="POST">
                <div class="row shadow-lg rounded-4 p-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div><small class="form-text text-danger"><?= $error['firstname'] ?? '' ?></small></div>
                                <label for="firstname" class="form-label">Prénom</label>
                                <input 
                                type="text" 
                                value="<?= $firstname ?? '' ?>" 
                                class="form-control" 
                                id="firstname" 
                                name="firstname" 
                                placeholder="Ex : John" 
                                minlength="2" 
                                maxlength="100" 
                                pattern="<?= REGEX_NAME ?>" 
                                required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div><small class="form-text text-danger"><?= $error['lastname'] ?? '' ?></small></div>
                                <label for="lastname" class="form-label">Nom</label>
                                <input 
                                type="text" 
                                value="<?= $lastname ?? '' ?>" 
                                class="form-control" 
                                id="lastname" 
                                name="lastname" 
                                placeholder="Ex : Doe"
                                minlength="2" 
                                maxlength="100" 
                                pattern="<?= REGEX_NAME ?>" 
                                required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <div><small class="form-text text-danger"><?= $error['email'] ?? '' ?></small></div>
                                <label for="email" class="form-label">Email</label>
                                <input 
                                type="email" 
                                class="form-control" 
                                value="<?= $email ?? '' ?>" 
                                id="email" 
                                name="email" 
                                placeholder="Ex : johndoe@gmail.com"
                                required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div><small class="form-text text-danger"><?= $error['birthdate'] ?? '' ?></small></div>
                                <label for="birthdate" class="form-label">Anniversaire</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $birthdate ?? '' ?>" min="<?= (date('Y') - 100) . date('-m-d') ?>" max="<?= (date('Y') - 18) . date('-m-d') ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <div><small class="form-text text-danger"><?= $error['phone'] ?? '' ?></small></div>
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" value="<?= $phone ?? '' ?>" id="phone" name="phone" placeholder="Ex : 0699999999" minlength="10" maxlength="10">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div><small class="form-text text-danger"><?= $error['city'] ?? '' ?></small></div>
                                <label for="city" class="form-label">Ville</label>
                                <input type="text" class="form-control" value="<?= $city ?? '' ?>" id="city" name="city" placeholder="Ex : Amiens">
                            </div>
                            <div class="mb-3 col-md-6">
                                <div><small class="form-text text-danger"><?= $error['postal'] ?? '' ?></small></div>
                                <label for="postal" class="form-label">Code postal</label>
                                <input type="text" value="<?= $postal ?? '' ?>" class="form-control" id="postal" name="postal" placeholder="Ex : 80000">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-3">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn w-100 p-3 btnValidForm fw-bold text-uppercase">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>