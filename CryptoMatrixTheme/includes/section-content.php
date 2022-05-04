<?php
    /*if(have_posts()) : while(have_posts()): the_post();
?>
<?php the_content();?>

<?php endwhile;else:*endif;*/?>





<!--<div id="GuidesCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <h5></h5>
            </div>
            <div class="carousel-item active">
                <h5></h5>
            </div>
            <div class="carousel-item ">
                <h5></h5>
            </div>
            <div class="carousel-item ">
                <h5></h5>
            </div>
            <div class="carousel-item ">
                <h5></h5>
            </div>

            <?php /*
            $args = array(
                'category_name'=> 'guides'
            );
            $the_query = new WP_Query($args);//array('category_name' => 'Guides'));
            if( $the_query->have_posts() ):
                while ($the_query->have_posts()) :
                    $active_class = (0 === $the_query->current_post) ? 'active': '';
                    echo '<div class="carousel-item">';
                    //echo '<img src="" class="d-block w-100" alt="">';
                    $the_query->the_post();
            
                    echo'<h5>'. get_the_title() .' </h5>';
                endwhile;
                echo '</div>';
                wp_reset_postdata();
            endif;*/
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#GuidesCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#GuidesCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>-->