<?php

  function notEmpty($value, $key = null, &$errors = null){
    if (empty($value)){
      if ($key !== null && $errors !== null) {
        $msg = 'não deve ser vazio';
        $errors[$key] = $msg;
      }
      return false;
    }

    return true;
  }

  function validEmail($email, $key = null, &$errors = null){
    $pattern = '/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+/';

    if (preg_match($pattern, $email))
      return true;

    if ($key !== null && $errors !== null)
      $errors[$key] = 'não é válido';

    return false;
  }


  function isValidParams () {
    $params = func_get_args () ;

    foreach ($params as $param) {
        if (!isset($_POST[$param])) {
            return false ;
        } 
    }
    return true ;
  }
?>
