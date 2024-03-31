<?php

// Extracting field and class from args with null coalescing operator
$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

// Getting lead text component
$lead_text_comp = is_array($field) ? $field : get_sub_field($field ?: 'lead_text');

// Extracting lead text and text color
$lead_text = $lead_text_comp['lead_text']['lead_text'] ?? '';
$text_color = $lead_text_comp['lead_text']['settings']['text_color'] ?? '';

// Setting lead text style
$lead_text_style = $text_color ? 'color:' . $text_color . ';' : '';

// Outputting lead text if exists
if ($lead_text) {
  echo '<div class="prose font-medium max-w-none xl:prose-lg prose-lead:xl:text-2xl prose-lead:font-normal" style="' . $lead_text_style . '">';
  echo '<p class="lead">' . $lead_text . '</p>';
  echo '</div>';
}
