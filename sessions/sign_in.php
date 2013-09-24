<?php
  //require 'validations.php';

  redirect_if_not_by_post('email', 'password', 'location: new.php');

  $email = $_POST['email'];
  $password = $_POST['password'];

  //.. Recuperando dados do banco de dados
  $email_db = 'user@admin.com';
  $password_db = '123456';

  if ($email_db === $email && $password_db == $password) {
    $_SESSION['user']['name'] = "Usuário";
    flash('success',  'Login realizado com sucesso!');
        
    redirect_to('/admin');
    
  }else{
    flash('danger',  'Usuário ou Senha incorretos');
    redirect_to('new.php');
  }
?>
