<?php

$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

$buttons = $field && is_array($field) ? $field : get_sub_field($field ?: 'buttons');
$buttons_alignment = $buttons['buttons_alignment'] ?? '';

$buttons_alignment_class = '';
switch ($buttons_alignment) {
  case "left":
    $buttons_alignment_class .= 'text-left';
    break;
  case "right":
    $buttons_alignment_class .= 'text-right';
    break;
  case "center":
    $buttons_alignment_class .= 'text-center mx-auto';
    break;
  default:
    $buttons_alignment_class .= 'text-left';
}

$button_container_class = $class . ' ' . $buttons_alignment_class;

$buttons_repeater = $buttons['buttons_repeater'] ?? [];

//preint_r($buttons_repeater);

if ($buttons_repeater) {
  $button_count = count($buttons_repeater);
  $print_button_margin = $button_count > 1 ? 'mr-4 mb-4' : '';

  echo '<div class="mb-6 xl:mb-0 ' . $button_container_class . '">';
  foreach ($buttons_repeater as $button) {
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
    $print_button_style = '';

    switch ($button_style) {
      case "dark-blue":
        $print_button_class .= ' btn-primary hover:brightness-125';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '';
        break;
      case "blue":
        $print_button_class .= ' btn-secondary hover:brightness-125';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '';
        break;
      case "yellow":
        $print_button_class .= ' bg-brand-yellow border-brand-yellow hover:bg-brand-yellow hover:brightness-110';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '';
        break;
      case "tomato":
        $print_button_class .= ' bg-brand-tomato border-brand-tomato hover:bg-brand-tomato hover:brightness-110';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '#ffffff';
        $print_button_style .= 'color: ' . $button_text_color . ';';
        break;
      case "white":
        $print_button_class .= ' bg-white border-white hover:brightness-90';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '#404041';
        $print_button_style .= 'color: ' . $button_text_color . ';';
        break;
      case "dark-blue-outline":
        $print_button_class .= ' btn-outline btn-primary';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '';
        break;
      case "blue-outline":
        $print_button_class .= ' btn-outline btn-secondary';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '';
        break;
      case "yellow-outline":
        $print_button_class .= ' btn-outline border-brand-yellow text-brand-yellow hover:bg-brand-yellow hover:border-brand-yellow hover:text-black';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '';
        break;
      case "tomato-outline":
        $print_button_class .= ' btn-outline border-brand-tomato text-brand-tomato hover:bg-brand-tomato hover:border-brand-tomato hover:text-white';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '';
        break;
      case "white-outline":
        $print_button_class .= ' btn-outline border-white text-white shadow-md hover:bg-white hover:border-gray-500 hover:text-white hover:bg-gray-500';
        $button_bg_color = '';
        $button_border_color = '';
        $button_text_color = '';
        break;
      default:
        $print_button_class .= '';
    }

    switch ($button_size) {
      case "xs":
        $print_button_class .= ' px-4 py-2 text-xs';
        break;
      case "sm":
        $print_button_class .= ' px-5 py-2 xl:px-4 text-sm';
        break;
      case "md":
        $print_button_class .= ' px-6 py-3 text-sm xl:text-base';
        break;
      case "lg":
        $print_button_class .= ' px-8 py-4';
        break;
      case "xl":
        $print_button_class .= ' px-10 py-5';
        break;
      default:
        $print_button_class .= ' px-8 py-2 text-lg leading-none';
    }

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
      echo '<a href="' . $button_url . '" class="btn rounded-full hover:shadow-lg transition-all duration-300 ' . $print_button_class . ' ' . $print_button_margin . '" style="' . $print_button_style . '" title="' . $button_title . '" target="' . $button_target . '"><span>' . $button_title . '</span></a>';
    }
  }
  echo '</div>';
}
