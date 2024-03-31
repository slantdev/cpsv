<?php

// Extracting field and class from args with null coalescing operator
$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

// Getting buttons component
$buttons_comp = is_array($field) ? $field : get_sub_field($field ?: 'buttons');

// Setting default alignment class
$buttons_alignment_class = 'text-left';

// Checking if buttons settings exist and extracting alignment
if (isset($buttons_comp['settings']['buttons_alignment'])) {
  $buttons_alignment = $buttons_comp['settings']['buttons_alignment'];

  // Mapping alignment values to corresponding classes
  $buttons_alignment_classes = [
    "left" => 'text-left',
    "center" => 'text-center mx-auto',
    "right" => 'text-right',
  ];

  // Assigning alignment class based on alignment value
  $buttons_alignment_class = $buttons_alignment_classes[$buttons_alignment] ?? $buttons_alignment_class;
}

// Combining class and alignment class
$button_container_class = $class . ' ' . $buttons_alignment_class;

// Getting buttons repeater
$buttons_repeater = $buttons_comp['buttons_repeater'] ?? '';

// Outputting buttons if repeater exists
if ($buttons_repeater) {
  $button_count = count($buttons_repeater);
  $print_button_margin = $button_count > 1 ? 'mr-4 mb-4' : '';

  // Opening button container div
  echo '<div class="mb-6 xl:mb-0 ' . $button_container_class . '">';

  foreach ($buttons_repeater as $button) {
    // Extracting button details
    $button_link = $button['button_link'];
    $button_title = $button_link['title'] ?? '';
    $button_url = $button_link['url'] ?? '';
    $button_target = $button_link['target'] ?? '_self';

    $button_settings = $button['settings']['more_settings'] ?? [];
    $button_style = $button_settings['button_style'] ?? '';
    $button_size = $button_settings['button_size'] ?? '';
    $button_bg_color = $button_settings['button_bg_color'] ?? '';
    $button_border_color = $button_settings['button_border_color'] ?? '';
    $button_text_color = $button_settings['button_text_color'] ?? '';

    // Setting default button classes and styles
    $print_button_class = '';
    $print_button_style = '';

    // Mapping button style to corresponding classes
    $button_styles_map = [
      "dark-blue" => 'btn-primary text-white hover:brightness-125',
      "blue" => 'btn-secondary text-white hover:brightness-125',
      "yellow" => 'bg-brand-yellow border-brand-yellow hover:bg-brand-yellow hover:brightness-110',
      "tomato" => 'bg-brand-tomato border-brand-tomato hover:bg-brand-tomato hover:brightness-110',
      "white" => 'bg-white border-white hover:brightness-90',
      "dark-blue-outline" => 'btn-outline btn-primary',
      "blue-outline" => 'btn-outline btn-secondary',
      "yellow-outline" => 'btn-outline border-brand-yellow text-brand-yellow hover:bg-brand-yellow hover:border-brand-yellow hover:text-black',
      "tomato-outline" => 'btn-outline border-brand-tomato text-brand-tomato hover:bg-brand-tomato hover:border-brand-tomato hover:text-white',
      "white-outline" => 'btn-outline border-white text-white shadow-md hover:bg-white hover:border-gray-500 hover:text-white hover:bg-gray-500',
    ];
    if ($button_style == 'tomato') {
      $print_button_style .= 'color: #ffffff;';
    }
    if ($button_style == 'white') {
      $print_button_style .= 'color: #404041;';
    }

    // Assigning button class based on button style
    $print_button_class = $button_styles_map[$button_style] ?? '';

    // Assigning button size class
    switch ($button_size) {
      case "xs":
        $print_button_class .= ' btn-xs';
        break;
      case "sm":
        $print_button_class .= ' btn-sm';
        break;
      case "md":
        $print_button_class .= ' btn-md px-8 xl:text-lg';
        break;
      case "lg":
        $print_button_class .= ' btn-lg px-12 xl:text-xl';
        break;
      default:
        $print_button_class .= ' btn-md px-8 xl:text-lg';
    }

    // Adding custom button styles if available
    if ($button_style == 'custom') {
      $print_button_class .= ' hover:brightness-125';
      $print_button_style .= $button_bg_color ? 'background-color: ' . $button_bg_color . ';' : '';
      $print_button_style .= $button_text_color ? 'color: ' . $button_text_color . ';' : '';
      $print_button_style .= $button_border_color ? 'border-color: ' . $button_border_color . ';' : '';
    }

    $class_list = ['btn rounded-full hover:shadow-lg transition-all duration-300 hover:scale-105', $print_button_class, $print_button_margin];
    $class .= implode(' ', $class_list);

    // Outputting button HTML
    if ($button_url) {
      echo '<a href="' . $button_url . '" class="' . $class . '" style="' . $print_button_style . '" title="' . $button_title . '" target="' . $button_target . '"><span>' . $button_title . '</span></a>';
    }
  }
}
