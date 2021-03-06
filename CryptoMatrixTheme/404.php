<?php
get_header();
?>
<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <header class="page-header">
            <h1 class="page-title"><?php _e('Not Found', 'CryptoMatrixTheme');?></h1>
        </header>

        <div class="page-wrapper">
            <div class="page-content">
                <h2><?php _e("This is somewhat embarrasing, isn't it", 'CryptoMatrixTheme'); ?></h2>
                <p><?php _e("It looks like nothing was found at this location. Maybe try a search?", 'CryptoMatrixTheme'); ?></p>

                <?php get_search_form();?>
            </div><!-- .page-content -->
        </div><!-- .page-wrapper -->
    </div><!-- #content -->
</div><!-- #primary -->
<?php
get_sidebar();
?>
<?php
get_footer();
?>