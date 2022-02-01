<?php if (isset($_SESSION['errors'])): ?>
    <?php foreach($_SESSION['errors'] as $error): ?>
    <div class="alert alert-danger" role="alert">
        <strong>Erreur!</strong> <?= $error ?>
    </div>
    <?php endforeach ?>
    <?php unset($_SESSION['errors']) ?>
<?php endif ?>
