 <?php header('X-UA-Compatible: IE=edge'); ?>
<!doctype html>
<!--[if IE 7 | IE 8]>
<html class="no-js oldie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<?php
if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function theme_slug_render_title() {
?>
<title><?php wp_title( '-', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'theme_slug_render_title' );
endif;
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- TESTING -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113745102-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-113745102-1');
    </script>

<?php /* RSS FEEDS - uncomment if site uses news/blog posts
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
*/ ?>
<?php wp_head(); ?>

</head>
<body class="<?php if(is_front_page()) echo 'home';?>">

  <ul class="mobile-menu">
    <?php  
    $exclude = ''; //comma seperated ID's
    wp_list_pages( 'sort_column=menu_order&title_li=&depth=3&echo=1&exclude='.$exclude);?>	
  </ul>

  <input type="checkbox" id="nav-trigger" class="" />
  <label for="nav-trigger" onclick aria-label="Toggle Navigation" class="menubtn">
    <div class="navTrigger">
      <i></i><i></i><i></i>
    </div>
  </label>

  <div class="site-wrap">

    <header>

      <div class="container"><h2 class="title"><a href="<?php echo get_option('siteurl');?>" class="ir"><?php echo get_option('blogname');?></a></h2></div>

      <div class="menu-social-media">

          <ul class="menu">
            <?php  
            $exclude = ''; //comma seperated ID's
            wp_list_pages( 'sort_column=menu_order&title_li=&depth=3&echo=1&exclude='.$exclude);?>	
          </ul>

          <ul class="social-media-links">
            <li class="facebook">
              <a href="https://www.facebook.com/MistyMountainImages/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
            <li class="instagram">
              <a href="https://www.instagram.com/misty_mountain_images/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </li>
            <li class="phone">
              <a href="tel:780-228-3012"><i class="fa fa-phone" aria-hidden="true"></i></a>
            </li>
            <li class="email">
              <a href="mailto:mistymountainphotographygp@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i></a>
            </li>
          </ul>

      </div>

    </header>