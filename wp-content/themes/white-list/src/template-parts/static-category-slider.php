<?php

global $global_options;

$group_fields = get_field_value($global_options, 'category_slider');


$title = get_field_value($group_fields, 'title');
$categories = get_field_value($group_fields, 'categories');
?>
<section class="category-block category-block-slider">
	<div class="container">
		<div class="reviews__title-wrapper">
			<?php
			if (!empty($title)) {
				echo '<h2 class="category-block__title">' . $title . '</h2>';
			}
			?>

			<div class="category-block__slider-button-wrapper">
				<button class="category-block__slider-button js-category-slider-prev slider-button-prev bg-hover-effect">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5 12H19M5 12L11 18M5 12L11 6" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</button>
				<button class="category-block__slider-button js-category-slider-next slider-button-next bg-hover-effect">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5 12H19" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M13 18L19 12" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M13 6L19 12" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</button>
			</div>
		</div>
		<?php
		if (!empty($categories)) {
			echo '<div class="category-block__category-slider swiper js-category-slider breakout-right">';

			echo '<div class="swiper-wrapper">';

			foreach ($categories as $cat_id) {

				$link = get_term_link($cat_id);
				$term = get_term($cat_id);
				$image = get_field('category_image', 'term_' . $cat_id);
				$icon  = get_field('icon', 'term_' . $cat_id);


				echo '<a href="' . $link . '" class="swiper-slide category-block__category-item scale-hover-effect" style="background-image: url(' . $image . ')">';

				echo '<h3 class="category-block__category-title">' . $term->name . '</h3>';

				if (!empty($icon)) {
					echo '<img src="' . $icon . '" class="category-block__category-icon">';
				}

				echo '</a>';
			}

			echo '</div>';

			echo '</div>';
		}
		?>
	</div>
</section>
