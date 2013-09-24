<section class="contacts">
  <header class='page-header'>
      <h2>Formulário de Contato</h2>
  </header>

  <form role="form" action="receive.php" method='POST'>

    <div class="form-group <?= @$errors['name'] ? 'has-error' : '' ?>">
      <label class="control-label" for="contact_name">Nome:*</label>
      <input type="text" class="form-control" name="name" value="<?= @$name ?>"
             id="contact_name" placeholder="Seu nome">
      <p class="help-block"><?= @$errors['name'] ?></p>
    </div>

    <div class="form-group <?= @$errors['email'] ? 'has-error' : '' ?>">
      <label class="control-label" for="contact_email">Email:*</label>
      <input type="text" class="form-control" name="email" value="<?= @$email ?>"
             id="contact_email" placeholder="Seu nome">
      <p class="help-block"><?= @$errors['email'] ?></p>
    </div>


    <div class="form-group <?= @$errors['msg'] ? 'has-error' : '' ?>">
      <label class="control-label" for="contact_msg">Texto:*</label>
      <textarea id="contact_msg" class="form-control" name="msg"><?= @$msg ?></textarea>
      <p class="help-block"><?= @$errors['msg'] ?></p>
    </div>

    <input type="submit" value="Enviar" class="btn btn-primary" />
  </form>
</section>
