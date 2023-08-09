<section class="container section-gallery-card <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="gallery-card">
            <?php $images = get_sub_field('images');
$size = 'large'; // (thumbnail, medium, large, full or custom size)
$original = 'full';
$galleryLayout = get_sub_field('gallery_display');
if ($images) : ?>

            <div class="gallery-wrapper">
                <?php foreach ($images as $image_id) :
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE); ?>
                <div class="gallery-image">
                    <a data-fslightbox="gallery" href="<?php echo wp_get_attachment_image_url($image_id, $original); ?>"
                        class="lightbox-gallery" alt="<?php echo $image_alt; ?>">
                        <?php echo wp_get_attachment_image($image_id, $size); ?></a>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="gallery-card--text fmright">
                <h2 class="heading-2 heading-2--primary"><?php the_sub_field('box_title'); ?></h2>
                <?php the_sub_field('box_text'); ?>

                <a data-fslightbox="gallery" class="button"
                    href="<?php echo wp_get_attachment_image_url($image_id, $original); ?>">View Gallery</a>
            </div>
        </div>
    </div>
</section>