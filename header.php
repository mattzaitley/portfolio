<!DOCTYPE html class="no-js">
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php //Modernizr ?>
  <script src="<?php echo get_template_directory_uri() . '/js/modernizr.js' ?>"></script>
  <?php // Metatags ?>
  <meta name="keywords" content="Matt Fairley, Front End Development, Matt, Fairley, Front end developer, Toronto Developer">
  <meta name="description" content="Front-end developer. Pop culture nerd. Not a robot.">
  <meta name="author" content="Matt Fairley">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="Matt Fairley">
  <meta property="og:type" content="website">
  <meta property="og:url" content="http://mattfairley.com">
  <meta property="og:image" content="http://mattfairley.com/images/headshot1.jpg">
  <meta property="og:site_name" content="Matt Fairley">
  <meta property="og:description" content="Front-end developer. Pop culture nerd. Not a robot.">
  <?php // Load our CSS ?>
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700|Arvo:400' rel='stylesheet' type='text/css'>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <!-- favicon -->
  <link href="<?php echo get_template_directory_uri() . '/img/favicon.png' ?>" rel="icon" type="image/x-icon">

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header>
  <div class="container">
    <h2 class="logo">
      <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
        <?php get_template_part('img/inline', 'logo.svg');  ?>
        <?php the_field('page_title_short', 'option'); ?>
      </a>
    </h2>
    
    <?php wp_nav_menu( array(
      'container' => 'nav',
      'container_class' => 'nav',
      'container_id' => 'nav',
      'menu' => 'header',
      'theme_location' => 'primary'
    )); ?>

    <span class="nav lines-button arrow arrow-left x hamburger" type="button" role="button" aria-label="Toggle Navigation" id="nav-button">
      <span class="lines"></span>
    </span>
    <div id="overlay"></div>
  </div> <!-- /.container -->
</header><!--/.header-->

