<section class="container section-contact-tabs"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="contact-tabs">
            <div class="tabbed-section">
                <?php
$rows = count(get_sub_field('form_tab'));
if ($rows > 1) :
?>
                <div class="tabbed-section__head">

                    <?php if (have_rows('form_tab')) :?>

                    <ul class="tabs" data-tabgroup="first-tab-group">
                        <?php while (have_rows('form_tab')) : the_row(); $tabOrder = get_row_index(); ?>
                        <li><a href="#tab<?php echo get_row_index(); ?>"
                                class="<?php if ($tabOrder == '1'): echo 'active'; endif;?>"><?php the_sub_field('tab_title'); ?></a>
                        </li>
                        <?php endwhile;?>
                    </ul>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="tabbed-section__body">
                    <?php if (have_rows('form_tab')) :?>
                    <div id="first-tab-group" class="tabgroup">
                        <?php  while (have_rows('form_tab')) : the_row(); ?>
                        <div id="tab<?php echo get_row_index(); ?>">
                            <h2 class="heading-2"><?php the_sub_field('content_title'); ?></h2>
                            <?php the_sub_field('form_embed_code'); ?>
                        </div>
                        <?php endwhile;?>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>