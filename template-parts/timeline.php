<section class="container section-timeline <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="timeline-wrapper">
            <?php $timeline = get_sub_field('timeline');
    if ($timeline && have_rows('timeline')) : $count = 0; ?>
            <?php while (have_rows('timeline')) : the_row();
            $count++;
            $is_last = $count === count($timeline);
        ?>
            <div class="timeline-event">
                <div class="timeline-event__date">
                    <div><?php the_sub_field('yeardate'); ?></div>
                </div>
                <div class="timeline-event__timeline">
                    <div class="top"></div>
                    <div class="center <?php if ($is_last) echo 'last'; ?>"></div>
                    <div class="bottom"></div>
                </div>
                <div class="timeline-event__details">
                    <div class="label">
                        <h3 class="heading-4"><?php the_sub_field('title'); ?></h3>
                    </div>
                    <div class="content">


                        <?php 
$images = get_sub_field('images');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
$original = 'full';
if( $images ): ?><div class="timeline-images">
                            <ul>
                                <?php foreach( $images as $image_id ): $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE); ?>
                                <li>
                                    <a data-fslightbox="gallery-<?php the_sub_field('yeardate'); ?>"
                                        href="<?php echo wp_get_attachment_image_url($image_id, $original); ?>"
                                        class="lightbox-gallery" alt="<?php echo $image_alt; ?>">
                                        <?php echo wp_get_attachment_image( $image_id, $size ); ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>





                        <div class="timeline-desc">
                            <?php the_sub_field('description'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>




    </div>

</section>