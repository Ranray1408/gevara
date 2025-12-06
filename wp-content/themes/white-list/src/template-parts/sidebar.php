<?php
$categories = get_terms('products-category');

$current_term = get_queried_object();

if (!$categories) return;
?>

<aside class="sidebar">
	<h4 class="sidebar__title">Каталог продукции</h4>

	<div class="sidebar__items-wrapper">

		<?php
		foreach ($categories as $cat) {

			$active_class_parent = '';

			if ($current_term && $current_term->term_id === $cat->term_id) {
				$active_class_parent = 'active';
			}

			$icon = get_field('icon', 'term_' . $cat->term_id) ?? '';
			$term_link = get_term_link($cat->term_id, 'products-category');

			echo '<div class="sidebar__item">';

			echo '<a class="sidebar__item-link ' . $active_class_parent . '"
					href="' . $term_link . '">
						<img class="sidebar__item-icon style-svg" src="' . $icon . '" alt="icon">
						' . $cat->name . '
						<span class="cross"></span>
					</a>';



			$children = get_terms([
				'taxonomy'   => 'products-category',
				'parent'     => $cat->term_id,
				'hide_empty' => false,
			]);

			if ($children) {
				echo '<div class="sidebar__item-children">';
				foreach ($children as $child) {

					$active_class_child = '';

					if ($current_term && $current_term->term_id === $cat->term_id) {
						$active_class_child = 'active';
					}


					$term_link = get_term_link($child);

					echo '<a href="' . esc_url($term_link) . '" class="sidebar__item-children-link ' . $active_class_child . '">' . esc_html($child->name) . '</a>';
				}
				echo '</div>';
			}


			echo '</div>';
		}
		?>





	</div>

	</div>
</aside>
