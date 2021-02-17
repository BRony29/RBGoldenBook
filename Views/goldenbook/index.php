<?php
if (isset($_GET) && !empty($_GET)) {
    $_SESSION['redirect'] = '/' . $_GET['p'];
}
?>

<section class="goldenbook container mb-3">
    <div class="row border rounded shadow p-2 mb-3 bg-gray">
        <div class="col-11 fw-bold text-dark">
            <b>Bienvenue sur RBGoldenBook !</b><br>
        </div>
        <div class="col-1 text-end my-auto">
            <button class="btn btn-success btn-xs me-1" type="button" data-bs-toggle="modal" data-bs-target="#ajoutComment" title="Ajouter un Commentaire"><i class="fas fa-plus"></i></button>
        </div>
        <div class="col-sm-12 text-center">
            <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
                <div class="col-sm-12">
                    <span class="text-danger fw-bold"><?= $_SESSION['error'] ?></span>
                    <?php $_SESSION['error'] = '' ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])) : ?>
                <div class="col-sm-12">
                    <span class="text-success fw-bold"><?= $_SESSION['success'] ?></span>
                    <?php $_SESSION['success'] = '' ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php foreach ($goldenbooks as $goldenbook) : ?>
        <div class="row goldenbook__content shadow textAnim mb-3 border rounded p-2 text-light">
            <div class="col-sm-6"><b>Pseudo :</b> <?= $goldenbook->nickname; ?></div>
            <div class="col-sm-6 text-end d-none d-sm-block">
                <b>Date :</b> <?= strftime('%x %R', strtotime($goldenbook->date)); ?>
                <?php if ($_SESSION['user'] === 'Administrateur') : ?>
                    <button class="btn btn-warning btn-xs ms-1" type="button" data-bs-toggle="modal" data-bs-target="#editComment" data-bs-idEdit="<?= $goldenbook->id ?>" data-bs-emailEdit="<?= $goldenbook->email ?>" data-bs-nicknameEdit="<?= $goldenbook->nickname ?>" data-bs-commentEdit="<?= $goldenbook->comment ?>" title="Editer le commentaire"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#deleteComment" data-bs-idDelete="<?= $goldenbook->id ?>" title="Supprimer le commentaire"><i class="fas fa-trash"></i></button>
                <?php endif; ?>
            </div>
            <div class="col-sm-6 d-block d-sm-none">
                <b>Date :</b> <?= strftime('%x %R', strtotime($goldenbook->date)); ?>
                <?php if ($_SESSION['user'] === 'Administrateur') : ?>
                    <button class="float-end btn btn-danger btn-xs ms-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteComment" data-bs-idDelete="<?= $goldenbook->id ?>" title="Supprimer le commentaire"><i class="fas fa-trash"></i></button>
                    <button class="float-end btn btn-warning btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#editComment" data-bs-idEdit="<?= $goldenbook->id ?>" data-bs-emailEdit="<?= $goldenbook->email ?>" data-bs-nicknameEdit="<?= $goldenbook->nickname ?>" data-bs-commentEdit="<?= $goldenbook->comment ?>" title="Editer le commentaire"><i class="fas fa-pencil-alt"></i></button>
                <?php endif; ?>
            </div>
            <hr class="mt-1 mb-2">
            <div class="col-sm-12"><b>Commentaire :</b> <?= nl2br($goldenbook->comment); ?></div>
        </div>
    <?php endforeach; ?>
</section>