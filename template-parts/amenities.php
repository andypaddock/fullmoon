<section class="container section-amenity <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">


        <?php if( have_rows('amenity') ): ?>
        <ul class="amenity-wrapper">
            <?php while( have_rows('amenity') ): the_row(); 
        ?>
            <li>
                <?php the_sub_field('amenity');?>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>


    </div>
</section>