<?php
include get_template_directory() . '/template-parts/global/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$section_id = $section_id ? 'id="' . $section_id . '"' : '';

$location_map = get_sub_field('location_map') ?: []; // Group

$heading_text = $location_map['heading']['heading_text'] ?? '';
$text_area = $location_map['text_area']['text_area'] ?? '';
$button_url = $location_map['button']['button_link']['url'] ?? '';
$location_settings = $location_map['location_settings'] ?? []; // Group
$google_map = $location_settings['google_map'] ?? [];
$contact_info = $location_settings['contact_info'] ?? []; // Repeater

$uniqid = uniqid();
$section_class = 'section-location_map-' . $uniqid;

?>

<section <?php echo $section_id ?> class="<?php echo $section_class ?> section-wrapper relative" style="<?php echo $section_style ?>">
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'top', 'active' => $top_separator, 'color' => $top_separator_color, 'class' => '')); ?>
  <div class="section-spacing relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'top', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
    <div class="section-content">
      <div class="intro-container relative container mx-auto max-w-screen-2xl">
        <div class="flex gap-x-20 items-end">
          <div class="w-full xl:w-1/2">
            <?php
            if ($heading_text) {
              echo '<div>';
              get_template_part('template-parts/components/heading', '', array('field' => $location_map, 'align' => 'text-left', 'size' => 'text-5xl',  'leading' => 'leading-tight', 'weight' => 'font-semibold'));
              echo '</div>';
            }
            ?>
          </div>
          <div class="w-full xl:w-1/2">
            <?php
            if ($text_area) {
              echo '<div class="w-full">';
              get_template_part('template-parts/components/textarea', '', array('field' => $location_map, 'align' => 'text-left', 'weight' => 'font-medium'));
              echo '</div>';
            }
            ?>
          </div>
        </div>
      </div>
      <?php if ($google_map) : ?>
        <div class="location_map-container relative container max-w-screen-2xl my-8 xl:my-12">
          <?php if (defined('GOOGLE_MAPS_API')) {
            echo '<script src="https://maps.googleapis.com/maps/api/js?key=' . GOOGLE_MAPS_API . '&libraries=places,geometry&callback=Function.prototype"></script>';
          }
          ?>
          <style type="text/css">
            .acf-map {
              width: 100%;
              height: 100%;
            }

            .acf-map img {
              max-width: inherit !important;
            }
          </style>
          <script type="text/javascript">
            (function($) {

              /**
               * initMap
               *
               * Renders a Google Map onto the selected jQuery element
               *
               * @date    22/10/19
               * @since   5.8.6
               *
               * @param   jQuery $el The jQuery element.
               * @return  object The map instance.
               */
              function initMap($el) {

                // Find marker elements within map.
                var $markers = $el.find('.marker');

                // Create gerenic map.
                var mapArgs = {
                  zoom: $el.data('zoom') || 16,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map($el[0], mapArgs);

                // Add markers.
                map.markers = [];
                $markers.each(function() {
                  initMarker($(this), map);
                });

                // Center map based on markers.
                centerMap(map);

                // Return map instance.
                return map;
              }

              /**
               * initMarker
               *
               * Creates a marker for the given jQuery element and map.
               *
               * @date    22/10/19
               * @since   5.8.6
               *
               * @param   jQuery $el The jQuery element.
               * @param   object The map instance.
               * @return  object The marker instance.
               */
              function initMarker($marker, map) {

                // Get position from marker.
                var lat = $marker.data('lat');
                var lng = $marker.data('lng');
                var latLng = {
                  lat: parseFloat(lat),
                  lng: parseFloat(lng)
                };

                // Create marker instance.
                var marker = new google.maps.Marker({
                  position: latLng,
                  map: map
                });

                // Append to reference for later use.
                map.markers.push(marker);

                // If marker contains HTML, add it to an infoWindow.
                if ($marker.html()) {

                  // Create info window.
                  var infowindow = new google.maps.InfoWindow({
                    content: $marker.html()
                  });

                  // Show info window when marker is clicked.
                  google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map, marker);
                  });
                }
              }

              /**
               * centerMap
               *
               * Centers the map showing all markers in view.
               *
               * @date    22/10/19
               * @since   5.8.6
               *
               * @param   object The map instance.
               * @return  void
               */
              function centerMap(map) {

                // Create map boundaries from all map markers.
                var bounds = new google.maps.LatLngBounds();
                map.markers.forEach(function(marker) {
                  bounds.extend({
                    lat: marker.position.lat(),
                    lng: marker.position.lng()
                  });
                });

                // Case: Single marker.
                if (map.markers.length == 1) {
                  map.setCenter(bounds.getCenter());

                  // Case: Multiple markers.
                } else {
                  map.fitBounds(bounds);
                }
              }

              // Render maps on page load.
              $(document).ready(function() {
                $('.acf-map').each(function() {
                  var map = initMap($(this));
                });
              });

            })(jQuery);
          </script>
          <div class="aspect-w-16 aspect-h-7 rounded-lg bg-slate-100 overflow-clip">
            <div class="acf-map" data-zoom="16">
              <div class="marker" data-lat="<?php echo esc_attr($google_map['lat']); ?>" data-lng="<?php echo esc_attr($google_map['lng']); ?>"></div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($contact_info) : ?>
        <div class="relative container max-w-screen-2xl my-8 xl:my-12">
          <div class="grid grid-cols-1 lg:grid-cols-3">
            <?php
            foreach ($contact_info as $info) :
              $title = $info['title'] ?? '';
              $text_content = $info['text_content'] ?? '';
            ?>
              <div>
                <div class="border-b border-slate-300 pb-4">
                  <h4 class="text-[28px] leading-tight font-bold" style="color: var(--section-link-color)"><?php echo $title ?></h4>
                </div>
                <div class="pt-4">
                  <?php echo $text_content ?>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>