<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Programação Para Internet II</title>
    <?php stylesheet_include_tag('/bootstrap/css/bootstrap.min.css',
                                 'application.css'); ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

  <!-- Docs master nav -->
  <header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">APS 02</a>
      </div>
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
        <ul class="nav navbar-nav">
          <li class="<?= activeClass('/') ?>">
            <?= link_to('/', 'Home') ?>
          </li>
          <li class="<?= activeClass('/contacts/new.php', '/contacts/receive.php') ?>">
            <?= link_to('/contacts/new.php', 'Fale conosco') ?>
           </li>
         <?php if (current_user ()) {?>
          <li class="<?= activeClass ('/admin/','/admin/index.php', '/admin/bestsellers.php', '/admin/more_views.php')?>">
            <?= link_to ('/admin/index.php', 'Área administrativa') ?>
         </li>
        <?php }?>
        </ul>
        <div class="pull-right">
          <ul class="nav navbar-nav">
            <?php if (current_user()) { ?>
              <li>
                <span class="welcome"> Olá <?= current_user('name') ?> </span>
              </li>
              <li>
                <?= link_to('/sessions/sign_out.php', 'Logout') ?>
              </li>
            <?php } else { ?>
              <li>
                <?= link_to('/sessions/new.php', 'Login') ?>
              </li>
            <?php } ?>
          </ul>       

        </div>
      </nav>
    </div>
  </header>

        <div class="flash-message">
          <div class="center-container">
            <?php foreach(flash() as $key => $value){ ?>
              <div class="alert alert-<?= $key ?> fade in">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 <?= $value ?>
              </div>
            <?php } ?>
        </div>
        </div>
     

