<?php get_header(); ?>
<section class="page-wrap">
    <div class="container align-items-center" >
        <h3><?php the_title();?></h3>
        <?php if(has_post_thumbnail()):?>
            <img src="<?php the_post_thumbnail_url('blog-large');?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail">
        <?php endif;?>
    </div><div class="entry-attachment">
    <?php 
        $image_size = apply_filters('wporg_attachement_size', 'large');
        echo wp_get_attachment_image( get_the_ID(), $image_size);
    ?>
    <?php if( has_excerpt() ) : ?>
        <div class="entry-caption">
            <?php the_excerpt();?>
        </div><!-- .entry-caption -->
        <?php endif;?>
</div><!-- .entry-attachment -->
</section>
<?php get_footer(); ?>