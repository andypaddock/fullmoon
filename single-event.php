<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package full_moon
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php 
	$singleImage = get_field('background_image');
$images = get_field('watermarks', 'option');
$rand = array_rand($images, 1);
	
if( $singleImage ): ?>
<div class="watermark <?php the_field('background_anchor');?>">
    <div class="watermark--image">
        <img src="<?php echo $singleImage['url']; ?>" alt="<?php echo $singleImage['alt']; ?>" />
    </div>
</div>
<?php elseif($images): ?>
<div class="watermark">
    <div class="watermark--image">
        <img src="<?php echo $images[$rand]['url']; ?>" alt="<?php echo $images[$rand]['alt']; ?>" />
    </div>
</div>
<?php endif; ?>

<section class="container section-title  <?php the_sub_field('bg_main'); ?>" id="<?php the_sub_field('section_id'); ?>">
    <div class="title-block row <?php the_sub_field('column_size'); ?>">
        <div class="title-block--heading align-center fmbottom">
            <h2 class="heading-1 heading-1--dark">
                <?php the_title(); ?></h2>
        </div>
    </div>
</section>
<section class="container section-title  <?php the_sub_field('bg_main'); ?>" id="<?php the_sub_field('section_id'); ?>">
    <div class="title-block row <?php the_sub_field('column_size'); ?>">
        <div class="title-block--heading align-center fmbottom">
            <h2 class="heading-3">
                <?php the_field('subtitle'); ?></h2>
        </div>
    </div>
</section>
<section class="container section-spacer <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="spacer small"></div>
    </div>
</section>
<section class="container section-text-block <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row col-6">
        <div class="text mb-sm">
            <div class="text__one">
                <div class="text-block align-cent">
                    <div class="text-block__wrapper fmbottom <?php the_sub_field('tb_bg'); ?>">
                        <article class="single">
                            <?php the_field('short_description'); ?>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container section-spacer <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="spacer medium"></div>
    </div>
</section>

<section class="container section-gallery"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row col-12">
        <?php $images = get_field('images');
$size = 'large'; // (thumbnail, medium, large, full or custom size)
$original = 'full';
$imageLayout = get_field('display_selector');
if ($images) : ?>
        <?php if ($imageLayout == 'double'):?>
        <div class="outer-container double">
            <?php foreach ($images as $image_id) :
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE); ?>
            <div class="double--image">
                <a data-fslightbox="gallery" href="<?php echo wp_get_attachment_image_url($image_id, $original); ?>"
                    class="lightbox-gallery" alt="<?php echo $image_alt; ?>">
                    <?php echo wp_get_attachment_image($image_id, $size); ?></a>
            </div>
            <?php endforeach; ?>
        </div>

        <?php elseif ($imageLayout == 'quad'):?>
        <div class="outer-container quad">
            <?php foreach ($images as $image_id) :
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE); ?>
            <div class="quad--image">
                <a data-fslightbox="gallery" href="<?php echo wp_get_attachment_image_url($image_id, $original); ?>"
                    class="lightbox-gallery" alt="<?php echo $image_alt; ?>">
                    <?php echo wp_get_attachment_image($image_id, $size); ?></a>
            </div>
            <?php endforeach; ?>
        </div>



        <?php endif; ?>

        <?php endif; ?>
    </div>
</section>

<section class="container section-spacer <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="spacer medium"></div>
    </div>
</section>
<section class="container section-text-block">
    <div class="row col-10">
        <div class="text mb-sm">
            <div class="text__one">
                <div class="text-block align-left">
                    <div class="text-block__wrapper fmbottom <?php the_sub_field('tb_bg'); ?>">

                        <h2
                            class="heading-2">
                            Additional Information</h2>
                        <article class="double">
                            <?php the_field('additional_info'); ?>
                        </article>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container section-spacer <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="spacer medium"></div>
    </div>
</section>

