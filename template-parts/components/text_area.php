<?php

// Extracting field and class from args with null coalescing operator
$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

// Getting lead text component
$text_area_comp = is_array($field) ? $field : get_sub_field($field ?: 'text_area');

// Extracting lead text and text color
$text_area = $text_area_comp['text_area']['text_area'] ?? '';
$text_color = $text_area_comp['text_area']['settings']['text_color'] ?? '';

// Setting lead text style
$text_area_style = $text_color ? 'color:' . $text_color . ';' : '';

// Outputting lead text if exists
if ($text_area) {
  echo '<div class="prose font-medium max-w-none xl:prose-lg" style="' . $text_area_style . '">';
  echo '<p>' . $text_area . '</p>';
  echo '</div>';
}
