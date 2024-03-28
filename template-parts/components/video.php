<?php

$field = $args['field'] ?? '';
$class = $args['class'] ?? '';

$video = $field && is_array($field) ? $field : get_sub_field($field ?: 'video');
$video_embed = isset($video['video_embed']) ? $video['video_embed'] : '';

if ($video_embed) {
  echo '<div class="aspect-w-16 aspect-h-9">';
  echo $video_embed;
  echo '</div>';
}
