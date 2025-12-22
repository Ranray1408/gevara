<?php

$all_pages = get_pages([
	'sort_column' => 'menu_order',
	'sort_order'  => 'ASC',
]);


$all_posts = get_posts([
	'post_type'      => 'products',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
]);


$blog_categories = get_terms([
	'taxonomy'   => 'products-category',
	'hide_empty' => false,
]);


$all_solutions = get_posts([
	'post_type'      => 'solutions',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
]);


$solutions_categories = get_terms([
	'taxonomy'   => 'solutions-category',
	'hide_empty' => false,
]);


$pages_by_parent = [];
foreach ($all_pages as $page) {
	$parent_id = $page->post_parent ?: 0;
	if (!isset($pages_by_parent[$parent_id])) {
		$pages_by_parent[$parent_id] = [];
	}
	$pages_by_parent[$parent_id][] = $page;
}


$posts_by_category = [];
foreach ($all_posts as $post) {
	$categories = wp_get_post_terms($post->ID, 'category');
	if (!empty($categories) && !is_wp_error($categories)) {
		foreach ($categories as $cat) {
			if (!isset($posts_by_category[$cat->term_id])) {
				$posts_by_category[$cat->term_id] = [];
			}
			$posts_by_category[$cat->term_id][] = $post;
		}
	} else {
		if (!isset($posts_by_category[0])) {
			$posts_by_category[0] = [];
		}
		$posts_by_category[0][] = $post;
	}
}


$solutions_by_category = [];
foreach ($all_solutions as $solution) {
	$categories = wp_get_post_terms($solution->ID, 'solutions-category');
	if (!empty($categories) && !is_wp_error($categories)) {
		foreach ($categories as $cat) {
			if (!isset($solutions_by_category[$cat->term_id])) {
				$solutions_by_category[$cat->term_id] = [];
			}
			$solutions_by_category[$cat->term_id][] = $solution;
		}
	} else {
		if (!isset($solutions_by_category[0])) {
			$solutions_by_category[0] = [];
		}
		$solutions_by_category[0][] = $solution;
	}
}

$blog_cats_by_parent = [];
foreach ($blog_categories as $cat) {
	if (is_wp_error($cat)) {
		continue;
	}
	$parent_id = $cat->parent ?: 0;
	if (!isset($blog_cats_by_parent[$parent_id])) {
		$blog_cats_by_parent[$parent_id] = [];
	}
	$blog_cats_by_parent[$parent_id][] = $cat;
}

$solutions_cats_by_parent = [];
foreach ($solutions_categories as $cat) {
	if (is_wp_error($cat)) {
		continue;
	}
	$parent_id = $cat->parent ?: 0;
	if (!isset($solutions_cats_by_parent[$parent_id])) {
		$solutions_cats_by_parent[$parent_id] = [];
	}
	$solutions_cats_by_parent[$parent_id][] = $cat;
}
?>

