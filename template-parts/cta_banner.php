<?php $bannerImage = get_sub_field('image');
$size = 'hero_image'; ?>
<section class="section-cta-banner <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>

    <div class="cta-banner-wrapper">
        <?php echo wp_get_attachment_image($bannerImage, $size); ?>
        <?php if (get_sub_field('add_background_overlay')) { ?>
        <div class="background-overlay"
            style="background:#373B62; opacity: 0.<?php the_sub_field('background_opacity'); ?>;">
        </div>
        <?php } ?>
        <div class="container">
            <div class="row <?php the_sub_field('column_size'); ?>">
            <h2 class="heading-2 tileup banner-title">
                        <?php the_sub_field('banner_title'); ?></h2>
                <?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <a class="cta-button <?php if(get_sub_field('banner_title')): echo 'reduced'; endif; ?>" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>">
                    <h2 class="heading-2 tileup ">
                        <?php the_sub_field('title'); ?><span><?php the_sub_field('title_alt'); ?></span></h2><?php get_template_part('inc/img/point'); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>