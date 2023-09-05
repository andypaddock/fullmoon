<?php $bannerImage = get_sub_field('image');
$size = 'hero_image'; ?>
<section class="section-newletter-banner <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>

    <div class="newsletter-banner-wrapper">
        <?php echo wp_get_attachment_image($bannerImage, $size); ?>
        <?php if (get_sub_field('add_background_overlay')) { ?>
        <div class="background-overlay"
            style="background:#373B62; opacity: 0.<?php the_sub_field('background_opacity'); ?>;">
        </div>
        <?php } ?>
        <div class="container">
            <div class="row <?php the_sub_field('column_size'); ?>">
            <h2 class="heading-2 heading-2--light tileup banner-title">
                        Newsletter Signup</h2>
            <?php echo do_shortcode(get_sub_field('shortcode')); ?>
            </div>
        </div>
    </div>

</section>