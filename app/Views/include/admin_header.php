<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= (isset($meta_title)?$meta_title:"Task") ?></title>
  <!-- bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/myStyle.css">
</head>
<body>
<!-- header sectio  -->
<div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container container-fluid">
      <a class="navbar-brand"> <| Quiz |></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page">@admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="logout">logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<!-- header sectio  -->
<!-- parent container  -->
<div class="container">