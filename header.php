<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package full_moon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.typekit.net/eyp3mcu.css">
    <script src="https://kit.fontawesome.com/3be7b1018b.js" crossorigin="anonymous"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <title>
        <?php if(is_front_page() || is_home()){
			echo get_bloginfo('name');
		} else{
			echo wp_title('');
		}?>
    </title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php $pageElements = get_field('page_element_headings', 'options'); ?>
    <header id="header">
        <div class="container navigation-bar">
            <nav id="main-navigation" class="row navigation">
                <div class="logo">
                    <a href="<?php echo site_url(); ?>" title="<?php the_field('header_title', 'options'); ?>">
                        <?php get_template_part('inc/img/logo'); ?>
                    </a>
                </div>
                <div id="main-menu" class="main-menu">


                    <? wp_nav_menu(array(
                            'theme_location' => 'menu-1',
                            'container' => '',
                        )); ?>


                </div>
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
                <div class="hamburger-menu">
                    <div class="hamburger"></div>
                </div>
                <?php $menuImage = get_field('menu_image','options'); ?>
                <div class="menu-container"
                    style="background-image: url(<?php echo $menuImage['sizes']['hero-image']; ?>)">
                    <div class="nav-wrapper">
                        <? wp_nav_menu(array(
                            'theme_location' => 'main-links',
                            'container' => 'main-pages',
                        )); ?>

                        <? wp_nav_menu(array(
                            'theme_location' => 'conservation',
                            'container' => 'conservation-pages',
                        )); ?>

                        <? wp_nav_menu(array(
                            'theme_location' => 'sub',
                            'container' => 'sub-pages',
                        )); ?>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container opening-bar">
            <div class="row col-8 opening-bar--wrapper">
                <div class="opening">
                    <span><?php echo $pageElements['opening_times']; ?></span><?php the_field('opening_summary', 'options');?>
                </div>
                <div class="spacer-bar">|</div>
                <div class="contact"><span><?php echo $pageElements['contact_us']; ?></span><?php
                                $link = get_field('phone_number', 'options');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                    <a href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>