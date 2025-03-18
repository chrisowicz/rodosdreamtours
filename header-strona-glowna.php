<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo("charset") ?>">
  <?php if (is_search()) : ?>
    <meta name="robots" content="index, follow" />
  <?php endif; ?>
  <title>
    <?php
    if (is_archive()) {
      echo ucfirst(trim(wp_title('', false))) . ' - ';
    } else if (!(is_404()) && (is_single()) || (is_page())) {
      $title = wp_title('', false);
      if (!empty($title)) {
        echo $title;
      }
    } else if (is_404()) {
      echo 'Page not found';
    }
    if (is_page('strona-glowna')) {
      bloginfo('name');
      echo ' - ';
      bloginfo('description');
    }
    // else {
    //     echo bloginfo('name');
    // }
    global $paged;
    if ($paged > 1) {
      echo ' - page ' . $paged;
    }
    ?>
  </title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <style>
    #loader {
      position: relative;
      width: 100vw;
      height: 100vh;
      background-color: #fff;
      z-index: 9999;
    }

    .spinner {
      display: inline-block;
      position: relative;
      width: 80px;
      height: 80px;
      position: absolute;
      top: 50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .spinner div {
      transform-origin: 40px 40px;
      animation: spinner 1.2s linear infinite;
    }

    .spinner div:after {
      content: " ";
      display: block;
      position: absolute;
      top: 3px;
      left: 37px;
      width: 6px;
      height: 18px;
      border-radius: 20%;
      background: #46C1EF;
    }

    .spinner div:nth-child(1) {
      transform: rotate(0deg);
      animation-delay: -1.1s;
    }

    .spinner div:nth-child(2) {
      transform: rotate(30deg);
      animation-delay: -1s;
    }

    .spinner div:nth-child(3) {
      transform: rotate(60deg);
      animation-delay: -0.9s;
    }

    .spinner div:nth-child(4) {
      transform: rotate(90deg);
      animation-delay: -0.8s;
    }

    .spinner div:nth-child(5) {
      transform: rotate(120deg);
      animation-delay: -0.7s;
    }

    .spinner div:nth-child(6) {
      transform: rotate(150deg);
      animation-delay: -0.6s;
    }

    .spinner div:nth-child(7) {
      transform: rotate(180deg);
      animation-delay: -0.5s;
    }

    .spinner div:nth-child(8) {
      transform: rotate(210deg);
      animation-delay: -0.4s;
    }

    .spinner div:nth-child(9) {
      transform: rotate(240deg);
      animation-delay: -0.3s;
    }

    .spinner div:nth-child(10) {
      transform: rotate(270deg);
      animation-delay: -0.2s;
    }

    .spinner div:nth-child(11) {
      transform: rotate(300deg);
      animation-delay: -0.1s;
    }

    .spinner div:nth-child(12) {
      transform: rotate(330deg);
      animation-delay: 0s;
    }

    @keyframes spinner {
      0% {
        opacity: 1;
      }

      100% {
        opacity: 0;
      }
    }
  </style>
</head>

<body <?php body_class(); ?>>
  <?php
  $logo = wp_get_attachment_image(get_field('logo', 'option'), 'full', '', ['loading' => false]);
  ?>
  <div id="loader">
    <div class="spinner">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <div id="main">
    <header id="header">
      <i id="menu-toggle" class="icon-menu icon"></i>
      <div id="logo">
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
          <?php echo $logo; ?>
        </a>
      </div>
      <nav id="main-nav">
        <?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
      </nav>
    </header>