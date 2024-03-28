<?php

$shape = $args['shape'] ?? '';
$style = $args['style'] ?? '';
$class = $args['class'] ?? '';
?>

<?php if ($shape == 'orange-wave') : ?>
  <div class="relative mx-auto h-1 <?php echo $class ?>">
    <div class="absolute top-0 -right-8 md:right-0 text-brand-orange" style="<?php echo $style ?>">
      <?php echo cpsv_svg(array('svg' => 'cpsv', 'group' => 'shapes', 'size' => false, 'class' => 'w-[180px] md:w-[500px] h-auto')); ?>
    </div>
  </div>
<?php endif; ?>