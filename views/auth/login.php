<?php include_once(PATH_VIEW . '/includes/header.php'); ?>
<h1>Se connecter</h1>

<form action="/login" method="post">
  <div class="mb-3">
    <label for="login">Identifiant</label>
    <input type="text" name="login" class="form-control">
  </div>

  <div class="mb-3">
    <label for="password">Mot de passe</label>
    <input type="password" name="password" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Valider</button>
  <button type="reset" class="btn btn-secondary">Réinitialiser</button>

</form>
<?php include_once(PATH_VIEW . '/includes/footer.php'); ?>