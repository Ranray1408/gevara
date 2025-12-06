<?php



$fields = get_fields();

$title = get_field_value($fields, 'title');
$logos_repeater = get_field_value($fields, 'logos_repeater');
?>
<div class="our-clients">
	<div class="container">
		<?php
		if (!empty($title)) {
			echo '<h2 class="our-clients__title">' . $title . '</h2>';
		}


		if (!empty($title)) {
			echo '<div class="our-clients__logos-container">';

			foreach($logos_repeater as $item) {

				if(empty($item['logo'])) continue;

				echo '<div class="our-clients__logo-item">
							<img src="'.$item['logo'].'" alt="client logo">
					</div>';

			}

			echo '</div>';
		}

		?>
	</div>
</div>
