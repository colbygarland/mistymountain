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


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113745102-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-113745102-1');
</script>

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri();?>/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri();?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri();?>/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_template_directory_uri();?>/site.webmanifest">
<link rel="mask-icon" href="<?php echo get_template_directory_uri();?>/safari-pinned-tab.svg" color="#756960">
<meta name="msapplication-TileColor" content="#756960">
<meta name="theme-color" content="#756960">

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

      <div class="container">
        <ul class="left-menu">
          <li>
            <a href="<?php echo get_permalink(6);?>">About</a>
          </li>
          <li>
            <a href="<?php echo get_permalink(7);?>">Portfolio</a>
            <ul class="children">
              <li>
                <a href="<?php echo get_permalink(13);?>">Families</a>
              </li>
              <li>
                <a href="<?php echo get_permalink(14);?>">Couples + Engagement</a>
              </li>
              <li>
                <a href="<?php echo get_permalink(15);?>">Weddings</a>
              </li>
              <li>
                <a href="<?php echo get_permalink(16);?>">Newborns + Maternity</a>
              </li>
            </ul>
          </li>
        </ul>
        <div class="logo">
          <h2 class="title"><a href="<?php echo get_option('siteurl');?>" class="ir"><?php echo get_option('blogname');?></a></h2>
        </div>
        <ul class="right-menu">
          <li>
            <a href="<?php echo get_permalink(8);?>">Contact</a>
          </li>
          <li>
            <a href="<?php echo get_permalink(9);?>">Blog</a>
          </li>
        </ul>
      </div>

    </header>
