<?php get_header(); ?>
    <div class="container pt-5 pb-5">
        <?php
        if(has_post_parent())
        {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
            echo '<a href="' . $large_image_url&#91;0&#93; .'">';
        }
        ?>
        <h3><?php the_title(); ?></h3>
        <br/>
        <?php echo '<p>' . reading_time(). '</p>'; ?>
        <hr/>
        <div class="text-center">
            <?php the_content(); ?>
        </div>
        <?php 
        //If Commentsare open or we have at least one comment, load up the comment template.
        if(comments_open() || get_comments_number()):
            comments_template(); 
        endif;
        ?>
    </div>
<?php get_footer(); ?>