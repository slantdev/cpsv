<?php

// Extracting field and class from args with null coalescing operator
$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

// Retrieving numbered list component data
$info_card_comp = is_array($field) ? $field : get_sub_field($field ?: 'info_card');

// Extracting info_card group and settings
$info_card_group = $info_card_comp['info_card'] ?? [];
$more_settings = $info_card_comp['settings']['more_settings'] ?? [];

// Extracting data
$title = $info_card_group['title'] ?? '';
$info_repeater = $info_card_group['info'] ?? [];
$background_color = $more_settings['background_color'] ?? '';
$title_color = $more_settings['title_color'] ?? '';
$icon_color = $more_settings['icon_color'] ?? '';
$text_color = $more_settings['text_color'] ?? '';

// Initializing default styles and classes
$icon_class = 'w-8 h-8 mx-auto';
$text_class = '';
$card_style = '';
$title_style = '';
$icon_style = '';
$text_style = '';

// Updating styles and classes based on settings
if ($background_color) {
  $card_style = 'background-color: ' . $background_color . ';';
}
if ($title_color) {
  $title_style = 'color: ' . $title_color . ';';
}
if ($icon_color) {
  $icon_style = 'color: ' . $icon_color . ';';
}
if ($text_color) {
  $text_style = 'color:' . $text_color . ';';
}

// Outputting card if info_repeater exists
if ($info_repeater) {
?>
  <div class="component-info-card relative">
    <div class="rounded-xl shadow-lg p-12" style="<?php echo $card_style ?>">
      <?php if ($title) : ?>
        <h4 class="font-semibold text-3xl leading-tight mb-8" style="<?php echo $title_style ?>"><?php echo $title ?></h4>
      <?php endif; ?>
      <?php if ($info_repeater) : ?>
        <div class="flex flex-col gap-y-3">
          <?php
          foreach ($info_repeater as $info) :
            $icon = $info['icon'] ?? '';
            $content = $info['content'] ?? [];
            $text = $content['text'] ?? '';
            $buttons = $content['buttons'] ?? [];
          ?>
            <div class="flex gap-x-8">
              <?php if ($icon) : ?>
                <div class="w-8 flex-none" style="<?php echo $icon_style ?>">
                  <?php echo cpsv_icon(array('icon' => $icon, 'group' => 'content', 'size' => '16', 'class' => $icon_class)); ?>
                </div>
              <?php endif; ?>
              <div class="flex flex-col gap-y-4">
                <?php if ($text) {
                  echo '<div class="text-xl" style="' . $text_style . '">' . $text . '</div>';
                } ?>
                <?php if ($buttons) {
                  echo '<div>';
                  echo get_template_part('template-parts/components/buttons', '', array('field' => $buttons));
                  echo '</div>';
                } ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </div>
  </div>
<?php }
