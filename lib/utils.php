<?php
  /*
   * Funções destinadas a criação de urls
   * Importante, pois com elas não é necessário fazer diversas
   * alterações quando mudar a url principal do site
   */

  function link_to($path, $name, $options = '') {
    if (substr($path, 0, 1) == '/')
       $link = SITE_ROOT . $path;
     else
       $link = $path;
    return "<a href='{$link}' {$options}> $name </a>";
  }

  /* Inclui arquivos css
   * Se o caminho começar com / deve ser considerado a partir da pasta ASSETS_FOLDER
   * caso contrário a partir de ASSETS_FORLDER/css/
   */
  function stylesheet_include_tag() {
     $params = func_get_args();

     foreach($params as $param) {
        $path = ASSETS_FOLDER;
        $path .= (substr($param, 0, 1) === '/') ? $param : '/css/' . $param ;
        echo "<link href='{$path}' rel='stylesheet' type='text/css' />";
     }
  }

  /*
   * Inclui arquivos js
   * Se o caminho começar com / deve ser considerado a partir da pasta ASSETS_FOLDER
   * caso contrário a partir de ASSETS_FORLDER/css/
   */
  function javascript_include_tag(){
    $params = func_get_args();
    foreach($params as $param){
      $path = ASSETS_FOLDER;
      $path .= (substr($param, 0, 1) === '/') ? $param : '/js/' . $param ;
      echo "<script language='JavaScript' src='{$path}' type='text/JavaScript'></script>";
    }
  }

    /*=================================================*/
  /*
   * Funções destinadas a redirecionamento de páginas
   * Lembre-se que quando um endereço inicia-se com '/' diz respeito
   * a um caminho absoluto, caso contrário é um caminho relativo.
  */
  function redirect_to($address) {
    if (substr($address, 0, 1) == '/')
      header('location: ' . SITE_ROOT . $address);
    else
      header('location: ' . $address);
  }

  /*
   * Retorna o endereço da última página carregada,
   * caso não exista retorna o endereço da página principal da aplicação
   */
  function back(){
    if (isset($_SERVER['HTTP_REFERER'])){
      return $_SERVER['HTTP_REFERER'];
    }else{
      return '/';
    }
  }

  function activeClass() {
    $params = func_get_args();
    $url = $_SERVER['REQUEST_URI'];

    foreach($params as $param) {
      $link = SITE_ROOT . $param;
      if ($link == $url)
        return 'active';
    }
    return '';
  }

  function redirect_if_not_by_post() {
    $location = 'location: /';
    $params = func_get_args();
    $last_element = end($params);

    if (strpos($last_element, 'location:') !== false)
      $location = array_pop($params);

    foreach($params as $param){
      if (!isset($_POST[$param])){
        header($location);
        exit();
      }
    }
  }
?>
