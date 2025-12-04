<?php



$fields = get_fields();

$title = get_field_value($fields, 'title');

$categories = get_field_value($fields, 'categories');
?>
<section class="category-block">
	<div class="container">
		<?php
		if (!empty($title)) {
			echo '<h2 class="category-block__title">' . $title . '</h2>';
		}

		if (!empty($categories)) {
			echo '<div class="category-block__category-container">';

			foreach ($categories as $cat_id) {

				$link = get_term_link($cat_id);
				$term = get_term($cat_id);
				$image = get_field('category_image', 'term_' . $cat_id);
				$icon  = get_field('icon', 'term_' . $cat_id);


				echo '<a href="' . $link . '" class="category-block__category-item scale-hover-effect" style="background-image: url(' . $image . ')">';

				echo '<h3 class="category-block__category-title">' . $term->name . '</h3>';

				if (!empty($icon)) {
					echo '<img src="' . $icon . '" class="category-block__category-icon">';
				}

				echo '</a>';
			}

			echo '</div>';
		}
		?>
	</div>
</section>
