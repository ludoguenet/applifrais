<?php include_once(PATH_VIEW . '/includes/header.php'); ?>
    <h1>Créer une fiche de frais (forfait)</h1>
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
    <?php if (count($noFeesLineCards) > 0): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Libellé</th>
                    <th scope="col">Date</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($noFeesLineCards as $noFeesLineCard): ?>
                    <tr>
                        <td><?= $noFeesLineCard['libelle'] ?></td>
                        <td><?= $noFeesLineCard['date'] ?></td>
                        <td><?= $noFeesLineCard['montant'] ?></td>
                        <td>
                            <a href="/hors-forfait/delete?id=<?= $noFeesLineCard['id'] ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
    <h1>Créer une fiche de frais (hors-forfait)</h1>
        <form action="/hors-forfait/store" method="post">
            <label for="">Libellé</label>
            <input type="text" class="form-control" name="libelle">
            <label for="">Date</label>
            <input type="date" class="form-control" name="date">
            <label for="">Montant</label>
            <input type="number" class="form-control" name="montant">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

<?php include_once(PATH_VIEW . '/includes/footer.php'); ?>