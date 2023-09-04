<?php $pageElements = get_field('page_element_headings', 'options');
$defaultText = get_field('recipe_headings', 'options'); ?>


<section class="container section-event"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="event-wrapper row <?php the_sub_field('column_size'); ?>">


<?php if( have_rows('sights','options') ): ?>
    
    <?php while( have_rows('sights','options') ): the_row(); 
        $image = get_sub_field('image');
        ?>
       <div class="event tile">
            <div class="event-image">
                <a href="<?php esc_attr(the_sub_field('web_address')); ?>" target="_blank"><?php echo wp_get_attachment_image( $image, 'full' ); ?></a>
            </div>
            <div class="text">
                <div class="heading">
                    <?php the_sub_field('title'); ?>
                </div>
                <div class="description"><?php the_sub_field('short_description'); ?></div>
                
                <div class="itin-button"><a href="<?php esc_attr(the_sub_field('web_address')); ?>" target="_blank"><?php echo $pageElements['read_more']; ?></a>
                </div>
            </div>
            
        </div>
    <?php endwhile; ?>

<?php endif; ?>




        
    </div>
</section>

