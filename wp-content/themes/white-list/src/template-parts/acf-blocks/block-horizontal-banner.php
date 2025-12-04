<?php



$fields = get_fields();

$background_image = get_field_value($fields, 'background_image');
$logo = get_field_value($fields, 'logo');
$description = get_field_value($fields, 'description');
?>

<div class="horizontal-banner" style="background-image: url(<?php echo $background_image; ?>)">
	<div class="container">
		<div class="small-container">
			<div class="horizontal-banner__inner-container">
				<?php
				if (!empty($logo)) {
					echo '<figure class="horizontal-banner__logo">
								<img src="' . $logo . '" alt="block logo">
							</figure>';
				}

				if (!empty($description)) {
					echo '<p class="horizontal-banner__description">' . $description . '</p>';
				}
				?>
			</div>
		</div>
	</div>
</div>
