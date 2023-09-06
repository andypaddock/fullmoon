<section class="container section-card <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
        $image = get_sub_field('image');
        $size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
        $cardType = get_sub_field('card_type');
        $pageElements = get_field('page_element_headings', 'options');
        ?>
        <div class="card mb-sm fmbottom">

            <?php if ($cardType == 'boxed') :
                $quoteMark = get_sub_field('is_quote'); ?>
            <div class="boxed-card <?php the_sub_field('box_position');?> <?php the_sub_field('box_align');?>">

                <div class="boxed-card--text">
                    <div class="text-box <?php if ($quoteMark == '1') {
    echo 'quote';
} ?>">
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
                        <?php if ($quoteMark):?><span
                            class="quote-cite"><?php the_sub_field('quote_cite');?></span><?php endif; ?>
                    </div>
                </div>
                <div class="boxed-card--image"> <?php echo wp_get_attachment_image($image, $size); ?></div>

            </div>
            <?php elseif ($cardType === 'fullwidth') : ?>

            <?php
$featured_post = get_sub_field('large_page_link');
if ($featured_post):
    ?><a class="bottom-link" href="<?php the_permalink($featured_post->ID); ?>">
                <div class="card__fullwidth container">
                    <div class="row extended fullwidth-text--wrapper">
                        <div class="link-text">
                            <h2 class="heading-2 heading-2--light"><?php echo esc_html($featured_post->post_title); ?>
                            </h2>
                            <?php the_sub_field('large_link_description'); ?>
                            <div class="pointer">
                                <?php the_sub_field('point_text'); ?>
                            <?php get_template_part('inc/img/point'); ?>
                            </div>
                        </div>
                    </div>
                    <?php
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($featured_post->ID), 'hero-image');
    if ($thumbnail) :
        ?>
                    <img class="<?php if(get_sub_field('image_sat')): echo 'saturate'; endif;?>"
                        src="<?php echo $thumbnail[0]; ?>" alt="<?php echo esc_attr($featured_post->post_title); ?>">
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </a>

            <?php elseif ($cardType === 'cardmap') : ?>
<?php  $location = get_sub_field('map');?>
            <div class="boxed-card <?php the_sub_field('box_position');?> <?php the_sub_field('box_align');?>">

                <div class="boxed-card--text">
                    <div class="text-box">
                        <h2 class="heading-2 heading-2--primary"><?php the_sub_field('box_title'); ?></h2>
                        <?php the_sub_field('box_text'); ?>
                        <?php
                            $link = get_sub_field('box_link');
                            ?>
                        <a class="button" href="https://www.google.com/maps/dir/Current+Location/<?php echo esc_attr($location['lat']); ?>,<?php echo esc_attr($location['lng']); ?>"
                            target="_blank">Get Directions</a>
                    </div>
                </div>
                <div class="boxed-card--image map">
                    <div id='map'></div>
                    <script>
                    mapboxgl.accessToken =
                        'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
                    var map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/silverless/cl8a0kjbz003615s1d9m567qj',
                        center: [<?php echo esc_attr($location['lng']); ?>,
                            <?php echo esc_attr($location['lat']); ?>
                        ],
                        zoom: 11,
                        maxZoom: 17,
                        minZoom: 6,
                    });
                    map.addControl(new mapboxgl.NavigationControl());
                    // add marker to map
                    new mapboxgl.Marker({
                            color: 'black'
                        })
                        .setLngLat([<?php echo esc_attr($location['lng']); ?>,
                            <?php echo esc_attr($location['lat']); ?>
                        ])
                        .addTo(map);
                    </script>
                </div>

            </div>
            <?php elseif ($cardType === 'fullwidth') : ?>

            <?php
$featured_post = get_sub_field('large_page_link');
if ($featured_post):
    ?><a class="bottom-link" href="<?php the_permalink($featured_post->ID); ?>">
                <div class="card__fullwidth container">
                    <div class="row extended fullwidth-text--wrapper">
                        <div class="link-text">
                            <h2 class="heading-2 heading-2--light"><?php echo esc_html($featured_post->post_title); ?>
                            </h2>
                            <?php the_sub_field('large_link_description'); ?>
                            <?php get_template_part('inc/img/point'); ?>
                        </div>
                    </div>
                    <?php
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($featured_post->ID), 'hero-image');
    if ($thumbnail) :
        ?>
                    <img class="<?php if(get_sub_field('image_sat')): echo 'saturate'; endif;?>"
                        src="<?php echo $thumbnail[0]; ?>" alt="<?php echo esc_attr($featured_post->post_title); ?>">
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </a>

            <?php elseif ($cardType === 'fulllink') : ?>
            <?php 
$link = get_sub_field('custom_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="bottom-link" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"
                title="Click for <?php the_sub_field('custom_link_title'); ?>">
                <div class="card__fullwidth container <?php if(get_sub_field('image_sat')): echo 'saturate'; endif;?>">
                    <div class="row fullwidth-text--wrapper">

                        <div class="link-text">
                            <h2 class="heading-2 heading-2--light"><?php the_sub_field('custom_link_title'); ?></h2>

                            <div class="pointer">
                                <div><?php the_sub_field('point_text'); ?></div>
                            <?php get_template_part('inc/img/point'); ?>
                            </div>



                        </div>
                    </div>
                    <?php 
$image = get_sub_field('custom_link_image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    echo wp_get_attachment_image( $image, $size );
}?>


                </div>
            </a>
            <?php endif; ?>

            <?php endif; ?>
        </div>
    </div>

</section>