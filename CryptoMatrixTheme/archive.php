<?php get_header(); ?>
<section class="page-wrap">
    <div id="container">
        <div id="content" role="main">
            <?php the_post();?>
            <h1 class="entry-title"><?php the_post();?></h1>
            <?php get_search_form();?>
            <h2>Archives by month:</h2>
            <ul>
            <?php wp_get_archives('type=monthly');?>
            </ul>
            <h2>Archives by Subject:</h2>
            <ul>
            <?php wp_list_categories('title_li=');?>
            </ul>
        </div>
    </div>
<div class="container align-items-center">
    <?php //get_template_part('includes/section', 'uncategorised'); ?>
    <?php previous_posts_link();?>
    <?php next_posts_link();?>
</div>
</section>
<?php get_sidebar();?>
<?php get_footer(); ?>