<?php
$term_id = get_queried_object()->term_id ?? null;
$the_id = $term_id ? 'term_' . $term_id : get_the_ID();

if (have_rows('section', $the_id)) :

  // Loop through rows.
  while (have_rows('section', $the_id)) : the_row();

    if (get_row_layout() == 'text_center') :
      get_template_part('template-parts/sections/text_center');

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

    elseif (get_row_layout() == 'campaign') :
      get_template_part('template-parts/sections/campaign');

    elseif (get_row_layout() == 'cta') :
      get_template_part('template-parts/sections/cta');

    elseif (get_row_layout() == 'shop') :
      get_template_part('template-parts/sections/shop');

    elseif (get_row_layout() == 'on_this_page') :
      get_template_part('template-parts/sections/on_this_page');

    elseif (get_row_layout() == 'posts_grid') :
      get_template_part('template-parts/sections/posts_grid');

    elseif (get_row_layout() == 'faq') :
      get_template_part('template-parts/sections/faq');

    elseif (get_row_layout() == 'job_openings') :
      get_template_part('template-parts/sections/job_openings');

    elseif (get_row_layout() == 'coact_tv') :
      get_template_part('template-parts/sections/coact_tv');

    elseif (get_row_layout() == 'two_columns_cards') :
      get_template_part('template-parts/sections/two_columns_cards');

    elseif (get_row_layout() == 'text_card_grid') :
      get_template_part('template-parts/sections/text_card_grid');

    elseif (get_row_layout() == 'testimonials') :
      get_template_part('template-parts/sections/testimonials');

    elseif (get_row_layout() == 'newsletter') :
      get_template_part('template-parts/sections/newsletter');

    elseif (get_row_layout() == 'form') :
      get_template_part('template-parts/sections/form');

    elseif (get_row_layout() == 'steps') :
      get_template_part('template-parts/sections/steps');

    endif;

  // End loop.
  endwhile;

// No value.
else :
// Do something...
endif;
