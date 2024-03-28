<?php

$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

$content_editor = $field && is_array($field) ? $field : get_sub_field($field ?: 'content_editor');
$content_editor = $content_editor['content_editor'] ?? '';

$content_editor_comp = $field && is_array($field) ? $field : get_sub_field($field ?: 'content_editor');

$content_editor = isset($content_editor_comp['content_editor']['content_editor']) ? $content_editor_comp['content_editor']['content_editor'] : '';
$text_color = $content_editor_comp['content_editor']['text_color'] ?? '';

$content_editor_style = '';
if ($text_color) {
  $content_editor_style = 'color:' . $text_color . ';';
}
//preint_r($content_editor);

if ($content_editor) {
  echo '<div class="prose font-medium max-w-none xl:prose-lg prose-lead:xl:text-2xl prose-lead:font-normal" style="' . $content_editor_style . '">';
  echo $content_editor;
  echo '</div>';
}