<section class="sitemap-block">
	<div class="container">
		<div class="sitemap">

			<?php if (!empty($pages_by_parent[0])) : ?>
				<div class="sitemap__section">
					<h2 class="sitemap__section-title"><?php esc_html_e('Страницы', 'wp-rock'); ?></h2>
					<ul class="sitemap__pages-list">
						<?php foreach ($pages_by_parent[0] as $page) : ?>
							<?php
							$page_children = isset($pages_by_parent[$page->ID]) ? $pages_by_parent[$page->ID] : [];
							?>
							<li class="sitemap__page-item<?php echo !empty($page_children) ? ' has-children' : ''; ?>">
								<a href="<?php echo esc_url(get_permalink($page->ID)); ?>" class="sitemap__page-link">
									<?php echo esc_html($page->post_title); ?>
								</a>
								<?php if (!empty($page_children)) : ?>
									<ul class="sitemap__pages-sublist">
										<?php foreach ($page_children as $child_page) : ?>
											<li class="sitemap__page-item">
												<a href="<?php echo esc_url(get_permalink($child_page->ID)); ?>" class="sitemap__page-link">
													<?php echo esc_html($child_page->post_title); ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if (!empty($blog_cats_by_parent[0])) : ?>
				<div class="sitemap__section">
					<h2 class="sitemap__section-title"><?php esc_html_e('Каталог', 'wp-rock'); ?></h2>
					<ul class="sitemap__category-list">
						<?php foreach ($blog_cats_by_parent[0] as $category) : ?>
							<?php
							$term_link = get_term_link($category);
							if (is_wp_error($term_link)) {
								$term_link = '#';
							}
							$category_children = isset($blog_cats_by_parent[$category->term_id]) ? $blog_cats_by_parent[$category->term_id] : [];
							$category_posts   = isset($posts_by_category[$category->term_id]) ? $posts_by_category[$category->term_id] : [];
							?>
							<li class="sitemap__category-item<?php echo (!empty($category_children) || !empty($category_posts)) ? ' has-children' : ''; ?>">
								<a href="<?php echo esc_url($term_link); ?>" class="sitemap__category-link">
									<?php echo esc_html($category->name); ?>
								</a>
								<?php if (!empty($category_children)) : ?>
									<ul class="sitemap__category-sublist">
										<?php foreach ($category_children as $child_cat) : ?>
											<?php
											$child_term_link = get_term_link($child_cat);
											if (is_wp_error($child_term_link)) {
												$child_term_link = '#';
											}
											$child_posts = isset($posts_by_category[$child_cat->term_id]) ? $posts_by_category[$child_cat->term_id] : [];
											?>
											<li class="sitemap__category-item<?php echo !empty($child_posts) ? ' has-children' : ''; ?>">
												<a href="<?php echo esc_url($child_term_link); ?>" class="sitemap__category-link">
													<?php echo esc_html($child_cat->name); ?>
												</a>
												<?php if (!empty($child_posts)) : ?>
													<ul class="sitemap__posts-list">
														<?php foreach ($child_posts as $post) : ?>
															<li class="sitemap__post-item">
																<a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="sitemap__post-link">
																	<?php echo esc_html($post->post_title); ?>
																</a>
															</li>
														<?php endforeach; ?>
													</ul>
												<?php endif; ?>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
								<?php if (!empty($category_posts)) : ?>
									<ul class="sitemap__posts-list">
										<?php foreach ($category_posts as $post) : ?>
											<li class="sitemap__post-item">
												<a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="sitemap__post-link">
													<?php echo esc_html($post->post_title); ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php if (!empty($posts_by_category[0])) : ?>
						<ul class="sitemap__posts-list">
							<?php foreach ($posts_by_category[0] as $post) : ?>
								<li class="sitemap__post-item">
									<a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="sitemap__post-link">
										<?php echo esc_html($post->post_title); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if (!empty($solutions_cats_by_parent[0])) : ?>
				<div class="sitemap__section">
					<h2 class="sitemap__section-title"><?php esc_html_e('Решения', 'wp-rock'); ?></h2>
					<ul class="sitemap__category-list">
						<?php foreach ($solutions_cats_by_parent[0] as $category) : ?>
							<?php
							$term_link = get_term_link($category);
							if (is_wp_error($term_link)) {
								$term_link = '#';
							}
							$category_children = isset($solutions_cats_by_parent[$category->term_id]) ? $solutions_cats_by_parent[$category->term_id] : [];
							$category_solutions = isset($solutions_by_category[$category->term_id]) ? $solutions_by_category[$category->term_id] : [];
							?>
							<li class="sitemap__category-item<?php echo (!empty($category_children) || !empty($category_solutions)) ? ' has-children' : ''; ?>">
								<a href="<?php echo esc_url($term_link); ?>" class="sitemap__category-link">
									<?php echo esc_html($category->name); ?>
								</a>
								<?php if (!empty($category_children)) : ?>
									<ul class="sitemap__category-sublist">
										<?php foreach ($category_children as $child_cat) : ?>
											<?php
											$child_term_link = get_term_link($child_cat);
											if (is_wp_error($child_term_link)) {
												$child_term_link = '#';
											}
											$child_solutions = isset($solutions_by_category[$child_cat->term_id]) ? $solutions_by_category[$child_cat->term_id] : [];
											?>
											<li class="sitemap__category-item<?php echo !empty($child_solutions) ? ' has-children' : ''; ?>">
												<a href="<?php echo esc_url($child_term_link); ?>" class="sitemap__category-link">
													<?php echo esc_html($child_cat->name); ?>
												</a>
												<?php if (!empty($child_solutions)) : ?>
													<ul class="sitemap__posts-list">
														<?php foreach ($child_solutions as $solution) : ?>
															<li class="sitemap__post-item">
																<a href="<?php echo esc_url(get_permalink($solution->ID)); ?>" class="sitemap__post-link">
																	<?php echo esc_html($solution->post_title); ?>
																</a>
															</li>
														<?php endforeach; ?>
													</ul>
												<?php endif; ?>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
								<?php if (!empty($category_solutions)) : ?>
									<ul class="sitemap__posts-list">
										<?php foreach ($category_solutions as $solution) : ?>
											<li class="sitemap__post-item">
												<a href="<?php echo esc_url(get_permalink($solution->ID)); ?>" class="sitemap__post-link">
													<?php echo esc_html($solution->post_title); ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php if (!empty($solutions_by_category[0])) : ?>
						<ul class="sitemap__posts-list">
							<?php foreach ($solutions_by_category[0] as $solution) : ?>
								<li class="sitemap__post-item">
									<a href="<?php echo esc_url(get_permalink($solution->ID)); ?>" class="sitemap__post-link">
										<?php echo esc_html($solution->post_title); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>
