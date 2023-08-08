<section class="container section-card <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
        $image = get_sub_field('image');
        $size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
        $cardType = get_sub_field('card_type');
        $pageElements = get_field('page_element_headings', 'options');
        ?>
        <div class="card mb-sm">

            <?php if ($cardType == 'boxed') : ?>



            <div class="boxed-card">
                <div class="boxed-card--image"> <?php echo wp_get_attachment_image($image, $size); ?></div>
                <div class="boxed-card--text">
                    <h2 class="heading-2 heading-2--primary"><?php the_sub_field('box_title'); ?></h2>
                    <?php the_sub_field('box_text'); ?>
                    <?php
                            $link = get_sub_field('box_link');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                    <a class="button" href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                </div>


            </div>



            <?php elseif ($cardType === 'fullwidth') : ?>

            <?php
$featured_post = get_sub_field('large_page_link');
if ($featured_post):
    ?><div class="card__fullwidth container">
                <div class="row fullwidth-text--wrapper">
                    <div class="link-text">
                        <h2 class="heading-2 heading-2--light"><?php echo esc_html($featured_post->post_title); ?></h2>
                        <?php the_sub_field('large_link_description'); ?>
                        <a class="bottom-link"
                            href="<?php the_permalink($featured_post->ID); ?>"><?php get_template_part('inc/img/point'); ?></a>
                    </div>
                </div>
                <?php
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($featured_post->ID), 'hero-image');
    if ($thumbnail) :
        ?>
                <img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo esc_attr($featured_post->post_title); ?>">
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php elseif ($cardType === 'fulllink') : ?>
            <div class="card__fullwidth container">
                <div class="row fullwidth-text--wrapper">

                    <div class="link-text">
                        <h2 class="heading-2 heading-2--light"><?php the_sub_field('custom_link_title'); ?></h2>
                        <?php the_sub_field('custom_link_desc'); ?>



                        <?php 
$link = get_sub_field('custom_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <a class="bottom-link" href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php get_template_part('inc/img/point'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php 
$image = get_sub_field('custom_link_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?>


            </div>

            <?php endif; ?>
        </div>
    </div>

</section>