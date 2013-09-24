<?php

function should_be_autenticated(){
  if (!(isset($_SESSION['user']))) {
    flash('danger', 'Você deve estar logado para acessar está página!');
    redirect_to('/sessions/new.php');
    exit();
  }
}

function should_not_be_autenticated(){
  if (isset($_SESSION['user'])) {
    flash('warning', 'Você deve estar deslogado para acessar está página!');
    redirect_to('/');
    exit();
  }
}


function current_user($key = null) {
  if (isset($_SESSION['user'])) {
    if ($key)
      return $_SESSION['user'][$key];
    return true;
  }
  return false;
}
?>
