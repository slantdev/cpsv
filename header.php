<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-700 antialiased pt-[72px] xl:pt-0'); ?>>

	<?php do_action('cpsv_site_before'); ?>

	<div id="page" class="min-h-screen flex flex-col overflow-x-hidden overflow-y-hidden">

		<?php do_action('cpsv_header'); ?>

		<?php get_template_part('template-parts/global/site', 'header'); ?>

		<div id="content" class="site-content flex-grow">

			<?php do_action('cpsv_content_start'); ?>

			<main>