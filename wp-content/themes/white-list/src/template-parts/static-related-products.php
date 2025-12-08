<?php
global $global_options;

$group_fields = get_field_value($global_options, 'related_products_block');

$title = get_field_value($group_fields, 'title');
$number_of_products = get_field_value($group_fields, 'number_of_products');

?>

<div class="single-product__related-block">
	<div class="container">
		<?php
		if (!empty($title)) {
			echo '<h4 class="single-product__related-slider-title">' . $title . '</h4>';
		}
		?>
		<div class="single-product__related-block-slider js-related-slider swiper">
			<div class="swiper-wrapper">
				<?php
				$current_id = get_the_ID();
				$terms = wp_get_object_terms($current_id, 'products-category', ['fields' => 'ids']);

				if (!empty($terms)) {
					$args = [
						'post_type'      => 'products',
						'tax_query'      => [
							[
								'taxonomy' => 'products-category',
								'field'    => 'term_id',
								'terms'    => $terms,
							],
						],
						'post__not_in'   => [$current_id],
						'posts_per_page' => $number_of_products ?? -1,
					];

					$related_query = new WP_Query($args);

					if ($related_query->have_posts()) {
						while ($related_query->have_posts()) {
							$related_query->the_post(); ?>
							<div class="swiper-slide">
								<?php
								echo get_template_part(
									'src/template-parts/product',
									'card',
									['post_id' => get_the_ID()]
								);
								?>
							</div>
				<?php }
						wp_reset_postdata();
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
