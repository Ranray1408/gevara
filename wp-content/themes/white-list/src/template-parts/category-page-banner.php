<?php

$current_term = get_queried_object();
$current_term_id = $current_term->term_id;

$banner_image = get_field('banner_image', 'term_' . $current_term_id);

if (!$banner_image) {
	$parent_term_id = $current_term->parent ? $current_term->parent : $current_term->term_id;
	$banner_image = get_field('banner_image', 'term_' . $parent_term_id);
}
?>

<div class="category-page__banner" style="background-image: url( <?php echo $banner_image; ?>)">
	<div class="container  category-page__container">
		<?php echo get_template_part('src/template-parts/breadcrumbs'); ?>

		<?php
		if ($current_term->name) {
			echo '<h1 class="category-page__title">' . $current_term->name . '</h1>';
		}
		?>
	</div>
</div>
