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

    elseif (get_row_layout() == 'hero_slider') :
      get_template_part('template-parts/sections/hero_slider');

    elseif (get_row_layout() == 'two_columns') :
      get_template_part('template-parts/sections/two_columns');

    elseif (get_row_layout() == 'card_slider') :
      get_template_part('template-parts/sections/card_slider');

    elseif (get_row_layout() == 'testimonial') :
      get_template_part('template-parts/sections/testimonial');

    elseif (get_row_layout() == 'posts_card') :
      get_template_part('template-parts/sections/posts_card');

    elseif (get_row_layout() == 'posts_grid') :
      get_template_part('template-parts/sections/posts_grid');

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
