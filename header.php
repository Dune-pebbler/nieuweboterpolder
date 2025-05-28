<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?= wp_title(); ?>
  </title>

  <!-- Google Tag Manager -->
  <script>
    (function (w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-W2GJHQ43');
  </script>
  <!-- End Google Tag Manager -->
  <link href="<?= get_stylesheet_directory_uri(); ?>/assets/owlcarousel/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= get_stylesheet_directory_uri(); ?>/stylesheets/bootstrap-grid.css" rel="stylesheet">
  <link href="<?= get_stylesheet_directory_uri(); ?>/stylesheets/style.css" rel="stylesheet">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sacramento&display=swap"
    rel="stylesheet">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGV9e4PJY_jDfxttGQewqlVtxJ9tluRno&callback=initMap"
    async defer></script>
  <?php wp_head(); ?>
</head>

<style>
  iframe {
    width: 100%;
    border: 0;
  }
  header .logo-container {
    right:calc(50% + 300px);
    width:268px
  }
</style>

<body <?php body_class(); ?>>
  <header id="main-menu" class="main-header">
    <div class="container-fluid">
      <div class="row">
        <nav class="menu flex-center relative">
          <div class="top-bar ">
            <a href="<?= site_url(); ?>" class="logo-container flex-center">
              <img class="logo contain" src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Logo">
            </a>
            <!-- <div class="top-bar">
              <h3>In ontwikkeling</h3>
            </div> -->
          </div>

          <div class="menu-container bottom-bar mobile-menu relative fill-width flex-center">
            <div class="container bb-container">
              <?php wp_nav_menu(['theme_location' => 'main-menu', 'menu_class' => 'menu-list']); ?>
            </div>
          </div>

          <div class="hamburger">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
          </div>
        </nav>
      </div>
    </div>
  </header>

  <main>