<?php if(get_field('show_location')):?>
<section class="container section-card <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row col-12">
        <?php
        $image = get_sub_field('image');
        $size = 'hero-image'; // (thumbnail, medium, large, full or custom size)
        $cardType = get_sub_field('card_type');
        $pageElements = get_field('page_element_headings', 'options');
        ?>
        <div class="card mb-sm fmbottom">



            <div class="boxed-card <?php the_sub_field('box_position');?> <?php the_sub_field('box_align');?>">

                <div class="boxed-card--text">
                    <div class="text-box">
                        <h2 class="heading-2 heading-2--primary"><?php the_title(); ?></h2>
                        <?php the_sub_field('box_text'); ?>
                        <?php
                            $link = get_sub_field('box_link');
                            $location = get_field('location');
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
          

            
        </div>
    </div>

</section>
<?php endif;?>

<section class="container section-title  <?php the_sub_field('bg_main'); ?>" id="<?php the_sub_field('section_id'); ?>">
    <div class="title-block row <?php the_sub_field('column_size'); ?>">
        <div class="title-block--heading align-center fmbottom">
            <h2 class="heading-2">
               See More Events</h2>
        </div>
    </div>
</section>
<section class="container section-spacer <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="spacer small"></div>
    </div>
</section>
<?php $pageElements = get_field('page_element_headings', 'options');
$defaultText = get_field('recipe_headings', 'options'); ?>
<?php
$today = date('Y-m-j H:i:s');
            $args = array(
                'posts_per_page' => 4, /* how many post you need to display */
                // 'offset' => 1,
                'post_type' => 'event', /* your post type name */
                'post_status' => 'publish',
                'meta_key' => 'start_date_and_time',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'meta_query' => array(
                            array(
                                'key' => 'start_date_and_time',
                                'value' => $today,
                                'type' => 'DATE',
                                'compare' => '>='
                            )
                            ),
                            
                            
                            
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>

<section class="container section-event"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="event-wrapper row <?php the_sub_field('column_size'); ?>">
        <div class="event">
            <div class="event-image">
                <a href="<?php
if (get_field('event_type') == 'internal') {
    the_permalink();
} else {
    the_field('external_link');
}
?>" class="textonly"
                        aria-label="Find out more about <?php the_title(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                    alt="<?php the_title_attribute(); ?>" /></a>
            </div>
            <div class="text">
                <div class="event-date meta">
                    <?php $startDate = date('jS F', strtotime(get_field('start_date_and_time')));
                        $endDate = date('jS F', strtotime(get_field('end_date_and_time')));
                                                                            echo $startDate; ?><?php if($startDate !== $endDate):?>
                    to <?php 
                    echo $endDate; ?><?php endif;?>
                    </div>
                <div class="heading">
                    <?php the_title(); ?>
                </div>
                <div class="itin-button"> <a href="<?php
if (get_field('event_type') == 'internal') {
    the_permalink();
} else {
    the_field('external_link');
}
?>" class="textonly"
                        aria-label="Find out more about <?php the_title(); ?>"><?php echo $pageElements['read_more']; ?></a>
                </div>
            </div>
            
        </div>
    </div>
    </div>
</section>

<?php
                endwhile;
            endif;
            // Restore original post data.
            wp_reset_postdata(); ?>

<section class="container section-spacer <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="spacer medium"></div>
    </div>
</section>

<?php $bannerImage = get_field('cta_bg','options');
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
            <div class="row <?php the_field('column_size'); ?>">
            <h2 class="heading-2 tileup banner-title">
                        <?php the_field('cta_main_heading','options'); ?></h2>
                <?php 
$link = get_field('cta_link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <a class="cta-button reduced" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>">
                    <h2 class="heading-2 tileup ">
                        <?php the_field('cta_sub_heading','options'); ?></h2><?php get_template_part('inc/img/point'); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>
</main><!-- #main -->

<?php
get_footer();