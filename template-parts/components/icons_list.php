<?php

// Extracting field and class from args with null coalescing operator
$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

// Retrieving numbered list component data
$icons_list_comp = is_array($field) ? $field : get_sub_field($field ?: 'icons_list');

// Extracting numbered list repeater and settings
$icons_list_repeater = $icons_list_comp['icons_list'] ?? [];
$more_settings = $icons_list_comp['settings']['more_settings'] ?? [];

// Extracting circle size, color, and text color
$icon_size = $more_settings['icon_size'] ?? '';
$icon_color = $more_settings['icon_color'] ?? '';
$text_color = $more_settings['text_color'] ?? '';

// Initializing default styles and classes
$icon_class = 'w-24 h-24 mx-auto';
$text_class = '';
$icon_style = '';
$text_style = '';

// Updating styles and classes based on settings
switch ($icon_size) {
  case "small":
    $icon_class = 'w-20 h-20 mx-auto';
    break;
  case "large":
    $icon_class = 'w-28 h-28 mx-auto';
    break;
}

if ($icon_color) {
  $icon_style = 'color: ' . $icon_color . ';';
}

if ($text_color) {
  $text_style = 'color:' . $text_color . ';';
}

// Outputting icons list if repeater exists
if ($icons_list_repeater) {
  $count = count($icons_list_repeater);
?>
  <div class="component-icons-list relative">
    <div class="grid grid-cols-2 lg:grid-cols-<?php echo $count ?> gap-x-6">
      <?php
      foreach ($icons_list_repeater as $list) :
        $icon = $list['icon'] ?? '';
        $text = $list['text'] ?? '';
      ?>
        <div class="flex flex-col gap-4 text-center">
          <?php if ($icon) {
            echo '<div style="' . $text_style . '">';
            echo cpsv_icon(array('icon' => $icon, 'group' => 'content', 'size' => '16', 'class' => $icon_class));
            echo '</div>';
          } ?>
          <?php if ($text) : ?>
            <div class="text-lg leading-tight font-bold" style="<?php echo $text_style ?>"><?php echo $text ?></div>
          <?php endif ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php }
