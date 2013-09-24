<?php
  define('APP_NAME', 'APS 02' );
  define('SITE_ROOT', '/aulas/aps02/' );
  define('APP_ROOT_FOLDER', $_SERVER['DOCUMENT_ROOT'] . '/' . SITE_ROOT );
  define('ASSETS_FOLDER', SITE_ROOT .  '/assets');
  define('IMAGES_FOLDER',ASSETS_FOLDER. '/img/') ;
   
  /* Adicionar pastas defaults para inclução de arquivos com as funções require e include */
  set_include_path(get_include_path() . PATH_SEPARATOR . APP_ROOT_FOLDER );
  set_include_path(get_include_path() . PATH_SEPARATOR . APP_ROOT_FOLDER  . '/config/');
  set_include_path(get_include_path() . PATH_SEPARATOR . APP_ROOT_FOLDER  . '/layout/');
  set_include_path(get_include_path() . PATH_SEPARATOR . APP_ROOT_FOLDER  . '/lib/');
  set_include_path(get_include_path() . PATH_SEPARATOR . APP_ROOT_FOLDER  . '/products/');

  session_start();
  /* define que a sessão expira depois de 30 minutos */
  session_cache_expire(30);

  date_default_timezone_set('America/Sao_Paulo');

  require 'images.php' ;
  require 'flash_message.php';
  require 'sessions.php';
  require 'utils.php';
  require 'cookies.php' ;
  require 'validations.php' ;
  require 'shopping_cart.php' ;
  require 'file.php' ;
?>
