<section class="container section-map <?php the_sub_field('bg_main'); ?>"
    <?php if (get_sub_field('section_id')) : ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?> map-wrapper">
        <div id="map"></div>
        <div id="info-panel">
            <h3>Point 1</h3>
            <p>Basic information about Point 1.</p>
        </div>
        <div id="map-settings">
            <p id="map-pitch"></p>
            <p id="map-zoom"></p>
            <p id="map-bearing"></p>
        </div>
        <div class="point-controls">
            <div class="point-controls--wrapper">
                <div class="prev" id="prev-button"><i class='fa-thin fa-angle-left' aria-hidden='true'></i></div>
                <div class="controls-header">
                    <h2 class="heading-1 font-italic tileup">
                        <?php the_sub_field('hero_heading'); ?>
                    </h2>
                </div>
                <div class="next" id="next-button"><i class='fa-thin fa-angle-right' aria-hidden='true'></i></div>
            </div>
        </div>
        <!-- <div class="fade-text">
            <h3 class="heading-2 font-italic tileup">
                <?php the_sub_field('fade_heading'); ?>
            </h3>
            <?php the_sub_field('fade_text'); ?>
            <?php 
$link = get_sub_field('fade_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>
        </div> -->
        <script>
        mapboxgl.accessToken =
            'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';

        var points = [


            <?php
$args = array(
    'post_type' => 'camp',
    'posts_per_page' => 3
);
$the_query = new WP_Query( $args ); ?>
            <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $location = get_field('location'); $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?> {
                name: '<?php the_title(); ?>',
                coordinates: [<?php echo esc_attr($location['lng']); ?>, <?php echo esc_attr($location['lat']); ?>],
                info: '<?php the_field('tag_line'); ?>',
                zoom: <?php the_field('zoom'); ?>,
                pitch: <?php the_field('pitch'); ?>,
                bearing: <?php the_field('bearing'); ?>,
                image: '<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium');?>',
                link: '<?php the_permalink(); ?>'
            },
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>











        ];

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/silverless/clh0piium00lg01qy3g76gcf7', // style URL
            center: [37.8891, -2.77589], // starting position [lng, lat]
            pitch: <?php the_field('pitch','options'); ?>,
            bearing: <?php the_field('bearing','options'); ?>,
            zoom: <?php the_field('zoom','options'); ?>, // starting zoom
            // interactive: false,
        });

        map.on('load', function() {
            // Add points to the map
            points.forEach(function(point, index) {
                var el = document.createElement('div');
                el.className = 'marker';
                el.addEventListener('click', function() {
                    updateInfoPanel(index);
                    flyToLocation(point.coordinates, point.pitch, point.bearing, point.zoom);
                });
                new mapboxgl.Marker(el)
                    .setLngLat(point.coordinates)
                    .addTo(map);
            });

            updateInfoPanel(0); // Display info panel for Point 1 initially
        });

        function updateInfoPanel(index) {
            var infoPanel = document.getElementById('info-panel');
            var point = points[index];
            infoPanel.innerHTML = `
        <img src="${point.image}" alt="Point Image">
            <h3>${point.name}</h3>
            <p>${point.info}</p>
            <a class="map-link" href="${point.link}">Explore</a>
        `;
            // Remove "active" class from all marker elements
            var markerElements = document.getElementsByClassName('marker');
            for (var i = 0; i < markerElements.length; i++) {
                markerElements[i].classList.remove('active');
                markerElements[i].innerText = i + 1;
            }

            // Add "active" class to the currently displayed marker
            var activeMarker = markerElements[index];
            activeMarker.classList.add('active');
            activeMarker.innerText = index + 1;
        }

        function flyToLocation(coordinates, pitch, bearing, zoom) {
            map.flyTo({
                center: coordinates,
                zoom: zoom,
                pitch: pitch,
                bearing: bearing,
                duration: 2000, // Adjust the duration (in milliseconds) for smoother animation
                easing: function(t) {
                    return t;
                    // Experiment with different easing functions for smoother animation,
                    // such as "t * (2 - t)" or "Math.pow(t, 2)"
                }
            });
        }

        map.on('move', function() {
            var pitchElement = document.getElementById('map-pitch');
            var zoomElement = document.getElementById('map-zoom');
            var bearingElement = document.getElementById('map-bearing');

            pitchElement.innerText = 'Pitch: ' + map.getPitch().toFixed(2);
            zoomElement.innerText = 'Zoom: ' + map.getZoom().toFixed(2);
            bearingElement.innerText = 'Bearing: ' + map.getBearing().toFixed(2);
        });

        var currentIndex = 0; // Keep track of the current index

        var nextButton = document.getElementById('next-button');
        var prevButton = document.getElementById('prev-button');

        nextButton.addEventListener('click', function() {
            currentIndex = (currentIndex + 1) % points.length;
            updateInfoPanel(currentIndex);
            flyToLocation(points[currentIndex].coordinates, points[currentIndex].pitch, points[currentIndex]
                .bearing, points[currentIndex]
                .zoom);
        });

        prevButton.addEventListener('click', function() {
            currentIndex = (currentIndex - 1 + points.length) % points.length;
            updateInfoPanel(currentIndex);
            flyToLocation(points[currentIndex].coordinates, points[currentIndex].pitch, points[currentIndex]
                .bearing, points[currentIndex]
                .zoom);
        });
        </script>
    </div>
</section>