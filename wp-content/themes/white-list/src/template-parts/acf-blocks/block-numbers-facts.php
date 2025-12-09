<?php



$fields = get_fields();

$title = get_field_value($fields, 'title');
$items = get_field_value($fields, 'items');
?>

<div class="numbers-facts">
	<div class="container numbers-facts__container">
		<?php
		if (!empty($title)) {
			echo '<h2 class="numbers-facts__title">' . $title . '</h2>';
		}

		if (!empty($title)) {
			echo '<div class="numbers-facts__items-container">';

			foreach ($items as $item) {
				echo '<div class="numbers-facts__item">';

				if (empty($item['title']) && !empty($item['text'])) continue;

				echo '<h3 class="numbers-facts__item-title">' . $item['title'] . '</h3>';

				echo '<p class="numbers-facts__item-text">' . $item['text'] . '</p>';

				echo '</div>';
			}

			echo '</div>';
		}
		?>
	</div>
</div>
