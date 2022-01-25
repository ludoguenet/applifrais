<?php include_once(PATH_VIEW . '/includes/header.php'); ?>
    <h1>Créer une fiche de frais</h1>
    <?php if ($currentMonthFeesCard): ?>
        <form action="./update" method="post">
            <div class="form-row">
                <?php foreach($feesLineCards as $feesLineCard): ?>
                    <label for=""><?= $feesLineCard['idFraisForfait'] ?></label>
                    <input type="number" class="form-control" name="<?= $feesLineCard['idFraisForfait'] ?>" value="<?= $feesLineCard['quantite'] ?>">
                <?php endforeach ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    <?php endif ?>
<?php include_once(PATH_VIEW . '/includes/footer.php'); ?>