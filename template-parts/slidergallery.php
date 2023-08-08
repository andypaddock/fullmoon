<section class="container section-slider-gallery">
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php 
$images = get_sub_field('slider');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
$original = 'full';
if( $images ): ?>
        <div class="slider-gallery">
            <?php foreach( $images as $image_id ): $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);?>
            <div class="slider-gallery__image">
                <a data-fslightbox="slider" href="<?php echo wp_get_attachment_image_url($image_id, $original); ?>"
                    class="lightbox-gallery" alt="<?php echo $image_alt; ?>">
                    <?php echo wp_get_attachment_image($image_id, $size); ?></a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>