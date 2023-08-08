<section class="et-slide container camp-content--gallery"
    id="tab-<?php echo str_replace(' ', '', get_field('tab_title_gall')); ?>">
    <div class="row">


        <div class="gallery-filters controls">
            <button class="filter-all" type="button" data-filter="all">Filter:</button>
            <button class="filters" type="button" data-filter=".gallery-image">Photos</button>
            <button class="filters" type="button" data-filter=".gallery-video">Video</button>
        </div>





        <?php $images = get_field('images');
$size = 'large'; // (thumbnail, medium, large, full or custom size)
$original = 'full';
$galleryLayout = get_sub_field('gallery_display');
if ($images) : ?>
        <div class="outer-container gallery-outer mb10">
            <div class="gallery-wrapper">
                <?php foreach ($images as $image_id) :
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE); ?>
                <div class="mix tile gallery-image">
                    <a data-fslightbox="gallery" href="<?php echo wp_get_attachment_image_url($image_id, $original); ?>"
                        class="lightbox-gallery" alt="<?php echo $image_alt; ?>">
                        <?php echo wp_get_attachment_image($image_id, $size); ?></a>
                </div>
                <?php endforeach; ?>

                <?php if( have_rows('videos') ): ?>

                <?php while( have_rows('videos') ): the_row(); 
        $image = get_sub_field('poster_image');
        $file = get_sub_field('video_file');
        ?>
                <div class="mix tile gallery-video">
                    <a data-fslightbox="gallery" href="<?php echo $file['url']; ?>" class="lightbox-gallery"
                        alt="<?php echo $image_alt; ?>">
                        <div class="video-image">
                            <?php echo wp_get_attachment_image($image, 'large'); ?></div>
                    </a>
                </div>

                <?php endwhile; ?>

                <?php endif; ?>


                <?php if( have_rows('external_video') ): ?>

                <?php while( have_rows('external_video') ): the_row(); 
        $image = get_sub_field('poster_image');
        $file = get_sub_field('video_file');
        ?>



                <a class="mix tile gallery-video" data-fslightbox="gallery"
                    href="https://www.youtube.com/watch?v=<?php the_sub_field('video_url');?>">
                    <img src="https://img.youtube.com/vi/<?php the_sub_field('video_url');?>/0.jpg">
                </a>

                <?php endwhile; ?>

                <?php endif; ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
</section>