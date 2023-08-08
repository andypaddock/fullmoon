<section class="et-slide container camp-content--accom"
    id="tab-<?php echo str_replace(' ', '', get_field('tab_title_accom')); ?>">
    <div class="row col-10">
        <div class="accom-slider">
            <?php if( have_rows('room_details') ): ?>

            <?php while( have_rows('room_details') ): the_row(); 
        $image = get_sub_field('image');
        ?>
            <div class="image-text-block">

                <div class="text-block">
                    <h2 class="heading-2"><?php the_sub_field('title'); ?></h2>
                    <?php the_sub_field('room_description'); ?>
                </div>
                <div class="image-block">
                    <?php echo wp_get_attachment_image( $image, 'full' ); ?></div>
            </div>
            <?php endwhile; ?>

            <?php endif; ?>

        </div>

    </div>
    <div class="row extended accom-facilites">
        <div class="container">
            <div class="row col-8">
                <div class="">
                    <h2 class="heading-2 heading-2--light">Facilities</h2>
                    <?php 
$terms = get_the_terms($post->ID, 'facility');
if( $terms ): ?>
                    <ul>
                        <?php foreach( $terms as $term ): ?>
                        <li>
                            <?php echo esc_html( $term->name ); ?>

                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
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
</section>