<section class="container section-card <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
        $image = get_sub_field('image');
        $size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
        $cardType = get_sub_field('card_type');
        $pageElements = get_field('page_element_headings', 'options');
        ?>
        <div class="card mb-sm">

            <?php if ($cardType == 'select') : ?>


            <?php
$featured_posts = get_sub_field('triple_links');
if( $featured_posts ): ?>
            <div class="triple-cards">
                <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
                <div class="triple-cards--card">
                    <a class="top-link" href="<?php the_permalink(); ?>"><i class="fa-thin fa-angle-right"></i></a>
                    <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url($post, 'hero-image'); ?>"
                        alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="heading-2 heading-2--light"><?php the_title(); ?></h2>
                    </a>

                </div>
                <?php endforeach; ?>
            </div>
            <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
            <?php endif; ?>

            <?php elseif ($cardType == 'random') : ?>


            <div class="triple-cards">
                <?php
$random_pages_query = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => 3,
    'orderby' => 'rand'
));

if ($random_pages_query->have_posts()) {
    while ($random_pages_query->have_posts()) {
        $random_pages_query->the_post();
        ?>
                <div class="triple-cards--card">
                    <a class="top-link" href="<?php the_permalink(); ?>"><i class="fa-thin fa-angle-right"></i></a>
                    <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url($post, 'hero-image'); ?>"
                        alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="heading-2 heading-2--light"><?php the_title(); ?></h2>
                    </a>

                </div>
                <?php
    }
}

wp_reset_postdata();
?>
            </div>


            <?php elseif ($cardType == 'child') : ?>


            <div class="triple-cards">
                <?php
$parent_page_id = get_sub_field('parent_page'); 

$random_child_pages_query = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => 3,
    'orderby' => 'rand',
    'post_parent' => $parent_page_id
));

if ($random_child_pages_query->have_posts()) {
    while ($random_child_pages_query->have_posts()) {
        $random_child_pages_query->the_post();
        ?>
                <div class="triple-cards--card">
                    <a class="top-link" href="<?php the_permalink(); ?>"><i class="fa-thin fa-angle-right"></i></a>
                    <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url($post, 'hero-image'); ?>"
                        alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="heading-2 heading-2--light"><?php the_title(); ?></h2>
                    </a>

                </div>
                <?php
    }
}

wp_reset_postdata();
?>
            </div>

            <?php elseif ($cardType == 'selectchild') : ?>


            <div class="triple-cards">
                <?php
$current_page_id = get_the_ID(); // Get the ID of the current page
$current_page = get_post($current_page_id); // Get the current page object

// Check if the current page is a child page
if ($current_page->post_parent) {
    $parent_page_id = $current_page->post_parent; // Use the parent ID
} else {
    $parent_page_id = $current_page_id; // Use the current page ID as the parent ID
}

$random_sibling_pages_query = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => 3,
    'orderby' => 'rand',
    'post_parent' => $parent_page_id,
    'post__not_in' => array($current_page_id) // Exclude the current page
));

if ($random_sibling_pages_query->have_posts()) {
    while ($random_sibling_pages_query->have_posts()) {
        $random_sibling_pages_query->the_post();
        ?>
                <div class="triple-cards--card">
                    <a class="top-link" href="<?php the_permalink(); ?>"><i class="fa-thin fa-angle-right"></i></a>
                    <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url($post, 'hero-image'); ?>"
                        alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="heading-2 heading-2--light"><?php the_title(); ?></h2>
                    </a>

                </div>
                <?php
    }
}

wp_reset_postdata();
?>
            </div>



            <?php endif; ?>
        </div>
    </div>
</section>