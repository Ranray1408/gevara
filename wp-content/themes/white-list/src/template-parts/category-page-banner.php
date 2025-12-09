<?php

global $global_options;

$taxonomy = !empty($args['taxonomy']) ? $args['taxonomy'] : 'products-category';

$object = get_queried_object();


$title = '';
$banner_image = '';

// If we are on single post – get its first category
if ($object instanceof WP_Post) {

	$title = get_the_title($object->ID);
	$banner_image = get_field('banner_image',  $object->ID);

} elseif (is_tax()) {
	$title = $object->name;
	$banner_image = get_field('banner_image', 'term_' . $object->term_id);

	if (!$banner_image) {
		$parent_term_id = $object->parent ? $object->parent : $object->term_id;
		$banner_image = get_field('banner_image', 'term_' . $parent_term_id);
	}
} elseif (is_archive()) {
	if(is_post_type_archive('products')) {
		$title = get_field_value($global_options, 'products_archive_title');
		$banner_image = get_field_value($global_options, 'products_archive_image');
	}

	if(is_post_type_archive('solutions')) {
		$title = get_field_value($global_options, 'solutions_archive_title');
		$banner_image = get_field_value($global_options, 'solutions_archive_image');
	}
}


?>

<div class="category-page__banner" style="background-image: url( <?php echo $banner_image; ?>)">
	<div class="container  category-page__container">
		<?php echo get_template_part('src/template-parts/breadcrumbs'); ?>

		<?php
		if ($title) {
			echo '<h1 class="category-page__title">' . $title . '</h1>';
		}
		?>
	</div>
</div>
