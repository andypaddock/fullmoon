<?php $pageElements = get_field('page_element_headings', 'options');
$defaultText = get_field('recipe_headings', 'options'); ?>
<?php
$today = date('Y-m-j H:i:s');
            $args = array(
                'posts_per_page' => 99, /* how many post you need to display */
                // 'offset' => 1,
                'post_type' => 'event', /* your post type name */
                'post_status' => 'publish',
                'meta_key' => 'start_date_and_time',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'meta_query' => array(
                            array(
                                'key' => 'start_date_and_time',
                                'value' => $today,
                                'type' => 'DATE',
                                'compare' => '>='
                            )
                            ),
                            
                            
                            
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>

<section class="container section-event"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="event-wrapper row <?php the_sub_field('column_size'); ?>">
        <div class="event tile">
            <div class="event-image">
                <a href="<?php
if (get_field('event_type') == 'internal') {
    the_permalink();
} else {
    the_field('external_link');
}
?>"
                        aria-label="Find out more about <?php the_title(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                    alt="<?php the_title_attribute(); ?>" /></a>
            </div>
            <div class="text">
                <div class="event-date meta">
                    <?php $startDate = date('jS F', strtotime(get_field('start_date_and_time')));
                        $endDate = date('jS F', strtotime(get_field('end_date_and_time')));
                                                                            echo $startDate; ?><?php if($startDate !== $endDate):?>
                    to <?php 
                    echo $endDate; ?><?php endif;?>
                    </div>
                <div class="heading">
                    <?php the_title(); ?>
                </div>
                <div class="itin-button"> <a href="<?php
if (get_field('event_type') == 'internal') {
    the_permalink();
} else {
    the_field('external_link');
}
?>" class="textonly"
                        aria-label="Find out more about <?php the_title(); ?>"><?php echo $pageElements['read_more']; ?></a>
                </div>
            </div>
            
        </div>
    </div>
    </div>
</section>

<?php
                endwhile;
            endif;
            // Restore original post data.
            wp_reset_postdata(); ?>