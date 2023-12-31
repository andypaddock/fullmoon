<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package full_moon
 */

?>




<div class="popup" id="tablebook">
    <div class="popup__content">
        <div class="popup__main">
            <a href="#teamblock" class="popup__close"><i class="fa-thin fa-xmark"></i></a>
            <h2 class="heading-2">Book a Table</h2>
            <?php the_field('form_code','options',0); ?>
        </div>
    </div>
</div>
<?php $pageElements = get_field('page_element_headings', 'options'); ?>
<footer id="colophon" class="container">
    <div class="row col-12 footer-accordian">
        <div class="footer-accordian--links">
            <div class="footer-accordian--heading">
                <h3 class="heading-4 footer-accordian--title"><?php echo $pageElements['footer_links_title']; ?></h3><i
                    class="fal fa-chevron-down fa-2x" aria-hidden="true"></i>
            </div>
            <div class="footer-accordian--content">
                <? wp_nav_menu(array(
                            'theme_location' => 'quick',
                            'container' => '',
                        )); ?>
            </div>
        </div>
        <div class="footer-accordian--pub">
            <?php $pub = get_field('pub_timings','options');?>
            <div class="footer-accordian--heading">
                <h3 class="heading-4 footer-accordian--title"><?php echo $pub['title']; ?></h3><i
                    class="fal fa-chevron-down fa-2x" aria-hidden="true"></i>
            </div>
            <div class="footer-accordian--content">
                <?php echo $pub['timings']; ?>
            </div>
        </div>
        <div class="footer-accordian--kitchen">
            <?php $kitchen = get_field('kitchen_timings','options');?>
            <div class="footer-accordian--heading">
                <h3 class="heading-4 footer-accordian--title"><?php echo $kitchen['title']; ?></h3><i
                    class="fal fa-chevron-down fa-2x" aria-hidden="true"></i>
            </div>
            <div class="footer-accordian--content">
                <?php echo $kitchen['timings']; ?>
            </div>
        </div>
        <div class="footer-accordian--contact">
            <div class="footer-accordian--heading">
                <h3 class="heading-4 footer-accordian--title"><?php echo $pageElements['footer_contact_title']; ?></h3>
                <i class="fal fa-chevron-down fa-2x" aria-hidden="true"></i>
            </div>
            <div class="footer-accordian--content">
                <div class="contacts-wrapper">
                    <!-- <div class="address">
                        <?php the_field('address', 'options'); ?>
                    </div> -->

                    <div class="phone"><?php
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
                    <div class="spacer-bar">|</div>
                    <div class="email"><?php
                                $link = get_field('email', 'options');
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
        </div>
    </div>
    <div class="row col-8 footer-gutter">
        <div class="terms">
            <div class="copyright"><?php the_field('copy_text', 'options'); ?></div>
        </div>
        <div class="footer__social"><?php if (have_rows('social_media_links', 'options')) : ?>
            <ul class="social-links">
                <?php while (have_rows('social_media_links', 'options')) : the_row(); ?>

                <li>
                    <?php
                                                $link = get_sub_field('link', 'options');
                                                if ($link) :
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                    <a href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php the_sub_field('icon', 'options'); ?></a>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>

        <div class="silverless"><a href="https://silverless.co.uk">

                <?php get_template_part('inc/img/silverless', 'logo'); ?>

            </a></div>
    </div>
</footer><!-- #colophon -->
<div class="mobile-nav">
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
</div>
<?php wp_footer(); ?>
</body>

</html>