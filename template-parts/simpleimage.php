<section class="container section-gallery mb-md  <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php $images = get_sub_field('images');
$size = 'large'; // (thumbnail, medium, large, full or custom size)
$original = 'full';
$imageLayout = get_sub_field('display_selector');
if ($images) : ?>
        <?php if ($imageLayout == 'double'):?>
        <div class="outer-container double">
    <?php 
    $counter = 0; // Initialize a counter variable
    foreach ($images as $image_id) :
        if ($counter >= 2) {
            break; // Exit the loop when 2 items have been displayed
        }
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE); ?>
        <div class="double--image">
            <a data-fslightbox="gallery" href="<?php echo wp_get_attachment_image_url($image_id, $original); ?>"
                class="lightbox-gallery" alt="<?php echo $image_alt; ?>">
                <?php echo wp_get_attachment_image($image_id, $size); ?></a>
        </div>
        <?php 
        $counter++; // Increment the counter variable
    endforeach; ?>
</div>

        <?php elseif ($imageLayout == 'quad'):?>
        <div class="outer-container quad">
    <?php 
    $counter = 0; // Initialize a counter variable
    foreach ($images as $image_id) :
        if ($counter >= 4) {
            break; // Exit the loop when 4 items have been displayed
        }
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE); ?>
        <div class="quad--image">
            <a data-fslightbox="gallery" href="<?php echo wp_get_attachment_image_url($image_id, $original); ?>"
                class="lightbox-gallery" alt="<?php echo $image_alt; ?>">
                <?php echo wp_get_attachment_image($image_id, $size); ?></a>
        </div>
        <?php 
        $counter++; // Increment the counter variable
    endforeach; ?>
</div>




        <?php endif; ?>

        <?php endif; ?>
    </div>
</section>