<section class="container section-contact-details"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="contact-details">
            <div class="contact-details__address">
                <h2 class="heading-2 heading-2--light"><?php the_sub_field('contact_details_title');?></h2>
                <div class="address">
                    <div class="address-left"><?php the_field('address', 'options');?></div>
                    <div class="address-right">

                        <?php 
$link = get_field('email','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <a href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>

                        <?php 
$link = get_field('email_alt','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <a href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>

                        <?php 
$link = get_field('phone_number','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <a href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="contact-details__rates">
                <h2 class="heading-2 heading-2--light"><?php the_sub_field('rates_link_title');?></h2>
                <?php get_template_part('inc/img/logo-main'); ?>
                <?php 
$link = get_sub_field('rates_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                <a class="arrow" href="<?php echo esc_url( $link_url ); ?>"
                    target="<?php echo esc_attr( $link_target ); ?>"><i class="fa-thin fa-angle-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>