 <div class="container-fluid" id="gallery">
     <div class="col-md-offset-2 col-md-8">
         <div id="titlespan">
            <h2 id="studytitle1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
             <h2 id="why"><?php the_date(); ?></h2>
            <!-- div class="container" id="postpicture"></div -->

            <?php if ( has_post_thumbnail() ) {
                $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                <div class="container postpicture" style="background: url('<?php echo $backgroundImg[0] ?>') no-repeat center;"></div>
            <?php
            } ?>
             <div class ="col-md-offset-2 col-md-8" id="whyhowbody1">
                    <?php the_excerpt(); ?>
             </div>
         </div>
         <button id="readmore"><a href="<?php the_permalink(); ?>">Read Post</a></button>
     </div>
</div>
