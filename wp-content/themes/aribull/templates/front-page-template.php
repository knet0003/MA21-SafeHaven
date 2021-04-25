<?php
/*
	Template Name: Front Page
	Design Theme's Front Page to Display the Home Page if Selected
	
*/
get_header(); ?>


<section class="bannerBox">
			<div class="aghmc"><h1><?php 
					if ( get_theme_mod( 'header__main_heading' ) <> '' ) {
						echo '' . esc_html( get_theme_mod( 'header__main_heading' ) ) . '';
					} else
					{
						echo __('Elementum Pulvinar', 'aribull');
					}?>
					</h1>
					<?php 
					if ( get_theme_mod( 'header__sub_heading' ) <> '' ) {
						echo '' . esc_html( get_theme_mod( 'header__sub_heading' ) ) . '';
					} else
					{
						echo __('Dui sapien eget mi proin sed libero enim sed faucibus. Non enim praesent elementum facilisis leo vel', 'aribull');
					}?>
			<div>
		</section>

 

    <!-- Page Content -->
        <div class="section   services">
        <div class="container">
                        <div class="row">
						
						<?php
				aribull_social_links();
				?>
						
						
						
						
                         
                              
                              
                      
                             
                        </div>
                        <!-- /.row -->
                    </div></div>
        
     
        
    
        
        
                
        
        
        
        

 
 
<?php get_footer(); ?>
