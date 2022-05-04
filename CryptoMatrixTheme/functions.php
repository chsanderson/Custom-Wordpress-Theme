<?php
if(! function_exists('CryptoMatrixTheme')):

    function CryptoMatrixTheme()
    {
        //load_theme_textdomain();
        //post formats
        add_theme_support('post-formats', array('aside','gallery','quote','image','video'));
    
        if (! isset($content_width)) {
            $content_width=800;
        }

        function themebs_enqueue_styles()
        {
            wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
            wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
            wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
            wp_enqueue_style('core', get_template_directory_uri() . '/style.css');
        }
        add_action('wp_enqueue_scripts', 'themebs_enqueue_styles');

        function themebs_enqueue_scripts()
        {
            wp_enqueue_style('bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array('jquery'));
            wp_enqueue_style('core', get_template_directory_uri() . '/js/vendor/customeScript.js', array('jquery'));
        }
        add_action('wp_enqueue_scripts', 'themebs_enqueue_scripts');

        add_theme_support('widgets');

        //woocommerce integration
        remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


        add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
        add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

        function my_theme_wrapper_start()
        {
            echo '<section id="main">';
        }

        function my_theme_wrapper_end()
        {
            echo '</section>';
        }
        function mytheme_add_woocommerce_support()
        {
            add_theme_support(
                'woocommerce',
                array(
                    'thumbnail_image_width' => 150,
                    'single_image_width' => 300,
                    'product_grid' => array(
                    'default_rows' => 3,
                    'min_rows' => 2,
                    'max_rows' => 8,
                    'default_columns' => 4,
                    'min_columns' => 2,
                    'max_columns' => 5,
                    ),
                )
            );
        }

        add_filter('woocommerce_queue_styles', '__return_false');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_action('after_setup_theme', 'mytheme_add_woocommerce_support');





        //register sidebars
        function my_sidebars()
        {
            register_sidebar(
                array(
                'name' => 'Page Sidebar',
                'id' => 'page-sidebar',
                'before_title' => '<h4 class="widget-title>"',
                'after_title' => '</h4>'
            )
            );

            register_sidebar(
                array(
                    'name' => 'Blog Sidebar',
                    'id' => 'blog-sidebar',
                    'before_title' => '<h4 class="widget-title>"',
                    'after_title' => '</h4>'
                )
            );
        }
        add_action('widgets_init', 'my_sidebars');

        add_theme_support('post-thumbnails');
        the_post_thumbnail();
        the_post_thumbnail('thumbnail');
        the_post_thumbnail('medium');
        the_post_thumbnail('medium_large');
        the_post_thumbnail('large');
        the_post_thumbnail('full');
        the_post_thumbnail(array(100,100));
        //add_image_size('category-thumb',300,9999);//300 pixels wide (and unlimited height)

    
        if (function_exists('add_theme_support')) {
            add_theme_support('post-thumbnails');
            set_post_thumbnail_size(150, 150, true);//default Featured Image Description

            //additional image sizes
        //delete thre next line if you do not need additional image sizes
        add_image_size('category-thumb', 300, 9999);//300 pixels wide (and unlimited height)
        }

        add_theme_support('post-formats', array('aside', 'gallery'));

        //add post-formats to post_type 'page'
        add_post_type_support('page', 'post-formats');

        //register custom post type 'my_custom_post_type'
        add_action('init', 'create_my_post_type');
        function create_my_post_type()
        {
            register_post_type(
                'my_custom_post_type',
                array(
            'labels' => array('name' => __('Products')),
            'public' => true
        )
            );
        }
        //add post-formats to post_type 'my_custom_post_type'
        add_post_type_support('my_custom_post_type', 'post-formats');

        //$args = array(
        /*      'default-image' => '%1$s/images/CryptoMatrixStyle.png',
          );
          add_theme_support('custom-background', $args );*/
        /**
         *
 * Register Custom Navigation Walker
 */
        function register_navwalker()
        {
            require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
        }
        add_action('after_setup_theme', 'register_navwalker');

        if (! file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
            // File does not exist... return an error.
            return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
        } else {
            // File exists... require it.
            require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
        }
        register_nav_menus(array(
    'primary' => __('Primary Menu', 'CryptoMatrixTheme'),
    'shop_menu' => __('Shop Menu', 'CryptoMatrixTheme'),
));

        //Making this walker the default walker for nav menus
        function prefix_modify_nav_menu_args($args)
        {
            return array_merge($args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ));
        }
        add_filter('wp_nav_menu_args', 'prefix_modify_nav_menu_args');

        add_filter('nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3);
        /**
         * Use namespaced data attribute for Bootstrap's dropdown toggles.
         *
         * @param array    $atts HTML attributes applied to the item's `<a>` element.
         * @param WP_Post  $item The current menu item.
         * @param stdClass $args An object of wp_nav_menu() arguments.
         * @return array
         */
        function prefix_bs5_dropdown_data_attribute($atts, $item, $args)
        {
            if (is_a($args->walker, 'WP_Bootstrap_Navwalker')) {
                if (array_key_exists('data-toggle', $atts)) {
                    unset($atts['data-toggle']);
                    $atts['data-bs-toggle'] = 'dropdown';
                }
            }
            return $atts;
        }

        function slug_provide_walker_instance($args)
        {
            if (isset($args['walker']) && is_string($args['walker']) && class_exists($args['walker'])) {
                $args['walker'] = new $args['walker'];
            }
            return $args;
        }
        add_filter('wp_nav_menu_args', 'slug_provide_walker_instance', 1001);


        //Add the Estimated Reading Time for a Post

        function reading_time()
        {
            global $post;
            $content = get_post_field('post_content', $post->ID);
            $word_count = str_word_count(strip_tags($content));
            $readingtime = ceil($word_count / 200);
            if ($readingtime == 1) {
                $timer = " minute";
            } else {
                $timer = " minutes";
            }
            $totalreadingtime = $readingtime . $timer;
            return $totalreadingtime;
        }

        //Automatically Update Your Copyright Notice
  
        function comicpress_copyright()
        {
            global $wpdb;
            $copyright_dates = $wpdb->get_results("
  SELECT
  YEAR(min(post_date_gmt)) AS firstdate,
  YEAR(max(post_date_gmt)) AS lastdate
  FROM
  $wpdb->posts
  WHERE
  post_status = 'publish'
  ");
  
            $output = '';
  
            if ($copyright_dates) {
                $copyright = "©" . $copyright_dates[0]->firstdate;
                if ($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
                    $copyright .= '-' . $copyright_dates[0]->lastdate;
                }
            }
            $output = $copyright;
            return $output;
        }
        add_filter('post_thumbnail_html', 'my_post_image', 10, 3);
        function my_post_image_html($html, $post_id, $post_image_id)
        {
            $html = '<a href="' . get_permalink($post_id) .'">'. $html . '</a>';
            return $html;
        }

        //Custom Filter Posts by Category
function wpb_guidepostsbycategory()//guides(guide)
{
    //the query
    $the_query = new WP_Query(
        array(
            'post_type' => 'post',
            'post_status' => 'published',
            'category_name' => 'guide'
        )
    );
    //global $post;
    $string ='';
    //the loop
    
    //global $post;
    $string = "";
    //the loop
    if ($the_query->have_posts()) {
        //$string .= '<div class="carousel-item active">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            if ($the_query->current_post == 0) {
                echo '<div class="carousel-item active">';
                //$the_query->the_post();
                if (has_post_thumbnail()) {
                    echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper">' .get_the_post_thumbnail($post_id, array(50,50))  .'<p>' .get_the_excerpt() .'</p></a></div>';
                } else {
                    //if no featured image is found
                    //$string .= '<li><a href="' . get_the_permalink() . '" rel="bookmark"><h4>' . the_title() . '</h4></a><hr/><p>' .the_excerpt() .'</p></li>';
                    //$string .=  '<a href="' . get_the_permalink() . '" rel="bookmark"><div><h5>' . the_title() . '</h5><p>' .the_excerpt() .'</p></div></a>';
                    echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper"> <p>' .get_the_excerpt() .'</p></a></div>';
                }
                echo  '</div>';
            } else {
                echo '<div class="carousel-item">';
                
                if (has_post_thumbnail()) {
                    echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper">' .get_the_post_thumbnail($post_id, array(50,50))  .'<p>' .get_the_excerpt() .'</p></a></div>';
                } else {
                    echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper"> <p>' .get_the_excerpt() .'</p></a></div>';
                }
                echo  '</div>';
            }
        }
    } else {
        //no posts found
        echo  '<p>No Posts Found</p>';
    }
    //$string .= "</ul>";
    /*Restore original Post Data*/
    wp_reset_postdata();
}
        /*Add a shortcode*/
        add_shortcode('categoryguideposts', 'wpb_guidepostsbycategory');

        function wpb_resourcespostsbycategory()//guides(guide)
        {
            //the query
            $the_query = new WP_Query(
                array(
            'post_type' => 'post',
            'post_status' => 'published',
            'category_name' => 'resources'
        )
            );
            //global $post;
            $string ='';
            //the loop
    
            //global $post;
            $string = "";
            //the loop
            if ($the_query->have_posts()) {
                //$string .= '<div class="carousel-item active">';
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    if ($the_query->current_post == 0) {
                        echo '<div class="carousel-item active">';
                        //$the_query->the_post();
                        /*if (has_post_thumbnail())
                        {
                            echo '<a href="' . get_the_permalink() . '" title="' . the_title() . '"> <div class="wrapper">' .get_the_post_thumbnail($post_id, array(50,50))  .'<p>' .the_excerpt() .'</p></div></a>';
                        }
                        else
                        {
                            //if no featured image is found
                            //$string .= '<li><a href="' . get_the_permalink() . '" rel="bookmark"><h4>' . the_title() . '</h4></a><hr/><p>' .the_excerpt() .'</p></li>';
                            //$string .=  '<a href="' . get_the_permalink() . '" rel="bookmark"><div><h5>' . the_title() . '</h5><p>' .the_excerpt() .'</p></div></a>';
                            echo '<a href="' . get_the_permalink() . '" title="' . the_title() . '"> <div class="wrapper"> <p>' .the_excerpt() .'</p></div></a>';
                        }*/
                        if (has_post_thumbnail()) {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper">' .get_the_post_thumbnail($post_id, array(50,50))  .'<p>' .get_the_excerpt() .'</p></a></div>';
                        } else {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper"> <p>' .get_the_excerpt() .'</p></a></div>';
                        }
                        echo  '</div>';
                    } else {
                        echo '<div class="carousel-item">';
                        if (has_post_thumbnail()) {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper">' .get_the_post_thumbnail($post_id, array(50,50))  .'<p>' .get_the_excerpt() .'</p></a></div>';
                        } else {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper"> <p>' .get_the_excerpt() .'</p></a></div>';
                        }
                        echo  '</div>';
                    }
                }
            } else {
                //no posts found
                echo  '<p>No Posts Found</p>';
            }
            //$string .= "</ul>";
            /*Restore original Post Data*/
            wp_reset_postdata();
        }
        /*Add a shortcode*/
        add_shortcode('categoryresourcesposts', 'wpb_resourcespostsbycategory');

        function wpb_firstpersonpostsbycategory()//guides(guide)
        {
            //the query
            $the_query = new WP_Query(
                array(
            'post_type' => 'post',
            'post_status' => 'published',
            'category_name' => 'first-person'
        )
            );
            //global $post;
            $string ='';
            //the loop
            if ($the_query->have_posts()) {
                //$string .= '<ul class="postsbycategory widget_recent_entries">';
                /*$active_class = (0 === $the_query->current_post) ? 'active': '';
                $string .= '<div class="carousel-item">';
                $string .= '<ul class="postsbycategory widget_recent_entries">';*/
                // while($the_query->have_posts())
                //{
                //$active_class = (0 === $the_query->current_post) ? 'active': '';
                // $string .= '<div class="carousel-item">';
                // $string .= '<ul class="postsbycategory widget_recent_entries">';
                // $the_query->the_post();
                //global $post;
                $string = "";
                //the loop
                //if($the_query->have_posts()) {
                //$string .= '<div class="carousel-item active">';
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    if ($the_query->current_post == 0) {
                        echo '<div class="carousel-item active">';
                        //$the_query->the_post();
                    
                        if (has_post_thumbnail()) {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper">' .get_the_post_thumbnail($post_id, array(50,50))  .'<p>' .get_the_excerpt() .'</p></a></div>';
                        } else {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper"> <p>' .get_the_excerpt() .'</p></a></div>';
                        }
                        echo  '</div>';
                    } else {
                        echo '<div class="carousel-item">';
                   
                        if (has_post_thumbnail()) {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper">' .get_the_post_thumbnail($post_id, array(50,50))  .'<p>' .get_the_excerpt() .'</p></a></div>';
                        } else {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper"> <p>' .get_the_excerpt() .'</p></a></div>';
                        }
                        echo  '</div>';
                    }
                }
            } else {
                //no posts found
                echo  '<p>No Posts Found</p>';
            }
            //$string .= "</ul>";
            /*Restore original Post Data*/
            wp_reset_postdata();
        }
        /*Add a shortcode*/
        add_shortcode('categoryfirstpersonposts', 'wpb_firstpersonpostsbycategory');

        function wpb_uncategorisedpostsbycategory()//guides(guide)
        {
            //the query
            $the_query = new WP_Query(
                array(
            'post_type' => 'post',
            'post_status' => 'published',
            'category_name' => 'uncategorised'
        )
            );
            //global $post;
            $string = "";
            //the loop
            if ($the_query->have_posts()) {
                //$string .= '<div class="carousel-item active">';
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    if ($the_query->current_post == 0) {
                        echo '<div class="carousel-item active">';
                        //$the_query->the_post();
                
                        if (has_post_thumbnail()) {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper">' .get_the_post_thumbnail($post_id, array(50,50))  .'<p>' .get_the_excerpt() .'</p></a></div>';
                        } else {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper"> <p>' .get_the_excerpt() .'</p></a></div>';
                        }
                        echo  '</div>';
                    } else {
                        echo '<div class="carousel-item">';
                    
                        if (has_post_thumbnail()) {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper">' .get_the_post_thumbnail($post_id, array(50,50))  .'<p>' .get_the_excerpt() .'</p></a></div>';
                        } else {
                            echo '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5> <div class="wrapper"> <p>' .get_the_excerpt() .'</p></a></div>';
                        }
                        echo  '</div>';
                    }
                }
            } else {
                //no posts found
                echo  '<p>No Posts Found</p>';
            }
            //echo $string;
            //$string .= "</ul>";
            /*Restore original Post Data*/
            wp_reset_postdata();
        }
        /*Add a shortcode*/
        add_shortcode('categoryuncategorisedposts', 'wpb_uncategorisedpostsbycategory');
    }
