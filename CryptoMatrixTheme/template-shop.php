<?php get_header(); ?>
<section class="page-wrap">
    <div class="container d-flex justify-content-center" >
        
    <div class="col-lg-9">
        <h3><?php the_title();?></h3>
        <?php if(has_post_thumbnail()):?>
            <img src="<?php the_post_thumbnail_url('blog-large');?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail">
        <?php endif;?>
    </div>
    </div>
    <div class="col-lg-9">
        <?php the_content();?>
    </div>
</section>
<?php
$paged = $wp_query->get('page');
if($paged == false)
{

}
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        if(have_posts()):
        while(have_posts()) : the_post();?>
        
        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
        <?php the_content();?>
        //include the page content template
        //get_template_part('template-parts/content', 'page');

        <?php 
        endwhile;

    else:
        echo '<p>There are no posts</p>';
    endif;

        echo "<hr/>";
        if(comments_open() || get_comments_number())
        {
            comments_template();
        }
        ?>
    </main>

</div>
<?php get_footer(); ?>