<section class="container section-contact-form"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="contact-form">
            <div class="contact-form--image"><?php 
$image = get_sub_field('form_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?></div>
            <div class="contact-form--shortcode">
                <h2 class="heading-2"><?php the_sub_field('content_title'); ?></h2>
                <?php the_sub_field('form_embed_code'); ?>
            </div>
        </div>
    </div>
</section>