<?php

// Extracting field and class from args with null coalescing operator
$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

// Retrieving numbered list component data
$numbered_list_comp = is_array($field) ? $field : get_sub_field($field ?: 'numbered_list');

// Extracting numbered list repeater and settings
$numbered_list_repeater = $numbered_list_comp['numbered_list'] ?? [];
$more_settings = $numbered_list_comp['settings']['more_settings'] ?? [];

// Extracting circle size, color, and text color
$circle_size = $more_settings['circle_size'] ?? '';
$circle_color = $more_settings['circle_color'] ?? '';
$text_color = $more_settings['text_color'] ?? '';

// Initializing default styles and classes
$circle_class = 'w-24 h-24 text-4xl';
$text_class = 'pb-10';
$circle_style = '';
$border_style = '';
$text_style = '';

// Updating styles and classes based on settings
switch ($circle_size) {
  case "small":
    $circle_class = 'w-20 h-20 text-3xl mb-8';
    $text_class = 'pb-8';
    break;
  case "large":
    $circle_class = 'w-28 h-28 text-5xl mb-12';
    $text_class = 'pb-12';
    break;
}

if ($circle_color) {
  $circle_style = 'background-color: ' . $circle_color . ';';
  $border_style = 'border-color: ' . $circle_color . ';';
}

if ($text_color) {
  $text_style = 'color:' . $text_color . ';';
}

// Outputting numbered list if repeater exists
if ($numbered_list_repeater) { ?>
  <div class="component-numbered-list relative">
    <div class="relative flex flex-col">
      <?php
      $last_key = array_key_last($numbered_list_repeater);
      foreach ($numbered_list_repeater as $key => $list) :
        $number = ($key + 1 < 10) ? '0' . ($key + 1) : ($key + 1);
        $text = $list['text'] ?? '';
      ?>
        <div class="flex gap-x-6 lg:gap-x-10">
          <div class="flex-none relative">
            <div class="<?php echo $circle_class ?> relative z-10 font-bold text-white rounded-full bg-brand-blue flex items-center justify-center" style="<?php echo $circle_style ?>"><?php echo $number ?></div>
            <?php if ($key != $last_key) : ?>
              <div class="absolute -z-0 top-0 left-1/2 bottom-0 border-r border-solid border-brand-blue" style="<?php echo $border_style ?>"></div>
            <?php endif ?>
          </div>
          <div class="<?php echo $text_class ?> prose xl:prose-lg font-medium max-w-none text-left lg:pt-2" style="<?php echo $text_style ?>">
            <?php if ($text) : ?>
              <p><?php echo $text ?></p>
            <?php endif ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php }
