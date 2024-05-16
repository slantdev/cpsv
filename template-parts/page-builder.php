<?php
$term_id = get_queried_object()->term_id ?? null;
$the_id = $term_id ? 'term_' . $term_id : get_the_ID();

if (have_rows('section', $the_id)) :

  // Loop through rows.
  while (have_rows('section', $the_id)) : the_row();

    if (get_row_layout() == 'one_column') :
      get_template_part('template-parts/sections/one_column');

    elseif (get_row_layout() == 'adopt_cats') :
      get_template_part('template-parts/sections/adopt_cats');

    elseif (get_row_layout() == 'annual_reports') :
      get_template_part('template-parts/sections/annual_reports');

    elseif (get_row_layout() == 'hero_slider') :
      get_template_part('template-parts/sections/hero_slider');

    elseif (get_row_layout() == 'two_columns') :
      get_template_part('template-parts/sections/two_columns');

    elseif (get_row_layout() == 'media_releases') :
      get_template_part('template-parts/sections/media_releases');

    elseif (get_row_layout() == 'card_slider') :
      get_template_part('template-parts/sections/card_slider');

    elseif (get_row_layout() == 'custom_card') :
      get_template_part('template-parts/sections/custom_card');

    elseif (get_row_layout() == 'custom_card_2') :
      get_template_part('template-parts/sections/custom_card_2');

    elseif (get_row_layout() == 'location_map') :
      get_template_part('template-parts/sections/location_map');

    elseif (get_row_layout() == 'team') :
      get_template_part('template-parts/sections/team');

    elseif (get_row_layout() == 'testimonial') :
      get_template_part('template-parts/sections/testimonial');

    elseif (get_row_layout() == 'posts_card') :
      get_template_part('template-parts/sections/posts_card');

    elseif (get_row_layout() == 'posts_grid') :
      get_template_part('template-parts/sections/posts_grid');

    elseif (get_row_layout() == 'foster_care') :
      get_template_part('template-parts/sections/foster_care');

    elseif (get_row_layout() == 'found_cats') :
      get_template_part('template-parts/sections/found_cats');

    elseif (get_row_layout() == 'where_are_they') :
      get_template_part('template-parts/sections/where_are_they');

    elseif (get_row_layout() == 'cta') :
      get_template_part('template-parts/sections/cta');

    elseif (get_row_layout() == 'shop') :
      get_template_part('template-parts/sections/shop');

    elseif (get_row_layout() == 'faqs') :
      get_template_part('template-parts/sections/faqs');

    endif;

  // End loop.
  endwhile;

// No value.
else :
// Do something...
endif;
