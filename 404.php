<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Campi_Ya_Kanzi
 */

get_header();
?>

<?php $pageImage = get_field('error_bg_image', 'options'); ?>

<section class="container hero-wrapper error-404 anchor-top" style="background-image: url(<?php echo $pageImage; ?>);">
    <div class="row col-4 error-message">
        <div class="content">
            <h1 class="heading-404"><?php the_field('error_heading','options');?></h1>
            <h3 class="heading-404 heading-404--sub"><?php the_field('error_sub_heading','options');?></h3>
            <h2 class="heading-3 heading-3--light"><?php the_field('error_message','options');?></h2>
            <?php 
$link = get_field('errorlink','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button-404" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span><?php get_template_part('inc/img/point'); ?></a>
            <?php endif; ?>
        </div>
    </div>

</section>


<?php
get_footer();