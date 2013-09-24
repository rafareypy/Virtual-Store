<?php
  //require 'validations.php';

  redirect_if_not_by_post('name', 'email', 'msg', 'location:new.php');

  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $msg = trim($_POST['msg']);

  $errors = array();

  notEmpty($name, 'name', $errors);
  validEmail($email, 'email', $errors);
  notEmpty($msg, 'msg', $errors);

  if (!empty($errors)) {
    flash('danger', 'Existe dados inválidos no seu formulário!');

    require '_header.php';
    require '_form.php';

  } else {
    flash('success', 'Dados recebidos com sucesso!');
    require '_header.php'; ?>

    <header class="page-header">
       <h1>Dados Recebidos</h1>
    </header>

    <p><strong>Nome:</strong> <?= $name ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <p><strong>Mensagem:</strong> <?= $msg ?></p>
    <p><a href='new.php'>Voltar</a></p>

<?php } require '_footer.php'; ?>
