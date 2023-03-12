<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <!-- bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/myStyle.css">
</head>
<body>
<!-- header sectio  -->
<div class="container w-50 m-auto mt-5">
    <h1>Admin Login</h1>
    <?php if (isset($validation)) : ?>
        <div><?= $validation->listErrors() ?></div>
    <?php endif ?>
    <?php if (isset($error)) : ?>
        <div><?= $error ?></div>
    <?php endif ?>
    <div class="col-12 m-auto ms-5 mt-5">
    <form action="Admin/login" method="post"> 
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control w-50" id="email" name="email" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control w-50" id="password" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</div>
<!-- parent container  -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/myScript.js"></script>
</body>
</html>