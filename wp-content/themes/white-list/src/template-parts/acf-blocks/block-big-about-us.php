<?php



$fields = get_fields();

$image1 = get_field_value($fields, 'image1');
$items = get_field_value($fields, 'items');

$image2 = get_field_value($fields, 'image2');
$content = get_field_value($fields, 'content');

$bottom_title = get_field_value($fields, 'bottom_title');
$bottom_text = get_field_value($fields, 'bottom_text');
?>

<div class="big-about-us">
	<div class="container big-about-us__container">

		<div class="big-about-us__upper-container">
			<?php
			if (!empty($image1)) {
				echo '<figure class="big-about-us__image">
						<img src="' . $image1 . '" alt="image">
					</figure>';
			}

			if (!empty($items)) {
				echo '<div class="big-about-us__list">';

				foreach ($items as $key => $item) {
					echo '<div class="big-about-us__list-item">';

					echo '<div class="big-about-us__list-item-number">0' . $key + 1 . '</div>';

					echo '<div class="big-about-us__list-item-inner">';

					if (!empty($item['title'])) {
						echo '<div class="big-about-us__list-item-title">' . $item['title'] . '</div>';
					}

					if (!empty($item['text'])) {
						echo '<div class="big-about-us__list-item-text">' . $item['text'] . '</div>';
					}

					echo '</div>';

					echo '</div>';
				}

				echo '</div>';
			}
			?>
		</div>

		<div class="big-about-us__lower-container">
			<?php
			if (!empty($content)) {
				echo '<div class="big-about-us__content">' . $content . '</div>';
			}

			if (!empty($image2)) {

				echo '<figure class="big-about-us__image">
						<img src="' . $image2 . '" alt="image">
					</figure>';
			}
			?>
		</div>

		<div class="big-about-us__bottom-title-wrapper">
			<?php
			if (!empty($bottom_title)) {
				echo '<h2 class="big-about-us__bottom-title">' . $bottom_title . '</h2>';
			}

			if (!empty($bottom_text)) {
				echo '<h3 class="big-about-us__bottom-text">' . $bottom_text . '</h3>';
			}

			?>
		</div>
	</div>
</div>
