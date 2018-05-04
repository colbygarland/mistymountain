<?php
get_header();
//get_sidebar();
?>

<article class="main white-bg">	
  <div class="container-fluid content">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-8">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 

        global $post;
        
        $excerpt  = get_the_excerpt($post->ID);
        $title    = get_the_title($post->ID);
        $link     = get_permalink($post->ID);
        $feature  = get_field('featured_photo',$post->ID);
        $date     = get_the_date('F j, Y', $post->ID);
        $tags     = get_the_tags();
        $all_tags = '';

        foreach ( $tags as $t ){
          $all_tags .= '<a href="'.get_tag_link($t->term_id).'">' . $t->name . ' </a>';
        }

        //$all_tags .= '</small></p>';

        if ( $tags ) $tags_part = '| ' . $all_tags;
        else $tags_part  = '';
        
        echo '
        <div class="blog-post aos-init" data-aos="fade-up">
          <div class="container">
          
            <div class="col-sm-12">
              <a href="'.$link.'"><img src="'.$feature['sizes']['medium'].'" alt="'.$feature['alt'].'"></a>
              <h3 class="blog-post-title"><a href="'.$link.'">'.$title.' </a></h3>
              <p class="text-muted">'.$date.' '.$tags_part.' <br><a href="'.$link.'">Read more</a></p>
            </div>
          
          </div>
        </div>';

 endwhile; ?>
    </div>
      <div class="col-md-3">
        <h3>Blog Archive</h3>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
      
      global $post;
      
      $title   = get_the_title($post->ID);
      $link    = get_permalink($post->ID);
      $feature = get_field('featured_photo',$post->ID);
      $date    = get_the_date('F j, Y', $post->ID);
      
      echo '
      <div class="archived-post">
        <div class="row">
          <div class="col-sm-3">
            <a href="'.$link.'"><img src="'.$feature['sizes']['3c_sm'].'" alt="'.$feature['alt'].'"></a>
          </div>
          <div class="col-sm-9">
            <h4><a href="'.$link.'">'.$title.'</a></h4>
            <p class="text-muted">'.$date.'</p>
          </div>
        </div>
      </div>
      ';
      
endwhile; ?> 
      </div>
    </div>
    
</div>
  <div class="clearfix"></div>
</article><!-- #post-## -->
<?php
get_footer(); 