endif;
add_action('after_setup_theme', 'CryptoMatrixTheme');

function wpb_list_child_pages()
{
    global $post;
    if( is_page() && $post->post_parent)
    {
        $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0');
    }
    else
    {
        $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0');
    }

    if($childpages)
    {
        $string = '<ul class="wpb_page_list">' . $childpages . '</ul>';
    }
    return $string;
}
add_shortcode('wpb_childpages', 'wpb_list_child_pages');

  /* 
   * function wpb_postsbycategory()//guides(guide)
{
    //the query
    $the_query = new WP_Query(
        array(
            'post_type' => 'post',
            'post_status' => 'published',
            'category_name' => 'guide'
        ));
        //global $post;
        $string ='';
        //the loop
    if($the_query->have_posts()) {
        //$string .= '<ul class="postsbycategory widget_recent_entries">';
        $active_class = (0 === $the_query->current_post) ? 'active': '';
        $string .= '<div class="carousel-item">';
        $string .= '<ul class="postsbycategory widget_recent_entries">';
        while($the_query->have_posts())
        {
            $the_query->the_post();
            /*if(has_category('guide')){
                $string .= '<li><h4>Guides</h4></li>';
            }
            if(has_category('resources')){
                $string .= '<li><h4>Resources</h4></li>';
            }
            if(has_category('first-person')){
                $string .= '<li><h4>First Person</h4></li>';
            }
            else{
                $string .= '<li><h4>Uncategorized</h4></li>';
            }*/

            
           //$active_class = (0 === $the_query->current_post) ? 'active': '';
                    //echo '<div class="carousel-item">';
                    //$string .= '<ul class="postsbycategory widget_recent_entries">';
                    //$string .= '<img src="" class="d-block w-100" alt="">';
                    //$the_query->the_post();
            
                   // $string .='<h5>'. get_the_title() .' </h5>';
        //}
        //$string .= '</div>';
                //wp_reset_postdata();
           // }
            /*if(has_post_thumbnail())
            {
                $string .= '<li>';
                $string .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(50,50)) . get_the_title() . '</a></li>';
            }
            else
            {
                //if no featured image is found
                $string .= '<li><a href="' . get_the_permalink() . '" rel="bookmark"><h4>' . the_title() . '</h4></a><hr/><p>' .the_excerpt() .'</p></li>';
            }
            $string .= "</ul>";
            $string .= '</div>';
        }
    }
    else
    {
        //no posts found
        $string .= '<li>No Posts Found</li>';
    }
    //$string .= "</ul>";
    /*Restore original Post Data*/
  //  wp_reset_postdata();
