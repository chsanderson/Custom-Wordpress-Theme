<?php get_header(); ?>
<section class="page-wrap">
<div class="container align-items-center">
    <?php if (have_posts()) {
                //$string .= '<div class="carousel-item active">';
                while (have_posts()) {
                    if (has_tag()) {
                        $the_query->the_post();
                        echo '<div class="">';
                        //$the_query->the_post();
                
                        if (has_post_thumbnail()) {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper">' .get_the_post_thumbnail($post_id, array(50,50))  .'<p>' .get_the_excerpt() .'</p></a></div>';
                        } else {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper"> <p>' .get_the_excerpt() .'</p></a></div>';
                        }
                        echo  '</div>';
                    }
                }
            } ?>
    <?php previous_posts_link();?>
    <?php next_posts_link();?>
</div>
</section>
<?php get_sidebar();?>
<?php get_footer(); ?>