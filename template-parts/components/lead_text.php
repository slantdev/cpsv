<?php

$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

$lead_text_comp = $field && is_array($field) ? $field : get_sub_field($field ?: 'lead_text');

$lead_text = isset($lead_text_comp['lead_text']['lead_text']) ? $lead_text_comp['lead_text']['lead_text'] : '';
$text_color = $lead_text_comp['lead_text']['text_color'] ?? '';

$lead_text_style = '';
if ($text_color) {
  $lead_text_style = 'color:' . $text_color . ';';
}
//preint_r($lead_text);

if ($lead_text) {
  echo '<div class="prose font-medium max-w-none xl:prose-lg prose-lead:xl:text-2xl prose-lead:font-normal" style="' . $lead_text_style . '">';
  echo '<p class="lead">' . $lead_text . '</p>';
  echo '</div>';
}