//}
    /*Add a shortcode*/
//add_shortcode('categoryposts', 'wpb_postsbycategory');
//*/
/*
   * 
   * 
   * Customize your excerpts
  * */
  /* function new_excerpt_more($more) {
   global $post;
   return '<a class="moretag" href="' . get_permalink($post->ID) . '"> Read the full article...</a>';
   }
   add_filter('excerpt_more', 'new_excerpt_more');*/
  /*
   change the length of excerpt
   function new_excerpt_length($length) {
   return 20;//this returns 20 words instead of 55 words.
   }
   
   add_filter('excerpt_length', 'new_excerpt_length');
*/

/**
 * ?><?php
 * Uncomment this code
 * 
 * add_action('wp_head', 'wpb_add_googleanalytics');
 * function wpb_add_googleanalytics { ?>
 * 
 * //Replace this line with your Google Analytics Tracking ID
 * 
 * <?php } ?>
 * 
 * 
 * Changing the default login error message
 * 
 * function no_wordpress_errors(){
    * return 'Something went wrong!'; // this will replace errors like 'incorrect username or password' and Too many failed Login attempts. Please try again in 1 minute
 * }
 * add_filter('login_errors', 'no _wordpress_errors');
 * 
 * 
 * 
 *
 * Add the Estimated Reading Time for a Post
 * 
 * function reading_time() {
    * $content = get_post_field('post_content', post->ID);
    * $word_count = str_word_count(strip_tags($content));
    * $readingtime = ceil($word_count / 200);
    * if ($readingtime == 1) 
    * {
    *      $timer = " minute";
    * }
    * else
    * {
    *      $timer = " minutes";
    * }
    * $totalreadingtime = $readingtime . $timer;
    * return $totalreadingtime;
 * }
 * //to show how many minutes a post takes to read you need to add the code 'echo reading_time();'
 * 
 * 
 * Remove the WordPress Version Number
 * remove_action('wp_head', 'wp_generator');
 * 
 * 
 * 
 * 
 * 
 * 
 * Automatically Update Your Copyright Notice
 * 
 * function wpb_copyright() {
 * global $wpdb;
 * $copyright_dates = $wpdb->get_results("
 * SELECT
 * YEAR(min(post_date_gmt)) AS firstdate,
 * YEAR(max(post_date_gmt)) AS lastdate
 * FROM
 * $wpdb->posts
 * WHERE
 * post_status = 'publish'
 * ");
 * 
 * $output = '';
 * 
 * if($copyright_dates)
 * {
    * $copyright = "©" . $copyright_dates[0]->firstddate;
    * if(copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
 *      $copyright .= '-' . $copyright_dates[0]->lastdate;
 *   }
 *  $output = $copyright;
 * }
 * return $output;
 * }
 * 
 * 
 * Add Custom Menus
 * 
 * function wpb_custom_new_menu() {
 * register_nav_menu('my-custom-menu',__('My Customized Menu'));
 * }
 * add_action('init','wpb_custom_new_menu');
 * 
 * <?php  --- place this in the header.php file
 * wp_nav_menu(array(
 * 'theme_location' => 'my-custom-menu',
 * 'container_class' => 'custom-menu-class'
 * ));
 * ?>
 * 
 * 
 * Customize your excerpts
 * 
 * function new_excerpt_more($more) {
 * global $post;
 * return '<a class="moretag" href="' . get_permalink($post->ID) . '"> Read the full article...</a>';
 * }
 * add_filter('excerpt_more, 'new_excerpt_more');
 * 
 * --change the length of excerpt
 * function new_excerpt_length($length) {
 * return 20;//this returns 20 words instead of 55 words.
 * }
 * 
 * add_filter('excerpt_length', 'new_excerpt_length');
 * 
 * 
 * 
 * 
 * 
 * Adding a random background to your site -- this enables you to randomly generate a new background colour for your site every time somebody visits it...
 * 
 * function wpb_bg()
 * {
 * $rand = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f');
 * 
 * $color = '#' . $rand[rand(0,15)]. $rand[rand(0,15)]. $rand[rand(0,15)]. $rand[rand(0,15)]. $rand[rand(0,15)]. $rand[rand(0,15)];
 * }
 * 
 * echo $color;
 * 
 * //// Body class tag should be like -> <body <?php body_class();?> style="background-color:<?php wpb_bg(); ?>">>
 * 
 * 
 * 
 * https://www.dreamhost.com/wordpress/guide-to-wp-functions/
 * */


?>