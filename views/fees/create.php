<?php include_once(PATH_VIEW . '/includes/header.php'); ?>
    <h1>Créer une fiche de frais (forfait)</h1>

    <?php if ($currentMonthFeesCard): ?>
        <form action="./update" method="post">

                <?php foreach($feesLineCards as $feesLineCard): ?>
                    <div class="mb-3">
                        <label for=""><?= $feesLineCard['idFraisForfait'] ?></label>
                        <input type="number" class="form-control" name="<?= $feesLineCard['idFraisForfait'] ?>" value="<?= $feesLineCard['quantite'] ?>">
                    </div>
                <?php endforeach ?>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    <?php endif ?>

    <?php if (count($noFeesLineCards) > 0): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Libellé</th>
                    <th scope="col">Date</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Justificatif</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($noFeesLineCards as $noFeesLineCard): ?>
                    <tr>
                        <td>
                            <?= $noFeesLineCard['libelle'] ?>
                        </td>
                        <td>
                            <?= $noFeesLineCard['date'] ?>
                        </td>
                        <td>
                            <?= $noFeesLineCard['montant'] ?>
                        </td>
                        <td>
                            <?php if ($noFeesLineCard['chemin_justificatif']): ?>
                                <a
                                href="<?= $noFeesLineCard['chemin_justificatif'] ?>"
                                class="btn btn-secondary"
                                target="_blank"
                                download>
                                Télécharger le justificatif</a>
                            <?php endif ?>
                        </td>
                        <td>
                            <a href="/hors-forfait/delete?id=<?= $noFeesLineCard['id'] ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
    
    <div class="mt-5">
        <h1>Créer une fiche de frais (hors-forfait)</h1>
        <form action="/hors-forfait/store" method="post" enctype="multipart/form-data">
            <div class="mb-3">    
                <label for="">Libellé</label>
                <input type="text" class="form-control" name="libelle">
            </div>
            <div class="mb-3">
                <label for="">Date</label>
                <input type="date" class="form-control" name="date">
            </div>
            <div class="mb-3">
                <label for="">Montant</label>
                <input type="number" class="form-control" name="montant">
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlFile1">Envoyer un justificatif</label>
                <input type="file"
                    class="form-control-file"
                    name="justificatif"
                    id="exampleFormControlFile1"
                >
            </div>
            <button type="submit" class="btn btn-dark">Enregistrer</button>
        </form>
    </div>

<?php include_once(PATH_VIEW . '/includes/footer.php'); ?>