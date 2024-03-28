<?php

$field = $args['field'] ?? 'components';

//preint_r($field);

if ($field) {
  foreach ($field as $layout) {
    $acf_fc_layout = $layout['acf_fc_layout'];
    if ($acf_fc_layout) {
      $template = 'template-parts/components/' . $acf_fc_layout;
      echo '<div class="my-8">';
      get_template_part($template, '', array('field' => $layout));
      echo '</div>';
    }
  }
}
