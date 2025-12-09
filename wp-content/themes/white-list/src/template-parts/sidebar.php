<?php
global $global_options;

$sidebar_title = get_field_value($global_options, 'sidebar_title');

$taxonomy = !empty($args['taxonomy']) ? $args['taxonomy'] : 'products-category';

// Get parent categories
$categories = get_terms([
	'taxonomy'   => $taxonomy,
	'hide_empty' => false,
	'parent'     => 0,
]);

if (empty($categories) || is_wp_error($categories)) return;

$object = get_queried_object();

$term_parent_id = 0;
$term_child_id  = 0;
$current_term = null;

// If we are on single post – get its first category
if ($object instanceof WP_Post) {

	$post_terms = wp_get_post_terms($object->ID, $taxonomy);

	if (!empty($post_terms) && !is_wp_error($post_terms)) {
		$first_term = reset($post_terms);

		if ($first_term instanceof WP_Term) {
			$term_parent_id = $first_term->parent ?: $first_term->term_id;
			$term_child_id  = $first_term->term_id;
		}
	}
} elseif ($object instanceof WP_Term) {
	$term_parent_id = $object->parent ?: $object->term_id;
	$term_child_id  = $object->term_id;
}
?>

<?php if (!empty($sidebar_title)) : ?>
	<a href="#sidebar-popup" class="sidebar__popup-button js-open-popup-activator">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
			<path d="M5 18C5 18.5304 5.21071 19.0391 5.58579 19.4142C5.96086 19.7893 6.46957 20 7 20H19V4H7C6.46957 4 5.96086 4.21071 5.58579 4.58579C5.21071 4.96086 5 5.46957 5 6V18ZM5 18C5 17.4696 5.21071 16.9609 5.58579 16.5858C5.96086 16.2107 6.46957 16 7 16H19M9 8H15"
				stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
		<?php echo esc_html($sidebar_title) ?>
	</a>
<?php endif; ?>

<?php ob_start(); ?>
<aside class="sidebar">

	<?php if (!empty($sidebar_title)) : ?>
		<h4 class="sidebar__title"><?= esc_html($sidebar_title) ?></h4>
	<?php endif; ?>

	<div class="sidebar__items-wrapper">

		<?php foreach ($categories as $cat) :

			if (is_wp_error($cat)) continue;

			$active_parent = ($term_parent_id === $cat->term_id) ? 'active' : '';

			$icon = get_field('icon', 'term_' . $cat->term_id);
			if (is_wp_error($icon)) $icon = '';

			$term_link = get_term_link($cat);
			if (is_wp_error($term_link)) $term_link = '#';
		?>

			<div class="sidebar__item <?= $active_parent ?>">

				<a class="sidebar__item-link" href="<?= esc_url($term_link) ?>">
					<?php if (!empty($icon)) : ?>
						<img class="sidebar__item-icon style-svg" src="<?= esc_url($icon) ?>" alt="icon">
					<?php endif; ?>

					<?= esc_html($cat->name) ?>
					<span class="cross"></span>
				</a>

				<?php
				$children = get_terms([
					'taxonomy'   => $taxonomy,
					'parent'     => $cat->term_id,
					'hide_empty' => false,
				]);

				if (!empty($children) && !is_wp_error($children)) :
				?>
					<div class="sidebar__item-children">
						<?php foreach ($children as $child) :

							if (is_wp_error($child)) continue;

							$is_active_child = ($child->term_id === $term_child_id) ? 'active' : '';

							$term_link = get_term_link($child);
							if (is_wp_error($term_link)) $term_link = '#';
						?>

							<a href="<?= esc_url($term_link) ?>" class="sidebar__item-children-link <?= $is_active_child ?>">
								<?= esc_html($child->name) ?>
							</a>

						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			</div>

		<?php endforeach; ?>

	</div>
</aside>
<?php
$sidebar_html = ob_get_clean();
echo $sidebar_html;

echo do_shortcode('[popup_box box_id="sidebar-popup"]' . $sidebar_html . '[/popup_box]');
?>
