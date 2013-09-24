<?php require '_header.php'; ?>

<section>

  <form class="form-signin" action="sign_in.php" method="POST">
    <h2 class="form-signin-heading">Login</h2>
    <input type="text" class="form-control" name="email" placeholder="Seu email" autofocus>
    <input type="password" class="form-control" name="password" placeholder="Password">
    <label class="checkbox">
      <input type="checkbox" value="remember-me"> lembre-se
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
  </form>

</section>

<?php require '_footer.php'; ?>
