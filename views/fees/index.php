<?php include_once(PATH_VIEW . '/includes/header.php') ?>
    <h1>Mes Fiches de Frais</h1>

    <form action="/fiches-de-frais" method="post">
        <div class="form-group mb-3">
            <select class="form-select" name="selected_month" aria-label="Default select example">
            <option selected>Choisissez le mois</option>
            <?php foreach($feesCards as $feesCard): ?>
                <option value="<?= $feesCard['mois'] ?>"><?= App\Helpers\DateHelper::formatMonth($feesCard['mois']) ?></option>
            <?php endforeach ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Consulter</button>
    </form>

    <h2>Frais Forfaitisés</h2>
    <?php if (isset($feesLineCards)): ?>
        <?php if (count($feesLineCards) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Libellé</th>
                        <th scope="col">Date</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($feesLineCards as $feesLineCard): ?>
                        <tr>
                            <td>
                                <?= $feesLineCard['mois'] ?>
                            </td>
                            <td>
                                <?= $feesLineCard['idFraisForfait'] ?>
                            </td>
                            <td>
                                <?= $feesLineCard['quantite'] ?>
                            </td>
                            <td>
                                <?= $feesLineCard['total_count'] ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    <?php endif ?>

    <h2>Frais Non Forfaitisés</h2>
    <?php if (isset($noFeesLineCards)): ?>
        <?php if (count($noFeesLineCards) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Libellé</th>
                        <th scope="col">Date</th>
                        <th scope="col">Montant</th>
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
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    <?php endif ?>

<?php include_once(PATH_VIEW . '/includes/footer.php') ?>