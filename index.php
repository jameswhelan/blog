
<?php get_header(); ?>

  
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
    
    get_template_part( 'content', get_post_format() );

endwhile; 
?>


<div class="container-fluid">        
  <div class="col-md-offset-2 col-md-8">
    <?php wpbeginner_numeric_posts_nav(); ?>
  </div>
</div>


<?php
endif; 
?>



<?php get_footer(); ?>