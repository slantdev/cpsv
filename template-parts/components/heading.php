<?php

// Extracting field, class, and heading text alignment from args with null coalescing operator
$field = $args['field'] ?? '';
$class = $args['class'] ?? '';
$align = $args['align'] ?? '';
$size = $args['size'] ?? '';
$weight = $args['weight'] ?? '';
$leading = $args['leading'] ?? '';

// Getting heading component
$heading_comp = is_array($field) ? $field : get_sub_field($field ?: 'heading');

// Extracting heading details
$heading_text = $heading_comp['heading']['heading_text'] ?? '';
$heading_color = $heading_comp['heading']['settings']['heading_color'] ?? '';

$settings = $heading_comp['heading']['settings']['settings'] ?? [];
$advanced_settings = $settings['advanced_settings'] ?? false;

// Extracting advanced settings
$html_tag = $settings['html_tag'] ?? 'h2';
$text_size = $settings['text_size'] ?? 'default';
$alignment = $settings['alignment'] ?? '';
$margin_top = $settings['margins']['margin_top'] ?? 'none';
$margin_bottom = $settings['margins']['margin_bottom'] ?? 'default';

// Applying heading text style if color exists
$text_style = $heading_color ? 'color:' . $heading_color . ';' : '';

// Assigning default classes
$text_size_class = $size ? $size : 'text-4xl xl:text-5xl';
$text_align_class = $align ? $align : '';
$text_leading_class = $leading ? $leading : 'leading-tight';
$text_weight_class = $weight ? $weight : 'font-semibold';
$margin_top_class = 'mt-0';
$margin_bottom_class = 'mb-0';

// Assigning classes based on advanced settings
if ($advanced_settings) {
  if ($text_size) {
    $text_size_classes = [
      "default" => 'text-4xl xl:text-5xl',
      "xs" => 'text-xs',
      "sm" => 'text-sm',
      "md" => 'text-base',
      "lg" => 'text-base xl:text-lg',
      "xl" => 'text-lg xl:text-xl',
      "2xl" => 'text-xl xl:text-2xl',
      "3xl" => 'text-2xl xl:text-3xl',
      "4xl" => 'text-3xl xl:text-4xl',
      "5xl" => 'text-4xl xl:text-5xl'
    ];
    $text_size_class = isset($text_size_classes[$text_size]) ? $text_size_classes[$text_size] : $text_size_class;
  }

  if ($alignment) {
    $text_align_class = 'text-' . $alignment;
  }

  if ($margin_top) {
    $margin_top_classes = [
      "none" => 'mt-0',
      "xs" => 'mt-2',
      "sm" => 'mt-4',
      "md" => 'mt-6',
      "lg" => 'mt-8',
      "xl" => 'mt-10',
      "2xl" => 'mt-12'
    ];
    $margin_top_class = isset($margin_top_classes[$margin_top]) ? $margin_top_classes[$margin_top] : $margin_top_class;
  }

  if ($margin_bottom) {
    $margin_bottom_classes = [
      "none" => 'mb-0',
      "xs" => 'mb-2',
      "sm" => 'mb-4',
      "md" => 'mb-6',
      "lg" => 'mb-8',
      "xl" => 'mb-10',
      "2xl" => 'mb-12'
    ];
    $margin_bottom_class = isset($margin_bottom_classes[$margin_bottom]) ? $margin_bottom_classes[$margin_bottom] : $margin_bottom_class;
  }
}

// Combining classes
$class_list = ['text-brand-dark-blue', $text_size_class, $text_align_class, $text_leading_class, $text_weight_class, $margin_top_class, $margin_bottom_class];
$class .= implode(' ', $class_list);

// Outputting heading if heading text exists
if ($heading_text) {
  echo '<' . $html_tag . ' class="' . $class . '" style="' . $text_style . '">' . $heading_text . '</' . $html_tag . '>';
}
