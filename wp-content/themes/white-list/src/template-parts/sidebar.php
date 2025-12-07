<?php
global $global_options;

$sidebar_title = get_field_value($global_options, 'sidebar_title');

$categories = get_terms([
	'taxonomy' => 'products-category',
	'hide_empty' => false,
	'parent' => 0,
	'order' => 'DESC'
]);

$current_term = get_queried_object();

$term_parent_id = $current_term->parent ? $current_term->parent : $current_term->term_id;
$term_child_id = $current_term->term_id;

if (!$categories) return;

?>



<?php
if (!empty($sidebar_title)) {
	echo '<a href="#sidebar-popup" class="sidebar__popup-button js-open-popup-activator">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5 18C5 18.5304 5.21071 19.0391 5.58579 19.4142C5.96086 19.7893 6.46957 20 7 20H19V4H7C6.46957 4 5.96086 4.21071 5.58579 4.58579C5.21071 4.96086 5 5.46957 5 6V18ZM5 18C5 17.4696 5.21071 16.9609 5.58579 16.5858C5.96086 16.2107 6.46957 16 7 16H19M9 8H15" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				' . $sidebar_title . '
			</a>';
}

?>

<?php ob_start(); ?>
<aside class="sidebar">
	<?php
	if (!empty($sidebar_title)) {
		echo '<h4 class="sidebar__title">' . $sidebar_title . '</h4>';
	}
	?>

	<div class="sidebar__items-wrapper">

		<?php
		foreach ($categories as $cat) {

			$active_class_parent = '';

			if ($term_parent_id === $cat->term_id) {
				$active_class_parent = 'active';
			}

			$icon = get_field('icon', 'term_' . $cat->term_id) ?? '';
			$term_link = get_term_link($cat->term_id, 'products-category');

			echo '<div class="sidebar__item ' . $active_class_parent . '">';

			echo '<a class="sidebar__item-link"
					href="' . $term_link . '">
						<img class="sidebar__item-icon style-svg" src="' . $icon . '" alt="icon">
						' . $cat->name . '
						<span class="cross"></span>
					</a>';



			$children = get_terms([
				'taxonomy'   => 'products-category',
				'parent'     => $cat->term_id,
				'hide_empty' => false,
				'order' => 'DESC'
			]);

			if ($children) {
				echo '<div class="sidebar__item-children">';
				foreach ($children as $child) {

					$active_class_child = '';

					if ($child->term_id === $term_child_id) {
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
</aside>
<?php
$sidebar_html = ob_get_clean();

echo $sidebar_html;

echo do_shortcode('[popup_box box_id="sidebar-popup"]' . $sidebar_html . '[/popup_box]');
?>
