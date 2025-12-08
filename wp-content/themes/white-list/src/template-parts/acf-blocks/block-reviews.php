<?php



$fields = get_fields();

$title = get_field_value($fields, 'title');
$reviews_repeater = get_field_value($fields, 'reviews_repeater');
?>

<div class="reviews">
	<div class="small-container">
		<div class="reviews__title-wrapper">
			<?php
			if (!empty($title)) {
				echo '<h2 class="reviews__title">' . $title . '</h2>';
			}
			?>

			<div class="reviews__slider-button-wrapper">
				<button class="reviews__slider-button js-reviews-slider-prev slider-button-prev bg-hover-effect">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5 12H19M5 12L11 18M5 12L11 6" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</button>
				<button class="reviews__slider-button js-reviews-slider-next slider-button-next bg-hover-effect">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5 12H19" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M13 18L19 12" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						<path d="M13 6L19 12" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</button>
			</div>
		</div>
	</div>
	<?php


	if (!empty($reviews_repeater)) {
		echo '<div class="swiper reviews__slider js-reviews-slider">';

		echo '<div class="swiper-wrapper">';

		foreach ($reviews_repeater as $item) {

			echo '<div class="swiper-slide reviews__review-item">';

			if (!empty($item['logo'])) {
				echo '<figure class="reviews__review-item-logo">
										<img src="' . $item['logo'] . '" alt="post thumbnail">
								</figure>';
			}

			if (!empty($item['company_name'])) {
				echo '<h3 class="reviews__review-item-company-name">' . $item['company_name'] . '</h3>';
			}

			if (!empty($item['position'])) {
				echo '<p class="reviews__review-item-position">
										' . $item['position'] . '
								</p>';
			}

			if (!empty($item['review_text'])) {
				echo '<p class="reviews__review-item-text">
							' . $item['review_text'] . '
						</p>';
			}

			echo '</div>';
		}

		echo '</div>';

		echo '</div>';
	}

	?>
</div>
