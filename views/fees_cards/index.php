<?php include_once(PATH_VIEW . '/includes/header.php'); ?>
    <h1>Mes Fiches de Frais</h1>

    <form action="/fiches-de-frais" method="post">
        <div class="form-group mb-3">
            <select class="form-select" name="selected_month" aria-label="Default select example">
            <option selected>Choisissez le mois</option>
            <?php foreach($feesCards as $feesCard): ?>
                <option value="<?= $feesCard['mois'] ?>"><?= Helpers\DateHelper::formatMonth($feesCard['mois']) ?></option>
            <?php endforeach ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Consulter</button>
    </form>
<?php include_once(PATH_VIEW . '/includes/footer.php'); ?>