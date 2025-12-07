<?php

get_header();

global $global_options;

$current_term = get_queried_object();
$current_term_id = $current_term->term_id;

$banner_image = get_field('banner_image', 'term_' . $current_term_id);

if(!$banner_image) {
	$parent_term_id = $current_term->parent ? $current_term->parent : $current_term->term_id;
	$banner_image = get_field('banner_image', 'term_' . $parent_term_id);
}

$category_page_text = get_field_value($global_options, 'category_page_text');
?>

<div class="category-page">
	<div class="category-page__banner" style="background-image: url( <?php echo $banner_image; ?>)">
		<div class="container  category-page__container">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php if (function_exists('bcn_display')) {
					bcn_display();
				} ?>
			</div>
			<?php
			if ($current_term->name) {
				echo '<h1 class="category-page__title">' . $current_term->name . '</h1>';
			}
			?>
		</div>
	</div>
	<div class="category-page__content">
		<div class="container category-page__content-container">
			<div class="category-page__sidebar">
				<?php echo get_template_part('src/template-parts/sidebar'); ?>
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
