<?php

get_header();

$current_term = get_queried_object();
$current_term_id = $current_term->term_id;

$banner_image = get_field('banner_image', 'term_' . $current_term_id);
?>

<div class="category-page" style="background-image: url( <?php echo $banner_image; ?>)">
	<div class="category-page__banner">
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
		<div class="container">
			<div class="category-page__sidebar">
				<?php echo get_template_part('src/template-parts/sidebar'); ?>
			</div>
			<div class="category-page__products">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php the_title(); ?>
					<?php endwhile; ?>
					<?php the_posts_pagination(); ?>
				<?php else : ?>
					<p><?php esc_html_e('No posts found', 'wp-rock'); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>


<?php get_footer();
