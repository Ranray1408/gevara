<?php

get_header();

global $global_options;

$content = get_the_content();
?>

<div class="single-solution">

	<!-- Related products -->
	<?php echo get_template_part('src/template-parts/category-page-banner', null, ['taxonomy' => 'solutions-category']); ?>
	<!-- Related products END -->

	<div class="single-solution__content">
		<div class="container single-solution__content-container">
			<div class="single-solution__sidebar">
				<?php echo get_template_part(
					'src/template-parts/sidebar',
					null,
					['taxonomy' => 'solutions-category']
				); ?>
			</div>
			<div class="single-solution__products-container">
				<?php
				if (!empty($content)) {
					echo '<div class="single-solution__content">';
					echo apply_filters('the_content', $content);
					echo '</div>';
				}
				?>

				<div class="single-solution__bottom-wrapper">

					<!-- Share -->
					<?php echo get_template_part('src/template-parts/share-block'); ?>
					<!-- Share END -->

					<?php
					$prev_post = get_previous_post(true, '', 'solutions-category');
					$next_post = get_next_post(true, '', 'solutions-category');
					if ($prev_post || $next_post) :
					?>
						<nav class="single-solution__nav">
							<?php if ($prev_post) : ?>
								<a href="<?php echo get_permalink($prev_post->ID); ?>" class="single-solution__nav-link prev">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M5 12H19M5 12L11 18M5 12L11 6" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</a>
							<?php endif; ?>

							<?php if ($next_post) : ?>
								<a href="<?php echo get_permalink($next_post->ID); ?>" class="single-solution__nav-link next">
									<!-- Comment: next post link -->
									<span class="text">Cледующая</span>
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_82650_205)">
											<path d="M5 12H19" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M13 18L19 12" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
											<path d="M13 6L19 12" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</g>
										<defs>
											<clipPath id="clip0_82650_205">
												<rect width="24" height="24" fill="white" />
											</clipPath>
										</defs>
									</svg>
								</a>
							<?php endif; ?>
						</nav>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Category slider -->
	<?php echo get_template_part('src/template-parts/static-category-slider'); ?>
	<!-- Category slider END -->


	<!-- Contacts us block -->
	<?php echo get_template_part('src/template-parts/static-contact-us'); ?>
	<!-- Contacts us block END -->а
</div>


<?php get_footer();
