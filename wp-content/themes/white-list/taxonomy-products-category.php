<?php

get_header();

global $global_options;

$category_page_text = get_field_value($global_options, 'category_page_text');
?>

<div class="category-page">

	<!-- Related products -->
	<?php echo get_template_part('src/template-parts/category-page-banner', null, 'products-category'); ?>
	<!-- Related products END -->

	<div class="category-page__content">
		<div class="container category-page__content-container">
			<div class="category-page__sidebar">
				<?php echo get_template_part(
					'src/template-parts/sidebar',
					null,
					['taxonomy' => 'products-category']
				); ?>
			</div>
			<div class="category-page__products-container">
				<div class="category-page__products-container-inner  <?php echo have_posts() ? 'grid' : '';  ?>">
					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
							<?php echo get_template_part('src/template-parts/product', 'card', [
								'post_id' =>  get_the_ID()
							]); ?>

						<?php endwhile; ?>
					<?php else : ?>
						<h3 class="category-page__not-fount-text"><?php esc_html_e('No posts found', 'wp-rock'); ?></h3>
					<?php endif; ?>
				</div>
				<?php the_posts_pagination(); ?>
			</div>
		</div>
	</div>

	<div class="container">
		<?php
		if (!empty($category_page_text)) {
			echo '<div class="category-page__bottom-text">
						' . do_shortcode($category_page_text) . '
					</div>';
		}
		?>
	</div>
</div>


<?php get_footer();
