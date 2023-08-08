<?php $pagebg = get_field('background_image'); ?>
<section class="et-slide container section-text-block camp-content--overview"
    style="background-image: url(<?php if ($pagebg) {echo $pagebg['sizes']['hero-image'];}  ?>)"
    id="tab-<?php echo str_replace(' ', '', get_field('tab_title_over')); ?>">
    <div class="row col-6">
        <div class="text">
            <div class="text-block <?php the_field('text_align'); ?>">
                <div class="text-block__wrapper fmbottom <?php the_field('tb_bg'); ?>">

                    <h2 class="heading-2">
                        <?php the_field('title'); ?></h2>
                    <?php the_field('paragraphs'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php if( have_rows('image_and_text_block') ): ?>
    <div class="row col-10">
        <?php while( have_rows('image_and_text_block') ): the_row(); 
        $image = get_sub_field('image');
        ?>
        <div class="image-text-block">
            <div class="image-block fmleft">
                <?php echo wp_get_attachment_image( $image, 'full' ); ?></div>
            <div class="text-block fmright">
                <h2 class="heading-2"><?php the_sub_field('title'); ?></h2>
                <?php the_sub_field('description'); ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
    <?php if( have_rows('staff_members') ): ?>
    <div class="row extended over-staff">
        <div class="container">
            <div class="row col-10 staff-wrapper">
                <div class="over-staff__text">
                    <h2 class="heading-2 heading-2--light"><?php the_field('staff_heading'); ?></h2>
                    <?php the_field('staff_description'); ?>
                </div>
                <div class="over-staff__images">

                    <ul class="staff-members">
                        <?php while( have_rows('staff_members') ): the_row(); 
        $image = get_sub_field('image');
        ?>
                        <li class="member tile">
                            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                            <h3 class="heading-4"><?php the_sub_field('name'); ?></h3>
                            <p><?php the_sub_field('position'); ?></p>
                        </li>
                        <?php endwhile; ?>
                    </ul>

                </div>

            </div>
        </div>

    </div>
    <div class="row extended book-cta">
        <?php 
$link = get_field('cta_link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
        <a class="cta-bar" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
            <h2 class="heading-2 heading-2--light"><?php echo esc_html( $link_title ); ?></h2>
        </a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</section>