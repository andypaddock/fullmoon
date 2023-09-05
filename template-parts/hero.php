<?php
$heroType = get_sub_field('hero_type_select');
$heroImage = get_sub_field('hero_image');
$heroVideo = get_sub_field('hero_video');
$anchorTop = get_field('hero_image_bleed');
$pageElements = get_field('page_element_headings', 'options');
?>
<div class="hero-wrapper <?php if ($anchorTop || is_singular( 'post' )) : echo 'anchor-top'; endif; ?>">
    <?php if ($heroType == 'image') : ?>
    <section
        class="container full-image imageoff-<?php the_field('mobile_offset'); ?> <?php the_field('hero_height'); ?>  anchor-<?php the_field('image_anchor'); ?>"
        style="background-image: url(<?php if ($heroImage) : ?><?php echo $heroImage['sizes']['hero-image']; ?><?php else : ?><?php echo get_the_post_thumbnail_url(get_the_ID(), 'hero-image'); ?><?php endif ?>)">
        <?php if ( !is_single() ) { ?>
        <div class="hero-textblock row <?php the_sub_field('column_size'); ?> fmtop">
            <h1 class="heading-1 heading-1--light tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>
            <?php if ( !is_front_page() ) { ?>
            <div class="hero-para">
                <?php the_sub_field('sub_desc');?>
            </div>
            <?php } ?>
            <?php if ( is_front_page() ) { ?>
            <div class="booking-buttons">
                <?php
                                $link = get_field('book_table', 'options');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                <a class="button" href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
                <?php
                                $link = get_field('book_room', 'options');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                <a class="button" href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <?php if(get_field('hero_height') == 'hero-full') {?>
         <div class="center-wrapper">
            <div class="center bounce" id="scroll-down-arrow">
                <i class="fa-sharp fa-light fa-chevron-down"></i>
            </div>
        </div>
        <?php }?>
        <?php if(get_sub_field('add_booking_bar')) {?>
        <div class="booking-bar row extended">
            <?php if(get_sub_field('booking_selector') == 'table'): ?><a href="<?php echo $pageElements['table_booking_url']; ?>"><span><?php echo $pageElements['table_booking_text']; ?></span> <?php echo $pageElements['booking_text_gen']; ?><?php get_template_part('inc/img/point'); ?></a>
                
                <?php else: ?>
               <a href="<?php echo $pageElements['room_booking_url']; ?>" target="_blank"><span><?php echo $pageElements['room_booking_text']; ?></span><?php echo $pageElements['booking_text_gen']; ?><?php get_template_part('inc/img/point'); ?></a>
                <?php endif; ?>
           
        </div>
        <?php }?>
        <?php if(get_sub_field('add_room_summary')) {?>
        <div class="room-bar container">
            <div class="row room-bar--wrapper col-8">
            <div class="room-bar--summary"><div class="sleeps"><i class="fa-duotone fa-user"></i><?php the_sub_field('sleeps');?></div><div class="beds"><i class="fa-duotone fa-bed-empty"></i><?php the_sub_field('beds');?></div><div class="bath"><i class="fa-duotone fa-bath"></i><?php the_sub_field('bath');?></div></div>
            <div class="room-bar--price">
                <div class="price"><?php the_sub_field('price');?></div>
                <div class="basis"><?php the_sub_field('price_basis');?></div>
            </div>
           </div>
        </div>
        <?php }?>
    </section>
    <?php if ( is_single() ) { ?>
    <section class="container news-meta">
        <?php wpb_posts_nav(); ?>
        <div class="row <?php the_sub_field('column_size'); ?>">
            <h3 class="heading-5 heading-5--green tileup">
                <?php echo get_the_date(); ?>
            </h3>
            <h1 class="heading-1 tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>

        </div>
    </section>
    <?php } ?>
    <?php elseif ($heroType == 'video') : ?>
    <section class="container full-image <?php the_field('hero_height'); ?>">
        <video playsinline autoplay muted loop poster="<?php echo esc_url($heroImage['url']); ?>" id="bgvideo" width="x"
            height="y">
            <source src="<?php echo $heroVideo['url']; ?>" type="video/mp4">
        </video>
        <div class="hero-textblock">
            <h1 class="heading-1 heading-1--light tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>
            <?php 
$link = get_sub_field('hero_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button light tileup" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                    class="fa-sharp fa-light fa-arrow-right"></i></a>
            <?php endif; ?>
        </div>
        <div class="center-wrapper">
            <div class="center bounce" id="scroll-down-arrow">
                <i class="fa-sharp fa-light fa-chevron-down"></i>
            </div>
        </div>
    </section>
    <?php if ( is_single() ) { ?>
    <section class="container news-meta">
        <div class="row <?php the_sub_field('column_size'); ?>">
            <h3 class="heading-5 heading-5--green tileup">
                <?php echo get_the_date(); ?>
            </h3>
            <h1 class="heading-1 tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>

        </div>
    </section>
    <?php } ?>
    <?php elseif ($heroType == 'slider') : ?>
    <section class="container header full-image  <?php the_field('hero_height'); ?>">
        <div class="hero-slider">
            <?php
                $images = get_sub_field('hero_slider');
                if ($images) : ?>
            <?php foreach ($images as $image) : ?>
            <div class="slider-image" style="background-image: url(<?php echo esc_url($image['url']); ?>)"></div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="hero-textblock">
            <h1 class="heading-1 heading-1--light">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>
            <?php 
$link = get_sub_field('hero_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button light" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                    class="fa-sharp fa-light fa-arrow-right"></i></a>
            <?php endif; ?>
        </div>
        <div class="center-wrapper">
            <div class="center bounce" id="scroll-down-arrow">
                <i class="fa-sharp fa-light fa-chevron-down"></i>
            </div>
        </div>
    </section>
    <?php elseif ($heroType == 'half') : ?>
    <section class="container hero-half <?php the_field('hero_height'); ?>">
        <div class="hero-half--image"
            style="background-image: url(<?php if ($heroImage) : ?><?php echo $heroImage['sizes']['hero-image']; ?><?php else : ?><?php echo get_the_post_thumbnail_url(get_the_ID(), 'hero-image'); ?><?php endif ?>)">
        </div>
        <div class="hero-textblock">
            <h3 class="heading-5"><?php the_sub_field('hero_sub-heading'); ?></h3>
            <h1 class="heading-1 heading-1--<?php the_sub_field('heading_color'); ?>">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>
            <div class="hero-textblock--para underscores">
                <?php the_sub_field('hero_text'); ?>
            </div>
            <div class="hero-textblock--opening">
                <h3 class="heading-3 heading-3--green"><?php the_sub_field('open_title'); ?></h3>
                <?php the_sub_field('open_text'); ?>
            </div>
            <?php 
$link = get_sub_field('hero_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button light" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                    class="fa-sharp fa-light fa-arrow-right"></i></a>
            <?php endif; ?>

            <div class="center-wrapper">
            <div class="center bounce" id="scroll-down-arrow">
                <i class="fa-sharp fa-light fa-chevron-down"></i>
            </div>
        </div>

        </div>

    </section>

    <?php if ( is_single() ) { ?>
    <section class="container news-meta">
        <div class="row <?php the_sub_field('column_size'); ?>">
            <h3 class="heading-5 heading-5--green tileup">
                <?php echo get_the_date(); ?>
            </h3>
            <h1 class="heading-1 tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>

        </div>
    </section>
    <?php } ?>
    <?php elseif ($heroType == 'blank') : ?>

    



    <?php elseif ($heroType == 'home') : ?>

    <section class="home-video">
        <video playsinline autoplay muted loop poster="" id="bgvideo" width="x" height="y">
            <source src="<?php echo $heroVideo['url']; ?>" type="video/mp4">
        </video>
        <div class="hero-logo">
            <a href="<?php echo site_url(); ?>">
                <?php get_template_part('inc/img/logo-main'); ?>
            </a>
        </div>
        <div class="hero-textblock">
            <h1 class="heading-1 heading-1--light tileup">
                <?php if (get_sub_field('hero_heading')): ?><?php the_sub_field('hero_heading'); ?><?php else: ?><?php the_title(); ?><?php endif ?>
            </h1>
            <h3 class="heading-3 heading-3--light font-italic tileup">
                <?php the_sub_field('hero_sub-heading'); ?>
            </h3>
            <?php 
$link = get_sub_field('hero_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button outline light tileup" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>
        <div class="center-wrapper">
            <div class="center bounce" id="scroll-down-arrow">
                <i class="fa-sharp fa-light fa-chevron-down"></i>
            </div>
        </div>

    </section>


    <?php endif; ?>
</div>
<?php 
	$singleImage = get_field('background_image');
$images = get_field('watermarks', 'option');
$rand = array_rand($images, 1);
	
if( $singleImage ): ?>
<div class="watermark <?php the_field('background_anchor');?> <?php if ($heroType == 'blank'): echo 'blank'; endif;?>">
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