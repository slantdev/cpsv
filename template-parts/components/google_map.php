<?php

// Extracting field and class from args with null coalescing operator
$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

// Getting content editor component
$google_map_comp = is_array($field) ? $field : get_sub_field($field ?: 'google_map');

// Extracting content editor and text color from content editor component
$google_map = $google_map_comp['google_map']['google_map'] ?? '';
$more_settings = $google_map_comp['google_map']['settings']['more_settings'] ?? [];

$rounded_corners = $more_settings['rounded_corners'] ?? '';
$rounded_corners_classes = [
  "default" => 'rounded-lg',
  "none" => 'rounded-none',
  "sm" => 'rounded-sm',
  "md" => 'rounded-md',
  "lg" => 'rounded-lg',
  "xl" => 'rounded-xl',
];
$rounded_corners_class = $rounded_corners_classes[$rounded_corners] ?? '';

//preint_r($google_map_comp);

// Outputting content editor if available
if ($google_map) { ?>
  <div class="location_map-container relative">
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
    <div class="aspect-w-16 aspect-h-7 bg-slate-100 overflow-clip <?php echo $rounded_corners_class ?>">
      <div class="acf-map" data-zoom="16">
        <div class="marker" data-lat="<?php echo esc_attr($google_map['lat']); ?>" data-lng="<?php echo esc_attr($google_map['lng']); ?>"></div>
      </div>
    </div>
  </div>
<?php }
