<?php

$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

$heading_comp = $field && is_array($field) ? $field : get_sub_field($field ?: 'heading');

$heading_text = isset($heading_comp['heading']['heading_text']) ? $heading_comp['heading']['heading_text'] : '';
$text_color = $heading_comp['heading']['text_color'] ?? '';

$heading_text_style = '';
if ($text_color) {
  $heading_text_style = 'color:' . $text_color . ';';
}
//preint_r($heading_text);

if ($heading_text) {
  echo '<h3 class="text-brand-dark-blue font-semibold text-[32px] leading-tight" style="' . $heading_text_style . '">' . $heading_text . '</h3>';
}
