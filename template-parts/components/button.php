<?php

$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

$button = $field && is_array($field) ? $field : get_sub_field($field ?: 'button');

//preint_r($button);

$button_link = $button['button_link'];
$button_title = $button_link['title'];
$button_url = $button_link['url'];
$button_target = $button_link['target'];

$button_size = $button['button_size'];
$button_style = $button['button_style'];
$button_bg_color = $button['button_bg_color'] ?? '';
$button_border_color = $button['button_border_color'] ?? '';
$button_text_color = $button['button_text_color'] ?? '';

$print_button_class = '';

switch ($button_style) {
  case "dark-blue":
    $print_button_class .= ' btn-filled btn-teal';
    $button_bg_color = '';
    $button_border_color = '';
    $button_text_color = '';
    break;
  case "blue":
    $print_button_class .= ' btn-filled btn-purple';
    $button_bg_color = '';
    $button_border_color = '';
    $button_text_color = '';
    break;
  case "yellow":
    $print_button_class .= ' btn-filled btn-purple';
    $button_bg_color = '';
    $button_border_color = '';
    $button_text_color = '';
    break;
  case "tomato":
    $print_button_class .= ' btn-filled btn-purple';
    $button_bg_color = '';
    $button_border_color = '';
    $button_text_color = '';
    break;
  case "white":
    $print_button_class .= ' btn-filled btn-white';
    $button_bg_color = '';
    $button_border_color = '';
    $button_text_color = '#404041';
    break;
  case "dark-blue-outline":
    $print_button_class .= ' btn-outline btn-teal';
    $button_bg_color = '';
    $button_border_color = '';
    $button_text_color = '';
    break;
  case "blue-outline":
    $print_button_class .= ' btn-outline btn-purple';
    $button_bg_color = '';
    $button_border_color = '';
    $button_text_color = '';
    break;
  case "yellow-outline":
    $print_button_class .= ' btn-outline btn-purple';
    $button_bg_color = '';
    $button_border_color = '';
    $button_text_color = '';
    break;
  case "tomato-outline":
    $print_button_class .= ' btn-outline btn-purple';
    $button_bg_color = '';
    $button_border_color = '';
    $button_text_color = '';
    break;
  case "white-outline":
    $print_button_class .= ' btn-outline btn-white';
    $button_bg_color = '';
    $button_border_color = '';
    $button_text_color = '';
    break;
  default:
    $print_button_class .= '';
}

switch ($button_size) {
  case "xs":
    $print_button_class .= ' px-4 py-2 !text-xs';
    break;
  case "sm":
    $print_button_class .= ' px-5 py-2 xl:px-8 !text-sm';
    break;
  case "md":
    $print_button_class .= ' px-6 py-3 !text-sm xl:!text-base';
    break;
  case "lg":
    $print_button_class .= ' px-8 py-4';
    break;
  case "xl":
    $print_button_class .= ' px-10 py-5';
    break;
  default:
    $print_button_class .= ' px-8 py-3';
}

$print_button_style = '';
if ($button_style == 'custom') {
  if ($button_bg_color) {
    $print_button_style .= 'background-color: ' . $button_bg_color . ';';
  }
  if ($button_text_color) {
    $print_button_style .= 'color: ' . $button_text_color . ';';
  }
  if ($button_border_color) {
    $print_button_style .= 'border-color: ' . $button_border_color . ';';
  }
}
if ($button_url) {
  echo '<a href="' . $button_url . '" class="btn ' . $print_button_class . ' ' . $print_button_margin . '" style="' . $print_button_style . '" title="' . $button_title . '" target="' . $button_target . '"><span>' . $button_title . '</span></a>';
}
