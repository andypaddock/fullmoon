<section class="et-slide container camp-content--activity"
    id="tab-<?php echo str_replace(' ', '', get_field('tab_title_act')); ?>">
    <div class="row">


        <?php $terms = get_the_terms( get_the_ID(), 'activity' );?>

        <?php if( $terms ): ?>

        <?php foreach( $terms as $term ): ?>
        <div class="activity-item">
            <div class="activity-item__image">
                <?php $imageAct = get_field('activity_image', $term->taxonomy . '_' . $term->term_id);?>
                <img src="<?php echo $imageAct ?>">
            </div>
            <div class="activity-item__text">
                <h2 class="heading-2"><?php echo $term->name; ?></h2>
                <?php echo term_description($term);?>

            </div>
            <div class="activity-item__button">
                <span>
                    <i class="fa-thin fa-angle-down activity-trigger" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>