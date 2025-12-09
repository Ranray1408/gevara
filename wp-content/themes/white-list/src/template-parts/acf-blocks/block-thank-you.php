<?php



$fields = get_fields();

$content = get_field_value($fields, 'content');
$icon = get_field_value($fields, 'icon');

$back_buttons = get_field_value($fields, 'back_buttons');
?>
<section class="thank-you">
	<div class="container thank-you__container">
		<?php
		if (!empty($content)) {
			echo '<div class="single-content">' . $content . '</div>';
		}

		if (!empty($back_buttons)) {

			echo '<div class="back-button-wrapper">';

			foreach ($back_buttons as $button) {

				$button_url = get_field_value($button['link'], 'url');
				$button_title = get_field_value($button['link'], 'title');

				if (!empty($button_url) && !empty($button_url)) {
					echo '<a href="' . $button_url . '" class="back-button-wrapper__button white-color-hover-effect">
							' . $button_title . '
							</a>';
				}
			}

			echo '</div>';
		}
		?>
	</div>
</section>
