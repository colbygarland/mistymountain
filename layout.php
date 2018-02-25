<?php
/*
Add new content blocks within the Advanced Custom Fields - Flexible Columns editor by adding a new layout within the row width(s) you want it available in. Then just add your layout types in the function below
*/
add_filter( 'flexible_layout', 'IDP_Custom_Layouts');
function IDP_Custom_Layouts($type){
	
  $content = '';
	switch( $type ):
  
  case 'featured_photos':
  
    $photos = get_sub_field('featured_photos');
  
    $content .= '
    <div class="col-sm-12"><section class="featured-photos clearfix">';
  
    foreach ( $photos as $p ){

      $img  = $p['photo'];
      $size = $p['orientation'];
      
      $content .= '
      <div class="featured-photo '.$size.'" style="background-image:url(' . $img['sizes']['1c_md.2c_xl_md2x.3c_lg2x'] . ');"></div>
      ';
      
    }
  
    $content .= '
    </section></div>
    ';
  
  break;
  
  case 'photo_header':
  
    $photo = get_sub_field('photo');
    $title = get_sub_field('title');
    $full  = get_sub_field('full_screen');
    $pos   = get_sub_field('title_position');

    if ( $full ) $full = 'full-screen';
    else $full = '';
  
    $content .= '
    <div class="col-sm-12"><section class="photo-header" style="background-image:url('.$photo['sizes']['Desktop'].');">
      <h1 class="photo-header-title container '.$full.' '.$pos.'">'.$title.'</h1>
    </section></div>
    ';
  
  break;
  
  case 'fixed_photo_with_content':
  
    $photo   = get_sub_field('photo');
    $side    = get_sub_field('photo_side');
    $desc    = get_sub_field('content');
  
    $content .= '
    <div class="col-sm-12"><section class="fixed-photo-content">';
  
    if ( $side == 'Left' ){
      
      $content .= '
      <div class="col-lg-6 photo-side" style="background-image:url(' . $photo['sizes']['Widescreen'] . ');">
      </div>
      <div class="col-lg-6 content-side">
        ' . $desc . '
      </div>
      ';
      
    } else {
      
      $content .= '
      <div class="col-lg-6 content-side">
        ' . $desc . '
      </div>
      <div class="col-lg-6 photo-side" style="background-image:url(' . $photo['sizes']['Widescreen'] . ');">
      </div>
      ';
      
    }
        
    $content .= '
    </section></div>
    ';
  
  break;
  
  case 'portfolio':
  
    $photos = get_sub_field('photos');
  
    $content .= '
    <div class="col-sm-12"><section class="portfolio">';
      
    foreach ( $photos as $p ){

      $caption = $p['caption'];
      if ( $caption ){
        $caption = '<div class="portfolio-caption-wrap"><div class="portfolio-caption">' . $caption . '</div></div>';
      } else {
        $caption = '';
      }
      
      $content .= '
      <div class="portfolio-img" >
        <a href="'.$p['url'].'" class="venobox"><img src="' . $p['sizes']['1c_sm.2c_lg_sm2x.3c_xl_md2x'] . '" alt="' . $p['alt'] . '" class="lazy-load"></a>
        ' . $caption . '
      </div>
      ';
      
    }
      
    $content .= '
    </section></div>
    ';
  
  break;
  
  case 'title_bar':
  
    $title = get_sub_field('title');
    $content .= '
    <div class="title-bar">
      <div class="container">
        <h2>'.$title.'</h2>
      </div>
    </div>
    ';
  
  break;
		
	endswitch;
  
  return $content;
}

// Wrap content containers with white background
add_filter( 'flexible_columns_wrap_outer', 'IDP_Column_WrapOuter');
add_filter( 'flexible_columns_wrap_outer_end', 'IDP_Column_WrapOuter_End');
function IDP_Column_WrapOuter(){

  $contain = '';
  $padding = get_field('padding');

	if ( get_row_layout() == 'full_width_row' || get_row_layout() == '2_column_row' || get_row_layout() == '3_column_row' || get_row_layout() == '4_column_row' ){
    
    if( have_rows('column') || have_rows('column_1') || have_rows('column_2') || have_rows('column_3') || have_rows('column_4')):
    
				 while(have_rows('column') || have_rows('column_1') || have_rows('column_2') || have_rows('column_3') || have_rows('column_4') ): the_row();
          
					if( get_row_layout() == 'content' ){ 
            
             $contain = '<div class="content '.$padding.'">';
            
          }
    
				
				endwhile; 
			endif; //END SINGLE COLUMN
  }
	return $contain;	
}
function IDP_Column_WrapOuter_End(){
	$contain = '';
	if ( get_row_layout() == 'full_width_row' || get_row_layout() == '2_column_row' || get_row_layout() == '3_column_row' || get_row_layout() == '4_column_row' ){
    if( have_rows('column') || have_rows('column_1') || have_rows('column_2') || have_rows('column_3') || have_rows('column_4') ):
				 while( have_rows('column') || have_rows('column_1') || have_rows('column_2') || have_rows('column_3') || have_rows('column_4') ): the_row();
					
					if( get_row_layout() == 'content' ) $contain = '</div>';		
				
				endwhile; 
			endif; //END SINGLE COLUMN
  }
	return $contain;	
}
