<section class="header mt-1 mb-3 container border rounded">
    <div class="row">
        <div class="col-7 my-2">
            <a href="/" class="h1 text-dark text-decoration-none"><img src="/public/images/rb_logo.png" alt="Logo" class="me-1">RBGoldenBook</a>
        </div>
        <div class="col-5 my-2 text-end my-auto">
            <p class="header__login fw-bold m-0"><?= $_SESSION['user']; ?></p>
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