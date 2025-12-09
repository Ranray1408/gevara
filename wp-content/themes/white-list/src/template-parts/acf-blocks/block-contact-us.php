<?php



$fields = get_fields();

$title = get_field_value($fields, 'title');
$description = get_field_value($fields, 'description');

$socials = get_field_value($fields, 'socials');
$form_shortcode = get_field_value($fields, 'form_shortcode');
?>

<section class="contact-us <?php echo $args['className'] ?? ''; ?>" id="contact-us-block">
	<div class="container">
		<div class="contact-us__inner-container">
			<div class="contact-us__info-wrapper">
				<?php
				if (!empty($title)) {
					echo '<h2 class="contact-us__title">' . $title . '</h2>';
				}

				if (!empty($description)) {
					echo '<div class="contact-us__description">' . $description . '</div>';
				}

				if (!empty($socials)) {
					echo '<div class="contact-us__socials-wrapper">';

					foreach ($socials as $item) {
						if (empty($item['icon']) && empty($item['link']['url'])) continue;

						echo '<a href="' . $item['link']['url'] . '" class="contact-us__social-item scale-hover-effect mod-1">
									<img src="' . $item['icon'] . '" alt="icon">
								</a>';
					}

					echo '</div>';
				}
				?>
			</div>
			<div class="contact-us__form-wrapper">
				<?php
				if (!empty($form_shortcode)) {
					echo do_shortcode($form_shortcode);
				}
				?>
			</div>
		</div>
	</div>
</section>
