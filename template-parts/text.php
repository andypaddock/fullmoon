<section class="container section-text-block <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
        $image = get_sub_field('image');
        $size = 'large'; // (thumbnail, medium, large, full or custom size)
        $textType = get_sub_field('select_text_block');
        $readMore = get_sub_field('show_first');
        ?>
        <div class="text mb-sm">
            <?php if ($textType === 'one') : ?>
            <div class="text__one">
                <div class="text-block <?php the_sub_field('text_align'); ?>">
                    <div class="text-block__wrapper fmbottom <?php the_sub_field('tb_bg'); ?>">
<?php if(get_sub_field('title')):?>
                        <h2
                            class="<?php the_sub_field('heading_size'); ?> <?php the_sub_field('heading_size'); ?><?php the_sub_field('heading_colour'); ?>">
                            <?php the_sub_field('title'); ?></h2><?php endif; ?>
                        <article class="<?php the_sub_field('columns');?>">
                            <?php the_sub_field('paragraphs'); ?>
                        </article>
                        <?php
                            $link = get_sub_field('link');
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
            <?php elseif ($textType === 'quote') : ?>
            <div class="text__quote">

                <div class="text-block <?php the_sub_field('text_align'); ?>">
                    <div class="text-block__wrapper fmbottom <?php the_sub_field('tb_bg'); ?>">
                        <?php if(get_sub_field('title')):?><h2
                            class="<?php the_sub_field('heading_size'); ?> <?php the_sub_field('heading_size'); ?><?php the_sub_field('heading_colour'); ?>">
                            <?php the_sub_field('title'); ?></h2><?php endif; ?>
                        <?php the_sub_field('paragraphs'); ?>
                        <?php
                            $link = get_sub_field('link');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <a class="" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="quote fmright <?php the_sub_field('tb_bg'); ?>">
                    <?php the_sub_field('quote'); ?>
                </div>
            </div>

            <?php elseif ($textType === 'image') : ?>

            <div class="text__image <?php the_sub_field('text_align'); ?>">
                <div class="text-block <?php the_sub_field('text-align'); ?>">
                    <div class="text-block__wrapper fmbottom <?php the_sub_field('tb_bg'); ?>">

                        <span
                            class="<?php the_sub_field('float_image'); ?>"><?php echo wp_get_attachment_image($image, $size); ?></span><?php the_sub_field('paragraphs'); ?>
                        <?php
                            $link = get_sub_field('link');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <a class="button" href="<?php echo esc_url($link_url); ?>"
                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>
                        <span
                            class="mobile-image"><?php echo wp_get_attachment_image($image, $size); ?></span>
                    </div>
                </div>



            </div>
            <?php endif; ?>

        </div>
    </div>
</section>