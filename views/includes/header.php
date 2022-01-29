<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="https://clemtimber.files.wordpress.com/2017/12/logo-gsb.png?w=70">
    </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">🏠 Accueil</a>
        </li>
        <?php if (App\Helpers\Auth::check()): ?>
          <li class="nav-item">
            <a class="nav-link" href="/fiches-de-frais">📂 Consulter fiches de frais</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/fiches-de-frais/create">✍️ Ajouter fiche</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">🚪 Se déconnecter</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="/login">🔒 Se connecter</a>
          </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-5">