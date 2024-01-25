<!-- Main -->
<div class="container-fluid h-100">
    <div class="row py-5 mt-4">
        <div class="col-8 mx-auto">
            <div class="row">
                <div class="col-12 pb-5">
                    <h1 class="fw-bold text-uppercase">Ajouter une catégorie de véhicule</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
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
            <div class="row">
                <div class="col-12">
                    <form action="" method="POST" class="shadow-lg p-5 rounded-4">
                        <div class="mb-3">
                            <div><small class="form-text text-danger"><?= $error['name'] ?? '' ?></small></div>
                            <label for="name" class="form-label">Ajouter une catégorie de véhicule</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?= htmlentities($name ?? '') ?>" aria-describedby="name" placeholder="Ex: Une chaise" minlength="2" maxlength="70" pattern="<?= REGEX_NAME ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary fw-bold text-uppercase">Ajouter une catégorie</button>
                        <a href="/controllers/dashboard/categories/list-ctrl.php" class="btn btn-outline-primary fw-bold text-uppercase">Voir les catégories</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</section>