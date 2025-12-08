<?php


global $global_options;

$group_fields = get_field_value($global_options, 'advantages_block');

$background_image = get_field_value($group_fields, 'background_image');
$background_image_mob = get_field_value($group_fields, 'background_image_mob');
$title = get_field_value($group_fields, 'title');

$advantages_repeater = get_field_value($group_fields, 'advantages_repeater');
?>
<section class="advantages">

	<img width="1920" height="840" class="advantages__bg-image" src="<?php echo $background_image; ?>" alt="background image">
	<img width="420" height="400"  class="advantages__bg-image mob" src="<?php echo $background_image; ?>" alt="background image">

	<div class="container advantages__container">
		<div class="small-container">
			<div class="advantages__inner-container">
				<?php
				if (!empty($title)) {
					echo '<h3 class="advantages__title">' . $title . '</h3>';
				}

				if (!empty($advantages_repeater)) {
					echo '<div class="advantages__list">';

					foreach ($advantages_repeater as $key => $item) {
						echo '<div class="advantages__list-item">';

							echo '<div class="advantages__list-item-number">0' . $key + 1 . '</div>';

								echo '<div class="advantages__list-item-inner">';

									if (!empty($item['title'])) {
										echo '<div class="advantages__list-item-title">' . $item['title'] . '</div>';
									}

									if (!empty($item['text'])) {
										echo '<div class="advantages__list-item-text">' . $item['text'] . '</div>';
									}

								echo '</div>';

						echo '</div>';
					}

					echo '</div>';
				}
				?>
			</div>
		</div>
	</div>
</section>
