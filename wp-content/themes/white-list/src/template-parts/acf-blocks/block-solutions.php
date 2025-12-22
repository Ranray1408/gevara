<?php



$fields = get_fields();

$title = get_field_value($fields, 'title');
$solutions = get_field_value($fields, 'solutions');
$link_button = get_field_value($fields, 'link_button');
?>

<div class="solutions-block">
	<div class="container">
		<div class="solutions-block__title-wrapper">
			<?php
			if (!empty($title)) {
				echo '<h2 class="solutions-block__title">' . $title . '</h2>';
			}
			?>

			<div class="solutions-block__slider-button-wrapper">
				<button class="solutions-block__slider-button js-solutions-slider-prev slider-button-prev bg-hover-effect">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5 12H19M5 12L11 18M5 12L11 6" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</button>
				<button class="solutions-block__slider-button js-solutions-slider-next slider-button-next bg-hover-effect">
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


	if (!empty($solutions)) {
		echo '<div class="swiper solutions-block__slider js-solutions-slider">';

		echo '<div class="swiper-wrapper">';

		foreach ($solutions as $solution_id) {
			echo '<div class="swiper-slide">';

				echo get_template_part('src/template-parts/solution', 'card', [
								'post_id' =>  $solution_id
							]);

			echo '</div>';
		}

		echo '</div>';

		echo '</div>';
	}

	$link_button_url = get_field_value($link_button, 'url');
	$link_button_title = get_field_value($link_button, 'title');

	echo '<div class="solutions-block__link-wrapper">';

	if (!empty($link_button_url) && !empty($link_button_title)) {
		echo '<a href="' . $link_button_url . '" class="solutions-block__link grey-tranparent-btn">
					<span>' . $link_button_title . '</span>
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M17 7L7 17M17 7H8M17 7V16" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>';
	}

	echo '</div>';
	?>
</div>
