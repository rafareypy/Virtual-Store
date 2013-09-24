<?php
  unset($_SESSION['user']);
  flash('success',  'Logout realizado com sucesso!');
  redirect_to('/')
?>
