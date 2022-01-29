<?php include_once(PATH_VIEW . '/includes/header.php'); ?>
    <h1>Mes Fiches de Frais</h1>

    <select class="form-select" aria-label="Default select example">
    <option selected>Choisissez le mois</option>
    <?php foreach($feesCards as $feesCard): ?>
        <option value="<?= $feesCard['mois'] ?>"><?= Helpers\DateHelper::formatMonth($feesCard['mois']) ?></option>
    <?php endforeach ?>
    </select>
<?php include_once(PATH_VIEW . '/includes/footer.php'); ?>