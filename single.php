<?php get_header();	?>


<article class="main">
<!--<nav class="posts clearfix">
		<span class="pull-left"><?php previous_post_link(); ?></span>
		<span class="pull-right"><?php next_post_link(); ?></span>
</nav>-->
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?> 
	<div class=" ">
                           
        <?php the_content(); ?>
    </div>
    <div class="clearfix"></div>
<?php endwhile;?>
</article>


<?php get_footer(); ?>