<section class="container section-text-image-block">

    <?php
        $image = get_sub_field('image');
        $size = 'large'; // (thumbnail, medium, large, full or custom size)
        ?>


    <div class="text-block">
        <h2 class="<?php the_sub_field('heading_size'); ?>">
            <?php the_sub_field('title'); ?></h2>
        <?php the_sub_field('paragraphs'); ?>
    </div>
    <div class="image-block">
        <?php echo wp_get_attachment_image($image, $size); ?>
    </div>

</section>