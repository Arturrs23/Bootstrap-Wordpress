<?php
/**
 * The Header file
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bootstrap2wordpress
 * @since Bootstrap to WordPress 2.0
 */

use JetBrains\PhpStorm\Language;

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bootstrap/WP</title>
  <?php wp_head(); ?>
</head>
<!-- telling what page it is -->
<body <?php body_class(); ?>>
  <!-- navigation -->
  <div id="top-navigation">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-md-6">


          <!-- <nav class="main-menu">
            <ul class="top-menu d-flex flex-row navigation top-menu justify-content-end list-unstyled">
              <li class="menu-item"><a href="index.html">Home</a></li>
              <li class="menu-item menu-item-has-children"><a href="index.html">Blog</a>
                 sub menu -->
                <!-- <ul class="sub-menu">
                  <li class="menu-item"><a href="single.html">Single post</a></li>
                  <li class="menu-item"><a href="widgets.html">Widgets</a></li>
                  <li class="menu-item"><a href="index.html">Contact</a></li>
                  <li class="menu-item menu-item-has-children"><a href="index.html">Blog</a>
                    <ul class="sub-menu">
                      <li class="menu-item"><a href="index.html">Blog</a></li>
                      <li class="menu-item"><a href="index.html">FAQ</a></li>
                      <li class="menu-item"><a href="index.html">Contact</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="menu-item"><a href="widgets.html">Widgets</a></li>
              <li class="menu-item"><a href="index.html">Contact</a></li>
              <li class="menu-item special-menu"><a href="index.html">Join</a></li>
            </ul>
          </nav> --> 

            <?php
            // meu object
            wp_nav_menu(
                array(
                    // primary menu
                    'theme_location' => 'primary',
                    // how many submenus
                    'depth' => 3,
                    // what is the navigation wrapper .nav
                    'container' => 'nav',
                    'container_class' => 'main-menu',
                        'menu_class' => 'top-menu d-flex flex-row navigation top-menu justify-content-end list-unstyled',
                        // if no primary menu fallback to default menu
                       'fallback_cb' =>  false
                )
            )
            
            ?>


          <button type="button" class="navbar-open">
            <i class="mobile-nav-toggler flaticon flaticon-menu"></i>
          </button>
        </div>
      </div>
      <!-- Mobile Menu -->
      <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn">
          <i class="flaticon flaticon-close"></i>
        </div>
        <nav class="menu-box">
          <ul class="navigation clearfix"></ul>
        </nav>
      </div>

    </div>
  </div>