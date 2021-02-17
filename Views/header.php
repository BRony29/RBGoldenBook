<section class="header mt-1 mb-3 container border rounded">
    <div class="row">
        <div class="col-9 my-2">
            <h1><a href="/"><img src="/public/images/rb_logo.png" alt="Logo" class="me-2"></a>RBGoldenBook</h1>
        </div>
        <div class="col-3 my-2 text-end my-auto">
            <span class="me-2 fw-bold"><?= $_SESSION['user']; ?></span>
            <?php if ($_SESSION['user'] === 'Visiteur') : ?>
                <button class="btn btn-dark btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#login" title="Connexion"><i class="fas fa-user"></i></button>
            <?php endif; ?>
            <?php if ($_SESSION['user'] === 'Administrateur') : ?>
                <button class="btn btn-warning btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#editLogin" title="Modifier le login Administrateur"><i class="fas fa-user-edit"></i></button>
                <button class="btn btn-warning btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#editPassword" title="Modifier le mdp Administrateur"><i class="fas fa-key"></i></button>
                <button class="btn btn-warning btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#editEmail" title="Modifier l'adresse email Administrateur"><i class="fas fa-at"></i></button>
                <button class="btn btn-danger btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#logout" title="Logout"><i class="fas fa-user"></i></button>
            <?php endif; ?>
        </div>
    </div>
</section>